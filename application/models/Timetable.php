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
        $this->days_xml = simplexml_load_file(DATAPATH . 'days.xml');

        // populate days facet
        foreach($this->days_xml->day as $day) {
            $record = new stdClass();
            $record->dayofweek = (string) $day['dayofweek'];

            $daybookingArr = array();

            foreach($day->daybooking as $daybooking)
            {
                $dayrecord = new stdClass();
                $dayrecord->time = (string) $daybooking->time;
                $dayrecord->courseName = (string) $daybooking->courseName;
                $dayrecord->room = (string) $daybooking->room;
                $dayrecord->instructor = (string) $daybooking->instructor;

                array_push($daybookingArr, $dayrecord);
            }
            $record->daybooking = $daybookingArr;
            $this->days[$record->dayofweek] = $record;
        }
    }
}