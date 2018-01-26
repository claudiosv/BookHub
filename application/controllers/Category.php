<?php
class Category extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('categories_model');
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
            $data['categories'] = $this->categories_model->get_categories();
            $this->load->view('categories', $data);
        }
        else
        {
            $data['category'] = $this->categories_model->get_category($slug);
            $this->load->view('category', $data);
        }
        $this->load->view('footer');
    }

    public function delete($slug = NULL)
    {
        $result = $this->categories_model->delete_category($slug);
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
        $data["category"] = $this->categories_model->get_category($slug);
        $this->load->view('header');
        $this->load->view('edit_category', $data);
        $this->load->view('footer');
    }

    public function edit_do($slug = NULL)
    {
        $category = [
            "id" => $this->input->post('id'),
            "name" => $this->input->post('name'),
            "bio" => $this->input->post('bio')
        ];
        $result = $this->categories_model->update_category($category);
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
        $this->load->view('add_category');
        $this->load->view('footer');
    }

    public function add_do($slug = NULL)
    {
        $category = [
            "name" => $this->input->post('name'),
            "description" => $this->input->post('description')
        ];
        $result = $this->categories_model->add_category($category);
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