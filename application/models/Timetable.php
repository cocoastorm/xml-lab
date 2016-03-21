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
        $this->periods_xml = simplexml_load_file(DATAPATH . 'periods.xml');
        $this->courses_xml = simplexml_load_file(DATAPATH . 'courses.xml');


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



        foreach($this->periods_xml->timeslot as $timeslot) {
            $precord = new stdClass();
            $precord->time = (string) $timeslot['time'];

            $periodbookingArr = array();

            foreach($timeslot->periodbooking as $periodbooking)
            {
                $timeslotrecord = new stdClass();
                $timeslotrecord->weekday = (string) $periodbooking->weekday;
                $timeslotrecord->courseName = (string) $periodbooking->courseName;
                $timeslotrecord->room = (string) $periodbooking->room;
                $timeslotrecord->instructor = (string) $periodbooking->instructor;

                array_push($periodbookingArr, $timeslotrecord);
            }
            $precord->periodbooking = $periodbookingArr;
            $this->periods[$precord->time] = $precord;
        }


        foreach($this->courses_xml->course as $course) {
            $crecord = new stdClass();
            $crecord->code = (string) $course['code'];

            $coursebookingArr = array();

            foreach($course->coursebooking as $coursebooking)
            {
                $courserecord = new stdClass();
                $courserecord->time = (string) $coursebooking->time;
                $courserecord->weekday = (string) $coursebooking->weekday;
                $courserecord->room = (string) $coursebooking->room;
                $courserecord->instructor = (string) $coursebooking->instructor;

                array_push($coursebookingArr, $courserecord);
            }
            $crecord->coursebooking = $coursebookingArr;
            $this->courses[$crecord->code] = $crecord;
        }
    }
}