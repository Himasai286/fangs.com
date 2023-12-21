<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "student_info";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$pinno = $_POST['pinno'];
$password = $_POST['password'];
$query = "SELECT * FROM login_details WHERE Pinno = '$pinno' AND Password = '$password'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if ($pinno === '21030-CM-486' && $password === '486Shaik') {
        header('Location: 420.html');
    } elseif ($pinno === '21030-CM-485' && $password === '485PlatinaMAH') {
        header('Location: admin.html');
    } else {
        header('Location: main.html');
    }
} else {
    $string =  "Login Details mismatched..! Please try again.";
    $url = "login.html?str=" . urlencode($string);
    header("Location: $url");
}
$conn->close();
?> 