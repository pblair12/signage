<?php
class Images_Screens_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_images_screens_by_screen_id($screen_id) {
        $query = $this->db->get_where('images_screens', array('screen_id' => $screen_id));
        return $query->result_array();
    }

    public function get_images_screens_by_image_id($image_id) {
        $query = $this->db->get_where('images_screens', array('image_id' => $screen_id));
        return $query->result_array();
    }

    public function create_image_screen() {
        $this->load->helper('url');

        $data = array(
            'image_id' => $this->input->post('image_id'),
            'screen_id' => $this->input->post('screen_id'),
            'full_path' => $full_path,
            'uri_path' => $uri_path
        );

        return $this->db->insert('images_screens', $data);
    }

    public function delete_image_screen() {
        $this->load->helper('file');

        // delete the image metadata
        $deleted_from_db = $this->db->delete(
            'images_screens',
            array('image_id' => post('image_id'), 'screen_id' => post('screen_id')));

        return ($deleted_from_db);
    }
}