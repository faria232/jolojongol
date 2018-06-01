
<?php wp_head();?>


<body>

<?php get_header();?>


    <div class="container-fluid">

      <div class="blog-header">
        <img class="slide-image" src="<?php bloginfo('stylesheet_directory'); ?>/assets/slider1.jpg" >
      </div>




          <div class="booking-header">
              <h1> Booking : <a class="text" href="tel: +88 01885 00 7777"> +88 01885 00 7777</a></h1>

          </div>

          <div id="chhuti-calendar" class="">

          </div>


<!--        <div class="price">-->
<!---->
<!--            --><?php
//            $args= array ('post_type' => 'packages');
//            $query = new WP_Query($args);
//            while ($query->have_posts()) : $query -> the_post();
//            ?>
<!---->
<!--        </div>-->
<!--     <div class="list">-->
<!--         <h2>--><?php //the_title(); ?><!--</h2>-->
<!---->
<!---->
<!--     </div>-->

        <div class="pricing">
            <div class="row">
                <div class="col-md-1"></div>

                <div class="price-box col-md-3">
                    <img class="price-image img-responsive" src="<?php bloginfo('stylesheet_directory');?>/assets/Breakfast+Lunch.jpg">
                    <div class="padding-10">
                    <h4>BREAKFAST + LUNCH</h4>
                    <hr>
                    <table class=" alignleft" border="0">
                        <tbody>
                        <tr style="text-align: left;">
                            <td>Adult</td>
                            <td class="bdt">BDT</td>
                            <td class="price">1500</td>
                        </tr>
                        <tr style="text-align: left;">
                            <td>Children</td>
                            <td class="bdt">BDT</td>
                            <td class="price">  750</td>
                        </tr>
                        <tr style="text-align: left;">
                            <td>Driver/ Assistant</td>
                            <td class="bdt">BDT</td>
                            <td class="price">  750</td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="price-box col-md-3">
                    <img class="price-image img-responsive" src="<?php bloginfo('stylesheet_directory');?>/assets/Breakfast+Lunch+Dinner.jpg">
                    <div class="padding-10">
                    <h4>BREAKFAST + LUNCH + DINNER</h4>

                    <hr>

                    <table class=" alignleft" border="0">
                        <tbody>
                        <tr>
                            <td>Adult</td>
                            <td class="bdt">BDT</td>
                            <td class="price">2800</td>
                        </tr>
                        <tr>
                            <td>Children</td>
                            <td class="bdt">BDT</td>
                            <td class="price">1400</td>
                        </tr>
                        <tr>
                            <td>Driver/ Assistant</td>
                            <td class="bdt">BDT</td>
                            <td class="price">1400</td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>

                <div class="price-box col-md-3">
                    <img class="price-image img-responsive" src="<?php bloginfo('stylesheet_directory'); ?>/assets/Lunch+Dinner.jpg">
                    <div class="padding-10">
                    <h4>LUNCH + DINNER</h4>
                        <hr>
                    <table class=" alignleft" border="0">
                        <tbody>
                        <tr>
                            <td>Adult</td>
                            <td class="bdt">BDT</td>
                            <td class="price">2400</td>
                        </tr>
                        <tr>
                            <td>Children</td>
                            <td class="bdt">BDT</td>
                            <td class="price">1200</td>
                        </tr>
                        <tr>
                            <td>Driver/ Assistant</td>
                            <td class="bdt">BDT</td>
                            <td class="price">1200</td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>



            <div class="row">
                <div class="col-md-1"></div>

                <div class="price-box col-md-3">
                    <img class="price-image img-responsive" src="<?php bloginfo('stylesheet_directory'); ?>/assets/Lunch.jpg">
                    <div class="padding-10">
                    <h4>LUNCH</h4>
                        <sub style="color: red; float: right; display: block; top: -22px; right: 12px;">(Not available right now)</sub>
                        <hr>

                    <table class=" alignleft" border="0">
                        <tbody>
                        <tr>
                            <td>Adult</td>
                            <td class="bdt">BDT</td>
                            <td class="price">900</td>
                        </tr>
                        <tr>
                            <td>Children</td>
                            <td class="bdt">BDT</td>
                            <td class="price">450</td>
                        </tr>
                        <tr>
                            <td>Driver/ Assistant</td>
                            <td class="bdt">BDT</td>
                            <td class="price">450</td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>

                <div class="price-box col-md-3">
                    <img class="price-image img-responsive" src="<?php bloginfo('stylesheet_directory'); ?>/assets/Dinner.jpg">
                    <div class="padding-10">
                    <h4>DINNER</h4>
                        <sub style="color: red; float: right; display: block; top: -22px; right: 12px;">(Not available right now)</sub>

                        <hr>
                    <table class=" alignleft" border="0">
                        <tbody>
                        <tr>
                            <td>Adult</td>
                            <td class="bdt">BDT</td>
                            <td class="price">1500</td>
                        </tr>
                        <tr>
                            <td>Children</td>
                            <td class="bdt">BDT</td>
                            <td class="price">  750</td>
                        </tr>
                        <tr>
                            <td>Driver/ Assistant</td>
                            <td class="bdt">BDT</td>
                            <td class="price">  750</td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="price-box col-md-3">
                    <img class="price-image img-responsive" src="<?php bloginfo('stylesheet_directory'); ?>/assets/Night Stay.jpg">
                    <div class="padding-10">
                    <h4>NIGHT STAY</h4>
                        <sub style="color: red; float: right; display: block; top: -22px; right: 12px;">(Not available right now)</sub>
                    <hr>

                    <table class=" alignleft" border="0">
                        <tbody>
                        <tr>
                            <td>Adult</td>
                            <td class="bdt">BDT</td>
                            <td class="price">4000</td>
                        </tr>
                        <tr>
                            <td>Children</td>
                            <td class="bdt">BDT</td>
                            <td class="price">2000</td>
                        </tr>
                        <tr>
                            <td>Driver/ Assistant</td>
                            <td class="bdt">BDT</td>
                            <td class="price">2000</td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
