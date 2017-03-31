<?php
class Images extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('images_model');
        $this->load->helper('url_helper');
    }

    public function index() {
        $data['images'] = $this->images_model->get_images();
        $data['title'] = 'All Images';

        $this->load->view('templates/header', $data);
        $this->load->view('images/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($slug = NULL) {
        $data['images_item'] = $this->images_model->get_images($slug);
        $data['title'] = 'View image';

        if (empty($data['images_item'])) {
            show_404();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('images/view', $data);
        $this->load->view('templates/footer');
    }

    public function edit($slug = NULL) {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Update image';

        $data['images_item'] = $this->images_model->get_images($slug);

        if (empty($data['images_item'])) {
            show_404();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('images/edit', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $data['title'] = 'Create image';

        $this->form_validation->set_rules('title', 'Title', 'required');

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpg';
        $config['max_size']             = 10000000000;
        $config['max_width']            = 1000;
        $config['max_height']           = 1000;

        $this->load->library('upload', $config);

        $error = array('error' => '');
        if ($this->form_validation->run() === FALSE ) {
            $this->load->view('templates/header', $data);
            $this->load->view('images/create', $error);
            $this->load->view('templates/footer');
        }
        else if (!$this->upload->do_upload('imagefile')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('templates/header', $data);
            $this->load->view('images/create', $error);
            $this->load->view('templates/footer');
        }
        else {
            $upload_data = array('upload_data' => $this->upload->data());
            $this->images_model->create_image($upload_data['upload_data']['full_path']);
            $data['action'] = 'created';

            $this->index();
        }
    }

    public function update() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('path', 'Path', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('images/update');
            $this->load->view('templates/footer');
        }
        else {
            $this->images_model->update_image();
            $data['action'] = 'updated';

            $this->load->view('templates/header', $data);
            $this->load->view('images/success');
        }
    }

    public function delete($slug) {
        if ($this->images_model->delete_image($slug)) {
            $data['action'] = 'deleted';
            $this->load->view('templates/header', $data);
            $this->load->view('images/success', $data);
        } else {
            $data['action'] = 'deleted';
            $this->load->view('templates/header', $data);
            $this->load->view('images/failed', $data);
        }
    }
}