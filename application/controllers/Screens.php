<?php
class Screens extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('screens_model');
        $this->load->model('images_model');
        $this->load->helper('url_helper');
    }

    public function index() {
        $data['screens'] = $this->screens_model->get_screens();
        $data['title'] = 'Manage Screens';

        $this->load->view('templates/header', $data);
        $this->load->view('screens/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($slug = NULL) {
        $data['screen'] = $this->screens_model->get_screens($slug);
        $data['images'] = $this->images_model->get_images();

        $this->load->view('templates/refresh_header');
        $this->load->view('screens/view', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $data['title'] = 'Create Screen';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('orientation', 'Orientation', 'required');
        $this->form_validation->set_rules('image_cycle_speed', 'Image Cycle Speed', 'required');

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
            $data['action'] = 'deleted';
            $this->load->view('templates/header', $data);
            $this->load->view('pages/success', $data);
        } else {
            $data['action'] = 'deleted';
            $this->load->view('templates/header', $data);
            $this->load->view('pages/failed', $data);
        }
    }
}