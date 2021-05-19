<?php
//   $data = array('title' => $_POST['title'], 'short_intro' => $_POST['short_intro'], 'content' => $_POST['content'],
//   'author' => $_POST['author'], 'created_date' => $_POST['created_date'], 'pic' => $_POST['pic'], 'cat_id' => $_POST['cat_id'], 'tag_id' => $_POST['tag_id'] );
//   $data_string = json_encode($data);
  $id= $_GET['id'];
//   $login_user = $_POST['name'];
$url = "http://localhost/worldnews/webservices/api/delete_news.php?id=$id";
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
    $message = "Deleted News id $id successfully!";
    header("Location: http://localhost/worldnews/client/admin/list-news.php?message=$message");
