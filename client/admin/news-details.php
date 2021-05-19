<?php
$id = $_GET['id'];
$url = "http://localhost/worldnews/webservices/api/get_a_news.php?id=$id";

$news = curl_init($url);
curl_setopt($news, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($news);

$result = json_decode($response, true);

?>
<?php include('common/prefix.php') ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">


                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">News ID: <?php echo $result['id'] ?></strong>
                            <span>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-right" style="margin-left: auto;">
                                        <a href="/worldnews/client/admin/edit-news.php?id=<?php echo $result['id']?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                <i class="fa fa-columns"></i>edit the news</button></a>
                                    </div>
                                </div>
                            </span>
                        </div>

                        <div class="card-body">
                            <div class="card-header">
                                <h3 class="pb-2 display-5">Title: </h3>
                                <p><?php echo $result['title'] ?></p>
                            </div>
                            <div class="card-header">
                                <h3 class="pb-2 display-5">Short introduction: </h3>
                                <p><?php echo $result['short_intro'] ?></p>
                            </div>
                            <div class="card-header">
                                <h3 class="pb-2 display-5">Content: </h3>
                                <?php foreach ($result['content'] as $key => $value) : ?>
                                    <p><?php echo $value; ?></p>
                                <?php endforeach; ?>
                            </div>
                            <div class="card-header">
                                <h3 class="pb-2 display-5">Author: </h3>
                                <p><?php echo $result['author'] ?></p>
                            </div>
                            <div class="card-header">
                                <h3 class="pb-2 display-5">Created Date: </h3>
                                <p><?php echo $result['created_date'] ?></p>
                            </div>
                            <div class="card-header">
                                <h3 class="pb-2 display-5">Picture: </h3>
                                <p>ID: <?php echo $result['pic'] ?></p>
                                <img src="../images/news-pics/pic (<?php echo $result['pic']; ?>).jpg" alt="news-image">
                            </div>
                            <div class="card-header">
                                <h3 class="pb-2 display-5">Category</h3>
                                <p>
                                    <span>ID: <?php echo $result['cat_id'] ?> </span><br>
                                    <?php
                                    $cat_id = $result['cat_id'];
                                    $urlC = "http://localhost/Worldnews/webservices/api/get_cat_by_news.php?id=$cat_id";
                                    $cat = curl_init($urlC);
                                    curl_setopt($cat, CURLOPT_RETURNTRANSFER, true);
                                    $responseC = curl_exec($cat);

                                    $resultC = json_decode($responseC, true);
                                    ?>
                                    <span>Name: <?php echo $resultC['category'] ?><span>
                                </p>
                            </div>
                            <div class="card-header">
                                <h3 class="pb-2 display-5">Tag</h3>
                                <p>
                                    <?php
                                            $urlT = "http://localhost/Worldnews/webservices/api/get_all_tags_by_news.php?id=$id";
                                            $tag = curl_init($urlT);
                                            curl_setopt($tag, CURLOPT_RETURNTRANSFER, true);
                                            $responseT = curl_exec($tag);

                                            $resultT = json_decode($responseT, true);
                                            foreach ($resultT as $keyT => $valueT) :
                                            ?>
                                                <span>ID: <?php echo $valueT['id'] ?>&nbsp;</span>
                                                <span>Name: <?php echo $valueT['tag_name'] ?></span><br>
                                            <?php endforeach; ?>
                                </p>
                            </div>


                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php include('common/subfix.php') ?>