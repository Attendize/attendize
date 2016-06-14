<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventQuestionRequest;
use App\Models\Event;
use App\Models\Module;
use Illuminate\Http\Request;

/*
  Attendize.com   - Event Management & Ticketing
 */

class EventModuleController extends MyBaseController
{
    /**
     * Show the event modules page
     *
     * @param int $event_id
     * @return mixed
     */
    public function showEventModules($event_id)
    {
        $event = Event::scope()->findOrFail($event_id);
        $modules = $event->list_modules();

        $data = [
            'event' => $event,
            'modules' =>  $modules,
        ];

        return view('ManageEvent.Modules', $data);
    }

    /**
     * @param $event_id
     * @param $module
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toggleModule($event_id, $module){
        $event = Event::scope()->findOrFail($event_id);

        if($event->moduleIsEnabled($module)){
            Module::where('event_id', $event_id)
                ->where('module', $module)
                ->first()->delete();

            \Session::flash('message', 'Module deactivated');
        } else{
            Module::create([
                'event_id' => $event_id,
                'module' => $module,
            ]);

            \Session::flash('message', 'Module activated');
        }

        return redirect()->back();
    }
}
