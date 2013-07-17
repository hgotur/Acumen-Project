<?php

class Scorekeeper extends CI_Model {
	function getTeams() {
		$this->db->select('id, name');
		$this->db->from('teams');
		$query = $this->db->get();

		$teams = array();
		foreach ($query->result_array() as $row) {
			$teams[] = $row;
		}

		return $teams; 
	}

	function getPlayers($teamId) {
		$this->db->select('players');
		$this->db->from('teams');
		$this->db->where('id', $teamId);

		$query = $this->db->get();

		$players = array();
		foreach ($query->result_array() as $row) {
			//***Parse $row to remove weird formatting
			$players[] = $row;
		}

		return $players;
	}

	function makeGame($team1, $team2, $tournId = NULL, $round = NULL) {
		
	}
}

?>