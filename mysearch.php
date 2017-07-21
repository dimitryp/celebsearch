<?php
header("Access-Control-Allow-Origin: *");
  define('DB_SERVER', '35.189.8.56');
  define('DB_NAME', 'dp2');

  // v2
  // UPDATE THESE VALUES:
  define('DB_USER', 'root');
  define('DB_PASSWORD', 'abcd1234');

  if (isset($_GET['term'])){
  	$return_arr = array();
  	try {
  	    $conn = new PDO("mysql:host=".DB_SERVER.";port=3306;dbname=".DB_NAME, DB_USER, DB_PASSWORD);
  	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  	    $stmt = $conn->prepare('SELECT * FROM celebs3 WHERE name LIKE :term');
  	    $stmt->execute(array('term' => '%'.$_GET['term'].'%'));

  	    while($row = $stmt->fetch()) {
  	        $return_arr[] =  $row['name'];
  	    }
  	} catch(PDOException $e) {
  	    echo 'ERROR: ' . $e->getMessage();
  	}

    /* Toss back results as json encoded array. */
    echo json_encode($return_arr);
  }
?>
