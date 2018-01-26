<?php
class Books extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('books_model');
        $this->load->model('publishers_model');
        $this->load->model('authors_model');
        $this->load->model('categories_model');
        $this->load->helper('form');
    }

    public function index()
    {
        $data['book_list'] = $this->books_model->get_books();
        $this->load->view('header');
        $this->load->view('books', $data);
        $this->load->view('footer');
    }

    public function search($slug = NULL)
    {
        //$data['news_item'] = $this->news_model->get_news($slug);
        $this->load->view('header');
        $this->load->view('search');
        $this->load->view('footer');
    }

    public function search_do($slug = NULL)
    {
        $search_input = $this->input->post('search');
        $data['book_list'] = $this->books_model->search_books($search_input);
        $this->load->view('header');
        $this->load->view('books', $data);
        $this->load->view('footer');
    }

    public function upload($slug = NULL)
    {
        $data['publishers'] = $this->publishers_model->get_publishers();
        $data['authors'] = $this->authors_model->get_authors();
        $data['categories'] = $this->categories_model->get_categories();
        $this->load->view('header');
        $this->load->view('upload', $data);
        $this->load->view('footer');
    }

    public function upload_do($slug = NULL)
    {
        $title_input = $this->input->post('title');
        $isbn_input = $this->input->post('isbn');
        $edition_input = $this->input->post('edition');
        $volume_input = $this->input->post('volume');
        $publisher_input = $this->input->post('publisher');
        $category_input = $this->input->post('category');
        $author_input = $this->input->post('author');
        $magneturi_input = $this->input->post('magneturi');

        $book = [
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

        $this->books_model->insert_book($book);
        $this->load->view('header');
        echo "Book inserted successfully!";
        $this->load->view('footer');
    }


}