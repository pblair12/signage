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

    public function edit($slug = NULL) {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['images_item'] = $this->images_model->get_images($slug);

        if (empty($data['images_item'])) {
            show_404();
        }

        $data['title'] = $data['images_item']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('images/edit', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create an image';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('path', 'Path', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('images/create');
            $this->load->view('templates/footer');

        }
        else {
            $this->images_model->create_image();
            $this->load->view('images/success');
        }
    }

    public function update() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create an image';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('path', 'Path', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('images/update');
            $this->load->view('templates/footer');

        }
        else {
            $this->images_model->update_image();
            $this->load->view('images/success');
        }
    }
}