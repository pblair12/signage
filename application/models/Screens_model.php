<?php
class Screens_model extends CI_Model {

    public function __construct() {
        $this->load->database();
        $this->load->model('images_model');
    }

    public function get_screens($slug = FALSE) {
        if ($slug === FALSE) {
            $query = $this->db->get('screens');
            return $query->result_array();
        }
        $query = $this->db->get_where('screens', array('slug' => $slug));
        return $query->row_array();
    }

    public function create_screen() {
        $this->load->helper('url');

        $slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'orientation' => $this->input->post('orientation'),
            'image_cycle_speed' => $this->input->post('image_cycle_speed')
        );

        return $this->db->insert('screens', $data);
    }

    public function update_screen($slug = FALSE) {
        $this->load->helper('url');

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $this->input->post('slug'),
            'orientation' => $this->input->post('orientation'),
            'image_cycle_speed' => $this->input->post('image_cycle_speed')
        );

        $this->db->where('id', $this->input->post('id'));

        return $this->db->update('screens', $data);
    }

    public function delete_screen($slug) {
        return $this->db->delete('screens', array('slug' => $slug));
    }
}