<?php
class Magnet_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->model('trackers_model');
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


        $torrent = $result[0];
        $torrent["trackers"] = $this->trackers_model->get_trackers($torrent["magnet_id"]);
        $magnet_params = [ "xt=". $torrent["exact_topic"],
            "dn=". urlencode($torrent["display_name"])];

        foreach ($torrent["trackers"] as $tracker)
        {
            $magnet_params[] = "tr[]=" . urlencode($tracker);
        }
        $uri = 'magnet:?' . implode("&", $magnet_params);
        return $uri;
    }

    public function get_magnet_uri($id)
    {
        //get torrent, get magnet uri
        $query = $this->db->query('
            SELECT 
            exact_topic,display_name 
            FROM magnet_uri mag
            where mag.id=' .
            $this->db->escape($id));
        $result = $query->result_array();


        $torrent = $result[0];
        $torrent["trackers"] = $this->trackers_model->get_trackers($id);
        $magnet_params = [ "xt=". $torrent["exact_topic"],
            "dn=". urlencode($torrent["display_name"])];

        foreach ($torrent["trackers"] as $tracker)
        {
            $magnet_params[] = "tr[]=" . urlencode($tracker);
        }
        $uri = 'magnet:?' . implode("&", $magnet_params);
        return $uri;
    }

    public function insert_magnet_uri($magnet_uri) //TODO: fix this pile of trash
    {
        $query = $this->db->simple_query('INSERT IGNORE INTO magnet_uri (exact_topic,display_name) VALUES ('.$this->db->escape($magnet_uri["xt"]).' , ' .$this->db->escape($magnet_uri["dn"]) .')');
        $magnet_query = $this->db->query(
            "SELECT id FROM magnet_uri WHERE exact_topic LIKE '%" .
            $this->db->escape_like_str($magnet_uri["xt"])."%' ESCAPE '!'"
        );
        $magnet_uri_id = $magnet_query->result_array()[0]["id"];

        foreach ($magnet_uri["tr"] as $tracker)
        {
            $tracker_id = $this->trackers_model->insert_tracker($tracker);
            $this->db->simple_query('INSERT IGNORE INTO magnet_trackers (magnet_id,tracker_id) VALUES ('.$this->db->escape($magnet_uri_id).','.$this->db->escape($tracker_id).')');
        }

        return $magnet_uri_id;
    }
}