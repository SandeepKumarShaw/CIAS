<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Template Library
*/
class Templates{

	private $CI;
	private $title_for_template  = NULL;
	private $title_for_separator = ' | ';
	
	public function __construct(){
		$this->CI = & get_instance();
	}
	public function set_title($title){
        $this->title_for_template = $title;
	}
	public function view($view_name, $params = array(), $layout = 'app'){
		if ($this->title_for_template != NULL) {
			$this->title_for_template = $this->title_for_separator.$this->title_for_template;
		}
        $content_for_template = $this->CI->load->view($view_name, $params, TRUE);
        $this->CI->load->view('admin/template/'.$layout, array(
          'title_for_template'   => $this->title_for_template,
          'content_for_template' => $content_for_template
        ));
	}
}