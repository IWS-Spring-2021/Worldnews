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

    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">

                    <p>
                        Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0.
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template
                        is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0.
                    </p>
                </div>
            </div>
        </div>
    </footer>
<?php include('components/common/footer.php') ?>