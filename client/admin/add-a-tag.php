<?php include('common/prefix.php') ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row ml-5">
                <div class="col-lg-10 offset-lg-1">
                    <div class="card">
                        <div class="card-header">
                            <strong>Add</strong> A Tag
                            <span>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-right" style="margin-left: auto;">
                                        <a href="/worldnews/client/admin/list-tags.php"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                                <i class="fa fa-columns"></i>view all tags</button></a>
                                    </div>
                                </div>
                            </span>
                        </div>
                        <div class="card-body card-block">
                            <form action="../components/create_a_tag.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="id" class=" form-control-label">Id</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input name="id" id="id" rows="2" placeholder="Please skip this field!" class="form-control" disabled></input>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="tag_name" class=" form-control-label">Tag name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input name="tag_name" id="tag_name" placeholder="Tag name" class="form-control" required></input>
                                    </div>
                                </div>

                                <div class="card-footer row d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Add
                                    </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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