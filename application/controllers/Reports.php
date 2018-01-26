<?php
class Reports extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('reports_model');
    }

    public function view($slug = NULL)
    {
        $data['reports'] = $this->reports_model->get_reports();
        $this->load->view('header');
        $this->load->view('reports', $data);
        $this->load->view('footer');
    }

    public function index()
    {
        $data['average_book_age'] = $this->reports_model->get_average_book_age();
        $data['book_count'] = $this->reports_model->get_book_count();
        $data['category_books_report'] = $this->reports_model->get_category_books_report();
        $data['counts_report'] = $this->reports_model->get_counts_report();
        $data['most_commented_book'] = $this->reports_model->get_most_commented_book();

        $this->load->view('header');
        $this->load->view('reports', $data);
        $this->load->view('footer');
    }
}