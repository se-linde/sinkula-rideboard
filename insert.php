<?php include 'includes/header.php';?>   


<?php 

function db_connect() {
    
    // Define the connection as a static variable, to avoid connecting more than once. 
    
    static $connection; 
    
    // Try to connect to the database, if a connection hasn't been established yet. 
    
    if(!isset($connection)) {
        // Load connection as an array. Use the actual location of your configuration file. 
        
        $config = parse_ini_file('includes/cred.ini'); 
        
        // require 'inc_0700/config_inc.php'
        
        $connection = mysqli_connect($config['servername'],$config['username'],$config['password'],$config['dbname']);
    }
        
    // If connection wasn't successful, handle the error. 
    if($connection === false) {
        // handle error. 
        return mysqli_connect_error(); 
    }
    return $connection; 
}

// connect to the database. 

$connection = db_connect(); 

// The SQL query to add the data: 

// Escape user inputs for security
$name = mysqli_real_escape_string($connection, $_REQUEST['name']);
$neighborhood = mysqli_real_escape_string($connection, $_REQUEST['neighborhood']);
$email = mysqli_real_escape_string($connection, $_REQUEST['email']);
$ride_needed = mysqli_real_escape_string($connection, $_REQUEST['ride_needed']);
$ride_avail = mysqli_real_escape_string($connection, $_REQUEST['ride_avail']);
$seats = mysqli_real_escape_string($connection, $_REQUEST['seats']);
$comments = mysqli_real_escape_string($connection, $_REQUEST['comments']);


$ip = getenv("REMOTE_ADDR");

// attempt insert query execution
$sql = "INSERT INTO persons (name, neighborhood, email, ride_needed, ride_avail, seats, comments, ip) VALUES 
('$name', '$neighborhood', '$email', '$ride_needed', '$ride_avail', '$seats', '$comments', '$ip')";


if(mysqli_query($connection, $sql)){
    echo "Records added successfully! <br>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
}
 

// Check connection.
if ($connection -> connect_error) {
    die("This connection failed: " . $connection -> connect_error); 
}

// This closes the SQL connection. 
// $connection->close();

// End of the SQL Table Insert Statement. 

// List of the SQL table contents:  

// connect to the database. 

// $connection = db_connect(); 

// Check connection.
/* if ($connection -> connect_error) {
    die("This connection failed: " . $connection -> connect_error); 
} */ 

$sql2 = "SELECT name, neighborhood, email, ride_needed, ride_avail, seats, comments FROM persons ORDER BY neighborhood";
$result = $connection->query($sql2);

// Old version; works with other database: 
/* 
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> name: ". $row["coltestvarchar"] . 
            " - number: ". $row["coltestint"] . " - needed: " . $row["coltesttinytext"] . " - offered: " . $row["coltesttinytext"] . "<br>";
    }
} else {
    echo "0 results";
} 
*/ 
echo "<p>"; 
echo "<br><strong>Name:</strong>&emsp;&emsp;&emsp;<strong>Neighborhood:</strong>&emsp;&emsp;<strong>Email:</strong>&emsp;&emsp;<strong>Ride Needed?</strong>&emsp;<strong>Ride Avail?</strong>&emsp;<strong>Seats Avail:</strong>&emsp;<strong>Comments:</strong><br>"; 


// This displays the results of the table. 

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> " . $row["name"] . "&emsp;&emsp;" . $row["neighborhood"] . "&emsp;&emsp;" . $row["email"] . "&emsp;&emsp;" . $row["ride_needed"] . "&emsp;&emsp;" . $row["ride_avail"] . "&emsp;&emsp;" . $row["seats"] . "&emsp;&emsp;" . $row["comments"] . "<br>";
    }
} else {
    echo "0 results";
}




// This closes the SQL connection. 
$connection->close();


?>





<br />     
        
<?php include 'includes/footer.php';?> 