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
		$timeslotsdropdown = form_dropdown('timeslots', $this->timetable->timeslotsDropdown(), '830');
		$submitBtn = form_submit('submit', 'Search!');

		$data = array(
					'days' => $days,
					'periods' => $periods,
					'courses' => $courses,
					'daysdropdown' => $daysdropdown,
					'timeslotsdropdown' => $timeslotsdropdown,
					'submitBtn' => $submitBtn
				);

		$this->parser->parse('homepage', $data);
	}
}
