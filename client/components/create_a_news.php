<?php
  $data = array('title' => $_POST['title'], 'short_intro' => $_POST['short_intro'], 'content' => $_POST['content'],
  'author' => $_POST['author'], 'created_date' => $_POST['created_date'], 'pic' => $_POST['pic'], 'cat_id' => $_POST['cat_id'], 'tag_id' => $_POST['tag_id'] );
  $data_string = json_encode($data);
//   $news_id= $_POST['news_id'];
//   $login_user = $_POST['name'];
    $curl = curl_init('http://localhost/worldnews/webservices/api/create_a_new_news.php');
    
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
    $message = "Created successfully!";
    header("Location: http://localhost/worldnews/client/admin/list-news.php?message=$message");
    ?>