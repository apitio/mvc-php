<?php 


class Project_model extends CI_Model {


	public function get_project($id) {


		 $this->db->where('id', $id);

		$query = $this->db->get('projects');


	

		return $query->row();


	}




	public function get_projects() {

		$query = $this->db->get('projects');

		return $query->result();




	}


	public function get_all_projects($user_id) {


		$this->db->where('project_user_id', $user_id);

		$query = $this->db->get('projects');

		return $query->result();

	}






	public function create_project($data) {

		$insert_query = $this->db->insert('projects', $data);

		return $insert_query;


	}


	public function edit_project($project_id, $data) {

		$this->db->where('id', $project_id);
		$this->db->update('projects', $data);

		return true;

	}


	public function delete_project($project_id) {

		$this->db->where('id', $project_id);
		$this->db->delete('projects');




	}



	public function get_projects_info($project_id) {

		$this->db->where('id', $project_id);

		$get_data  = $this->db->get('projects');

		return $get_data->row();


	}


	public function get_project_tasks($project_id, $active = true) {


		$this->db->select('

				tasks.task_name,
				tasks.task_body,
				tasks.id as task_id,
				projects.project_name,
				projects.project_body

			');


		$this->db->from('tasks');
		$this->db->join('projects', 'projects.id = tasks.project_id');
		$this->db->where('tasks.project_id', $project_id);

		if($active == true) {

			$this->db->where('tasks.status', 0);

		} else {

			$this->db->where('tasks.status', 1);

		}

		$query = $this->db->get();

		if($query->num_rows() < 1) {

			return FALSE;

		} 


		return $query->result();











	}



	public function delete_project_tasks($project_id) {

		$this->db->where('project_id', $project_id);

		$query = $this->db->delete('tasks');

		return $query;


	}











}






 ?>