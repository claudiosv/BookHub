<?php
class Publisher extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('publishers_model');
        $this->load->helper('form');
    }

    public function index()
    {
    }

    public function view($slug = NULL)
    {
        $this->load->view('header');
        if($slug === NULL)
        {
            $data['publishers'] = $this->publishers_model->get_publishers();
            $this->load->view('publishers', $data);
        }
        else
        {
            $data['publisher'] = $this->publishers_model->get_publisher($slug);
            $this->load->view('publisher', $data);
        }
        $this->load->view('footer');
    }

    public function delete($slug = NULL)
    {
        $result = $this->publishers_model->delete_publisher($slug);
        $this->load->view('header');
        if($result === true)
        {
            echo "success!";
        }
        else
        {
            echo "fail";
        }
        $this->load->view('footer');
    }

    public function edit($slug = NULL)
    {
        $data["publisher"] = $this->publishers_model->get_publisher($slug);
        $this->load->view('header');
        $this->load->view('edit_publisher', $data);
        $this->load->view('footer');
    }

    public function edit_do($slug = NULL)
    {
        $publisher = [
            "id" => $this->input->post('id'),
            "name" => $this->input->post('name'),
            "description" => $this->input->post('description')
        ];
        $result = $this->publishers_model->update_publisher($publisher);
        $this->load->view('header');
        if($result === true)
        {
            echo "success!";
        }
        else
        {
            echo "fail";
        }
        $this->load->view('footer');
    }

    public function add($slug = NULL)
    {
        $this->load->view('header');
        $this->load->view('add_publisher');
        $this->load->view('footer');
    }

    public function add_do($slug = NULL)
    {
        $publisher = [
            "name" => $this->input->post('name'),
            "description" => $this->input->post('description')
        ];
        $result = $this->publishers_model->add_publisher($publisher);
        $this->load->view('header');
        if($result === true)
        {
            echo "success!";
        }
        else
        {
            echo "fail";
        }
        $this->load->view('footer');
    }
}