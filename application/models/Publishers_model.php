<?php
class Publishers_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        //get last 10 updated
    }

    public function get_publishers($slug = FALSE)
    {
        $query = $this->db->query('
            SELECT id,description,name FROM publishers');
        $result = $query->result_array();

        return $result;
    }

    public function get_publisher($slug = FALSE)
    {
        $query = $this->db->query('
            SELECT id,name,description FROM publishers WHERE id='.$slug);
        $result = $query->result_array();

        return $result[0];
    }

    public function delete_publisher($id)
    {
        $query = $this->db->simple_query('DELETE FROM publishers WHERE id='.$id);
        return $query;
    }

    public function update_publisher($publisher)
    {
        $query = $this->db->simple_query('UPDATE publishers SET name='.$this->db->escape($publisher["name"])  .',description=' . $this->db->escape($publisher["description"]) . ' WHERE id='.$publisher["id"]);
        return $query;
    }

    public function add_publisher($publisher)
    {
        $query = $this->db->simple_query('INSERT INTO publishers(name,description) VALUES ('
            . $this->db->escape($publisher["name"]) . ', '
            . $this->db->escape($publisher["description"])
            . ')');
        return $query;
    }
}