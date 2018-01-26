<?php
class Archive extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('archive_model');
        $this->load->helper('form');
    }

    public function index($slug = NULL)
    {
        $this->load->view('header');
        $this->load->view('archive');
        $this->load->view('footer');
    }

    public function do_archive()
    {

        $start_date = strtotime($this->input->post('start_date'));
        $end_date = strtotime($this->input->post('end_date'));
        $data['count'] = $this->archive_model->archive_torrents($start_date, $end_date);

        $this->load->view('header');
        $this->load->view('archive_done', $data);
        $this->load->view('footer');
    }
}