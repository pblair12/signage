<?php
class Images_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_images($slug = FALSE) {
        if ($slug === FALSE) {
            $query = $this->db->get('images');
            return $query->result_array();
        }
        $query = $this->db->get_where('images', array('slug' => $slug));
        return $query->row_array();
    }
}