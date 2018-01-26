<?php
class Torrents_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        //get last 10 updated
    }

    public function get_torrent($id)
    {
        //get torrent, get magnet uri
        $query = $this->db->query('
            SELECT 
            tor.id as torrent_id,mag.id as magnet_id,seeders,leechers,
            date_added,date_updated,archived,submitted_by,u.username,
            exact_topic,display_name 
            FROM torrents tor 
            inner join magnet_uri mag on tor.magnet_id=mag.id 
            inner join users u on u.id=tor.submitted_by where archived=0 and tor.id=' .
            $this->db->escape($id));
        $result = $query->result_array();

        return $result;
    }

    public function insert_torrent($magnet_id)
    {
        $query = $this->db->simple_query('INSERT INTO torrents (magnet_id) VALUES ('.$this->db->escape($magnet_id).')');
        $torrent_id = $this->db->insert_id();
        return $torrent_id;
    }
}