<?php namespace helpers;
/*
 * PHP PaginationPlus Class
 *
 * @author William Egan - william.egan@monarchbizdev.com - http://www.monarchbizdev.com
 * @version 1.0
 * @date January 17, 2015
 */
class paginatorPlus{
    
        /**
         *
         * @var type array
         */
        private $_plusDataArray = array();
        
        /**
	 * set the page number by number.
	 *
	 * @var numeric
	*/
        private $_pageNum; 
    
        /**
	 * set the default sort column by number.
	 *
	 * @var numeric
	*/
        private $_dfltSortCol;    
    
        /**
	 * set the default sort order by number.
	 *
	 * @var numeric
	*/
        private $_dfltSortOrd;   
        
        /**
	 * set the default sort column by number.
	 *
	 * @var numeric
	*/
        private $_sortCol;

	/**
	 * set the default sort order by number 
         * 1 = ASC
         * 2 = DESC
	 *
	 * @var numeric
	*/
	private $_sortOrd;   
        
	/**
	 * set get parameter for the search term
	 *
	 * @var string
	*/
	private $_srchTerm;
        
        
        /**
	 *  __construct
	 *  
	 *  pass values when class is istantiated 
         * 
         *  Setting all the values in the construct instead of
         *  individual `setter` functions because all the values
         *  are either defaults or URL parameters.
	 *          
	 * @param numeric  $_dfltSortCol sets the default sort column
         * @param numeric  $_dfltSortCol sets the default sort order
         * @param numeric  $_pageNum sets the page number of the paginator 
	 * @param numeric  $_sortCol sets the sort column
	 * @param numeric  $_sortOrd sets the sort order
         * @param string  $_srchTerm sets the search term
	 */
	public function __construct($plusData){              
                $this->_plusDataArray = $plusData; 
                
                $this->_dfltSortCol = $this->_plusDataArray['dfltSortCol'];  // No need to sanitize as it's set within the script
                $this->_dfltSortOrd = $this->_plusDataArray['dfltSortOrd'];  // No need to sanitize as it's set within the script 
                $this->_pageNum = (isset($this->_plusDataArray['p']) ? $this->sanitize_page_number() : $this->clear_pagination());                
                $this->_sortCol = (isset($this->_plusDataArray['sC']) ? $this->sanitize_sort_column() : $this->_dfltSortCol);
                $this->_sortOrd = (isset($this->_plusDataArray['sO']) ? $this->sanitize_sort_order() : $this->_dfltSortOrd);
                $this->_srchTerm = (isset($this->_plusDataArray['sT']) ? $this->_plusDataArray['sT'] : '');
	}
        
	/**
	 * clear_pagination
	 *
	 * clear pagination session variables when accessing current webpage from a different webpage (ex. From the Navigation Menu)
	*/
	public function clear_pagination (){      
            unset($_SESSION['pagination']);
            // Set Pagination defaults
            $_SESSION['pagination']['sortCol'] = 0;  // We want the initial comparisan not to match
            $_SESSION['pagination']['pageNum'] = 0;
            $_SESSION['pagination']['srchTerm'] = ''; 
            
            return 0;            
	}   
        
        /**
         *  get_sort_col
         *  'Getter' for the sort column
        */
        public function get_sort_column() {
            return $this->_sortCol;
        }          
        
        /*
         * populate_sort_order
         *                  
         *   There are a number of rules that affect the sort order
         *  1. If prev column equals current column, flip the sort order unless;
         *     a. If a prev page number is not equal to the current page number do not change sort order
         *     b. If a a new search term is entered change sort order to default
         *  2. If a new column is selected change sort order to default
         * 
        */
        public function populate_sort_order() {

            if ($_SESSION['pagination']['sortCol'] == $this->_sortCol) {
                $flipFlag = 1;
                 // When the columns do match there are still 2 conditions that can alter the sort order
//                   echo "Sess pagenum= ".$_SESSION['pagination']['pageNum'].' data pagenum= '.$data['pageNum'];
                  if ($_SESSION['pagination']['pageNum'] != $this->_pageNum) {
                    // pages dont match
                    // set the pagination session sortcol
                    // keep the sort order the same 
                    $_SESSION['pagination']['pageNum'] = $this->_pageNum;
                    $this->_sortOrd = $this->get_sort_order(); 
                    $flipFlag = 0;   
                 }
                 if ($_SESSION['pagination']['srchTerm'] != $this->_srchTerm) {
                    // search terms dont match
                    // set the pagination session srchTerm
                    // default the sort order 
                    $_SESSION['pagination']['srchTerm'] = $this->_srchTerm;
                    $this->_sortOrd = $this->get_sort_order_default(); 
                    $flipFlag = 0;                       
                 }
            } else {
                // columns dont match
                // set the pagination session sortcol
                // default the sort order
                $_SESSION['pagination']['sortCol'] = $this->_sortCol;
                $this->_sortOrd = $this->get_sort_order_default();
                $flipFlag = 0;
            }
            // If any of the sorting rules did not trigger then 
            // we flip the order from ASC to DESC or vice-versa
            if ($flipFlag == 1) {
                $this->_sortOrd = $this->flip_sort_order();
            }
            
            return $this->_sortOrd;
        }
        /////
        
        /**
         *  get_page_number
         *  'Getter' for the page number
        */
        public function get_page_number() {
            return $this->_pageNum;
        }  

        /**
         *  get_search_term
         *  'Getter' for the search term
        */
        public function get_search_term() {
            return ($this->_srchTerm); 
        }  

        /**
         *  get_html_search_term
         *  'Getter' for the search term passed thru the htmlspecialchar function
        */
        public function get_html_search_term() {
            return htmlspecialchars($this->_srchTerm, ENT_QUOTES, 'UTF-8');
        }  
        
        
        // PRIVATE FUNCTIONS                
        /**
         * sanitize_sort_column
         * 
         * ensures value is numeric
         * if not it returns default sort column
         */
        private function sanitize_sort_column() {
            // Cant use is_numeric because we want to check for an unsigned whole number
            if (ctype_digit($this->_plusDataArray['sC'])) {
                return $this->_plusDataArray['sC'];
            } else {
                return $this->_dfltSortCol;
            }           
        }

        // Sort Order Private Functions
        /**
         *  get_sort_order
         *  'Getter' for the sort order
        */
        private function get_sort_order() {
            return $this->_sortOrd;
        }
        
        /**
         *  flip_sort_order
         *  'Getter' for the sort order but flips the order
        */
        private function flip_sort_order() {
            if ($this->_sortOrd == 1) {
                $this->_sortOrd = 2;
            } else {
                $this->_sortOrd = 1;
            }
            return $this->_sortOrd;
        }
        
        /**
         *  get_sort_order_default
         *  'Getter' for the sort order default
        */
        private function get_sort_order_default() {
            return $this->_dfltSortOrd;
        }      
        
        /**
         *  sanitize_sort_order
         *  sanitizes and sets the numeric sort order
        */
        private function sanitize_sort_order () {
             if (ctype_digit($this->_plusDataArray['sO'])) {
                return $this->_plusDataArray['sO'];
            } else {
                return $this->_dfltSortOrd;
            } 
        }

        /**
         * sanitize_page_number
         * ensures value is numeric
         * if not it returns 0
         */
        private function sanitize_page_number() {
            // Cant use is_numeric because we want to check for an unsigned whole number
            if (ctype_digit($this->_plusDataArray['p'])) {
                return $this->_plusDataArray['p'];
            } else {
                return 0;
            }           
        }
        
}


