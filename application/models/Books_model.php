<?php
class Books_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url_helper');
        $this->load->model('trackers_model');
        $this->load->model('magnet_model');
        $this->load->model('torrents_model');
    }

    public function get_books($slug = FALSE)
    {

        $query = $this->db->query('
            SELECT b.id,b.title,b.isbn,b.edition,b.volume, p.name as publisher_name,a.name as author_name,c.name as category_name,t.seeders,t.leechers,t.date_added,age_function(b.id) as book_age,t.magnet_id as magnet_id FROM books b inner join authors a on b.author=a.id inner join categories c on b.category=c.id inner join publishers p on b.publisher=p.id inner join torrents t on t.id=b.torrent_id ORDER BY t.date_updated ASC ');
        $result = $query->result_array();
        $books = [];
        foreach ($result as $book)
        {
            $book["magnet_uri"] = $this->magnet_model->get_magnet_uri($book["magnet_id"]);
            $books[] = $book;
        }
        return $books;
    }

    public function search_books($slug = FALSE)
    {


        $query = $this->db->query("
            SELECT b.id,b.title,b.isbn,b.edition,b.volume, p.name as publisher_name,a.name as author_name,c.name as category_name,t.seeders,t.leechers,t.date_added,age_function(b.id) as book_age,t.magnet_id as magnet_id FROM books b inner join authors a on b.author=a.id inner join categories c on b.category=c.id inner join publishers p on b.publisher=p.id inner join torrents t on t.id=b.torrent_id WHERE b.title LIKE '%".$slug ."%' ORDER BY t.date_updated ASC");
        $result = $query->result_array();
        $books = [];
        foreach ($result as $book)
        {
            $book["magnet_uri"] = $this->magnet_model->get_magnet_uri($book["magnet_id"]);
            $books[] = $book;
        }
        return $books;
    }

    public function insert_book($book)
    {

        $magnetUri = array(str_replace('&tr=', '&tr[]=', $book["magneturi"]));
        $this->load->library('MagnetUri', $magnetUri);
        $exact_topic = $this->magneturi->xt;
        $display_name = $this->magneturi->dn;
        $trackers = $this->magneturi->tr;

        $magnet_uri = [ "xt" => $exact_topic, "dn" => $display_name, "tr" => $trackers ];
        //insert trackers
        $magnet_id = $this->magnet_model->insert_magnet_uri($magnet_uri);

        //insert magnet
        $torrent_id = $this->torrents_model->insert_torrent($magnet_id);

        //insert torrent
        $query = $this->db->simple_query("
            INSERT INTO books (`author`, `title`, `isbn`, `edition`, `volume`, `publisher`, `category`, `submitted_by`, `torrent_id`) 
            VALUES ("
            . $this->db->escape($book["author"]) . ", "
            . $this->db->escape($book["title"]) . ", "
            . $this->db->escape($book["isbn"]) . ", "
            . $this->db->escape($book["edition"]) . ", "
            . $this->db->escape($book["volume"]) . ", "
            . $this->db->escape($book["publisher"]) . ", "
            . $this->db->escape($book["category"]) . ", "
            . $this->db->escape($book["submitted_by"]) . ", "
            . $this->db->escape($torrent_id) . ");
        ");

        //var_dump($this->db->last_query());
        //var_dump($this->db->error());

        return $query;
    }
}