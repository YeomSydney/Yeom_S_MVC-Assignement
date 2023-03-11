<?php

require_once('Database.php');

class UserModel extends Database {
	public function __construct() {
		parent::__construct();
		$this->table = 'tbl_users';
		$this->updated_table= 'view_users_roles';

		$this->fields = "user_fname, user_lname, user_username, user_password, user_photo";
	}

	public function newUser($formvalues) {
		$statement = "(" . $this->fields . ") VALUES (?,?,?,?,?)";
		$this->create($statement,$formvalues);

		echo "You're successfully registered!";
	}

	public function updateUser($formvalues) {
		$statement = " SET user_fname=?, user_lname=?, user_username=?, user_password=?, user_photo=? WHERE id=?";
		echo "Bello! Your profile is successfully updated!";
		
		$this->update($statement,$formvalues);
	}

	public function deleteUser($id) {
		//code to be sure the deletion should happen
		$this->delete($id);
	}
}

?>