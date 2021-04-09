<?php
/* 
CRUD Functions -> 
                  Create: 
                            AddHero 
                  Read/Edit: 
                            getAllHeroes
                  Update:  
                            createBattle 
                  Delete: 
                            deleteHero
=============================================== 
                                               +                                     
           CONNECTION PROCESS                  +                                     
                                               +                      
=============================================== 
*/
  // input the credientials to connect to the db server.
  // Using phpMyAdmin. 
  $dbhost = 'localhost';                                                             
  $dbuser = 'root';
  // No password just for educational purposes. 
  $dbpassword ='';
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
                  $dbname);
  
  // check the connection 
  if ($mysqli->connect_error) {
    // Run echo this if there is a command
    echo 'Errno: '.$mysqli->connect_errno;
    echo '<br>';
    echo 'Error: '.$mysqli->connect_error;
    exit();
  }
  //Run this if the connection is good. 
  echo 'Connected Sucessfully';  
//============================================
 
/*
connecting to the db server and running the 
command that is saved in "$sql" and saving the 
results in "$result". 
*/
$route = $_GET['route'];
  
/* Depending on which link the user will click.   
=============================================== 
                                               +                                     
                 Route                         +                                     
                                               +                      
=============================================== 
When the user clicks on a link. It will run the 
associated functino given them the data that they
asksed for. 
*/
switch ($route){
  case 'getAllHeroes':
    $myData = getAllHeroes($mysqli);
    break; 
  case 'createBattle':
    $myData = createBattle($mysqli,2,4,4);
    break;
  case 'getHeroByID': 
    // Should return the hero "The Seer"
    $myData = getHeroByID($mysqli,5);
    break;
    // Should delete the hero "The Seer" 
  case 'deleteHero':
    $myData = deleteHero($mysqli, 5);
    break; 
  case 'addHero':
    $myData = addHero($mysqli);
    break; 
  default:
    $myData = json_encode([]);
}

echo $myData; 
 
  // Closing the connections.  
$mysqli->close();
//=============================================
/*
=============================================== 
                                               +                                     
                 Function                      +                                     
                                               +                      
=============================================== 
   Get Every single hero is the database 
   If the user would like to see every hero 
   from the database. 
 */
function getAllHeroes($mysqli){
  // Will put the data in an array object 
  $data=array();
  // Saving the query command in "$sql"
  /*
  Explanantion: 
                I'm selecting every row from the hero table.
                Including all columns, asterisk: means everything
                in the column. 
  */
  $sql = 'SELECT * 
          FROM heroes';
  // Stores the query output in a variable
  $result = $mysqli->query($sql);
  
  // If the conditions are true, it will push the row into the array data 
  if ($result->num_rows > 0){
     // fetch_assoc() function fetches a result row as an associative array.
     while($row = $result->fetch_assoc()){
        // Pushes the row into the array
        array_push($data,$row);
    }
  }
  // Transforms the data into a json format. 
  return json_encode($data);
}
// Creates a battle between two heroes.  
function createBattle ($mysqli, $h1, $h2, $w){
  $sql = "INSERT INTO battles (hero1,hero2,winner) 
  VALUES ($h1, $h2, $w)";
  
  if ($mysqli->query($sql) === True){
    $record = "{'success':'created new battle'}";
  }else{
    echo "{'error': '" . $sql . " - " . $mysqli->error . "'}";
  }
  // Transforms the data into a json format.
  return json_encode([$record]);
}
// Get the hero base on their ID. 
function getHeroByID($mysqli,$id){
  $data=array();
  /* Explanation: 
                  It selects everything from hero
                  That has the called ID number. 
  */
  $sql="SELECT * 
        FROM heroes
        WHERE id= " . $id;
  $result = $mysqli->query($sql);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      array_push($data,$row);
    }
  }
  // Transforms the data into a json format.
  return json_encode($data);
}
// Deletes the hero base on their ID. 
function deleteHero($mysqli, $id){
  $data=array(); 
  
  $sql = "DELETE 
          FROM heroes
          WHERE id= " . $id;
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      array_push($data,$row);
    }
  }
  return json_encode($data,$row);
}
// Creates a new hero 
function addHero($mysqli){
  $data=array();  
  
  $sql = "UPDATE heroes
          SET column1=value, column2=value2,...
          WHERE some_column=some_value ";
}
?>
    