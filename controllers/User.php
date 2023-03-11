<?php
require_once('./models/Database.php');
require_once('./models/UserModel.php');

// A controller class. Handles the linkage between the specific
// URL passed by the user and DB fetch/put methods in the model class.

class User {

private $model;
protected $connection;

public function __construct() {
	$this->model = new UserModel();
}

// This file combines specific URL 'routes' with model methods
// we dont have actual routing, but each URL with parameters
// acts as a unique 'pointer' to a resource
// e.g., localhost:8888/pdo_employees/ is unique compared to
// localhost:8888/pdo_employees/index.php?task=delete&id=1

public function loadViews() {
	//get content through the model
	//load views that match the content
	require_once('views/head.php');
	require_once('views/nav.php');

	require_once('./views/user_create_button.php');
	// require_once('./views/json.php');

	// what content should be passed back based on URL parameters?

	//route: localhost:8888/employees/index.php?id=1

	if(isset($_GET['id']) && !isset($_GET['task'])) {
		$users = $this->model->getOne($_GET['id']);

		require_once('./views/user_detail.php');
		require_once('./views/user_update_button.php');
	//route: localhost:8888/employees/index.php?str=john
	}

	else if(isset($_GET['task'])) {
		if($_GET['task'] == 'create') {
			require_once('./views/user_form.php');
			if(isset($_POST['submit'])){
				// $userModel = new UserModel();
				$formvalues = [
					$_POST['user_fname'],
					$_POST['user_lname'],
					$_POST['user_username'],
					$_POST['user_password'],
					password_hash($_POST['user_password'], PASSWORD_DEFAULT),
					$_POST['user_photo'],
					// $_POST['user_role']
					// isset($_POST['role_id']) ? $_POST['role_id'] : 'unregistered'
				];
				// $userModel->newUser($formvalues);
				$users = $this->model->newUser($formvalues);
			}

			//header("location:index.php");
		}

		else if($_GET['task'] == 'delete') {
			$users = $this->model->deleteUser($_GET['id']);
			header("location:index.php");
		}
		
		else if($_GET['task'] == 'update') {
			//POST values from a form, could also be hidden field for id value
			// $formvalues = ['Van Halen','Valerie','CFO','person3.jpg','person3th.jpg',$_GET['id']];

			require_once('./views/user_update_form.php');

			if(isset($_POST['submit'])){
				// $userModel = new UserModel();
				$formvalues = [
					$_POST['user_fname'],
					$_POST['user_lname'],
					$_POST['user_username'],
					$_POST['user_password'],
					// password_hash($_POST['user_password'], PASSWORD_DEFAULT),
					$_POST['user_photo'],
					$_GET['id']
				];

				$users = $this->model->updateUser($formvalues);
			// header("location:index.php");
		}}

// default route:localhost:8888/employees

	}else{ 
		$users = $this->model->getAll();
		$rows = $this->model->rows;
		require_once('./views/user_list.php');
	}

	require_once('./views/footer.php');
	}
	
}
?>