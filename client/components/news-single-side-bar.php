<?php
$urlC = "http://localhost/worldnews/webservices/api/get_all_category.php";

$category = curl_init($urlC);
curl_setopt($category, CURLOPT_RETURNTRANSFER, true);
$responseC = curl_exec($category);

$resultC = json_decode($responseC, true);

$urlT = "http://localhost/worldnews/webservices/api/get_all_tags.php";

$tag = curl_init($urlT);
curl_setopt($tag, CURLOPT_RETURNTRANSFER, true);
$responseT = curl_exec($tag);

$resultT = json_decode($responseT, true);
?>
<?php include('components/related_news.php') ?>

<div class="sidebar-box ftco-animate">
    <div class="categories" style="padding: 10px;">
        <h3>Categories</h3>
        <?php foreach ($resultC as $key => $value) : ?>
            <li><a href="category.php?id=<?php echo $value['id']; ?>"><?php echo $value['category'] ?><span class="ion-ios-arrow-forward"></span></a></li>
        <?php endforeach; ?>
    </div>
</div>

<div class="card ">
<div class="card-body ">
    <div class="card-header ftco-animate">
    <h4 style="color: grey;">New Tags</h4>
    <div class="tagcloud">
        <?php 
        foreach ($resultT as $key => $value) : ?>
            <a style="color:brown;" href="tag.php?id=<?php echo $value['id']; ?>" class="tag-cloud-link"><?php echo $value['content'] ?></a>
        <?php endforeach; ?>
    </div>
</div>
</div>
</div>

