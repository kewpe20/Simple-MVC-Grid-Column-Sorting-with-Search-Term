<?php namespace controllers;
use \core\view as View;

class Contacts extends \core\controller{

	private $_contacts;

	public function __construct(){
		parent::__construct();

                $this->_contacts = new \models\contacts();
	}	

	public function contacts(){

		$data['title'] = 'Contacts';
		$data['contacts'] = $this->_contacts->get_contacts();

		$this->view->rendertemplate('header',$data);
		$this->view->render('contacts/contacts',$data);
		$this->view->rendertemplate('footer',$data);	
	}

	public function add(){

		if(isset($_POST['submit'])){

			$firstName = $_POST['firstName'];
			$lastName = $_POST['lastName'];

			if(empty($firstName)){
				$error[] = 'Please enter the first name';
			}

			if(empty($lastName)){
				$error[] = 'Please enter the last name';
			}

			if(!isset($error)){

				$postdata = array(
					'firstName' => $firstName,
					'lastName' => $lastName
				);
				$this->_contacts->insert($postdata);
				\helpers\url::redirect('contacts');

			}
		}

		$data['title'] = 'Add Conntact';

		$this->view->rendertemplate('header',$data);
		$this->view->render('contacts/add',$data,$error);
		$this->view->rendertemplate('footer',$data);	
	}

	public function edit($id){

		if(isset($_POST['submit'])){

			$firstName = $_POST['firstName'];
			$lastName = $_POST['lastName'];

			if(empty($firstName)){
				$error[] = 'Please enter the first name';
			}

			if(empty($lastName)){
				$error[] = 'Please enter the last name';
			}

			if(!isset($error)){

				$postdata = array(
					'firstName' => $firstName,
					'lastName' => $lastName
				);
				$where = array('id' => $id);
				$this->_contacts->update($postdata, $where);
				\helpers\url::redirect('contacts');

			}
		}

		$data['title'] = 'Edit';
		$data['row'] = $this->_contacts->get_contact($id);

		$this->view->rendertemplate('header',$data);
		$this->view->render('contacts/edit',$data,$error);
		$this->view->rendertemplate('footer',$data);	
	}

	public function delete($id){

		$this->_contacts->delete($id);
		\helpers\url::redirect('contacts');

	}

}