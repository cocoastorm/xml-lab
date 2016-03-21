<?php

class Booking extends CI_Model
{
    // days
    public $time;
    public $courseName;
    public $room;
    public $instructor;

    // periods
    public $weekday;

    // courses
    public $code;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param mixed $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @param mixed $courseName
     */
    public function setCourseName($courseName)
    {
        $this->courseName = $courseName;
    }

    /**
     * @param mixed $room
     */
    public function setRoom($room)
    {
        $this->room = $room;
    }

    /**
     * @param mixed $instructor
     */
    public function setInstructor($instructor)
    {
        $this->instructor = $instructor;
    }

    /**
     * @param mixed $weekday
     */
    public function setWeekday($weekday)
    {
        $this->weekday = $weekday;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    public function getTime()
    {
        if(isset($this->time)) {
            return $this->time;
        }
        else {
            return null;
        }
    }

    public function getCourseName()
    {
        if(isset($this->courseName)) {
            return $this->courseName;
        }
        else {
            return null;
        }
    }

    public function getRoom()
    {
        if(isset($this->room)) {
            return $this->room;
        }
        else {
            return null;
        }
    }

    public function getInstructor()
    {
        if(isset($this->instructor)) {
            return $this->instructor;
        }
        else {
            return null;
        }
    }

    public function getWeekDay()
    {
        if(isset($this->weekday)) {
            return $this->weekday;
        }
        else {
            return null;
        }
    }

    public function getCode()
    {
        if(isset($this->code)) {
            return $this->code;
        }
        else {
            return null;
        }
    }

}