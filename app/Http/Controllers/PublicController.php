<?php
/**
 * Created by PhpStorm.
 * User: merdan
 * Date: 12/9/2018
 * Time: 12:39 PM
 */

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Slider;
use Carbon\Carbon;

class PublicController extends Controller
{
    private $data;

    public function showHomePage(){
        $cinema = Event::cinema()->onLive()->take(11)->get();
//        dd($cinema);
        $theatre = Event::theatre()->onLive()->take(6)->get();
        $musical = Event::musical()->onLive()->take(8)->get();
        $sliders = Slider::where('active',1)->get();
        return view('Bilettm.Public.HomePage')->with([
            'cinema' => $cinema,
            'theatre' => $theatre,
            'musical' => $musical,
            'sliders' => $sliders
        ]);
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