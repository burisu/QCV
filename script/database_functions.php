<?
/*
 -----------------------------------------------------
	Abstract Layer for PostgreSQL functions
 -----------------------------------------------------
*/

function connect($host,$port,$options,$tty,$database) {
	$connection = pg_Connect($host,$port,$options,$tty,$database);
	if (!$connection) { 
		echo "Connection to database failed."; 
		echo pg_ErrorMessage($connection);
		exit; 
		}
	return $connection;
}

function exec_query($connection,$query) {
	$result = pg_Exec($connection,$query);
	if (!$result) { 
		echo "Connection to database failed."; 
		echo pg_ErrorMessage($connection);
		return 0; 
		}
	return $result;
}

function numrows($result) {
	return pg_NumRows($result);
}

function fetch_array($result,$ligne,$type="") {
	if(!$type) {
	$data = pg_Fetch_Array($result,$ligne);
	}
	else {
	$data = pg_Fetch_Array($result,$ligne,$type);
	}
	if (!$data) {
		echo "Erreur de parcours des donn&eacute;es";
		return 0; 
		}
	return $data;
}

function close($connection) {
	pg_close($connection);
}


?>
