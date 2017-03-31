<?php
class Screens extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('images_model');
        $this->load->helper('url_helper');
    }

    public function index() {
        $data['title'] = 'All Screens';

        $this->load->view('templates/header', $data);
        $this->load->view('screens/index');
        $this->load->view('templates/footer');
    }

    public function view($slug = NULL) {
        $this->load->view('templates/refresh_header');
        $this->load->view('screens/view');
        $this->load->view('templates/footer');
    }
}