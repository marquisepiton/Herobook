<?php

/* 
CRUD: 
Create
      Read/Edit
          Update
                Delete
=============================================== 
                                               +                                     
           CONNECTION PROCESS                  +                                     
                                               +                      
=============================================== 
*/
  // input the credientials to connect to the db server. 
  $dbhost = 'localhost';                                                             
  $dbuser = 'root';
  $dbpassword = 'root';
  $dbname = 'sqlheroes';

// Create connection to the database
$mysqli = new mysqli(
                  // Database host name
                  $dbhost,
                  // Database user name 
                  $dbuser, 
                  // Database password
                  $password, 
                  // Database name
                  $dbname)
  
  // check the connection 
  if ($mysqli->connect_error) {
    // Run echo this if there is a command
    echo 'Errno: '.$mysqli->connect_errno;
    echo '<br>';
    echo 'Error: '.$mysqli->connect_error;
    exit();
  }
  //Run this if the connection is good. 
  echo "Connected Sucessfully";     
} 
/*
connecting to the db server and running the 
command that is saved in "$sql" and saving the 
results in "$result". 
*/
$route = $_GET['route']
  
  
switch ($route){
  case "getAllHeroes":
    $myData = getAllHeroes($mysqli);
    break; 
  case "createBattle":
    $myData = createBattle($mysqli,2,4,4);
    break;
  case "getHeroByID": 
    $myData = getHeroByID($mysqli, $id);
    break;
  default:
    $myData = json_encode([]);
}
echo $myData
  
  
// Closing the connections.  
$mysqli->close();
function getAllHeroes($mysqli){
  $data=array();
  // Saving the query command in "$sql"
  $sql = "SELECT * FROM heroes";
  
  if ($result->num_rows > 0){
     while($row = $result->fetch_assoc()){
     echo "id: " , $row["id"], " Name:", $row ["firstname"], " ", $row["lastname"], "<br>";
  }
}
function createBattle ($mysqli, $h1, $h2, $w){
  $sql = "INSERT INTO battles (hero1,hero2,winner)";
  VALUES ($h1, $h2, $h3);
  
  if ($mysqli->query($sql) === True){
    $record = "{'success':'created new battle'}"
  }else{
    $record = "{'Failed' : 'Wasn't able to create a new battle.}"
  }
}



?>
    