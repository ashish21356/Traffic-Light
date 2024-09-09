<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SignalController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('SequenceModel');
	}

	public function Start_sequence()
	{
		//echo "hiiiiiiii";

		$sequence = $this->input->post('sequence');
		$green_interval = $this->input->post('green_interval');
		$yellow_interval = $this->input->post('yellow_interval');

		//validiate sequence
		if (!$this->validate_sequence($sequence)) {
			$response = array(
				'status' => 'error',
				'message' => "invalid Sequence. Please provide A, B, C , D"
			);
			echo json_encode($response);
			return;
		}

		//validiate interval
		if (!is_numeric($green_interval) || $green_interval <= 0 || !is_numeric($yellow_interval) || $yellow_interval <= 0) {
			$response = array(
				'status' => 'error',
				'message' => "invalid interval value. please provide positve number"
			);
			echo json_encode($response);
			return;
		}

		//Saved data to the Database
		$saved = $this->SequenceModel->save_sequence($sequence, $green_interval, $yellow_interval);
		if ($saved) {
			$response = array(
				'status' => 'success',
				'message' => 'Traffic light stared sucessfully.',
				'sequence' => htmlspecialchars($sequence),
				'green_interval' => (int) $green_interval,
				'yellow_interval' => (int) $yellow_interval

			);
		} else {
			$response = array(
				'status' => 'error',
				'message' => 'Failed to save sequence data.'
			);
		}

		echo json_encode($response);
	}

	private function validate_sequence($sequence)
	{
		$sequenceArray = explode(',', strtoupper($sequence));
		foreach ($sequenceArray as $light) {
			if (!in_array(trim($light), ['A', 'B', 'C', 'D'])) {
				return false;
			}
		}
		return true;
	}

	//STOP SEQUENCE
	public function Stop_sequence()
	{


		$stop = $this->SequenceModel->stop_sequence();
		if ($stop) {
			$response = array(
				'status' => 'success',
				'message' => 'Traffic light sequence is sucessfully stopped.'
			);
		} else {
			$response = array(
				'status' => 'error',
				'message' => 'Invalid date time format.'
			);
		}
		echo json_encode($response);

	}


}
