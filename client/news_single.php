<?php include('components/common/header.php') ?>

  <body>
    <div class="container-scroller">
      <div class="main-panel">
        <!-- partial:partials/_navbar.html -->
        <?php include('components/common/navbar.php')?>

        <!-- partial -->


  <section class="ftco-section ftco-degree-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 ftco-animate">

          <?php include('components/news.php') ?>

          <div class="tag-widget post-tag-container mb-5 mt-5">
            <?php include('components/tags_of_news.php') ?>
          </div>


          <!-- Creat comment form -->
          <div class="pt-2 mt-2">
            <h4 class="mb-2" style="color: #098e6f;">Comments</h4>
            <ul class="comment-list">
              <?php include('components/comment.php') ?>
            </ul>
            <?php include('components/show_comment_form.php') ?>
        </div> <!-- .col-md-8 -->

        <div class="col-lg-4 sidebar pl-lg-5 ftco-animate">
          <?php include('components/news-single-side-bar.php') ?>
        </div>

      </div>
    </div>
  </section> <!-- .section -->

  <footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">

          <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>
              document.write(new Date().getFullYear());
            </script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>
      </div>
    </div>
  </footer>

<?php include('components/common/footer.php') ?>

</html>
