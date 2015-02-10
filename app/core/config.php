<?php namespace core;

/*
 * config - an example for setting up system settings
 * When you are done editing, rename this file to 'config.php'
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @author Edwin Hoksberg - info@edwinhoksberg.nl
 * @version 2.1
 * @date June 27, 2014
 */
class Config {

	public function __construct() {

		//turn on output buffering
		ob_start();

		//site address
		define('DIR', 'http://mbdsample.dev/');

		//set default controller and method for legacy calls
		define('DEFAULT_CONTROLLER', 'home');
		define('DEFAULT_METHOD' , 'index');

		//set a default language
		define('LANGUAGE_CODE', 'en');

		//database details ONLY NEEDED IF USING A DATABASE
		define('DB_TYPE', 'mysql');
		define('DB_HOST', 'localhost');
		define('DB_NAME', 'mbdsample');
		define('DB_USER', 'root');
		define('DB_PASS', 'pass');
		define('PREFIX', '');

		//set prefix for sessions
		define('SESSION_PREFIX', 'smvc_');

		//optional create a constant for the name of the site
		define('SITETITLE', 'MBD SAMPLE APPLICATION');
                
                //Paginator Row Limit per page
		define('PAGE_LIMIT', 5);

		//turn on custom error handling
		set_exception_handler('core\logger::exception_handler');
		set_error_handler('core\logger::error_handler');

		//set timezone
		date_default_timezone_set('America/Chicago');

		//start sessions
		\helpers\session::init();

		//set the default template
		\helpers\session::set('template', 'default');
	}

}
