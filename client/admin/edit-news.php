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
            <div class="row ml-5">
                <div class="col-lg-10 offset-lg-1">
                    <div class="card">
                        <div class="card-header">
                            <strong>Edit</strong> A News
                            <span>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-right" style="margin-left: auto;">
                                        <a href="/worldnews/client/admin/list-news.php"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                <i class="fa fa-columns"></i>view all news</button></a>
                                    </div>
                                </div>
                            </span>
                        </div>
                        <div class="card-body card-block">
                            <form action="../components/edit_a_news.php?id=<?php echo $_GET['id'] ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                <div class="row form-group">

                                    <div class="col-12 col-md-9">
                                        <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $_GET['id']; ?>"></input>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="title" class=" form-control-label">Title</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="title" id="title" rows="2" class="form-control"><?php echo $result['title'] ?></textarea>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="short_intro" class=" form-control-label">Short introduction</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="short_intro" id="short_intro" rows="3" class="form-control"><?php echo $result['short_intro'] ?></textarea>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="content" class=" form-control-label">Content</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="content" id="content" rows="20" class="form-control">
                                            <?php foreach ($result['content'] as $key => $value) : echo $value; ?>
                                            <?php endforeach; ?>
                                        </textarea>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="author" class=" form-control-label">Author</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="author" name="author" class="form-control" value="<?php echo $result['author'] ?>">
                                        <!-- <small class="form-text text-muted">This is a help text</small> -->
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="created_date" class=" form-control-label">Created date</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="date" id="created_date" name="created_date" value="<?php echo date('Y-m-d'); ?>" class="form-control" value="<?php echo $result['created_date'] ?>">
                                        <!-- <small class="help-block form-date">Please enter the details of the news</small> -->
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="pic" class=" form-control-label">Picture's Number</label>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <input type="number" id="pic" name="pic" class="form-control" min=1 max=40 value="<?php echo $result['pic'] ?>">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label class=" form-control-label">Catetogory</label>
                                    </div>
                                    <div class="col col-md-9">
                                        <div class="form-check">
                                            <div class="radio">
                                                <label for="cat_id" class="form-check-label ">
                                                    <input type="radio" id="cat_id1" name="cat_id" value="1" class="form-check-input" <?php echo ($result['cat_id'] == 1) ? 'checked' : ''; ?>>Cine
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label for="cat_id" class="form-check-label ">
                                                    <input type="radio" id="cat_id2" name="cat_id" value="2" class="form-check-input" <?php echo ($result['cat_id'] == 2) ? 'checked' : ''; ?>>Music
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label for="cat_id" class="form-check-label ">
                                                    <input type="radio" id="cat_id3" name="cat_id" value="3" class="form-check-input" <?php echo ($result['cat_id'] == 3) ? 'checked' : ''; ?>>Lifestyle
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label for="cat_id" class="form-check-label ">
                                                    <input type="radio" id="cat_id4" name="cat_id" value="4" class="form-check-input" <?php echo ($result['cat_id'] == 4) ? 'checked' : ''; ?>>Travel
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Tags</label>
                                        </div> -->
                                    <?php
                                    $urlT1 = "http://localhost/Worldnews/webservices/api/get_all_tags.php";
                                    $tagT1 = curl_init($urlT1);
                                    curl_setopt($tagT1, CURLOPT_RETURNTRANSFER, true);
                                    $responseT1 = curl_exec($tagT1);

                                    $resultT1 = json_decode($responseT1, true);

                                    $urlT = "http://localhost/Worldnews/webservices/api/get_all_tags_by_news.php?id=$id";
                                    $tagT = curl_init($urlT);
                                    curl_setopt($tagT, CURLOPT_RETURNTRANSFER, true);
                                    $responseT = curl_exec($tagT);

                                    $resultT = json_decode($responseT, true);
                                    ?>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Tags</label>
                                        </div>
                                        <div class="col col-md-9">

                                            <?php
                                            foreach ($resultT1 as $keyT1 => $valueT1) :
                                            ?>
                                                <div class="form-check-inline form-check col-md-3">
                                                    <div class="checkbox">
                                                        <label for="tag_id[]" class="form-check-label ">
                                                            <input type="checkbox" id=<?php echo $valueT1['id'] ?> name="tag_id[]" value=<?php echo $valueT1['id'] ?> class="form-check-input" <?php
                                                                                                                                                                                                foreach ($resultT as $keyT => $valueT) :
                                                                                                                                                                                                    echo ($valueT['tag_name'] == $valueT1['content']) ? 'checked' : '';
                                                                                                                                                                                                endforeach;
                                                                                                                                                                                                ?>>
                                                            <?php echo $valueT1['content'] ?>
                                                        </label>
                                                    </div>
                                                </div>

                                            <?php endforeach; ?>
                                        </div>
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
                                $confirm_message = "Confirm saving the changes with News id " . $target_id . " ?";

                                $file_controller = "components/edit_a_news.php";
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