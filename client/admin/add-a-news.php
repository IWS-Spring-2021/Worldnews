<?php include('common/prefix.php') ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row ml-5">
                <div class="col-lg-10 offset-lg-1">
                    <div class="card">
                        <div class="card-header">
                            <strong>Add</strong> A News
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
                            <form action="../components/create_a_news.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="title" class=" form-control-label">Title</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="title" id="title" rows="2" placeholder="Enter title" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="short_intro" class=" form-control-label">Short introduction</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="short_intro" id="short_intro" rows="3" placeholder="Short introduction" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="content" class=" form-control-label">Content</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="content" id="content" rows="20" placeholder="Content..." class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="author" class=" form-control-label">Author</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="author" name="author" placeholder="Enter author" class="form-control" required>
                                        <!-- <small class="form-text text-muted">This is a help text</small> -->
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="created_date" class=" form-control-label">Created date</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="date" id="created_date" name="created_date" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                                        <!-- <small class="help-block form-date">Please enter the details of the news</small> -->
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="pic" class=" form-control-label">Picture's Number</label>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <input type="number" id="pic" name="pic" placeholder="Enter picture's number" class="form-control" min=1 max=40 required>
                                        <small class="form-number number-muted">Please select the number from 1 to 40</small>
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
                                                    <input type="radio" id="cat_id1" name="cat_id" value="1" class="form-check-input" required>Cine
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label for="cat_id" class="form-check-label ">
                                                    <input type="radio" id="cat_id2" name="cat_id" value="2" class="form-check-input">Music
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label for="cat_id" class="form-check-label ">
                                                    <input type="radio" id="cat_id3" name="cat_id" value="3" class="form-check-input">Lifestyle
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label for="cat_id" class="form-check-label ">
                                                    <input type="radio" id="cat_id4" name="cat_id" value="4" class="form-check-input">Travel
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label class=" form-control-label">Tags</label>
                                    </div>
                                    <div class="col col-md-9">
                                        <?php
                                        $url = "http://localhost/Worldnews/webservices/api/get_all_tags.php";
                                        $new = curl_init($url);
                                        curl_setopt($new, CURLOPT_RETURNTRANSFER, true);
                                        $response = curl_exec($new);

                                        $result = json_decode($response, true);
                                        foreach ($result as $key => $value) :
                                        ?>
                                            <div class="form-check-inline form-check col-md-3">
                                                <div class="checkbox">
                                                    <label for="tag_id[]" class="form-check-label ">
                                                        <input type="checkbox" id=<?php echo $value['id'] ?> name="tag_id[]" value=<?php echo $value['id'] ?> class="form-check-input"><?php echo $value['content'] ?>
                                                    </label>
                                                </div>

                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="card-footer row d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Add
                                    </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="reset" class="btn btn-danger btn-sm">
                                        <i class="fa fa-ban"></i> Reset
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('common/subfix.php') ?>