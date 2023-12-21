<?php
 $servername = "localhost";
$username = "root";
$password = "";
$database = "student_info";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$option = $_POST["option"];
$username = $_POST['det1'];
$password = $_POST['det2'];  
if ($option == '1') 
{
        $sql = "SELECT * FROM login_details";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<table>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["Pinno"] . "</td><td>" . $row["Password"] . "</td></tr>";
        }
            echo "</table>";
        } else {
            echo "No data found.";
        }
} 
elseif ($option == '2') 
{      
        $sql = "INSERT INTO login_details(Pinno, Password) VALUES ('$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "Account created succefully";
        } else {
            echo "Error: " . $conn->error;
        }
} 
elseif ($option == '3') 
{
        $sql = "DELETE FROM login_details WHERE Pinno = '$username'";
        if ($conn->query($sql) === TRUE) {
            echo "Account deleted succefully";
        } 
        else {
            echo "Error: " . $conn->error;
        }
}
elseif ($option == "4") 
{
        $sql = "UPDATE login_details SET password='$password' WHERE Pinno='$username'";
        if ($conn->query($sql) === TRUE) {
            echo  "Password changed successfully.";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
} 
elseif ($option == "5") 
{
        $sql = "SELECT password FROM login_details WHERE Pinno='$username'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $password = $row["password"];
            echo "The password for $username is: $password";
        } else {
            echo "No data found.";
        }
}
echo "<button onclick='history.go(-1)'>Go to Back Page</button>";
$conn->close();
?>