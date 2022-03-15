<?php 

class ModelAcompanheHome extends Controller
{
    public function getAllNews(){
        
        $query = $this->db->query("SELECT * FROM ".DB_PREFIX."acompanhe where lang_id = ".(int)$this->config->get('config_language_id'));

        return $query->rows;

    }

    public function selectedNewsById($id){
    
        $query = $this->db->query("SELECT * FROM ".DB_PREFIX."acompanhe WHERE id = ".(int)$id);

        if(count($query->rows) > 0){
            return $query->rows;
        }else{
            return false;
        }

    }

    public function checkNews($title, $id = null)
    {
        if($id == null){
            $query = $this->db->query("SELECT * FROM ".DB_PREFIX."acompanhe WHERE title = '".$this->db->escape($title)."'");
        }else{
            $query = $this->db->query("SELECT * FROM ".DB_PREFIX."acompanhe WHERE title = '".$this->db->escape($title)."' AND id <>".(int)$id);
        }
        
        if(count($query->rows) > 0){
            return true;
        }else{
            return false;
        }
    }

    public function create($args)
    {
        $query = $this->db->query("INSERT INTO ".DB_PREFIX."acompanhe (title,subtitle,text,url,image,lang_id,ordem) VALUES('".$this->db->escape($args['title'])."', '".$this->db->escape($args['subtitle'])."', '".$this->db->escape($args['description'])."', '".$this->db->escape($args['url'])."', '".$this->db->escape($args['image'])."', '".$this->db->escape($args['lang_id'])."', '".(int)$args['position']."')");

        $row = $this->getLastNews();

        $this->db->query("INSERT INTO ".DB_PREFIX."seo_url (store_id,language_id,query,keyword) VALUES(0,'".$this->db->escape($args['lang_id'])."','acompanhe_id=".$row[0]['id']."', '".$this->db->escape($args['url'])."') ");

        return $query;

    }

    public function update($args){
        if(!isset($args['image'])){
            $query = $this->db->query("UPDATE ".DB_PREFIX."acompanhe SET title = '".$this->db->escape($args['title'])."', subtitle = '".$this->db->escape($args['subtitle'])."', text = '".$this->db->escape($args['description'])."', url = '".$this->db->escape($args['url'])."', ordem = '".$this->db->escape($args['lang_id'])."' WHERE id =".(int)$args['id']);
        }else{
            $query = $this->db->query("UPDATE ".DB_PREFIX."acompanhe SET title = '".$this->db->escape($args['title'])."', subtitle = '".$this->db->escape($args['subtitle'])."', text = '".$this->db->escape($args['description'])."', url = '".$this->db->escape($args['url'])."', image = '".$this->db->escape($args['image'])."', ordem = '".$this->db->escape($args['lang_id'])."' WHERE id =".(int)$args['id']);
        }

        $this->updateSeoUrl((int)$args['id'],$this->db->escape($args['url']));
        return $query;
    }

    public function getLastNews(){
        $query = $this->db->query("SELECT id FROM ".DB_PREFIX."acompanhe ORDER BY id DESC LIMIT 1");
        return $query->rows;
    }

    public function checkSeoUrl($id){
        $query = $this->db->query("SELECT query FROM ".DB_PREFIX."seo_url WHERE query ='acompanhe_id=".(int)$id."' LIMIT 1");

        if(count($query->rows) > 0){
            return true;
        }else{
            return false;
        }
    }

    public function updateSeoUrl($id, $rewrite){
        $row = $this->checkSeoUrl($id);
        if($row){
            $this->db->query("UPDATE ".DB_PREFIX."seo_url SET keyword = '".$this->db->escape($rewrite)."' WHERE query = 'acompanhe_id=".(int)$id."' LIMIT 1");
        }
    }

    public function deleteNews($id)
    {
        $query = $this->db->query("DELETE FROM ".DB_PREFIX."acompanhe WHERE id = ".(int)$id."");
        $this->deleteSeoUrl($id);
    }

    public function deleteSeoUrl($id){
        $query = $this->db->query("DELETE FROM ".DB_PREFIX."seo_url WHERE query = 'acompanhe_id=".(int)$id."'");
    }

}