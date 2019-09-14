<?php
/**
 * Created by PhpStorm.
 * User: merdan
 * Date: 12/9/2018
 * Time: 12:39 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Event;
use App\Models\Slider;
use Carbon\Carbon;

class PublicController extends Controller
{
    public function showHomePage(){
        $cinema = Event::cinema()
            ->onLive()
            ->take(11)
            ->get();

        $theatre = Event::theatre()
            ->onLive()
            ->take(6)
            ->get();

        $musical = Event::musical()
            ->onLive()
            ->take(8)
            ->get();

        $sliders = Slider::where('active',1)->get();

        return view('Bilettm.Public.HomePage')->with([
            'cinema' => $cinema,
            'theatre' => $theatre,
            'musical' => $musical,
            'sliders' => $sliders
        ]);
    }

    public function showEvents($cat_id = null,Request $request){
        $date = $request->get('date');
        //$cat_id = $request->get('cat_id');

        $e_query = Event::onLive();
        $nav_query = Category::select('id','title_tm','title_ru','parent_id')
            ->orderBy('lft','asc');

        $active_id = -1;

        if(!empty($cat_id)){
            $category = Category::findOrFail($cat_id);

            if($category->parent_id > 0){
                $e_query->where('sub_category_id',$category->id);
                $nav_query->where('parent_id',$category->parent_id);
                $active_id = $category->id;
            }
            else{
                $e_query->where('category_id',$category->id);
                $nav_query->where('parent_id',$category->id);
            }

        }else{
            $nav_query->main();
        }

        if(!empty($date)){
            $e_query->whereDate('start_date','>=',Carbon::parse($date));
        }

        $events = $e_query->paginate(20);
        $navigation = $nav_query->get();

        return view('Bilettm.Public.EventsPage')->with([
            'events' => $events,
            'active_id' => $active_id,
            'navigation' => $navigation
        ]);
    }

    public function search(Request $request){
        $query = $request->get('q');
        return view('Bilettm.Public.SearchResult');
    }
}