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
            <div class="row ml-5">
                <div class="col-lg-10 offset-lg-1">
                    <div class="card">
                        <div class="card-header">
                            <strong>Edit</strong> A cat
                            <span>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-right" style="margin-left: auto;">
                                        <a href="/worldnews/client/admin/list-cats.php"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                <i class="fa fa-columns"></i>view all categories</button></a>
                                    </div>
                                </div>
                            </span>
                        </div>
                        <div class="card-body card-block">
                            <form action="../components/edit_a_cat.php?id=<?php echo $_GET['id'] ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="id" class=" form-control-label">Id</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input name="id" id="id" rows="2" value="<?php echo $result['id'] ?>" class="form-control" disabled></input>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="cat_name" class=" form-control-label">cat name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input name="cat_name" id="cat_name" value="<?php echo $result['cat_name'] ?>" class="form-control"></input>
                                    </div>
                                </div>

                                <div class="card-footer row d-flex justify-content-center">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal<?php echo $_GET['id'] ?>">
                                        <i class="fa fa-dot-circle-o"></i> Save
                                    </button>
                                </div>
                                <?php
                                $target_action = "Edit";
                                $target_id = $_GET['id'];
                                $confirm_message = "Confirm saving the changes with Category Id " . $target_id . " ?";

                                $file_controller = "components/edit_a_cat.php";
                                include('../components/common/modal.php');
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('common/subfix.php') ?>