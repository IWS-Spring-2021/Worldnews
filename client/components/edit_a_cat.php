<?php
  $data = array('cat_name' => $_POST['cat_name']);
  $data_string = json_encode($data);
  $id= $_GET['id'];
//   $login_user = $_POST['name'];
$url = "http://localhost/worldnews/webservices/api/edit_cat.php?id=$id";
    $curl = curl_init($url);
    
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string))
    );
    
    $response = curl_exec($curl);
    echo $data_string, $response;
    curl_close($curl);
    $message = "Edited cat id $id successfully!";
    header("Location: http://localhost/worldnews/client/admin/list-cats.php?message=$message");
    ?>