<?php
App::import("Model", "Post"); 
App::import("Model", "Project"); 
class SidebarHelper extends AppHelper {
	
	public function getPosts() {
		return (new Post())->find("all", array('limit'=>5)); 
	}
	
	public function getProjects() {
		return (new Project())->find("all", array('limit'=>5)); 
	}
}
