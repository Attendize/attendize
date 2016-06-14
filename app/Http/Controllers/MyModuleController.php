<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Organiser;
use Auth;
use Illuminate\Http\Request;
use JavaScript;
use View;

class MyModuleController extends Controller
{
    protected $event;

    public function __construct(Request $request)
    {
        /**
         * Automatically inject $event into the views
         * Also inject $this->event into the Controllers
         *
         */
        if (auth()->check()) {
            $this->event = Event::scope()->findOrFail($request->segment(2));
        }else{
            $this->event = Event::findOrFail($request->segment(2));
        }

        /*
         * Only allow access to installed Modules
         */
        $module = $request->segment(3);
        if(!$this->event->moduleIsEnabled($module)){
            abort(404, 'The selected Module is not installed');
        }

        /*
         * Share the event across all modules
         */
        View::share('event', $this->event);

        /*
         * Share the organizers across all views
         */
        View::share('organisers', Organiser::scope()->get());
    }

}