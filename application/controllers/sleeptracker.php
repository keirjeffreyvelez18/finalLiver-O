<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sleeptracker extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
       	parent::__construct();
       	$this->load->model('sleeptrackertab');
       	$this->load->model('waterintaketab');
       	$this->load->helper(array('form', 'url'));
   	}

	public function index()
	{
		$data['title'] = "Sleep Tracker | Liver-O";
		$data['sleepTrackerData'] = $this->sleeptrackertab->getSleepingRecords();
		if (!$data['sleepTrackerData']) {
			$date['dateStartOfRecom'] = date('Y-m-d');
			$this->session->set_userdata($date);			
		}

		foreach ($data['sleepTrackerData'] as $key => $value) {
			$d = explode('-', $data['sleepTrackerData'][$key]['dateofSleep']);
			print_r($d);
		}
		
		//print_r($data['marker']);
		$this->load->view('Recommendations/sleeptracker_view', $data);
	}
	public function saveSleepTracker(){
		$data['dateOfSleep'] = $this->input->post('dateOfSleep');
		$data['dateStartOfRecom'] = $this->session->userdata('dateStartOfRecom');
		$data['userid'] = $this->session->userdata('userid');
		$data['hoursOfSleep'] = 8;
		$a = strtotime($this->input->post('sleeptime'));
		$b = strtotime($this->input->post('wakeuptime'));
		if ($a<strtotime('12:00:00')) {
			$t = (strtotime('24:00:00')-$a)/60;
		}
		// $data['userid'] = $this->session->userdata('userid');
		// $t = $b->diff($a);
		// $t->format("%H:%I:%S");
		$result = $this->sleeptrackertab->insertSleepTracker($data);
		$this->load->view('Recommendations/sleeptracker_view');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */