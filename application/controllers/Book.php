<?php
class Book extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('book_model');
        $this->load->model('comment_model');
        $this->load->model('magnet_model');
        $this->load->model('publishers_model');
        $this->load->model('authors_model');
        $this->load->model('categories_model');
        $this->load->model('magnet_model');
        $this->load->helper('form');
    }

    public function index()
    {
    }

    public function view($slug = NULL)
    {
        $book = $this->book_model->get_book($slug);
        $data['book'] = $book;
        $data['magnet_uri'] = $this->magnet_model->get_magnet_uri($data["book"]["magnet_id"]);
        $data['comments'] = $this->comment_model->get_comments($slug);
        $this->load->view('header');
        $this->load->view('book', $data);
        $this->load->view('comments', $data);
        $this->load->view('footer');
    }

    public function delete($slug = NULL)
    {
        $result = $this->book_model->delete_book($slug);
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
        $book = $this->book_model->get_book($slug);
        $data['book'] = $book;
        $data['magneturi'] = $this->magnet_model->get_magnet_uri($book["magnet_id"]);
        $data['publishers'] = $this->publishers_model->get_publishers();
        $data['authors'] = $this->authors_model->get_authors();
        $data['categories'] = $this->categories_model->get_categories();
        $this->load->view('header');
        $this->load->view('edit_book', $data);
        $this->load->view('footer');
    }

    public function edit_do($slug = NULL)
    {
        $book_id = $this->input->post('id');
        $title_input = $this->input->post('title');
        $isbn_input = $this->input->post('isbn');
        $edition_input = $this->input->post('edition');
        $volume_input = $this->input->post('volume');
        $publisher_input = $this->input->post('publisher');
        $category_input = $this->input->post('category');
        $author_input = $this->input->post('author');
        $magneturi_input = $this->input->post('magneturi');

        $book = [
            "id" => $book_id,
            "title" => $title_input,
            "isbn" => $isbn_input,
            "edition" => $edition_input,
            "volume" => $volume_input,
            "publisher" => $publisher_input,
            "category" => $category_input,
            "author" => $author_input,
            "magneturi" => $magneturi_input,
            "submitted_by" => 1 //TODO: current user
        ];

        $this->book_model->edit_book($book);

        $this->load->view('header');

        $this->load->view('footer');
    }
}