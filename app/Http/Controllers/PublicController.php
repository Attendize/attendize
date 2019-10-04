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

    public function showCategoryEvents($cat_id, Request $request){
        $date = $request->get('date');
        $sort = $request->get('sort');
        $filter =$request->get('filter');//today,tomorrow,week,month,date

        if($sort == 'new')
            $orderBy = ['field'=>'created_at','order'=>'desc'];
        if ($sort =='pop')
            $orderBy = ['field'=>'views','order'=>'desc'];
        else
        {
            $orderBy =['field'=>'start_date','order'=>'asc'];
            $sort = 'start_date';
        }

        switch ($filter){
            case 'today'    : $date_start = Carbon::now(); $date_end = $date_start->endOfDay(); break;
            case 'tomorrow' : $date_start = Carbon::tomorrow(); $date_end = $date_start->endOfDay();break;
            case 'week'     : $date_start = Carbon::now(); $date_end = $date_start->endOfWeek(); break;
            case 'month'    : $date_start = Carbon::now(); $date_end = $date_start->endOfMonth(); break;
            case 'date'     : $date_start = Carbon::parse($date); $date_end = $date_start->endOfDay(); break;
            default : $date_start = null; $date_end = null;
        }
//        dd(url('path'));
//        setlocale(LC_TIME, 'tk');
//        Carbon::setLocale('tk');
//        dd(Carbon::parse('2019-01-01',config('app.timezone')) ->formatLocalized('%d %B'));
//        Carbon::
        $category = Category::select('id','title_tk','title_ru','view_type','events_limit','parent_id')
            ->findOrFail($cat_id);

        $data = ['sort' => $sort, 'category' => $category, 'filter' => $filter];

        if($category->parent_id >0 || $category->view_type === 'concert'){
            $events = $category->cat_events()
                ->onLive($date_start,$date_end)
                ->orderBy($orderBy)
                ->get();
            $data['events'] = $events;

            return view("Bilettm.Public.CategoryEventsPage")->with($data);
        }
        else{
            $subCats = $category->children()
                ->withLiveEvents($orderBy, $date_start, $date_end, $category->events_limit)
                ->whereHas('cat_events',
                    function ($query) use($date_start, $date_end){
                        $query->onLive($date_start, $date_end);
                })->get();
            $data['sub_cats'] = $subCats;

            return view("Bilettm.Public.EventsPage")->with($data);
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