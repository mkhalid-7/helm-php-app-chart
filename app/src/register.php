<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: rgba(255, 255, 255, 0.5); /* Semi-transparent white */
            color: black;
            font-family: Arial, sans-serif;
            margin: 0;
            height: 100%;
            padding: 0;
            text-align: center; /* Center the content */
        }

        .content {
            padding: 50px;
            background: rgba(255, 255, 255, 0.7); /* Semi-transparent content background */
            border-radius: 10px;
            margin: 50px auto;
            max-width: 800px;
            text-align: left; /* Align text to the left inside the content */
        }

        table {
            width: 60%;
            margin: 20px auto;
            border-collapse: collapse;
            text-align: left;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body align="center"

<?php
// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// // Database connection details
// $server = "my-mysql";
// $database = "form";
// $username = "mkhalid";
// $password = "mkhalid";
// $port = 3306;

// Database connection details from environment variables
$server = getenv('MYSQL_HOST');  // Get the MySQL host from the environment variable
$database = getenv('MYSQL_DB');  // Get the MySQL database name from the environment variable
$username = getenv('MYSQL_USER');  // Get the MySQL username from the environment variable
$password = getenv('MYSQL_PASS');  // Get the MySQL password from the environment variable
$port = 3306;  // Default MySQL port

$rootUser = getenv('MYSQL_ROOT_USER');  // MySQL root user for administrative tasks
$rootPassword = getenv('MYSQL_ROOT_PASSWORD');  // MySQL root password

////////////////////////
// Connect as root to create user
$rootCon = new mysqli($server, $rootUser, $rootPassword, null, $port);
if ($rootCon->connect_error) {
    die("❌ Root connection failed: " . $rootCon->connect_error);
}

// Create user and grant privileges
$createUserSql = "
    CREATE USER IF NOT EXISTS '{$username}'@'%' IDENTIFIED BY '{$password}';
    GRANT ALL PRIVILEGES ON *.* TO '{$username}'@'%' WITH GRANT OPTION;
    FLUSH PRIVILEGES;
";

if ($rootCon->multi_query($createUserSql)) {
    echo "✅ MySQL user '{$username}' created and granted privileges.<br>";
    while ($rootCon->more_results() && $rootCon->next_result()) {;} // Clear remaining results
} else {
    echo "⚠️ User creation error: " . $rootCon->error . "<br>";
}
$rootCon->close();

// Connect using application user
$con = new mysqli($server, $username, $password, $database, $port);
if ($con->connect_error) {
    die("❌ App connection failed: " . $con->connect_error);
} else {
    echo "✅ App connected as '{$username}' to DB '{$database}'.<br>";
}


////////////////////////
// // Establish MySQL connection
// $con = new mysqli($server, $username, $password, $database, $port);

// Check connection
if ($con->connect_error) {
    die("❌ Connection failed: " . $con->connect_error);
} else {
    echo "✅ MySQL Connection Successful!<br>";
}

// Drop table if it exists (optional)
$con->query("DROP TABLE IF EXISTS form");

// Create table if it doesn't exist
$tableCreateQuery = "CREATE TABLE IF NOT EXISTS form (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    First_name VARCHAR(100) NOT NULL,
    Last_name VARCHAR(100) NOT NULL,
    Email_id VARCHAR(255) NOT NULL,
    Telephone_Number VARCHAR(20) NOT NULL,
    Job_title VARCHAR(100) NOT NULL,
    Company VARCHAR(100) NOT NULL,
    State VARCHAR(50) NOT NULL,
    Country VARCHAR(50) NOT NULL,
    Postcode VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($con->query($tableCreateQuery) === TRUE) {
    echo "✅ Table 'form' checked/created successfully.<br>";
} else {
    die("❌ Error creating table: " . $con->error);
}

// Validate POST data
$Fname = $_POST['firstname'] ?? '';
$Lname = $_POST['lastname'] ?? '';
$F = $_POST['email'] ?? '';
$E = $_POST['phone'] ?? '';
$J = $_POST['jobtitle'] ?? '';
$C = $_POST['company'] ?? '';
$S = $_POST['state'] ?? '';
$Cn = $_POST['country'] ?? '';
$P = $_POST['postcode'] ?? '';

// Check if form data is empty
if (empty($Fname) || empty($Lname) || empty($F) || empty($E) || empty($J) || empty($C) || empty($S) || empty($Cn) || empty($P)) {
    echo "⚠️ All fields are required. Please fill out the form correctly.<br>";
    exit;
}

// Insert data using prepared statement
$sql = "INSERT INTO form (First_name, Last_name, Email_id, Telephone_Number, Job_title, Company, State, Country, Postcode) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("sssssssss", $Fname, $Lname, $F, $E, $J, $C, $S, $Cn, $P);

if ($stmt->execute()) {
    echo "✅ Your information is submitted successfully!<br>";
    echo "<h2>Your Contact Information</h2>";
    echo "<table border='1' cellpadding='10' cellspacing='0'>";
    echo "<tr><th>Field</th><th>Value</th></tr>";
    echo "<tr><td>First Name</td><td>" . htmlspecialchars($Fname) . "</td></tr>";
    echo "<tr><td>Last Name</td><td>" . htmlspecialchars($Lname) . "</td></tr>";
    echo "<tr><td>Email</td><td>" . htmlspecialchars($F) . "</td></tr>";
    echo "<tr><td>Phone Number</td><td>" . htmlspecialchars($E) . "</td></tr>";
    echo "<tr><td>Job Title</td><td>" . htmlspecialchars($J) . "</td></tr>";
    echo "<tr><td>Company</td><td>" . htmlspecialchars($C) . "</td></tr>";
    echo "<tr><td>State</td><td>" . htmlspecialchars($S) . "</td></tr>";
    echo "<tr><td>Country</td><td>" . htmlspecialchars($Cn) . "</td></tr>";
    echo "<tr><td>Post Code</td><td>" . htmlspecialchars($P) . "</td></tr>";
    echo "</table><br><br>";
} else {
    echo "❌ Error inserting into table: " . $stmt->error . "<br>";
}



// Close statement and connection
$stmt->close();
$con->close();
?>

</body>
</html>
