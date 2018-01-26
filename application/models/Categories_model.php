<?php
class Categories_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        //get last 10 updated
    }

    public function get_categories($slug = FALSE)
    {
        $query = $this->db->query('
            SELECT id,name,description FROM categories');
        $result = $query->result_array();

        return $result;
    }


    public function get_category($slug = FALSE)
    {
        $query = $this->db->query('
            SELECT id,name,description FROM categories WHERE id='.$slug);
        $result = $query->result_array();

        return $result[0];
    }

    public function delete_category($id)
    {
        $query = $this->db->simple_query('DELETE FROM categories WHERE id='.$id);
        return $query;
    }

    public function update_category($category)
    {
        $query = $this->db->simple_query('UPDATE categories SET name='.$this->db->escape($category["name"])  .',description=' . $this->db->escape($category["bio"]) . ' WHERE id='.$category["id"]);
        return $query;
    }

    public function add_category($category)
    {
        $query = $this->db->simple_query('INSERT INTO categories(name,description) VALUES ('
            . $this->db->escape($category["name"]) . ', '
            . $this->db->escape($category["description"])
            . ')');
        return $query;
    }
}