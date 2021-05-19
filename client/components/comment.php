<?php
$id = $_GET['id'];
$url = "http://localhost/worldnews/webservices/api/get_all_comment_of_a_news.php?id=$id";

$tag = curl_init($url);
curl_setopt($tag, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($tag);

$result = json_decode($response, true);


?>

<?php
if ($result['message'] != NULL) {
    echo $result['message'];
} else {
    foreach ($result as $key => $value) :
?>
        <li class="comment">
            <div class="vcard bio">
                <img src="images/comment/comment (<?php echo (rand(1, 8)); ?>).jpg" alt="Image placeholder">
            </div>
            <div class="comment-body">
                <h3 style="color: #407e88;"><?php echo $value['name'] ?></h3>
                <div class="comment-details" style="display: flex;">
                <?php foreach ($value['comment'] as $keyC => $valueC) : ?>
                    <p class="comment-content" style="word-wrap: break-word; margin-right:auto"><?php echo $valueC ?></p>
                <?php endforeach; ?>

                <p class="comment-date" style="color: #17a2b8;"><?php echo $value['posted_at'] ?></p>
                </div>
    


            </div>
        </li>
<?php
    endforeach;
} ?>