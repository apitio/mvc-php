<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tasks extends CI_Controller
{
    public function display($task_id)
    {
        $data['project_id'] = $this->task_model->get_task_project_id($task_id);
        $data['project_name'] = $this->task_model->get_project_name($data['project_id']);

        $data['task'] = $this->task_model->get_task($task_id);
        $data['main_view'] = "tasks/display";
        $this->load->view('layouts/main', $data);
    }

    public function create($project_id)
    {
       $this->form_validation->set_rules('task_name', 'Task Name', 'trim|required');
       $this->form_validation->set_rules('task_body', 'Task Description', 'trim|required');
       $this->form_validation->set_rules('due_date', 'Task DueDate', 'trim|required');
       
        if ($this->form_validation->run() == false) {
            $data['main_view'] = 'tasks/create_task';
            $this->load->view('layouts/main', $data);

        } else {

            $data = array(
                'project_id' => $project_id,
                'task_name' => $this->input->post('task_name'),
                'task_body' => $this->input->post('task_body'),
                'due_date' => $this->input->post('due_date')
                );

            if ($this->task_model->create_task($data)){
                $this->session->set_flashdata('task_created', 'Your task has been created');
    
                redirect('projects/display/'.$project_id);
            }

        }
        
    }

    public function edit($task_id)
    {
       $this->form_validation->set_rules('task_name', 'Task Name', 'trim|required');
       $this->form_validation->set_rules('task_body', 'Task Description', 'trim|required');
       $this->form_validation->set_rules('due_date', 'Task DueDate', 'trim|required');

       $project_id = $this->task_model->get_task_project_id($task_id);
       
        if ($this->form_validation->run() == false) {
            $data['the_task'] = $this->task_model->get_task_project_data($task_id);
            $data['main_view'] = 'tasks/edit_task';
            $this->load->view('layouts/main', $data);

        } else {
            
            $data = array(
                'task_name' => $this->input->post('task_name'),
                'task_body' => $this->input->post('task_body'),
                'due_date' => $this->input->post('due_date')
                );
                    
            if ($this->task_model->edit_task($task_id, $data)){
                $this->session->set_flashdata('task_edited', 'Your task has been edited!');
                
                redirect('projects/display/'.$project_id);
            }
        }
    } 

    public function delete($project_id, $task_id){
        $this->task_model->delete_task($task_id);
        $this->session->set_flashdata('task_deleted', 'Your Project has been deleted');

        redirect("projects/display/".$project_id);
    }

    public function mark_complete($task_id){
        $project_id = $this->task_model->get_task_project_id($task_id);


        if ($this->task_model->mark_task_complete($task_id)){

            $this->session->set_flashdata('task_created', 'Your task has been marked complete');

            redirect('projects/display/'.$project_id);
        }
    }

    public function mark_incomplete($task_id){
        $project_id = $this->task_model->get_task_project_id($task_id);


        if ($this->task_model->mark_task_incomplete($task_id)){

            $this->session->set_flashdata('task_created', 'Your task has been marked as incomplete!');

            redirect('projects/display/'.$project_id);
        }
    }
}
