<?php
class Authors_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        //get last 10 updated
    }

    public function get_authors($slug = FALSE)
    {
        $query = $this->db->query('
            SELECT id,name,bio FROM authors');
        $result = $query->result_array();

        return $result;
    }

    public function get_author($slug = FALSE)
    {
        $query = $this->db->query('
            SELECT id,name,bio FROM authors WHERE id='.$slug);
        $result = $query->result_array();

        return $result[0];
    }

    public function delete_author($id)
    {
        $query = $this->db->simple_query('DELETE FROM authors WHERE id='.$id);
        return $query;
    }

    public function update_author($author)
    {
        $query = $this->db->simple_query('UPDATE authors SET name='.$this->db->escape($author["name"])  .',bio=' . $this->db->escape($author["bio"]) . ' WHERE id='.$author["id"]);
        return $query;
    }

    public function add_author($author)
    {
        $query = $this->db->simple_query('INSERT INTO authors(name,bio) VALUES ('
            . $this->db->escape($author["name"]) . ', '
            . $this->db->escape($author["bio"])
            . ')');
        return $query;
    }

}