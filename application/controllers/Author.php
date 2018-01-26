<?php
class Author extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('authors_model');
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
            $data['authors'] = $this->authors_model->get_authors();
            $this->load->view('authors', $data);
        }
        else
        {
            $data['author'] = $this->authors_model->get_author($slug);
            $this->load->view('author', $data);
        }
        $this->load->view('footer');
    }

    public function delete($slug = NULL)
    {
        $result = $this->authors_model->delete_author($slug);
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
        $data["author"] = $this->authors_model->get_author($slug);
        $this->load->view('header');
        $this->load->view('edit_author', $data);
        $this->load->view('footer');
    }

    public function edit_do($slug = NULL)
    {
        $author = [
            "id" => $this->input->post('id'),
            "name" => $this->input->post('name'),
            "bio" => $this->input->post('bio')
        ];
        $result = $this->authors_model->update_author($author);
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
        $this->load->view('add_author');
        $this->load->view('footer');
    }

    public function add_do($slug = NULL)
    {
        $author = [
            "name" => $this->input->post('name'),
            "bio" => $this->input->post('bio')
        ];
        $result = $this->authors_model->add_author($author);
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