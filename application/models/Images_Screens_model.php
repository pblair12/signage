<?php
class Images_Screens_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_images_ids_by_screen_id($screen_id) {
        $this->db->select('image_id');
        $this->db->from('images_screens');
        if (!is_null($screen_id)) $this->db->where('screen_id', $screen_id);
        $image_ids = array();
        foreach ($this->db->get()->result_array() as $row) {
            array_push($image_ids, $row['image_id']);
        }
        return $image_ids;
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