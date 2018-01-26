<?php
class Reports_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_average_book_age()
    {
        $query = $this->db->query('
            SELECT * FROM average_book_age');
        $result = $query->result_array();
        return $result;
    }

    public function get_book_count()
    {
        $query = $this->db->query('
            SELECT * FROM book_count');
        $result = $query->result_array();
        return $result;
    }

    public function get_category_books_report()
    {
        $query = $this->db->query('
            SELECT * FROM category_books_report');
        $result = $query->result_array();
        return $result;
    }

    public function get_comment_book_count()
    {
        $query = $this->db->query('
            SELECT * FROM comment_book_count');
        $result = $query->result_array();
        return $result;
    }

    public function get_counts_report()
    {
        $query = $this->db->query('
            SELECT * FROM counts_report');
        $result = $query->result_array();
        return $result;
    }

    public function get_most_commented_book()
    {
        $query = $this->db->query('
            SELECT * FROM most_commented_book');
        $result = $query->result_array();
        return $result;
    }
}