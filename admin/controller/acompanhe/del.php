<?php 

class ControllerAcompanheDel extends Controller
{
    public function index(){
        $error = array();
        $success = array();

        $this->load->language('acompanhe/del');
        $this->load->model('acompanhe/home');

        $this->model_acompanhe_home->deleteNews($this->request->get['del']);

        $this->response->redirect($this->url->link('acompanhe/edit','&user_token='.$this->session->data['user_token']));
    }
}