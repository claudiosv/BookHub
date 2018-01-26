<?php
class Comment_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        //get last 10 updated
    }

    public function get_comments($slug = FALSE)
    {
        $query = $this->db->query('
            SELECT c.id,u.username,c.comment FROM comments c inner join users u on u.id=c.user_id WHERE c.book_id =' . $slug);
        $result = $query->result_array();

        return $result;
    }

    public function delete_comment($id)
    {
        $query = $this->db->simple_query('DELETE FROM comments WHERE id='.$id);
        return $query;
    }

    public function update_comment($comment)
    {
        $query = $this->db->simple_query('UPDATE comments SET comment='.$this->db->escape($comment["comment"])  .' WHERE id='.$comment["id"]);
        return $query;
    }

    public function add_comment($comment)
    {
        $query = $this->db->simple_query('INSERT INTO comments(book_id,user_id,comment) VALUES ('
            . $this->db->escape($comment["book_id"]) . ', '
            . $this->db->escape($comment["user_id"]) . ', '
            . $this->db->escape($comment["comment"]) . ')');
        return $query;
    }
}