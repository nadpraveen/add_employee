<?php

$servername = "localhost";
$username = "db_admin";
$password = "Teju143!";
$db_name = 'add_employee';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if(isset($_POST['role'])){
    $get_design = $conn->prepare("select desn from designation where type_of_design='".$_POST['role']."'");
    $get_design->execute();
    $design = $get_design->fetchAll(PDO::FETCH_ASSOC);
    $design_json = json_encode($design);
    echo $design_json;

}