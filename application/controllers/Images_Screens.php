<?php
class Images_Screens extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('images_screens_model');
        $this->load->model('screens_model');
        $this->load->helper('url_helper');
    }

    public function create($image_id, $screen_id) {
        if ($this->images_screens_model->create_image_screen($image_id, $screen_id)) {
            redirect('screens/edit/' . $this->screens_model->get_screen_slug($screen_id));
        }
    }

    public function delete($image_id, $screen_id) {
        if ($this->images_screens_model->delete_image_screen($image_id, $screen_id)) {
            redirect('screens/edit/' . $this->screens_model->get_screen_slug($screen_id));
        }
    }
}