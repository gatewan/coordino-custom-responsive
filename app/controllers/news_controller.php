<?php
class NewsController extends AppController {

	var $listNews;

	public function sitemap(){
    $this->layout='ajax'; 
    $this->RequestHandler->respondAs('xml');
    $listNews = $this->News->find('all',array('conditions'=>array('publish'=>1),'order'=> array('News.modified'=>'Desc')));
    $this->set(compact('listNews'));
}
	
}
?>