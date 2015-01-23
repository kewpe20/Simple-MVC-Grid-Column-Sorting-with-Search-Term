<?php namespace models;

class Clients extends \core\model {
    
    private $tableName;

	public function __construct(){
		parent::__construct();
                $this->tableName = "clients";
	}	

	public function get_all(){
		return $this->_db->select("SELECT * FROM ".$this->tableName." ORDER BY companyName ASC");
	}       
        
        public function get_all_plus($limit, $sortCol, $sO, $srchTerm=''){            
            // Sort Order
            if ($sO == 2) {
                $sortOrder = "DESC";
            } else {
                $sortOrder = "ASC";
            }
            
            // Add WHERE / LIKE clause if search term is populated
            $search = "";
            if ($srchTerm != '') {
                $search = " WHERE companyName LIKE '%".$srchTerm."%'";
            }
            
            $query = "
		SELECT *,
                    (SELECT count(id) FROM ".$this->tableName." ";
            $query .= $search;
            $query .= "  ) as total 
                FROM ".$this->tableName;
                $query .= $search;
            $query .= " ORDER BY ".$sortCol." ".$sortOrder." ".$limit;
            
            return $this->_db->select($query);

        }
        
}