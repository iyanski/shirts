<?php
class GalleryController extends ApplicationController{

	public function view()
	{
		$design = new Design;
		$this->property['designs'] = $design->find_all_designs(array(
			":order" => array("created_at",  "DESC")
		));
	}
}
?>