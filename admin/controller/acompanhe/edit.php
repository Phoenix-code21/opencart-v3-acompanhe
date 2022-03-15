<?php 
class ControllerAcompanheEdit extends Controller
{
    public function index(){
        $error = array();
        $success = array();

        $this->load->language('acompanhe/edit');
        $this->load->model('acompanhe/home');

        $data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
        $data['acompanhe'] = $this->model_acompanhe_home->getAllNews();
        $data['tokem'] = $this->session->data['user_token'];

        $this->response->setOutput($this->load->view('acompanhe/edit', $data));
    }
}