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

    public function get_images_by_ids($ids) {
        if (empty($ids)) {
            return [];
        }
        $this->db->select('*');
        $this->db->from('images');
        $this->db->where_in('id', $ids);
        return $this->db->get()->result_array();
    }

    public function get_images_not_in_ids($ids) {
        if (empty($ids)) {
            return $this->get_images();
        }
        $this->db->select('*');
        $this->db->from('images');
        $this->db->where_not_in('id', $ids);
        return $this->db->get()->result_array();
    }

    public function create_image($full_path, $uri_path) {
        $this->load->helper('url');

        $slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'full_path' => $full_path,
            'uri_path' => $uri_path
        );

        return $this->db->insert('images', $data);
    }

    public function update_image($slug = FALSE) {
        $this->load->helper('url');

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $this->input->post('slug'),
            'full_path' => $this->input->post('full_path'),
            'uri_path' => $this->input->post('uri_path')
        );

        $this->db->where('id', $this->input->post('id'));

        return $this->db->update('images', $data);
    }

    public function delete_image($slug) {
        $this->load->helper('file');

        // get the image properties
        $image = $this->get_images($slug);

        // delete the image from the filesystem
        $deleted_from_files = unlink($image['full_path']);

        // delete the image metadata
        $deleted_from_db = $this->db->delete('images', array('slug' => $slug));

        return ($deleted_from_files && $deleted_from_db);
    }
}