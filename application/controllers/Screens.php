<?php
class Screens extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('screens_model');
        $this->load->model('images_model');
        $this->load->model('images_screens_model');
        $this->load->helper('url_helper');
    }

    public function index() {
        $data['screens'] = $this->screens_model->get_screens();
        $data['title'] = 'Screens';

        foreach ($data['screens'] as &$screen) {
            $image_ids = $this->images_screens_model->get_images_ids_by_screen_id($screen['id']);
            $screen['selected_images'] = $this->images_model->get_images_by_ids($image_ids);
        }

        $this->load->view('templates/header', $data);
        $this->load->view('screens/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($slug = NULL) {
        $data['screen'] = $this->screens_model->get_screens($slug);

        $image_ids = $this->images_screens_model->get_images_ids_by_screen_id($data['screen']['id']);
        $data['selected_images'] = $this->images_model->get_images_by_ids($image_ids);

        $this->load->view('templates/refresh_header');
        $this->load->view('screens/view', $data);
        $this->load->view('templates/footer');
    }

    public function edit($slug = NULL) {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Screen Edit';

        $data['screen'] = $this->screens_model->get_screens($slug);

        $image_ids = $this->images_screens_model->get_images_ids_by_screen_id($data['screen']['id']);
        $data['selected_images'] = $this->images_model->get_images_by_ids($image_ids);
        $data['available_images'] = $this->images_model->get_images_not_in_ids($image_ids);

        if (empty($data['screen'])) {
            show_404();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('screens/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('image_cycle_speed', 'Image Cycle Speed', 'integer');
        $this->form_validation->set_rules('image_cycle_timeout', 'Image Cycle Timeout', 'integer');
        $this->form_validation->set_rules('orientation', 'Orientation', 'in_list[vertical,horizontal]');

        $error = array('error' => '');
        if ($this->form_validation->run() === FALSE) {
            $error['title'] = 'Screen Edit';
            $error['action'] = 'update';
            $this->load->view('templates/header', $error);
            $this->load->view('pages/failed', $error);
        }
        else {
            $this->screens_model->update_screen();
            $this->index();
        }
    }

    public function create() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $data['title'] = 'Create Screen';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('orientation', 'Orientation', 'in_list[vertical,horizontal]');
        $this->form_validation->set_rules('image_cycle_speed', 'Image Cycle Speed', 'integer');
        $this->form_validation->set_rules('image_cycle_timeout', 'Image Cycle Timeout', 'integer');

        $error = array('error' => '');
        if ($this->form_validation->run() === FALSE ) {
            $this->load->view('templates/header', $data);
            $this->load->view('screens/create', $error);
            $this->load->view('templates/footer');
        }
        else {
            $this->screens_model->create_screen();
            $this->index();
        }
    }
    
    public function delete($slug) {
        if ($this->screens_model->delete_screen($slug)) {
            $this->index();
        } else {
            $data['action'] = 'deleted';
            $this->load->view('templates/header', $data);
            $this->load->view('pages/failed', $data);
        }
    }
}