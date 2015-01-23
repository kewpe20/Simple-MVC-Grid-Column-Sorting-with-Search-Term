<?php namespace models;

class Contacts extends \core\model {
    
    private $tableName;
    
	public function __construct(){
		parent::__construct();
                $this->tableName = "contacts";
	}	

	public function get_contacts(){
		return $this->_db->select("SELECT * FROM ".$this->tableName." ORDER BY id ASC");
	}

	public function get_contact($id){
		return $this->_db->select("SELECT * FROM ".$this->tableName." WHERE id =:id",array(':id' => $id));
	}

	public function insert($data){
		$this->_db->insert($this->tableName,$data);
	}

	public function update($data,$where){
		$this->_db->update($this->tableName,$data,$where);
	}

	public function delete($id){
		$this->_db->delete($this->tableName, array('id' => $id));
	}
}