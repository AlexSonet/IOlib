<?php 
/*------------------------------*/
/*-----IO Connect Lib-----*/
/*-----Version: 0.1-----*/
/*-----Author: Alexsey Shumnyi-----*/
/*------------------------------*/


/*----------Connect-db----------*/
	$io_db_host = '';
	$io_db_user = '';
	$io_db_pass = '';
	$io_db_dbname = '';

	class SaveBaseConnect{
		public function __construct($host, $user, $password, $db_name){
			global $io_db_host, $io_db_user, $io_db_pass, $io_db_dbname;
			$io_db_host = $host;
			$io_db_user = $user;
			$io_db_pass = $password;
			$io_db_dbname = $db_name;
		}
	}

	function io_connect($host, $user, $password, $db_name){ //Connect to data base
		$SaveBaseConnect = new SaveBaseConnect($host, $user, $password, $db_name);
		$db_session = new mysqli($host, $user, $password, $db_name) or die("Connect failed: %s\n". $db_session -> error);
		return $db_session; //Return info connect
	}

	function io_disconnect($db_session){ //Disconnect
		$db_session -> close();
	}

	

	class Table{
		private $table;
		private $send_table = array();

		public function __construct($table){ //Save name new table
			$this->table = $table;
		}

		function add($col, $data){ //Add in array '$send_table' new data
			$this->send_table[$col] = $data; //Add in array
		}

		function check_table($name_table){ //Functions for check have table or no
			global $io_db_host, $io_db_user, $io_db_pass, $io_db_dbname;
			$io_check = io_connect($io_db_host, $io_db_user, $io_db_pass, $io_db_dbname); //Connect to base
			$q = 'SELECT * FROM '.$name_table.' LIMIT 1';
			$mysql_table_check = mysqli_query($io_check, $q); //Send request
			if($mysql_table_check) { //If have
				io_disconnect($io_check); //Close connect
				return true;
			} 
			else { //If no
				io_disconnect($io_check); //Close connect
				return false;
			}
			
		}

		function save(){
			$table_status = $this->check_table($this->table);
			global $io_db_host, $io_db_user, $io_db_pass, $io_db_dbname;
			if($table_status == true){ //If table have then add data
				echo 'Table was create';
				$this->send_table = array();

				




			}else{ //if no table then create table and add data
				echo 'Table not was create!!';
				
				
			}

		}

	}


/*------------------------------*/

/*IO Social Network Functions*/

function hashPassword($password){
	return password_hash($password, PASSWORD_DEFAULT);
}

function verifyPassword($password, $hash){
	if(password_verify($password, $hash)){
		return True;
	}else{
		return False;
	}
}


 ?>