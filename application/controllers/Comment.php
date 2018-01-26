<?php
class Comment extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('comment_model');
    }

    public function index()
    {
    }

    public function view($slug = NULL)
    {
        $data['book'] = $this->book_model->get_book($slug);
        $data['comments'] = $this->comment_model->get_comments($slug);
        $this->load->view('header');
        $this->load->view('book', $data);
        $this->load->view('comments', $data);
        $this->load->view('footer');
    }

    public function delete($slug = NULL)
    {
        $result = $this->comment_model->delete_comment($slug);
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

    public function post($slug = NULL)
    {
        $comment = [
            "book_id" => $this->input->post('book_id'),
            "user_id" => 1,//$this->input->post('user_id'),
            "comment" => $this->input->post('comment')
        ];
        $result = $this->comment_model->add_comment($comment);
        $this->load->view('header');
        if($result === true)
        {
            echo "success!";
        }
        else
        {
            echo "fail";
            var_dump($this->db->last_query());
            var_dump($this->db->error());
        }
        $this->load->view('footer');
    }
}