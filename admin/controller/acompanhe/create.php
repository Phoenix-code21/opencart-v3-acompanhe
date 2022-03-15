<?php 
class ControllerAcompanheCreate extends Controller{
    
    public function index(){

        $error = array();
        $success = array();

        $this->load->language('acompanhe/create');
        $this->load->model('acompanhe/home');

        $data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

        if(isset($this->request->post['submit']))
        {

        if(!isset($this->request->post['title']) || empty($this->request->post['title']))
        {
            array_push($error,$this->language->get('title_err'));
        }

        if(!isset($this->request->post['subtitle']) || empty($this->request->post['subtitle']))
        {
            array_push($error,$this->language->get('subtitle_err'));
        }

        if(!isset($this->request->post['description']) || empty($this->request->post['description']))
        {
            array_push($error,$this->language->get('description_err'));
        }

        if(!isset($this->request->post['position']) || empty($this->request->post['position']))
        {
            array_push($error,$this->language->get('position_err'));
        }

        if(!isset($_FILES['file']) || empty($_FILES['file']['tmp_name']))
        {
            array_push($error,$this->language->get('file_err'));
        }

        if($this->model_acompanhe_home->checkNews($this->request->post['title'])){
            array_push($error,$this->language->get('url_exists'));
        }

        if(count($error) < 1)
        {
            $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $newImageName = md5(time().rand(2500,100000));
            $extensionAccept = array('jpg','png','webp');
            if(!in_array($extension,$extensionAccept))
            {
                array_push($error,$this->language->get('extension_err'));
                $data['error'] = $error;
            }else
            {
                move_uploaded_file($_FILES['file']['tmp_name'],'../image/acompanhe/'.$newImageName.'.'.$extension);
                $args = array
                (
                    'title' => $this->request->post['title'],
                    'subtitle' => $this->request->post['subtitle'],
                    'url' => $this->cleanUrl($this->request->post['title']),
                    'description' => $this->request->post['description'],
                    'position' => $this->request->post['position'],
                    'image' => 'image/acompanhe/'.$newImageName.'.'.$extension,
                    'lang_id' => $this->config->get('config_language_id'),
                );

                $save = $this->model_acompanhe_home->create($args);

                if($save)
                {
                    array_push($success,$this->language->get('text_success'));
                    $data['success'] = $success;
                }
            }
        }

        else
        {
            $data['error'] = $error;
        }

        }

        $this->response->setOutput($this->load->view('acompanhe/create', $data));
    }

    private function cleanUrl($string) 
    {
        $table = array(

            '/'=>'', '('=>'', ')'=>'',

        );

        $string = strtr($string, $table);

        $string = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
        
        $string= preg_replace('/[,.;:`´^~\'"]/', null, iconv('UTF-8','ASCII//TRANSLIT',$string));

        $string= strtolower($string);

        $string= str_replace("ç", "c", $string);

        $string= str_replace("?", " ", $string);

        $string= str_replace(" ", "-", $string);

        $string= str_replace("---", "-", $string);

        return $string;
    }

}
