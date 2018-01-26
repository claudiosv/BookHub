<?php
class Archive_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function archive_torrents($start_date, $end_date)
    {
        $query = $this->db->query(
           "CALL archive_torrents(FROM_UNIXTIME(" . $start_date. "), FROM_UNIXTIME(".$end_date."), @testthing);");
$query1 = $this->db->query(' SELECT @testthing as archivedcount;');

        return $query1->result()[0]->archivedcount;
    }

}