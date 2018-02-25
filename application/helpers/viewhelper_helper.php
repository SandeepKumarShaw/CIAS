<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if ( ! function_exists('loadViews')){
	function loadViews($viewName = "", $headerInfo = NULL, $pageInfo=NULL){
		$ci =& get_instance();
		$ci->load->view('admin/includes/header', $headerInfo);
        $ci->load->view('admin/includes/sidebar');
        $ci->load->view($viewName, $pageInfo);
        $ci->load->view('admin/includes/footer');
	}
}