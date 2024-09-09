<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SequenceModel extends CI_Model
{
	public function save_sequence($sequence, $green_interval, $yellow_interval)
	{
		$data = array(
			'sequence' => $sequence,
			'green_interval' => $green_interval,
			'yellow_interval' => $yellow_interval,

		);
		return $this->db->insert('sequence', $data);
	}

	public function stop_sequence()
	{
		$now = new DateTime();
		$formattedDate = $now->format('Y-m-d H:i:s');

		$newid = $this->db->select_max('id');

		$query = $this->db->get('sequence');
		$result = $query->row();

		if ($result) {
			$last_id = $result->id;//get last id

			$dataupadte = array('Stopped_AT' => $formattedDate);

			$this->db->where('id', $last_id);
			$success = $this->db->update('sequence', $dataupadte);
			if ($success) {
				return true;
			} else {
				return false;
			}

		}
	}


}
