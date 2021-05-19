<?php include('components/common/header.php') ?>
<div class="container-scroller">
  <div class="main-panel">
    <!-- partial:partials/_navbar.html -->
    <?php include('components/common/navbar-without-search.php') ?>

    <!-- partial -->

    <section class="ftco-section ftco-no-pt ftco-no-pb">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-6 d-flex">
            <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-end" style="background-image:url(images/about/team.jpg);">
              <a href="https://www.youtube.com/watch?v=G7gHafQLJ0g" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
                <span   class="icon-play"></span>
              </a>
            </div>
          </div>
          <div class="col-md-6 pl-md-5 py-md-5">
            <div class="row justify-content-start pt-3 pb-3">
              <div class="col-md-12 heading-section ftco-animate">
                <span class="subheading">Welcome to World Times</span>
                <h2 class="mb-4">We give you the best news you want.</h2>
                <p>This is our final project in IWS Course, Spring 2021.</p>
                <div class="tabulation-2 mt-4">
                  <ul class="nav nav-pills nav-fill d-md-flex d-block">
                    <li class="nav-item mb-md-0 mb-2">
                      <a class="nav-link active py-2" data-toggle="tab" href="#home1">Our Mission</a>
                    </li>
                    <li class="nav-item px-lg-2 mb-md-0 mb-2">
                      <a  class="nav-link py-2" data-toggle="tab" href="#home2">Our Vision</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link py-2 mb-md-0 mb-2" data-toggle="tab" href="#home3">Licence</a>
                    </li>
                  </ul>
                  <div class="tab-content bg-light rounded mt-2">
                    <div class="tab-pane container p-0 active" id="home1">
                      <p>Make a website for displying news. User can read news, explore news by category, by tag and comment on the news.
                        Users can also leave a comment and edit latter.

                      </p>
                    </div>
                    <div class="tab-pane container p-0 fade" id="home2">
                      <p>Upgrade this web application for more complicated functions.</p>
                    </div>
                    <div class="tab-pane container p-0 fade" id="home3">
                      <p>Our team website is built and creatively based on an existing bootstrap online template from @Colorlib.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-3">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <span class="subheading">IWS - Spring 2021</span>
            <h2 class="mb-4">2C-Team with 4 Girls</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
              <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="text">
                    <div class="d-flex align-items-center">
                      <div class="user-img" style="background-image: url(images/about/phuong.jpg)"></div>
                      <div class="pl-3">
                        <p class="name">An Thi Phuong</p>
                        <span style="color: plum;" class="position">Leader, UI designer, Database Designer & Developer</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="text">
                    <div class="d-flex align-items-center">
                      <div class="user-img" style="background-image: url(images/about/anh.jpg)"></div>
                      <div class="pl-3">
                        <p class="name">Tran Thi Ngoc Anh</p>
                        <span style="color: plum;" class="position">Report, Database Designer & Developer</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="text">
                    <div class="d-flex align-items-center">
                      <div class="user-img" style="background-image: url(images/about/thuong.jpg)"></div>
                      <div class="pl-3">
                        <p class="name">Nguyen Thi Thuong</p>
                        <span style="color: plum;" class="position">UI Design, Database Designer & Developer</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="text">
                    <div class="d-flex align-items-center">
                      <div class="user-img" style="background-image: url(images/about/duong.jpg)"></div>
                      <div class="pl-3">
                        <p class="name">Tran Thi Thuy Duong</p>
                        <span style="color: plum;" class="position">UI Designer, Developer & Refactor</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>





    <?php include('components/common/loader.php') ?>
    <?php include('components/common/script-footer.php') ?>