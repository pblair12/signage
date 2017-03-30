<?php
class Images extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('images_model');
        $this->load->helper('url_helper');
    }

    public function index() {
        $data['images'] = $this->images_model->get_images();
        $data['title'] = 'Images';

        $this->load->view('templates/header', $data);
        $this->load->view('images/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($slug = NULL) {
        $data['images_item'] = $this->images_model->get_images($slug);

        if (empty($data['images_item'])) {
            show_404();
        }

        $data['title'] = $data['images_item']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('images/view', $data);
        $this->load->view('templates/footer');
    }
}