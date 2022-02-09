<?php
session_start();
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://www.macodeid.com/">

    <title>MY Portfolio Website PHP</title>

    <link rel="shortcut icon" href="fontend/assets/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="fontend/assets/css/themify-icons.css">

    <link rel="stylesheet" type="text/css" href="fontend/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fontend/assets/css/bootstrap.css">
    <link rel="stylesheet" href="fontend/assets/css/fontawesome.css">


    <link rel="stylesheet" type="text/css" href="fontend/assets/vendor/animate/animate.css">


    <link rel="stylesheet" type="text/css" href="fontend/assets/vendor/owl-carousel/owl.carousel.css">

    <link rel="stylesheet" type="text/css" href="fontend/assets/vendor/perfect-scrollbar/css/perfect-scrollbar.css">

    <link rel="stylesheet" type="text/css" href="fontend/assets/vendor/nice-select/css/nice-select.css">

    <link rel="stylesheet" type="text/css" href="fontend/assets/vendor/fancybox/css/jquery.fancybox.min.css">

    <link rel="stylesheet" type="text/css" href="fontend/assets/css/virtual.css">

    <link rel="stylesheet" type="text/css" href="fontend/assets/css/topbar.virtual.css">
</head>

<body class="theme-red">

    <!-- Back to top button -->
    <div class="btn-back_to_top">
        <span class="ti-arrow-up"></span>
    </div>

    <!-- Setting button -->
    <div class="config">
        <div class="template-config">
            <!-- Settings -->
            <div class="d-block">
                <button class="btn btn-fab btn-sm" id="sideel" title="Settings"><span class="ti-settings"></span></button>
            </div>
            <!-- Puschase -->
            <div class="d-block">
                <a href="#" class="btn btn-fab btn-sm" title="Download CV" data-toggle="tooltip" data-placement="left"><span class="ti-download"></span></a>
            </div>
            <!-- Help -->
            <!-- <div class="d-block">
                <a href="#" class="btn btn-fab btn-sm" title="Help" data-toggle="tooltip" data-placement="left"><span class="ti-help"></span></a>
            </div> -->
        </div>
        <div class="set-menu">
            <p>Select Color</p>
            <div class="color-bar" data-toggle="selected">
                <span class="color-item bg-theme-red selected" data-class="theme-red"></span>
                <span class="color-item bg-theme-blue" data-class="theme-blue"></span>
                <span class="color-item bg-theme-green" data-class="theme-green"></span>
                <span class="color-item bg-theme-orange" data-class="theme-orange"></span>
                <span class="color-item bg-theme-purple" data-class="theme-purple"></span>
            </div>
            <!-- <select class="custom-select d-block my-2" id="change-page">
                <option value="">Choose Page</option> 
            <option value="index">Topbar</option>
            <option value="blog-topbar">Blog (Topbar)</option>
            <option value="index-2">Minibar</option>
            <option value="blog-minibar">Blog (Minibar)</option>
            </select> -->
        </div>
    </div>
    <?php
    include('config.php');

    $get_query_banner = "SELECT * FROM banners WHERE active_sts=1";
    $banner_from_db = mysqli_query($db_conect, $get_query_banner);
    $after_assoc_banner = mysqli_fetch_assoc($banner_from_db);
    // print_r($after_assoc_banner);
    // echo $after_assoc_banner;

    ?>

    <div class="vg-page page-home" id="home" style="background-image: url(<?= $after_assoc_banner['image_location'] ?>)">
        <!-- Navbar -->
        <div class="navbar navbar-expand-lg navbar-dark sticky" data-offset="500">
            <div class="container">
                <a href="" class="navbar-brand">V-Folio</a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#main-navbar" aria-expanded="true">
                    <span class="ti-menu"></span>
                </button>
                <div class="collapse navbar-collapse" id="main-navbar">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a href="#home" class="nav-link" data-animate="scrolling">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#about" class="nav-link" data-animate="scrolling">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="#portfolio" class="nav-link" data-animate="scrolling">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a href="#service" class="nav-link" data-animate="scrolling">Service</a>
                        </li>
                        <li class="nav-item">
                            <a href="#contact" class="nav-link" data-animate="scrolling">Contact</a>
                        </li>
                    </ul>
                    <ul class="nav ml-auto">
                        <li class="nav-item">
                            <button class="btn btn-fab btn-theme no-shadow">En</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div> <!-- End Navbar -->
        <!-- Caption header -->

        <div class="caption-header text-center wow zoomInDown">

            <h5 class="fw-normal"><?= $after_assoc_banner['banner_sub_title'] ?></h5>
            <h1 class="fw-light mb-4"><?= $after_assoc_banner['banner_title_one'] ?><b class="fg-theme"><?= $after_assoc_banner['banner_title_two'] ?></b></h1>
            <div class="badge"><?= $after_assoc_banner['banner_detail'] ?></div>
        </div> <!-- End Caption header -->
        <div class="floating-button"><span class="ti-mouse"></span></div>
    </div>

    <div class="vg-page page-about" id="about">
        <div class="container py-5">
            <div class="row">
                <?php
                $get_query_about = "SELECT * FROM abouts WHERE active_sts=1 LIMIT 1";
                $about_from_db = mysqli_query($db_conect, $get_query_about);
                $after_assoc_about = mysqli_fetch_assoc($about_from_db);

                ?>
                <div class="col-lg-4 py-3">
                    <div class="img-place wow fadeInUp">
                        <img src="<?= $after_assoc_about['image_location'] ?>" alt="">
                    </div>
                </div>

                <div class="col-lg-6 offset-lg-1 wow fadeInRight">
                    <h1 class="fw-light text-capitalize "><?= $after_assoc_about['name'] ?></h1>
                    <h5 class="fg-theme mb-3 text-capitalize "><?= $after_assoc_about['designation'] ?></h5>
                    <p class="text-muted "><?= $after_assoc_about['detail'] ?></p>
                    <ul class="theme-list text-capitalize ">
                        <li><b>From:</b> <?= $after_assoc_about['from'] ?></li>
                        <li><b>Lives In: </b><?= $after_assoc_about['live_in'] ?></li>
                        <li><b>Age:</b> <?= $after_assoc_about['age'] ?></li>
                        <li><b>Gender:</b> <?= $after_assoc_about['gender'] ?></li>
                    </ul>
                    <a href="<?= $after_assoc_about['button_link'] ?>" class="btn btn-theme-outline text-capitalize"><?= $after_assoc_about['button'] ?></a>
                </div>
            </div>
        </div>
        <div class="container py-5">
            <h1 class="text-center fw-normal wow fadeIn">My Skills</h1>
            <div class="row py-3">
                <div class="col-md-6">
                    <div class="px-lg-3">

                        <?php
                        $get_query = "SELECT * FROM coding_skills WHERE active_sts=1";
                        $db_from = mysqli_query($db_conect, $get_query);
                        // $coding_skill = mysqli_fetch_assoc($db_from);
                        ?>
                        <h4 class="wow fadeInUp">Coding Skills</h4>
                        <?php
                        foreach ($db_from as $coding_skill) :
                        ?>
                            <div class="progress-wrapper wow fadeInUp">
                                <span class="caption"><?= $coding_skill['skill_caption'] ?></span>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: <?= $coding_skill['progress_percent'] ?>%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><?= $coding_skill['progress_percent'] ?>%</div>
                                </div>
                            </div>
                        <?php
                        endforeach
                        ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="px-lg-3">
                        <?php
                        $get_query = "SELECT * FROM design_skills WHERE active_sts=1";
                        $db_from = mysqli_query($db_conect, $get_query);
                        // $after_assoc = mysqli_fetch_assoc($db_from);
                        ?>
                        <h4 class="wow fadeInUp">Design skills</h4>
                        <?php
                        foreach ($db_from as $after_assoc) :
                        ?>
                            <div class="progress-wrapper wow fadeInUp">
                                <span class="caption"><?= $after_assoc['skill_caption'] ?></span>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: <?= $after_assoc['progress_percent'] ?>%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><?= $after_assoc['progress_percent'] ?>%</div>
                                </div>
                            </div>
                        <?php
                        endforeach ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-6 wow fadeInRight">
                    <h2 class="fw-normal">Education</h2>

                    <ul class="timeline mt-4 pr-md-5">
                        <?php
                        $get_query = "SELECT * FROM educations WHERE active_sts=1";
                        $db_from = mysqli_query($db_conect, $get_query);
                        foreach ($db_from as $education) :
                        ?>
                            <li>
                                <div class="title"><?= $education['title'] ?></div>
                                <div class="details">
                                    <h5><?= $education['heading'] ?></h5>
                                    <small class="fg-theme"><?= $education['sub_heading'] ?></small>
                                    <p><?= $education['detail'] ?></p>
                                </div>
                            </li>
                            <!-- <li>
                            <div class="title">2009</div>
                            <div class="details">
                                <h5>Specialize of course</h5>
                                <small class="fg-theme">University of Study</small>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered</p>
                            </div>
                        </li>
                        <li>
                            <div class="title">2008</div>
                            <div class="details">
                                <h5>Specialize of course</h5>
                                <small class="fg-theme">University of Study</small>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered</p>
                            </div>
                        </li> -->
                        <?php
                        endforeach
                        ?>
                    </ul>

                </div>
                <div class="col-md-6 wow fadeInRight" data-wow-delay="200ms">
                    <h2 class="fw-normal">Experience</h2>
                    <ul class="timeline mt-4 pr-md-5">
                        <?php
                        $get_query = "SELECT * FROM experiences WHERE active_sts=1";
                        $db_from = mysqli_query($db_conect, $get_query);
                        foreach ($db_from as $education) :
                        ?>

                            <li>
                                <div class="title"><?= $education['title'] ?></div>
                                <div class="details">
                                    <h5><?= $education['heading'] ?></h5>
                                    <small class="fg-theme"><?= $education['sub_heading'] ?></small>
                                    <p><?= $education['detail'] ?></p>
                                </div>
                            </li>
                            <!-- <li>
                            <div class="title">2009</div>
                            <div class="details">
                                <h5>Specialize of course</h5>
                                <small class="fg-theme">University of Study</small>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered</p>
                            </div>
                        </li>
                        <li>
                            <div class="title">2008</div>
                            <div class="details">
                                <h5>Specialize of course</h5>
                                <small class="fg-theme">University of Study</small>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered</p>
                            </div>
                        </li> -->

                        <?php
                        endforeach
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="vg-page page-service" id="service">
        <div class="container">
            <div class="text-center wow fadeInUp">
                <div class="badge badge-subhead">Service</div>
            </div>
            <h1 class="fw-normal text-center wow fadeInUp">What can i do?</h1>
            <div class="row mt-5">
                <?php
                $get_query = "SELECT * FROM services WHERE active_sts=1 LIMIT 4";
                $db_from = mysqli_query($db_conect, $get_query);
                foreach ($db_from as $service) :
                ?>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="card card-service wow fadeInUp">

                            <div class="icon">
                                <span class="fa <?= $service['social_icon_search'] ?>"></span>

                                <!-- <i class=" <?= $service['social_icon_search'] ?>"></i> -->
                            </div>
                            <div class="caption">
                                <h4 class="fg-theme"><?= $service['heading'] ?></h4>
                                <p><?= $service['sub_heading'] ?></p>
                            </div>
                        </div>

                    </div>
                <?php
                endforeach
                ?>
                <!-- <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card card-service wow fadeInUp">
                        <div class="icon">
                            <span class="ti-search"></span>
                        </div>
                        <div class="caption">
                            <h4 class="fg-theme">SEO</h4>
                            <p>There are many variations of passages of Lorem Ipsum available</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card card-service wow fadeInUp">
                        <div class="icon">
                            <span class="ti-vector"></span>
                        </div>
                        <div class="caption">
                            <h4 class="fg-theme">UI/UX Design</h4>
                            <p>There are many variations of passages of Lorem Ipsum available</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card card-service wow fadeInUp">
                        <div class="icon">
                            <span class="ti-desktop"></span>
                        </div>
                        <div class="caption">
                            <h4 class="fg-theme">Web Development</h4>
                            <p>There are many variations of passages of Lorem Ipsum available</p>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    <div class="vg-page page-funfact" style="background-image: url(fontend/assets/img/bg_banner.jpg);">
        <div class="container">
            <div class="row section-counter">
                <?php
                $get_query = "SELECT * FROM funfact_items WHERE active_sts=1  ORDER BY id DESC LIMIT 4;";
                $db_query_result = mysqli_query($db_conect, $get_query);
                // $after_assoc = mysqli_fetch_assoc($db_query_result);
                ?>
                <?php
                foreach ($db_query_result  as $funfact_items) :

                ?>
                    <!-- <div class="col-md-6">
                        <div class="count-area-content">
                            <div class="count-digit"><?= $funfact_items['funfact_counter'] ?></div>
                            <div class="count-title"><?= $funfact_items['white_head'] ?></div>
                        </div>
                    </div> -->
                    <div class="col-md-6 col-lg-3 py-4 wow fadeIn">
                        <h1 class="number" data-number="<?= $funfact_items['funfact_counter'] ?>"><?= $funfact_items['funfact_counter'] ?></h1>
                        <span><?= $funfact_items['white_head'] ?></span>
                    </div>
                <?php
                endforeach
                ?>
                <!-- <div class="col-md-6 col-lg-3 py-4 wow fadeIn">
                    <h1 class="number" data-number="768">768</h1>
                    <span>Clients</span>
                </div>
                <div class="col-md-6 col-lg-3 py-4 wow fadeIn">
                    <h1 class="number" data-number="230">230</h1>
                    <span>Project Compleate</span>
                </div>
                <div class="col-md-6 col-lg-3 py-4 wow fadeIn">
                    <h1 class="number" data-number="97">97</h1>
                    <span>Project Ongoing</span>
                </div>
                <div class="col-md-6 col-lg-3 py-4 wow fadeIn">
                    <h1 class="number" data-number="699">699</h1>
                    <span>Client Satisfaction</span>
                </div> -->
            </div>
        </div>
    </div>

    <!-- Portfolio page -->
    <div class="vg-page page-portfolio" id="portfolio">
        <div class="container">
            <div class="text-center wow fadeInUp">
                <div class="badge badge-subhead">Portfolio</div>
            </div>
            <h1 class="text-center fw-normal wow fadeInUp">See my work</h1>
            <div class="filterable-button py-3 wow fadeInUp" data-toggle="selected">
                <button class="btn btn-theme-outline selected" data-filter="*">All</button>
                <?php
                $get_query = "SELECT * FROM portfolio_head_one WHERE active_sts=2";
                $db_from = mysqli_query($db_conect, $get_query);
                $after_assoc = mysqli_fetch_assoc($db_from);
                ?>
                <button class="btn btn-theme-outline text-capitalize" data-filter=".portfolio_one"><?= $after_assoc['portfolio_head'] ?></button>
                <button class="btn btn-theme-outline" data-filter=".template">Development</button>
                <!-- <button class="btn btn-theme-outline" data-filter=".ios">IOS</button>
                <button class="btn btn-theme-outline" data-filter=".ui-ux">UI/UX</button> -->
                <!-- <button class="btn btn-theme-outline" data-filter=".graphic">Graphic</button> -->
                <!-- <button class="btn btn-theme-outline" data-filter=".wireframes">Wireframes</button> -->
            </div>

            <div class="gridder my-3">
                <?php
                $get_query = "SELECT * FROM portfolio_one WHERE active_sts=1";
                $db_from = mysqli_query($db_conect, $get_query);
                foreach ($db_from as $portfolio_one) :
                ?>
                    <div class="grid-item portfolio_one wow zoomIn">
                        <div class="img-place" data-src="<?= $portfolio_one['image_location'] ?>" data-fancybox data-caption="<h5 class='fg-theme'>Mobile Travel App</h5> <p>Travel, Discovery</p>">
                            <img src="<?= $portfolio_one['image_location'] ?>" alt="">
                            <div class="img-caption">
                                <h5 class="fg-theme"><?= $portfolio_one['heading'] ?></h5>
                                <p><?= $portfolio_one['sub_head'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>

                <?php
                $get_query = "SELECT * FROM portfolio_one WHERE active_sts=1";
                $db_from = mysqli_query($db_conect, $get_query);
                foreach ($db_from as $portfolio_one) :
                ?>
                    <div class="grid-item template wow zoomIn">
                        <div class="img-place" data-src="<?= $portfolio_one['image_location'] ?>" data-fancybox data-caption="<h5 class='fg-theme'>Mobile Travel App</h5> <p>Travel, Discovery</p>">
                            <img src="<?= $portfolio_one['image_location'] ?>" alt="">
                            <div class="img-caption">
                                <h5 class="fg-theme"><?= $portfolio_one['heading'] ?></h5>
                                <p><?= $portfolio_one['sub_head'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>

                <!-- <?php
                        $get_query = "SELECT * FROM portfolio_one WHERE active_sts=1";
                        $db_from = mysqli_query($db_conect, $get_query);
                        foreach ($db_from as $portfolio_one) :
                        ?>
                    <div class="grid-item graphic wow zoomIn">
                        <div class="img-place" data-src="<?= $portfolio_one['image_location'] ?>" data-fancybox data-caption="<h5 class='fg-theme'>Mobile Travel App</h5> <p>Travel, Discovery</p>">
                            <img src="<?= $portfolio_one['image_location'] ?>" alt="">
                            <div class="img-caption">
                                <h5 class="fg-theme"><?= $portfolio_one['heading'] ?></h5>
                                <p><?= $portfolio_one['sub_head'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?> -->
                <!-- <div class="grid-item template wireframes wow zoomIn">
                    <div class="img-place" data-src="fontend/assets/img/work/work-2.jpg" data-fancybox data-caption="<h5 class='fg-theme'>Music App</h5> <p>Musics</p>">
                        <img src="fontend/assets/img/work/work-2.jpg" alt="">
                        <div class="img-caption">
                            <h5 class="fg-theme">Music App</h5>
                            <p>Musics</p>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="grid-item apps ios wow zoomIn">
                    <div class="img-place" data-src="fontend/assets/img/work/work-3.jpg" data-fancybox data-caption="<h5 class='fg-theme'>Gaming Dashboard</h5> <p>Games, Streaming</p>">
                        <img src="fontend/assets/img/work/work-3.jpg" alt="">
                        <div class="img-caption">
                            <h5 class="fg-theme">Gaming Dashboard</h5>
                            <p>Games, Streaming</p>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="grid-item graphic ui-ux wow zoomIn">
                    <div class="img-place" data-src="fontend/assets/img/work/work-4.jpg" data-fancybox data-caption="<h5 class='fg-theme'>Drugs Delivery App</h5> <p>Health, Drugs</p>">
                        <img src="fontend/assets/img/work/work-4.jpg" alt="">
                        <div class="img-caption">
                            <h5 class="fg-theme">Drugs Delivery App</h5>
                            <p>Health, Drugs</p>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="grid-item apps ios wow zoomIn">
                    <div class="img-place" data-src="fontend/assets/img/work/work-5.jpg" data-fancybox data-caption="<h5 class='fg-theme'>Musics Discover</h5> <p>Musics, Dashboard</p>">
                        <img src="fontend/assets/img/work/work-5.jpg" alt="">
                        <div class="img-caption">
                            <h5 class="fg-theme">Musics Discover</h5>
                            <p>Musics, Dashboard</p>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="grid-item graphic ui-ux wireframes wow zoomIn">
                    <div class="img-place" data-src="fontend/assets/img/work/work-6.jpg" data-fancybox data-caption="<h5 class='fg-theme'>Game Streaming</h5> <p>Games, Streaming</p>">
                        <img src="fontend/assets/img/work/work-6.jpg" alt="">
                        <div class="img-caption">
                            <h5 class="fg-theme">Game Streaming</h5>
                            <p>Games, Streaming</p>
                        </div>
                    </div>
                </div> -->
            </div> <!-- End gridder -->
            <div class="text-center wow fadeInUp">
                <a href="javascript:void(0)" class="btn btn-theme">Load More</a>
            </div>
        </div>
    </div> <!-- End Portfolio page -->

    <!-- Testimonial -->
    <div class="vg-page page-testimonial">
        <div class="container">
            <h1 class="text-center fw-normal wow fadeInUp">What Clients are Saying</h1>
            <div class="row justify-content-center mt-5 wow fadeInUp">
                <div class="col-md-9">
                    <div class="owl-carousel testi-carousel">
                        <?php
                        $get_query = "SELECT * FROM testimonial_items WHERE active_sts=1";
                        $db_from = mysqli_query($db_conect, $get_query);
                        foreach ($db_from as $testimonials) :
                        ?>
                            <div class="item">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="img-place">
                                            <img src="<?= $testimonials['image_location'] ?>" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="caption">
                                            <div class="testi-content"><?= $testimonials['detail'] ?></div>
                                            <div class="testi-info">
                                                <div class="thumb-profile">
                                                    <img src="<?= $testimonials['image_location'] ?>" alt="">
                                                </div>
                                                <div class="tagline">
                                                    <h5 class="mb-0"><?= $testimonials['name'] ?></h5>
                                                    <span class="text-muted"><?= $testimonials['degination'] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endforeach

                        ?>
                        <!-- <div class="item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="img-place">
                                        <img src="fontend/assets/img/testimonials/testimonials_2.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="caption">
                                        <div class="testi-content">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe natus expedita ab facilis ut, animi explicabo amet. Voluptatibus possimus iste enim, doloremque, fugiat accusamus nisi optio fugit ratione expedita harum?</div>
                                        <div class="testi-info">
                                            <div class="thumb-profile">
                                                <img src="fontend/assets/img/testimonials/testimonials_2.jpg" alt="">
                                            </div>
                                            <div class="tagline">
                                                <h5 class="mb-0">Selena Arrini</h5>
                                                <span class="text-muted">CEO BigTree</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End testimonial -->

    <!-- Client -->
    <!-- <div class="vg-page page-client">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4 col-xl-3 item">
                    <div class="img-place wow fadeInUp">
                        <img src="fontend/assets/img/logo/company_1.svg" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 item">
                    <div class="img-place wow fadeInUp">
                        <img src="fontend/assets/img/logo/company_2.svg" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 item">
                    <div class="img-place wow fadeInUp">
                        <img src="fontend/assets/img/logo/company_3.svg" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 item">
                    <div class="img-place wow fadeInUp">
                        <img src="fontend/assets/img/logo/company_4.svg" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 col-xl-3 item">
                    <div class="img-place wow fadeInUp">
                        <img src="fontend/assets/img/logo/company_5.svg" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 item">
                    <div class="img-place wow fadeInUp">
                        <img src="fontend/assets/img/logo/company_6.svg" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 item">
                    <div class="img-place wow fadeInUp">
                        <img src="fontend/assets/img/logo/company_7.svg" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 item">
                    <div class="img-place wow fadeInUp">
                        <img src="fontend/assets/img/logo/company_8.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>  -->
    <!-- End client -->

    <!-- Blog -->
    <!-- <div class="vg-page page-blog" id="blog">
        <div class="container">
            <div class="text-center">
                <div class="badge badge-subhead wow fadeInUp">Blog</div>
            </div>
            <h1 class="text-center fw-normal wow fadeInUp">Latest Post</h1>
            <div class="row post-grid">
                <div class="col-md-6 col-lg-4 wow fadeInUp">
                    <div class="card">
                        <div class="img-place">
                            <img src="fontend/assets/img/work/work-9.jpg" alt="">
                        </div>
                        <div class="caption">
                            <a href="javascript:void(0)" class="post-category">Technology</a>
                            <a href="#" class="post-title">Invision design forward fund</a>
                            <span class="post-date"><span class="sr-only">Published on</span> May 22, 2018</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp">
                    <div class="card">
                        <div class="img-place">
                            <img src="fontend/assets/img/work/work-6.jpg" alt="">
                        </div>
                        <div class="caption">
                            <a href="javascript:void(0)" class="post-category">Business</a>
                            <a href="#" class="post-title">Announcing a plan for small teams</a>
                            <span class="post-date"><span class="sr-only">Published on</span> May 22, 2018</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp">
                    <div class="card">
                        <div class="img-place">
                            <img src="fontend/assets/img/work/work-1.jpg" alt="">
                        </div>
                        <div class="caption">
                            <a href="javascript:void(0)" class="post-category">Design</a>
                            <a href="#" class="post-title">5 basic tips for illustrating</a>
                            <span class="post-date"><span class="sr-only">Published on</span> May 22, 2018</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center py-3 wow fadeInUp">
                    <a href="blog-fullbar.html" class="btn btn-theme">See All Post</a>
                </div>
            </div>
        </div>
    </div> -->
    <!-- End blog -->

    <!-- Contact -->
    <div class="vg-page page-contact" id="contact">
        <div class="container-fluid">
            <div class="text-center wow fadeInUp">
                <div class="badge badge-subhead">Contact</div>
            </div>
            <h1 class="text-center fw-normal wow fadeInUp">Get in touch</h1>
            <div class="row py-5">
                <!-- <div class="col-lg-7 px-0 pr-lg-3 wow zoomIn">
                    <div class="vg-maps">
                        <div id="google-maps" style="width: 100%; height: 100%;"></div>
                    </div>
                </div> -->
                <!-- <div class="col-lg-12"> -->
                <form class="vg-contact-form" action="guest_message_post.php" method="post">
                    <div class="form-row">
                        <div class="col-12 mt-3 wow fadeInUp">
                            <input class="form-control" type="text" name="guest_name" placeholder="Your Name" required>
                        </div>
                        <div class="col-6 mt-3 wow fadeInUp">
                            <input class="form-control" type="email" name="guest_email" placeholder="Email Address" pattern="[^ @]*@[^ @]*" required>
                        </div>
                        <div class="col-6 mt-3 wow fadeInUp">
                            <input class="form-control" type="text" name="guest_subject" placeholder="Subject" required>
                        </div>
                        <div class="col-12 mt-3 wow fadeInUp">
                            <textarea class="form-control" required name="guest_message" rows="6" placeholder="Enter message here.."></textarea>
                        </div>
                        <button type="submit" class="btn btn-theme mt-3 wow fadeInUp ml-1">Send Message</button>
                    </div>
                </form>
                <!-- </div> -->
            </div>
        </div>
    </div> <!-- End Contact -->

    <!-- Footer -->
    <div class="vg-footer">
        <h1 class="text-center">Virtual Folio</h1>
        <div class="container-fluid text-white mt-5 py-1 px-sm-1 px-md-5 py-3">
            <div class="container text-center py-5">

                <?php
                $get_query = "SELECT * FROM social_medias WHERE active_sts=1";
                $db_from_icon = mysqli_query($db_conect, $get_query);
                ?>
                <?php foreach ($db_from_icon as $icon) : ?>


                    <!-- <?= $icon['social_icon'] ?>; -->
                    <!-- <i class="fa fab fa-facebook"></i> -->

                    <a href="<?= $icon['social_url'] ?>" target="_blank"><i class="fa <?= $icon['social_icon'] ?>" style="font-size: 30px;padding:5px;color: #EF3724;"></i></a>

                <?php endforeach ?>
                <div class="d-flex justify-content-center mb-3">
                    <a class="text-white" href="#">Privacy</a>
                    <span class="px-3">|</span>
                    <a class="text-white" href="#">Terms</a>
                    <span class="px-3">|</span>
                    <a class="text-white" href="#">FAQs</a>
                    <span class="px-3">|</span>
                    <a class="text-white" href="#">Help</a>
                </div>
                <p class="text-center mb-0 mt-4">Copyright &copy;2022. All right reserved | This Site Devloped <span class="ti-heart fg-theme-red"></span> by <a href="#">Zubair IT</a></p>
            </div>
        </div>
        <!-- <div class="container">
            <div class="row">

                <div class="col-lg-4 py-3">
                    <div class="footer-info">
                        <p>Where to find me</p>
                        <hr class="divider">
                        <p class="fs-large fg-white">1600 Amphitheatre Parkway Mountain View, California 94043 US</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 py-3">
                    <div class="float-lg-right">
                        <p>Follow me</p>
                        <hr class="divider">
                        <ul class="list-unstyled">
                            <li><a href="#">Instagram</a></li>
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Youtube</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 py-3">
                    <div class="float-lg-right">
                        <p>Contact me</p>
                        <hr class="divider">
                        <ul class="list-unstyled">
                            <li>info@virtual.com</li>
                            <li>+8890234</li>
                            <li>+813023</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <!-- <div class="col-12 mb-3">
                    <h3 class="fw-normal text-center">Subscribe</h3>
                </div>
                <div class="col-lg-6">
                    <form class="mb-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Email address">
                            <input type="submit" class="btn btn-theme no-shadow" value="Subscribe">
                        </div>
                    </form>
                </div> -->
        <!-- <div class="col-12">
            <p class="text-center mb-0 mt-4">Copyright &copy;2020. All right reserved | This template is made with <span class="ti-heart fg-theme-red"></span> by <a href="https://www.macodeid.com/">MACode ID</a></p>
        </div> -->

    </div> <!-- End footer -->


    <script src="fontend/assets/js/jquery-3.5.1.min.js"></script>

    <script src="fontend/assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/6dd50d7ba6.js"></script>

    <script src="fontend/assets/vendor/owl-carousel/owl.carousel.min.js"></script>

    <script src="fontend/assets/vendor/perfect-scrollbar/js/perfect-scrollbar.js"></script>

    <script src="fontend/assets/vendor/isotope/isotope.pkgd.min.js"></script>

    <script src="fontend/assets/vendor/nice-select/js/jquery.nice-select.min.js"></script>

    <script src="fontend/assets/vendor/fancybox/js/jquery.fancybox.min.js"></script>

    <script src="fontend/assets/vendor/wow/wow.min.js"></script>

    <script src="fontend/assets/vendor/animateNumber/jquery.animateNumber.min.js"></script>

    <script src="fontend/assets/vendor/waypoints/jquery.waypoints.min.js"></script>

    <script src="fontend/assets/js/google-maps.js"></script>

    <script src="fontend/assets/js/topbar-virtual.js"></script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script>

</body>

</html>