<!---->
<!--        --><?php
//        $args = [
//            'posts_per_page' => 10,
//            'post_type' => 'package',
//            'post_status' => 'publish',
//            'meta_key' => 'package_status',
//            'meta_value' => 'available'
//        ];
//        $packages = get_posts($args);
//
//        foreach ($packages as $package){
//            $post_title = $package -> post_title;
//            $post_url = get_permalink($packages-> ID);
//            echo '<div>';
//            echo '<a href="'.$post_url.'">'.$post_title.'</a>';
//            echo '<div>';
//        }
//        ?>




        <div class="gallery">
        <h1>GALLERY</h1>
            <div class="row gallery-main">
                <div class="column gallery-container">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/5154.jpg" style="width:100%">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/1923.jpg" style="width:100%">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/1890.jpg" style="width:100%">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/003.jpg" style="width:100%">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/9586.jpg" style="width:100%">

                </div>
                <div class="column gallery-container">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/3640.jpg" style="width:100%">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/21.jpg" style="width:100%">

                    <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/8713.jpg" style="width:100%">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/8669.jpg" style="width:100%">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/3486.jpg" style="width:100%">

                </div>
                <div class="column gallery-container">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/3948.jpg" style="width:100%">

                    <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/8272.jpg" style="width:100%">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/9453.jpg" style="width:100%">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/4852.jpg" style="width:100%">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/9.jpg" style="width:100%">

                </div>
                <div class="column gallery-container">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/1781.jpg" style="width:100%">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/1586.jpg" style="width:100%">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/5533.jpg" style="width:100%">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/7434.jpg" style="width:100%">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/5073.jpg" style="width:100%">


                </div>
            </div>


        </div>


        <div class="map">
            <h1 class="text-center">LOCATION</h1>
        <p align="center"> <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3646.1245638900587!2d90.454226!3d23.956035!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc668ed9f31cfc037!2sJol+O+Jongoler+Kabbo!5e0!3m2!1sen!2sbd!4v1521966089874"  height="600"  frameborder="0" style="border:0" allowfullscreen></iframe></p>
        </div>



        <?php get_footer(); ?>

    </div><!-- /.container -->




