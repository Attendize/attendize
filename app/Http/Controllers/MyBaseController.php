<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Auth;
use View;

class MyBaseController extends Controller
{
    public function __construct()
    {
        if (empty(Auth::user())) {
            return redirect()->to('/login');
        }
    }

    /**
     * Returns data which is required in each view, optionally combined with additional data.
     *
     * @param int $event_id
     * @param array $additional_data
     *
     * @return array
     */
    public function getEventViewData($event_id, $additional_data = [])
    {
        $event = Event::scope()->findOrFail($event_id);

        $image_path = $event->organiser->full_logo_path;
        if ($event->images->first() != null) {
            $image_path = $event->images()->first()->image_path;
        }

        return array_merge([
            'event'      => $event,
            'questions'  => $event->questions()->get(),
            'image_path' => $image_path,
        ], $additional_data);
    }

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }
}
