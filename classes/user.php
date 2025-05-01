<?php
require_once('access.php');
class User{
	protected static $table_name="users";
	public static function authenticate($username="", $password="") {
		global $database;
		$username = $database->escape_value($username);
		$password = $database->escape_value($password);
		$sql  = "SELECT * FROM users ";
		$sql .= "WHERE username = '{$username}' ";
		$sql .= "AND password = '{$password}' ";
		$sql .= "LIMIT 1";
		$result_array = Access::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
	}
	public static function userExists($username) {
		global $database;
		$username = $database->escape_value($username);
		$sql  = "SELECT * FROM users ";
		$sql .= "WHERE username = '{$username}' ";
		$result_array = Access::find_by_sql($sql);
		return !empty($result_array) ? true : false;
	}
	public static function createUser($username, $password, $first_name, $last_name, $emailaddress){
		global $database;
		$sql = "INSERT INTO users (";
		$sql .= "username, ";
		$sql .= "password, ";
		$sql .= "first_name, ";
		$sql .= "last_name, ";
		$sql .= "emailaddress";
		$sql .= ") ";
		$sql .= "VALUES (";
		$sql .= "'{$username}', ";
		$sql .= "'{$password}', ";
		$sql .= "'{$first_name}', ";
		$sql .= "'{$last_name}', ";
		$sql .= "'{$emailaddress}'";
		$sql .= ") ";
		$result = $database->query($sql);
		return $result;
	}
	
	// public static function postData($firstname, $lastname, $company, $email, $phone, $comments){
		// global $database;
		// global $subject;
		// $sql = "INSERT INTO ".select_table($subject)." (";
		// $sql .= "firstname, ";
		// $sql .= "lastname, ";
		// $sql .= "company, ";
		// $sql .= "email, ";
		// $sql .= "phone, ";
		// $sql .= "comments, ";
		// $sql .= ") ";
		// $sql .= "VALUES (";
		// $sql .= "'{$firstname}', ";
		// $sql .= "'{$lastname}', ";
		// $sql .= "'{$company}', ";		
		// $sql .= "'{$email}', ";	
		// $sql .= "'{$phone}', ";			
		// $sql .= "'{$comments}'";		
		// $sql .= ") ";
		// $result = $database->query($sql);
		// echo $sql;
		// return $result;
	// }
	
}
?>