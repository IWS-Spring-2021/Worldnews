<?php
session_start();
include_once '../config/Database.php';
include_once '../models/User.php';

$database = new Database();
$db = $database->connect();

$user = new User($db);
if (
    isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['email']) && isset($_POST['re_pass'])
) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes(($data));
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);
    $re_pass = validate($_POST['re_pass']);
    // $news_id = validate($_POST['news_id']);

    $user_data = 'uname=' . $uname . '&email=' . $email;
    // $url = '/worldnews/client/news_single.php?id=$news_id';

    // $pass = md5($pass);

    // $sql = "SELECT * FROM users WHERE username='$uname'";
    // $result = mysqli_query($conn, $sql);
    $result = $user->read_user_by_name($uname);
    $result_email = $user->read_user_by_email($email);

    $num = $result->rowCount();
    $num_email = $result_email->rowCount();

    if ($num > 0) {

        header("Location: /worldnews/client/signup.php?error=The username is taken try another&$user_data");
        exit();
    } else if ($num_email > 0) {
        header("Location: /worldnews/client/signup.php?error=The email is taken try another&$user_data");
        exit();
    } else if ($pass !== $re_pass) {
        header("Location: /worldnews/client/signup.php?error=The confirmation password  does not match&$user_data");
        exit();
    } else {
        $result2 = $user->insert_user($uname, $email, $pass);
        // $num2 = $result2->rowCount();

        if ($result2) {
            $result3 = $user->read_user_by_name($uname);
            $row3 = $result3->fetch(PDO::FETCH_ASSOC);

            $_SESSION['username'] = $row3['username'];
            $_SESSION['user_id'] = $row3['user_id'];
            header("Location:/worldnews/client/index.php?login_user=$uname");

            exit();
        } else {
            // echo "<script>
            // alert('Unknown error occurs');
            // window.location.href =  '/worldnews/client/news_single.php?id=$news_id';
            // </script>";
            header("Location: /worldnews/client/signup.php?error=Unknown error occurred&$user_data");
            exit();
        }
    }
} else {
    header("location:javascript://history.go(-1)");
    exit();
}
