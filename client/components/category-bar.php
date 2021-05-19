<?php
$urlC = "http://localhost/Worldnews/webservices/api/get_all_category.php";

$category = curl_init($urlC);
curl_setopt($category, CURLOPT_RETURNTRANSFER, true);
$responseC = curl_exec($category);

$resultC = json_decode($responseC, true);

?>


<div class="card">
<div class="card-body">
    <div class="categories">
        <h3>Categories</h3>
        <?php foreach ($resultC as $key => $value) : ?>
            <ul class="vertical-menu">
            <li <?php if ($value['id'] == $id) {echo 'class="active"';} ?>><a href="category.php?id=<?php echo $value['id']; ?>"><?php echo $value['category'] ?><span class="ion-ios-arrow-forward"></span></a></li>
            </ul>
        <?php endforeach; ?>
    </div>
</div>
</div>