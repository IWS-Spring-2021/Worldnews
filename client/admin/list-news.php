<?php
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
$url = "http://localhost/Worldnews/webservices/api/get_list_news.php?page=$page";
$new = curl_init($url);
curl_setopt($new, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($new);

$result = json_decode($response, true);
$total_page = $result[0]['total_page'];
?>

<?php 
$manage_name = "News" ;
include('common/prefix.php') ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <?php 
                $btn_add = "Add a news";
                $file_controller = "add-a-news.php";

                    include('common/sub-header.php') ?>
                    <div class="table-responsive table-responsive-data2">
                        <?php 
                        
                        if(isset($_GET['message'])){?>

                            <p style="color: green; font-size: 24px; font-weight: 600;"><?php echo $_GET['message'] ?><p>
                        <?php }
                         ?>

                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <!-- <th>
                                        <label class="au-checkbox">
                                            <input type="checkbox">
                                            <span class="au-checkmark"></span>
                                        </label>
                                    </th> -->
                                    <th>id</th>
                                    <th>title</th>
                                    <th>short introduction</th>
                                    <th>content</th>
                                    <th>created_date</th>
                                    <th>picture</th>
                                    <th>author</th>
                                    <th>category</th>
                                    <th>tag name</th>
                                    <th>actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result as $key => $value) :
                                ?>
                                    <tr class="tr-shadow">
                                        <!-- <td>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </td> -->
                                        <td><?php echo $value['id'] ?></td>
                                        <td>
                                            <span class="block-email"><?php echo $value['title'] ?></span>
                                        </td>
                                        <td class="desc"><?php echo str_split($value['short_intro'], 100)[0];
                                                            echo '...' ?></td>
                                        <td rows="5"><?php echo str_split($value['content'], 100)[0];
                                                        echo '...' ?></td>
                                        <td>
                                            <span class="status--process"><?php echo $value['created_date'] ?></span>
                                        </td>
                                        <td><?php echo $value['pic'] ?></td>
                                        <td><?php echo $value['author'] ?></td>
                                        <td><?php echo $value['category'] ?></td>
                                        <td>
                                            <?php
                                            $id = $value['id'];
                                            $urlT = "http://localhost/Worldnews/webservices/api/get_all_tags_by_news.php?id=$id";
                                            $tag = curl_init($urlT);
                                            curl_setopt($tag, CURLOPT_RETURNTRANSFER, true);
                                            $responseT = curl_exec($tag);

                                            $resultT = json_decode($responseT, true);
                                            foreach ($resultT as $keyT => $valueT) :
                                            ?>

                                                <?php echo $valueT['tag_name'] ?><br>
                                            <?php endforeach; ?>
                                        </td>

                                        <td>
                                            <div class="table-data-feature">
                                                <a href="/worldnews/client/admin/news-details.php?id=<?php echo $value['id'] ?>">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Details">
                                                        <i class="zmdi zmdi-info"></i>
                                                    </button></a>&nbsp;
                                                <a href="/worldnews/client/admin/edit-news.php?id=<?php echo $value['id'] ?> ">
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
                                    $confirm_message = "Confirm deleting the News id " . $target_id . " ?";

                                    $file_controller = "components/delete_a_news.php";
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

<div class="row mt-5">
    <div class="col text-center">
        <div class="block-27">
            <?php
            $range = 5;
            $pagelimit = ($range - 1) / 2;
            $pagemax = $range;
            if ($total_page <= $range) {
                $pagemax = $total_page;
                $pagemin = 1;
            } else {
                if ($page - $pagelimit <= 1) {
                    $pagemin = 1;
                } else {
                    if ($page + $pagelimit <= $total_page) {
                        $pagemin = $page - $pagelimit;
                        $pagemax = $page + $pagelimit;
                    } else {
                        $pagemin = $total_page - $range + 1;
                        $pagemax = $total_page;
                    }
                }
            }
            ?>
            <ul>
                <li class="first-btn"><a href="list-news.php?page=1" style="border: none; <?php if (($page <= 1) || ($total_page <= $range)) echo 'display: none;' ?>">&lt; &lt;</a></li>
                <li class="prev-btn" <?php if ($page == $pagemin) echo 'style = "display: none;"' ?>><a href="list-news.php?page=<?php echo ($page - 1); ?>">&lt;</a></li>
                <?php if ($pagemin != 1) {
                    echo '<li><a href=# style="border: none;">. . .</a></li>';
                } ?>
                <?php for ($i = $pagemin; $i <= $pagemax; $i++) { ?>
                    <li <?php if ($page == $i) echo "class='active'"; ?>>
                        <a href="list-news.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php } ?>
                <?php if ($pagemax != $total_page) {
                    echo '<li><a href=# style="border: none;">. . .</a></li>';
                } ?>
                <li class="next-btn" <?php if ($page >= $pagemax) echo 'style = "display: none;"' ?>><a href="list-news.php?page=<?php echo ($page + 1); ?>">&gt;</a></li>
                <li class="last-btn"><a href="list-news.php?page=<?php echo $total_page; ?>" style="border: none; <?php if (($page >= $total_page) || ($total_page <= $range)) echo 'display: none;' ?>">&gt; &gt;</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- <script>
    const btn_delete = document.querySelector('#delete');
    btn_delete.addEventListener('click', () => {
        alert('Delete?')
    })
</script> -->

<?php include('common/subfix.php') ?>