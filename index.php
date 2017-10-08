<?php include 'includes/header.php';?>   


<?php 
/* require 'inc_0700/config_inc.php'; #provides configuration, pathing, error handling, db credentials

$config->titleTag = THIS_PAGE; #Fills <title> tag. If left empty will fallback to $config->titleTag in config_inc.php  */   

// require 'inc_0700/credentials_inc.php';

?>


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

// Check connection.
if ($connection -> connect_error) {
    die("This connection failed: " . $connection -> connect_error); 
}
?>

    <!-- HTML portion of the script. --> 
<h2>Mike Sinkula Memorial Rideshare Page:</h2>   

<p>On Sept 27th, 2017, our beloved Seattle Central College professor, Michael Daniel Sinkula, passed away. The Sinkula Family has graciously invited all of the Seattle Central College community to attend his memorial and celebration of life. This web app is a place to coordinate rides to and from this memorial. If you are concerned about confidentiality, the rideshare database will be scrubbed after the event.</p>  

<br>The service will be held at:
<br>Yarington's Funeral Home
<br>10708 16th Ave SW
<br>Seattle, WA 98146
<br>(206) 242-2771 

<p><a href="http://obits.dignitymemorial.com/dignity-memorial/obituary.aspx?n=Michael-Sinkula&lc=2285&pid=186836885&mid=7584916">For more information, please consult Mike Sinkula's Obituary.</a></p>


<form action="insert.php" method="post">
    <p>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" placeholder="Ima Student" required>
    </p>
    
    <p>
        <label for="neighborhood">Neighborhood:</label>
        <input type="text" name="neighborhood" id="neighborhood" placeholder="Capitol Hill">
    </p>
    
    <p>
        <label for="emailAddress">Email Address:</label>
        <input type="text" name="email" id="emailAddress" placeholder="Ima@seattlecentral.edu" required>
    </p>
            
    <p>
        <label for="rideNeeded">Ride Needed: </label>
        <input type="radio" name="ride_needed" value="yes"> Yes<br>
        <input type="radio" name="ride_needed" value="no"> No<br>
        <input type="radio" name="ride_needed" value="maybe"> Maybe<br> 
    </p>
    
        <p>
        <label for="rideAvail">Ride Available: </label>
        <input type="radio" name="ride_avail" value="yes"> Yes<br>
        <input type="radio" name="ride_avail" value="no"> No<br>
        <input type="radio" name="ride_avail" value="maybe"> Maybe<br> 
    </p>
    
    <p>
        <label for="seatsAvail">Seats Available, if you can offer a ride: </label>
        <input type="radio" name="seats" value="1"> 1<br>
        <input type="radio" name="seats" value="2"> 2<br>
        <input type="radio" name="seats" value="3"> 3<br>
        <input type="radio" name="seats" value="4"> 4<br>
        <input type="radio" name="seats" value="5"> 5+<br>
    </p>
    
    <p>
        <label for="comments">Any Comments:</label>
        <input type="text" name="comments" id="comments" placeholder="I am a student">
    </p>
    
    
    <input type="submit" value="Submit">
</form>
        
<?php
/* 
if(isset($_POST['btn'])) // The form handler.
{ 
    $test_name = $_POST['test_name'];
    $test_number = $_POST['test_number'];
    $test_ride = $_POST['test_ride'];
    
    //echo "This makes sure that program takes input. </br>"; 
    //echo "This is name: $test_name </br>"; 
    //echo "This is number: $test_number </br>"; 
    //echo "This is ride status: $test_ride </br>"; 
    

    // This is the practice query, to see if this works and will add data. 
    $query = "INSERT INTO tabletest1 (coltestvarchar, coltestint, coltesttinytext) VALUES ('$test_name', '$test_number', '$test_ride')";     
    
}

    
?>

<h2>List of Rides Wanted/Offered:</h2>


<?php
/* // Create connection


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} */ 


    
/*     

// connect to the database. 

$connection = db_connect(); 

// Check connection.
if ($connection -> connect_error) {
    die("This connection failed: " . $connection -> connect_error); 
}

$sql = "SELECT coltestvarchar, coltestint, coltesttinytext FROM tabletest1";
$result = $connection->query($sql);



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> name: ". $row["coltestvarchar"] . 
            " - number: ". $row["coltestint"] . " - needed: " . $row["coltesttinytext"] . " - offered: " . $row["coltesttinytext"] . "<br>";
    }
} else {
    echo "0 results";
}

// This closes the SQL connection. 
$connection->close();

*/ 

?> 


<br />     
        
<?php include 'includes/footer.php';?> 