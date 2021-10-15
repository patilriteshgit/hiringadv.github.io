<?php
// $Email = $_POST['Email'];
$email = (string)filter_input(INPUT_POST, 'email');
$fullname = $_POST['fullname'];
// $inputaddress = $_POST['inputaddress'];
$reference = (string)filter_input(INPUT_POST, 'reference');
$qual = $_POST['qual'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$role = (string)filter_input(INPUT_POST, 'role');

$state = $_POST['state'];
//connection

$conn = new mysqli('localhost','root','','registercontact');

if($conn->connect_error){
die('Connection Failed : '.$conn->connect_error);
}else{
$stmt = $conn-> prepare("insert into name(email,fullname,reference,qual, phone,state, city,role)
values(?, ?, ?, ?, ?, ?,?,?)");
$stmt->bind_param("ssssisss",$email,$fullname,$reference,$qual, $phone,$state, $city,$role);
$stmt->execute();
echo "Registration Successfull...";
$stmt->close();
$conn->close();

}



?>