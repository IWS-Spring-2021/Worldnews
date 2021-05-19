<?php
$id = $_GET['id'];
$url = "http://localhost/worldnews/webservices/api/get_a_cat.php?id=$id";

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
                            <strong class="card-title">Category ID: <?php echo $result['id'] ?></strong>
                            <span>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-right" style="margin-left: auto;">
                                        <a href="/worldnews/client/admin/edit-cat.php?id=<?php echo $result['id'] ?>"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                <i class="fa fa-columns"></i>edit the category</button></a>
                                    </div>
                                </div>
                            </span>
                        </div>

                        <div class="card-body">
                            <div class="card-header">
                                <h3 class="pb-2 display-5">Category name </h3>
                                <p><?php echo $result['cat_name'] ?></p>
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