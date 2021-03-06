<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function calendar(){
        $events = [];

        $getevents = Event::all();

        foreach ($getevents as $event) {

            $events[] = \Calendar::event(
                $event->titl,
                false,
                new \DateTime($event->start),
                new \DateTime($event->end),
                $event->event_id
                );
        }

        $events[] = \Calendar::event(
            'Event One', //event title
            false, //full day event?
            '2015-11-11T0800', //start time (you can also use Carbon instead of DateTime)
            '2015-11-12T0800', //end time (you can also use Carbon instead of DateTime)
            0 //optionally, you can specify an event ID
        );

        $events[] = \Calendar::event(
            "Valentine's Day", //event title
            true, //full day event?
            new \DateTime('2015-11-14'), //start time (you can also use Carbon instead of DateTime)
            new \DateTime('2015-11-14'), //end time (you can also use Carbon instead of DateTime)
            'stringEventId' //optionally, you can specify an event ID
        );

        $eloquentEvent = Event::first(); //Event implements MaddHatter\LaravelFullcalendar\Event

        $calendar = \Calendar::addEvents($events);

        return view('calendar', compact('calendar'));
    }
}
