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

    public function set_images() {
        $this->load->helper('url');

        $slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'path' => $this->input->post('path')
        );

        return $this->db->insert('images', $data);
    }
}