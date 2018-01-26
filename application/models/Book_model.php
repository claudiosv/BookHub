<?php
class Book_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url_helper');
        $this->load->model('trackers_model');
        $this->load->model('magnet_model');
        $this->load->model('torrents_model');
    }

    public function get_book($id)
    {
        $query = $this->db->query('
            SELECT b.id,b.title,b.isbn,b.edition,b.volume, p.name as publisher_name,a.name as author_name,c.name as category_name,t.magnet_id as magnet_id,t.seeders,t.leechers,t.date_added,p.id as publisher_id,c.id as category_id,a.id as author_id,age_function(b.id) as book_age FROM books b inner join authors a on b.author=a.id inner join categories c on b.category=c.id inner join publishers p on b.publisher=p.id inner join torrents t on t.id=b.torrent_id where b.id='.$id .' ORDER BY t.date_updated ASC ');
        $result = $query->result_array();
        $book = [];
        $book = $result[0];
        $book["magnet_uri"] = $this->magnet_model->get_magnet_uri($book["magnet_id"]);
        return $book;
    }

    public function delete_book($id)
    {
        //soft delete torrent
        $query = $this->db->simple_query('DELETE FROM books WHERE id='.$id);
        return $query;
    }

    public function edit_book($book)
    {
        $magnetUri = array(str_replace('&tr=', '&tr[]=', $book["magneturi"]));
        $this->load->library('MagnetUri', $magnetUri);
        $exact_topic = $this->magneturi->xt;
        $display_name = $this->magneturi->dn;
        $trackers = $this->magneturi->tr;

        $magnet_uri = [ "xt" => $exact_topic, "dn" => $display_name, "tr" => $trackers ];
        //insert trackers
        var_dump($magnet_uri);
        $magnet_id = $this->magnet_model->insert_magnet_uri($magnet_uri);

        //insert magnet
        $torrent_id = $this->torrents_model->insert_torrent($magnet_id);

        //insert torrent
        $query = $this->db->simple_query("
            UPDATE books SET author=" . $this->db->escape($book["author"]) .
            ", title=". $this->db->escape($book["title"]) .
            ", isbn=" . $this->db->escape($book["isbn"]) .
            ", edition=". $this->db->escape($book["edition"]) .
            ", volume=". $this->db->escape($book["volume"]) .
            ", publisher=". $this->db->escape($book["publisher"]) .
            ", category=". $this->db->escape($book["category"]) .
            ", torrent_id=". $this->db->escape($torrent_id) .
            " WHERE id=" . $this->db->escape($book["id"])
        );


        return $query;
    }
}