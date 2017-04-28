<?php
class Images extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('images_screens_model');
        $this->load->helper('url_helper');
    }

    public function delete($image_id, $screen_id) {
        if (!$this->images_screens_model->delete_image($image_id, $screen_id)) {
            //show_404();
        }
    }
}