<?php

if (!function_exists('money')) {
    /**
     * Format a given amount to the given currency
     *
     * @param $amount
     * @param \App\Models\Currency $currency
     * @return string
     */
    function money($amount, \App\Models\Currency $currency = null)
    {
        if(!$currency){
            return number_format($amount,0,'.',',');
        }
        return $currency->symbol_left . number_format($amount, $currency->decimal_place, $currency->decimal_point,
            $currency->thousand_point) . $currency->symbol_right;
    }
}
if(!function_exists('main_categories')){

    /**
     * return main categories
     * @return mixed
     */
    function main_categories(){
        return \App\Models\Category::main()->pluck(trans('Category.category_title'),'id');
    }
}

if(! function_exists('sub_categories')){
    /**
     * return sub categoreies
     */

    function sub_categories(){
        return \App\Models\Category::sub()
            ->select(trans('Category.category_title'),'id','parent_id')
            ->get();
    }
}

