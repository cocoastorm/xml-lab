<?php

class Timetable extends CI_Model
{
    protected $xml = null;
    protected $days = array();
    protected $periods = array();
    protected $courses = array();

    public function __construct()
    {
        parent::__construct();
        $this->xml = simplexml_load_file(DATAPATH . 'timetables.xml');

        // populate days facet
        foreach($this->xml->timetables->days->day as $day) {
            $this->days[(string) $day['dayofweek']] = (string) $day;
        }

        // populate periods facet
        foreach($this->xml->timetables->periods->timeslot as $timeslot) {
            $this->periods[(string) $timeslot['time']] = (string) $timeslot;
        }

        // populate courses facet
        foreach($this->xml->timetables->courses->course as $course) {
            $this->courses[(string) $course['code']] = (string) $course;
        }
    }

    public function getDay($dayofweek) {
        if (isset($this->days[$dayofweek]))
            return $this->days[$dayofweek];
        else
            return null;
    }

    public function getTimeslot($time) {
        if (isset($this->periods[$time]))
            return $this->periods[$time];
        else
            return null;
    }

    public function getCourse($code) {
        if (isset($this->courses[$code]))
            return $this->courses[$code];
        else
            return null;
    }
}