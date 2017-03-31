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

    public function create_image($path) {
        $this->load->helper('url');

        $slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'path' => $path
        );

        return $this->db->insert('images', $data);
    }

    public function update_image($slug = FALSE) {
        $this->load->helper('url');

        $data = array(
            'id' => $this->input->post('id'),
            'title' => $this->input->post('title'),
            'slug' => $this->input->post('slug'),
            'path' => $this->input->post('path')
        );

        return $this->db->replace('images', $data);
    }

    public function delete_image($slug) {
        $this->load->helper('file');

        // get the image properties
        $image = $this->get_images($slug);

        // delete the image from the filesystem
        $deleted_from_files = unlink($image['path']);

        // delete the image metadata
        $deleted_from_db = $this->db->delete('images', array('slug' => $slug));

        return ($deleted_from_files && $deleted_from_db);
    }
}