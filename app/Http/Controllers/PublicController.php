<?php
/**
 * Created by PhpStorm.
 * User: merdan
 * Date: 12/9/2018
 * Time: 12:39 PM
 */

namespace App\Http\Controllers;

use App\Http\Requests\AddEventRequest;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\SubscribeRequest;
use App\Models\EventRequest;
use App\Models\Subscriber;
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

    public function showEvents($cat_id = null, Request $request){
        $date = $request->get('date');
        //$cat_id = $request->get('cat_id');

        $e_query = Event::onLive();
        $nav_query = Category::select('id','title_tm','title_ru','parent_id')
            ->orderBy('lft','asc');
        $category = null;
        if(!empty($cat_id)){
            $category = Category::findOrFail($cat_id);

            if($category->parent_id > 0){
                $e_query->where('sub_category_id',$category->id);
                $nav_query->where('parent_id',$category->parent_id);
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

        $events = $e_query->paginate(10);
        $navigation = $nav_query->get();
//        dd($events);
        return view('Bilettm.Public.EventsPage')->with([
            'events' => $events,
            'category' => $category,
            'navigation' => $navigation
        ]);
    }

    public function search(SearchRequest $request){
        //todo implement with elastick search and scout
        $query = $request->get('q');
        $events = Event::where('title','like',"%{$query}%")->get();

        return view('Bilettm.Public.SearchResults')
            ->with([
                'events' => $events,
                'query' => $query
            ]);
    }

    public function showAddEventForm(){
        return view('Bilettm.Public.AddEventForm');
    }

    public function postAddEvent(AddEventRequest $request){

        $addEvent = EventRequest::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'detail' => $request->get('detail')
        ]);
        return view('Bilettm.Public.AddEventResult',compact('addEvent'));
    }

    public function subscribe(SubscribeRequest $request){
        $email = $request->get('email');
        $subscribe = Subscriber::updateOrCreate(['email'=>$email,'active'=>1]);

        if($subscribe){
            session()->flash('success','Subscription successfully');
        }

        return redirect()->back();
    }
}