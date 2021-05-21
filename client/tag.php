<?php include('components/common/header.php') ?>
<?php include('components/common/navbar.php')?>
    <div class="container-scroller">
      <div class="main-panel">
        <!-- partial:partials/_navbar.html -->
        

        <!-- partial -->

    <?php
    $id = $_GET['id'];
    $url = "http://localhost/Worldnews/webservices/api/get_all_tags.php";

    $tag = curl_init($url);
    curl_setopt($tag, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($tag);

    $result = json_decode($response, true);
    ?>


    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 sidebar pl-lg-5 ftco-animate">
                    <?php include('components/all_tags.php') ?>
                </div>

                <div class="col-lg-9 ftco-animate">
                    <div class="col-md-12">
                        <?php include('components/news_by_tag.php') ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
<?php include('components/common/footer.php') ?>