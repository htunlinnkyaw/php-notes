<?php
// Variables and Data Types
$name = "John Doe"; // String variable
$age = 30; // Integer variable
$height = 1.75; // Float variable
$isStudent = true; // Boolean variable
$grades = array(85, 92, 78); // Array variable

// Control Structures: If-Else
if ($age >= 18) {
    echo "Adult";
} else {
    echo "Minor";
}

// Control Structures: Loops (for and foreach)
for ($i = 0; $i < count($grades); $i++) {
    echo "Grade " . ($i + 1) . ": " . $grades[$i] . "<br>"; // Output each grade
}

foreach ($grades as $grade) {
    echo "Grade: " . $grade . "<br>"; // Output each grade in foreach loop
}

// Functions
function greet($name) {
    echo "Hello, $name!";
}

greet("Alice"); // Call greet function with argument

// Classes and Objects
class Person {
    public $name;
    public $age;

    function __construct($name, $age) {
        $this->name = $name; // Assign name property
        $this->age = $age; // Assign age property
    }

    function greet() {
        echo "Hello, my name is {$this->name} and I am {$this->age} years old."; // Output greeting with object properties
    }
}

$person = new Person("Bob", 25); // Create new Person object
$person->greet(); // Call greet method of Person object
?>

<!-- Form example -->
<form action="process.php" method="post">
    Username: <input type="text" name="username"><br> <!-- Text input for username -->
    Password: <input type="password" name="password"><br> <!-- Password input for password -->
    <input type="submit" value="Submit"> <!-- Submit button -->
</form>

<?php
// Starting a session
session_start();

// Storing data in session
$_SESSION["username"] = "John";

// Retrieving data from session
echo "Welcome, " . $_SESSION["username"]; // Output welcome message with session data

// Setting a cookie
setcookie("user_id", "12345", time() + (86400 * 30), "/"); // Set cookie with expiration in 30 days

// Retrieving a cookie
echo "User ID: " . $_COOKIE["user_id"]; // Output user ID from cookie

// Connecting to MySQL using PDO
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "mydatabase";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); // Create PDO connection
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error mode to exception

    // Example: Selecting data
    $stmt = $conn->prepare("SELECT id, name, email FROM users"); // Prepare SELECT statement
    $stmt->execute(); // Execute SELECT statement

    // Example: Inserting data
    $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (:name, :email)"); // Prepare INSERT statement
    $stmt->bindParam(':name', $name); // Bind parameter for name
    $stmt->bindParam(':email', $email); // Bind parameter for email
    $name = "John"; // Set name variable
    $email = "john@example.com"; // Set email variable
    $stmt->execute(); // Execute INSERT statement
    
    // Example: Updating data
    $stmt = $conn->prepare("UPDATE users SET name = :name WHERE id = :id"); // Prepare UPDATE statement
    $stmt->bindParam(':name', $name); // Bind parameter for name
    $stmt->bindParam(':id', $id); // Bind parameter for id
    $name = "Jane"; // Set name variable
    $id = 1; // Set id variable
    $stmt->execute(); // Execute UPDATE statement
    
    // Example: Deleting data
    $stmt = $conn->prepare("DELETE FROM users WHERE id = :id"); // Prepare DELETE statement
    $stmt->bindParam(':id', $id); // Bind parameter for id
    $id = 2; // Set id variable
    $stmt->execute(); // Execute DELETE statement

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage(); // Output connection error message
}

// Data Validation and Sanitization
$username = $_POST["username"]; // Get username from POST data
$username = filter_var($username, FILTER_SANITIZE_STRING); // Sanitize username

// SQL Injection Prevention using Prepared Statements
$stmt = $conn->prepare("SELECT * FROM users WHERE username = :username"); // Prepare SELECT statement with parameter
$stmt->bindParam(':username', $username); // Bind parameter for username
$stmt->execute(); // Execute SELECT statement
$user = $stmt->fetch(); // Fetch user data

// Password Hashing
$password = "mypassword"; // Password to hash
$hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash password
?>
