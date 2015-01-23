<?php namespace controllers;
use core\view;

/*
 * Welcome controller
 *
 * @author William Egan - william.egan@monarchbizdev.com - http://www.monarchbizdev.com
 * @version Simple MVC Framework 2.1
 * @date Jan 1, 2015
 */
class Home extends \core\controller{

	/**
	 * Call the parent construct
	 */
	public function __construct(){
		parent::__construct();

	}

	/**
	 * Define Index page title and load template files
	 */
	public function index() {
		$data['title'] = "MBD SAMPLE APPLICATION";
		
		View::rendertemplate('header', $data);
		View::render('home/home', $data);
		View::rendertemplate('footer', $data);
	}


}
