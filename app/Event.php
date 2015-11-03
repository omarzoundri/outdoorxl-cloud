<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model implements \MaddHatter\LaravelFullcalendar\Event
{

    protected $dates = ['title','start', 'end'];

    /**
     * Get the event's id number
     *
     * @return int
     */
    public function getId() {
        return $this->event_id;
    }

    /**
     * Get the event's title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Is it an all day event?
     *
     * @return bool
     */
    public function isAllDay()
    {
        return (bool)$this->all_day;
    }

    /**
     * Get the start time
     *
     * @return DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Get the end time
     *
     * @return DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    public function getEventOptions()
    {
        return [
            'color' => $this->background_color,
            //etc
        ];
    } 
}
