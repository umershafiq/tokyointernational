<?php
require('user_header.inc.php');
?>
<!-- Start Slider Area -->
<div class="slider__container slider--one bg__cat--3">
    <div class="slide__container slider__activation__wrap owl-carousel">
        <!-- Start Single Slide -->
        <div class="single__slide animation__style01 slider__fixed--height">
            <div class="container">
                <div class="row align-items__center">
                    <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                        <div class="slide">
                            <div class="slider__inner">
                                <h2>Best Selling</h2>
                                <h1>Honda Fit</h1>
                                <div class="cr__btn">
                                    <a href="cart.html">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                        <div class="slide__thumb">
                            <img src="images/slider/fornt-img/honda_fit_2022_exterior-removebg-preview (1).png" alt="slider images">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Slide -->
        <!-- Start Single Slide -->
        <div class="single__slide animation__style01 slider__fixed--height">
            <div class="container">
                <div class="row align-items__center">
                    <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                        <div class="slide">
                            <div class="slider__inner">
                                <h2>collection 2018</h2>
                                <h1>NICE CHAIR</h1>
                                <div class="cr__btn">
                                    <a href="cart.html">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                        <div class="slide__thumb">
                            <img src="images/slider/fornt-img/2.png" alt="slider images">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Slide -->
    </div>
</div>

div.c

<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <ul>
                <li>price less than 5000</li>
                <li>price less than 10000</li>
            </ul>
        </div>
        <div class="col-lg-6"></div>
        <div class="col-lg-3"></div>

    </div>
</div>

<!-- Start Slider Area -->
<!-- Start New Arrivals Area -->
<section class="htc__category__area ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">New Arrivals</h2>
                    <p>But I must explain to you how all this mistaken idea</p>
                </div>
            </div>
        </div>
        <div class="htc__product__container">
            <div class="row">
                <div class="product__list clearfix mt--25">
                    <?php
                    $get_product = get_product($con, 8, '', '', '', '', '');
                    foreach ($get_product as $list) {

                    ?>
                        <!-- Start Single Category -->
                        <div class="col-md-3 col-lg-2 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb numbering">
                                    <a href="stock_details.php?id=<?php echo $list['id']; ?>">
                                        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $list['images']; ?>" alt="<?php echo $list['name'] . ' ' . $list['model'] . ' ' . $list['man_year']; ?>">
                                    </a>
                                </div>
                                <div class="fr__product__inner">
                                    <h4><?php echo $list['man_year'] . ' ' .  $list['name'] . ' ' . $list['model']; ?></h4>
                                    <ul class="fr__pro__prize">
                                        <li class="old__prize">$ <?php echo number_format($list['fob']); ?></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- End Single Category -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End New Arrival Area -->
<!-- Start Country/Brand Area -->
<section class="htc__category__area ptb--50 bg-danger">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">Popular Couuntires</h2>
                    <p>But I must explain to you how all this mistaken idea</p>
                </div>
            </div>
        </div>
        <div class="htc__product__container">
            <div class="row">
                <div class="product__list clearfix mt--25">
                    <?php
                    foreach ($brand_arr as $list) {
                    ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <a href="brand.php?id=<?php echo $list['id']  ?>">
                                <div class="numbering brand_border">
                                    <?php echo $list['name']  ?>
                                </div>
                            </a>

                        </div>

                    <?php
                    }
                    ?>

                    <!-- End Single Category -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Start Best Seller Area -->
<section class="htc__category__area ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">Best Sellers</h2>
                    <p>But I must explain to you how all this mistaken idea</p>
                </div>
            </div>
        </div>
        <div class="htc__product__container">
            <div class="row">
                <div class="product__list clearfix mt--25">
                    <?php
                    $get_product = get_product($con, 8, '', '', '', '', 'yes');
                    foreach ($get_product as $list) {

                    ?>
                        <!-- Start Single Category -->
                        <div class="col-md-3 col-lg-2 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb numbering">
                                    <a href="stock_details.php?id=<?php echo $list['id']; ?>">
                                        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $list['images']; ?>" alt="<?php echo $list['name'] . ' ' . $list['model'] . ' ' . $list['man_year']; ?>">
                                    </a>
                                </div>
                                <div class="fr__product__inner">
                                    <h4><?php echo $list['man_year'] . ' ' .  $list['name'] . ' ' . $list['model']; ?></h4>
                                    <ul class="fr__pro__prize">
                                        <li class="old__prize">$ <?php echo number_format($list['fob']); ?></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- End Single Category -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Product Area -->
<?php
require('user_footer.inc.php');
?>