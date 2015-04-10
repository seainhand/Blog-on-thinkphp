<?php
class IndexAction extends Action{
 
	public function index(){ 
		$this->blog = D('BlogView')->getAll();
		$this->display();
    }
}


?>