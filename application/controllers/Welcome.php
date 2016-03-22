<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
		$this->load->library('parser');
		$this->load->helper('form');
		$this->load->model('booking');
		$this->load->model('timetable');

		$days = $this->timetable->getAllDays();
		$periods = $this->timetable->getAllPeriods();
		$courses = $this->timetable->getAllCourses();

		$daysdropdown = form_dropdown('days', $this->timetable->daysDropdown(), 'Monday');
		$timeslotsdropdown = form_dropdown('timeslot', $this->timetable->timeslotsDropdown(), '830');
		$submitBtn = form_submit('submit', 'Search!');

		$daysdropdownB = form_dropdown('daysB', $this->timetable->daysDropdown(), 'Monday');
		$timeslotsdropdownB = form_dropdown('timeslotB', $this->timetable->timeslotsDropdown(), '830');
		$submitBtnB = form_submit('submit', 'Bingo!');

		$data = array(
					'days' => $days,
					'periods' => $periods,
					'courses' => $courses,
					'daysdropdown' => $daysdropdown,
					'timeslotsdropdown' => $timeslotsdropdown,
					'submitBtn' => $submitBtn,
					'daysdropdownB' => $daysdropdownB,
					'timeslotsdropdownB' => $timeslotsdropdownB,
					'submitBtnB' => $submitBtnB
				);

		$this->parser->parse('homepage', $data);
	}

	public function search()
	{
		$this->load->library('parser');
		$this->load->model('booking');
		$this->load->model('timetable');

		$courses = $this->timetable->getAllCourses();

		$day = $this->input->post('days');
		$timeslot = $this->input->post('timeslot');


		//var_dump($timeslot);
		//echo "hgfhjfj";
		$temp = null;

		foreach($courses as $course){
			foreach($course->coursebooking as $booking){
				//var_dump(strcmp($booking->weekday, $day));

				//var_dump(strcmp($booking->time, $timeslot));
				//echo "<br>";
				//var_dump($timeslot);
				if(strcmp($booking->weekday, $day) == 0 && strcmp($booking->time, $timeslot) == 0){
					$temp = $booking;
					$temp2 = $course;
					//var_dump($temp);die();

				}
			}


		}

		$courses = $temp;
		if($temp == NULL) {
			$data = array(
				'code' => "N/A",
				'time' => "N/A",
				'weekday' => "N/A",
				'room' => "N/A",
				'instructor' => "N/A",
			);
		}else{
			$data = array(
				'code' => $temp2->code,
				'time' => $courses->time,
				'weekday' => $courses->weekday,
				'room' => $courses->room,
				'instructor' => $courses->instructor
			);
		}
		//var_dump($temp);
		$this->parser->parse('searchpage', $data);
	}

	public function bingo(){
		$this->load->library('parser');
		$this->load->model('booking');
		$this->load->model('timetable');

		$days = $this->timetable->getAllDays();
		$periods = $this->timetable->getAllPeriods();
		$courses = $this->timetable->getAllCourses();

		$day = $this->input->post('daysB');
		$timeslot = $this->input->post('timeslotB');

		$courseTrue = false;
		$dayTrue = false;
		$periodTrue = false;


		foreach($courses as $course){
			foreach($course->coursebooking as $booking){
				//var_dump(strcmp($booking->weekday, $day));
				//echo "<br>";
				//var_dump(strcmp($booking->time, $timeslot));

				if(strcmp($booking->weekday, $day) == 0 && strcmp($booking->time, $timeslot) == 0){
					$courseTrue = true;

					//var_dump($courseTrue);

				}
			}


		}

		foreach($periods as $period){
			foreach($period->periodbooking as $booking){
				//var_dump(strcmp($booking->time, $timeslot));
				if(strcmp($booking->weekday, $day) == 0 && strcmp($period->time, $timeslot) == 0){
					$periodTrue = true;

					//var_dump($periodTrue);

				}
			}


		}

		foreach($days as $oneDay){
			foreach($oneDay->daybooking as $booking){
				//var_dump(strcmp($oneDay->dayofweek, $day));
				if(strcmp($oneDay->dayofweek, $day) == 0 && strcmp($booking->time, $timeslot) == 0){
					$dayTrue = true;

					//var_dump($dayTrue);

				}
			}


		}


		if($dayTrue && $periodTrue && $courseTrue) {
			$data = array(
				'bingo' => "BINGO"
			);
		}else{
			$data = array(
				'bingo' => "NO BINGO"

			);
		}
		//var_dump($temp);
		$this->parser->parse('bingopage', $data);


	}
}
