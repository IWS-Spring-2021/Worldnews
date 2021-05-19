<?php
$url = "http://localhost/Worldnews/webservices/api/get_list_cats.php";
$new = curl_init($url);
curl_setopt($new, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($new);

$result = json_decode($response, true);
?>

<?php
$manage_name = "Categories" ;
include('common/prefix.php') ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 offset-2">
                <?php 
                $btn_add = "Add a category";
                $file_controller = "add-a-cat.php";

                    include('common/sub-header.php') ?>
                    <div class="table-responsive table-responsive-data2">
                        <?php

                        if (isset($_GET['message'])) { ?>

                            <p style="color: green; font-size: 24px; font-weight: 600;"><?php echo $_GET['message'] ?>
                            <p>
                            <?php }
                            ?>

                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </th>
                                        <th>id</th>
                                        <th>Category name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($result as $key => $value) :
                                    ?>
                                        <tr class="tr-shadow">
                                            <td>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </td>
                                            <td><?php echo $value['id'] ?></td>
                                            <td><?php echo $value['cat_name'] ?></td>
                                            <td>
                                            <div class="table-data-feature">
                                                <a href="/worldnews/client/admin/cat-details.php?id=<?php echo $value['id'] ?>">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                                        <i class="zmdi zmdi-info"></i>
                                                    </button></a>&nbsp;
                                                <a href="/worldnews/client/admin/edit-cat.php?id=<?php echo $value['id'] ?> ">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </button></a>&nbsp;
                                                <button id="delete" class="item" data-toggle="modal" data-target="#modal<?php echo $value['id'] ?>">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>


                                        </td>
                                        </tr>
                                        <?php
                                        $target_action = "Delete";
                                        $target_id = $value['id'];
                                        $confirm_message = "Confirm deleting the cat id " . $target_id . " ?";

                                        $file_controller = "components/delete_a_cat.php";
                                        include('../components/common/modal.php');
                                        ?>
                                     
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                    </div>
                    <!-- END DATA TABLE -->

                </div>
            </div>
        </div>
    </div>
</div>

<?php include('common/subfix.php') ?>