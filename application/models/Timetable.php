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

        $this->load->model('Booking');

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
                $dayrecord = new Booking();
                $dayrecord->setTime((string) $daybooking->time);
                $dayrecord->setCourseName((string) $daybooking->courseName);
                $dayrecord->setRoom((string) $daybooking->room);
                $dayrecord->setInstructor((string) $daybooking->instructor);

                array_push($daybookingArr, $dayrecord);
            }

            $record->daybooking = $daybookingArr;
            $this->days[$record->dayofweek] = $record;
        }

        // populate periods facet
        foreach($this->periods_xml->timeslot as $timeslot) {
            $record = new stdClass();
            $record->time = (string) $timeslot['time'];

            $periodbookingArr = array();

            foreach($timeslot->periodbooking as $periodbooking)
            {
                $periodrecord = new Booking();
                $periodrecord->setWeekday((string) $periodbooking->weekday);
                $periodrecord->setCourseName((string) $periodbooking->courseName);
                $periodrecord->setRoom((string) $periodbooking->room);
                $periodrecord->setInstructor((string) $periodbooking->instructor);

                array_push($periodbookingArr, $periodrecord);
            }

            $record->periodbooking = $periodbookingArr;
            $this->periods[$record->time] = $record;
        }

        // populate courses facet
        foreach($this->courses_xml->course as $course) {
            $record = new stdClass();
            $record->code = (string) $course['code'];

            $coursesbookingArr = array();

            foreach($course->coursebooking as $coursebooking)
            {
                $courserecord = new Booking();
                $courserecord->setWeekday((string) $coursebooking->weekday);
                $courserecord->setCourseName((string) $coursebooking->courseName);
                $courserecord->setRoom((string) $coursebooking->room);
                $courserecord->setInstructor((string) $coursebooking->instructor);

                array_push($coursesbookingArr, $courserecord);
            }

            $record->coursebooking = $coursesbookingArr;
            $this->courses[$record->code] = $record;
        }
    }

    public function getDay($dayofweek)
    {
        if(isset($this->days[$dayofweek])) {
            return $this->days[$dayofweek];
        }
        else {
            return null;
        }
    }

    public function getPeriod($time)
    {
        if(isset($this->periods[$time])) {
            return $this->periods[$time];
        }
        else {
            return null;
        }
    }

    public function getCourse($code)
    {
        if(isset($this->courses[$code]))
            return $this->courses[$code];
        else
            return null;
    }
}