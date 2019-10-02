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
        $cinema = Category::where('view_type','cinema')
            ->categoryLiveEvents(21)
            ->first();

        $theatre = Category::where('view_type','theatre')
            ->categoryLiveEvents(6)
            ->first();

        $musical =Category::where('view_type','concert')
            ->categoryLiveEvents(12)
            ->first();

        $sliders = Slider::where('active',1)->get();
//dd($cinema->events->first());
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
        $nav_query = Category::select('id','title_tk','title_ru','parent_id')
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

        $events = $e_query->with('images')->paginate(5);
        $navigation = $nav_query->get();
//        dd($events);
        return view('Bilettm.Public.EventsPage')->with([
            'events' => $events,
            'category' => $category,
            'navigation' => $navigation
        ]);
    }

    public function showCategoryEvents($cat_id, Request $request){
        $date = $request->get('date');
        $popular = $request->get('popular');
//        setlocale(LC_TIME, 'tk');
//        Carbon::setLocale('tk');
//        dd(Carbon::parse('2019-01-01',config('app.timezone')) ->formatLocalized('%d %B'));
//        Carbon::
        $category = Category::select('id','title_tk','title_ru','view_type','events_limit','parent_id')
            ->findOrFail($cat_id);

        if($category->parent_id >0 || $category->view_type === 'concert'){
            $events = $category->cat_events()
                ->onLive($date)
                ->orderBy($popular ? 'start_date' : 'views')
                ->get();
            return view("Bilettm.EventsList.subCategoryList")->with([
                'category' => $category,
                'events' => $events
            ]);
        }
        else{
            $subCats = $category->children()
                ->withLiveEvents($date,$category->events_limit,$popular)
                ->whereHas('cat_events',function ($query) use($date){
                    $query->onLive($date);
                })->get();
//dd($subCats);
            return view("Bilettm.Layouts.EventsPage")->with([
                'sub_cats' => $subCats,
                'category' => $category,
            ]);
        }
    }

    public function search(SearchRequest $request){
        //todo implement with elastick search and scout
        $query = $request->get('q');
        $events = Event::where('title','like',"%{$query}%")->paginate(10);

        return view('Bilettm.Public.SearchResults')
            ->with([
                'events' => $events,
                'query' => $query
            ]);
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
        //todo validate email
        $subscribe = Subscriber::updateOrCreate(['email'=>$email,'active'=>1]);

        if($subscribe){
            session()->flash('message','Subscription successfully');
        }

        return response()->json([
            'status'   => 'success',
            'message' => 'Subscription successfully',
        ]);
    }
}