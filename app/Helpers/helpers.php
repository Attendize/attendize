<?php

use App\Models\Currency;

if (!function_exists('money')) {
    /**
     * Format a given amount to the given currency
     *
     * @param $amount
     * @param Currency $currency
     * @return string
     */
    function money($amount, Currency $currency)
    {
        return $currency->symbol_left . number_format($amount, $currency->decimal_place, $currency->decimal_point,
            $currency->thousand_point) . $currency->symbol_right;
    }
}


