<?php
class Trackers_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        //get last 10 updated
    }

    public function insert_tracker($uri)
    {
       // echo "uri: " . $uri . "\n";
        $query = $this->db->simple_query('
            INSERT INTO trackers (uri) VALUES (' . $this->db->escape($uri) . ')');

        $tracker_id = $this->db->query(
            "SELECT id FROM trackers WHERE uri LIKE '%" .
    $this->db->escape_like_str($uri)."%' ESCAPE '!'"
        );
        return $tracker_id->result_array()[0]["id"];
    }

    public function get_trackers($magnet_id)
    {
        $trackers = $this->db->query(
            '
        SELECT uri FROM trackers tracker inner join magnet_trackers mag on mag.tracker_id=tracker.id where mag.magnet_id=' . $this->db->escape($magnet_id)
        );
        $raw_trackers = $trackers->result_array();
        $trackers = [];

        foreach ($raw_trackers as $tracker)
        {
            $trackers[] = $tracker["uri"];
        }
        return $trackers;
    }
}