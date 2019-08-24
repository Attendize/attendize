<?php
/**
 * Created by PhpStorm.
 * User: merdan
 * Date: 12/9/2018
 * Time: 12:39 PM
 */

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Carbon\Carbon;

class PublicController extends Controller
{
    private $data;
    public function __construct()
    {
        $this->data = ['categories'=>Category::pluck(trans('Category.category_title'),'id'),
            'category_id'=>''];
    }

    public function showHomePage(){
        $events = Event::where('end_date', '>', Carbon::now())
            ->take(10)
            ->get();
        $this->data['events'] = $events;
        return view('Bilettm.Public.HomePage', $this->data);
    }

    public function showCategoryEvents($category_id){
        $events = Event::where('end_date', '>', Carbon::now())
            ->where('category_id',$category_id)
            ->take(10)
            ->get();
        $this->data['events'] = $events;
        $this->data['category_id']= $category_id;
//        print_r($this->data);
        return view('Public.CategoryEventsPage', $this->data);
    }
}