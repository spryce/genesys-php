<?php
include('constants.php');
class Database{
	private $connection;
	
	function __construct(){
		$this->open_connection();
	}
	
	public function open_connection(){
		if(isset($this->connection)){
			echo "User tried to connect to an already established database<br>\n";
		}else{
			$this->connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
			if (!$this->connection){
				echo "Database connection failed: ".mysql_error()."<br>\n";
				$this->close_connection();
			} else{
				$db_select = mysql_select_db(DB_NAME, $this->connection);
				if(!$db_select){
					echo "Database selection failed: ".mysql_error()."<br>\n";
				}
			}
		}
	}
	public function close_connection(){
		if(isset($this->connection)){
			mysql_close($this->connection);
			unset($this->connection);
		} else{
			echo "User attempted to close a database connection that was not established<br>\n";
		}
	}
	public function query($sql){
		$result = mysql_query($sql, $this->connection);
		return $result;
	}
	private function confirm_query($result){
		if (!$result){
			$output = "Database query failed: " . mysql_error() . "<br>\n";
			//$output .= "Last SQL query: " . $this->last_query . "<br>\n"; MAKE THIS
			echo $output;
		}
	}
	public function escape_value( $value ) {
		if( $this->real_escape_string_exists ) { // PHP v4.3.0 or higher
			// undo any magic quote effects so mysql_real_escape_string can do the work
			if( $this->magic_quotes_active ) { $value = stripslashes( $value ); }
			$value = mysql_real_escape_string( $value );
		} else { // before PHP v4.3.0
			// if magic quotes aren't already on then add slashes manually
			if( !$this->magic_quotes_active ) { $value = addslashes( $value ); }
			// if magic quotes are active, then the slashes already exist
		}
		return $value;
	}
}
?>