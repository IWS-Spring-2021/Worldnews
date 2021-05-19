<?php
$url = "http://localhost/Worldnews/webservices/api/get_all_tags.php";

$tag = curl_init($url);
curl_setopt($tag, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($tag);

$result = json_decode($response, true);

?>

<div class="card ">
<div class="card-body ">
    <div class="card-header ftco-animate">
    <h4 style="color: grey;">New Tags</h4>
    <div class="tagcloud">
        <?php 
        foreach ($result as $key => $value) : ?>
            <a style="color:brown;" href="tag.php?id=<?php echo $value['id']; ?>" class="tag-cloud-link" <?php if ($value['id'] == $id) {echo 'style="border: 1px solid #F0F8FF;"';} ?>><?php echo $value['content'] ?></a>
        <?php endforeach; ?>
    </div>
</div>
</div>
</div>
