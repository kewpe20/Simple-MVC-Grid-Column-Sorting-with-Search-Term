<?php namespace controllers;

use \core\view as View;

class Clients extends \core\controller{

	private $_clients;

	public function __construct(){
		parent::__construct();

                $this->_clients = new \models\clients();
	}	

	public function index(){

		$data['title'] = 'Clients';
                
                /* 
                 * PAGINATION
                 * Instantiate Paginator
                 * PAGE_LIMIT set in config                                   
                */
                $pages = new \helpers\paginator(PAGE_LIMIT,'p');                
     
                /*  
                 * PAGINATOR PLUS - Sort Column, Sort Order, & Search Term
                 * Encapsulates, sets, and sanitizes _GET vars - Prevents (XSS)
                */ 
                
                // populate the array used in paginator plus 
                $plusData = $_GET;
                $plusData['dfltSortCol'] = 3; //Numeric table column in DB.  Setting here becuase can be different for each table
                $plusData['dfltSortOrd'] = 1; //Set Default order. 1= Ascending, 2= Descending 

                //  Instantiate PaginatorPlus
                $pagesPlus = new \helpers\paginatorplus($plusData); 

                // Sort Column
                $data['sortCol'] = $pagesPlus->get_sort_column();
                // Page Number
                $data['pageNum'] = $pagesPlus->get_page_number();
                // Sort Order
                $data['sO'] = $pagesPlus->populate_sort_order(); 
                // Search Term
                $data['srchTerm'] = $pagesPlus->get_search_term();  
                
                // Get results in the sort order we want
                // This is the call to the Database to get the results.  
                // Passing the vars that will be added to the DB query
                $data['records'] = $this->_clients->get_all_plus($pages->get_limit(), $data['sortCol'], $data['sO'], addslashes($data['srchTerm']));
                
                // Store total number of records returned for pagination
                $pages->set_total( $data['records'][0]->total );

                // Store the pagination buttons to echo in the view
                // protect against XSS htmlspecialchars are sufficient in this case.
                // Cant tell the characters were converted unless you look at the source code.
                // This passes the sorting and search term vars thru the URL to be used to determine
                //  the display results the next time the page is loaded. 
                // To Do: Can't use & in the search term as it conflicts with this MVC's router class
                $data['htmlsrchTerm'] = $pagesPlus->get_html_search_term(); 
                $data['page_links'] = $pages->page_links('?','&sC='.$data['sortCol'].'&sO='.$data['sO'].'&sT='.$data['htmlsrchTerm']);

                // Rendering Page
		$this->view->rendertemplate('header',$data);
		$this->view->render('clients/clients',$data);
		$this->view->rendertemplate('footer',$data);
                
	}
}