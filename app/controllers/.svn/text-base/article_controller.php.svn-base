<?php
class ArticleController extends ApplicationController{

	public function view()
	{
		if(!empty($_GET['id'])){
			$article = new Article;
			$this->property['content'] = $article->find_one_articles(array(
				':criteria' => array('id' => $_GET['id'])
				));
		}else{
			page_not_found();
		}
	}
}
?>