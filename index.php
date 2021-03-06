   <?php

    include 'inc/header.php';

    ?>

   <section class="hero">
       <div class="container">
           <div class="row">
               <div class="col-lg-3">
                   <div class="hero__categories">
                       <div class="hero__categories__all">
                           <i class="fa fa-bars"></i>
                           <span>Thương hiệu</span>
                       </div>
                       <?php
                        $show = $brand->show_brand();
                        if ($show) {

                            while ($result = $show->fetch_assoc()) {


                        ?>
                               <ul>

                                   <li><a href="product.php?brandid=<?php echo $result['brandId'] ?>,&brandName=<?php echo $result['brandName'] ?>"><?php echo $result['brandName']; ?></a></li>

                               </ul>
                       <?php
                            }
                        }
                        ?>
                   </div>
               </div>
               <div class="col-lg-9">
                   <div class="hero__search">
                       <div class="hero__search__form">
                           <?php
                            ?>
                           <form action="product.php" method="GET">
                               <!-- <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div> -->

                               <input type="text" name="namepro" placeholder="Tìm kiếm ...">
                               <button type="" class="site-btn">SEARCH</button>

                           </form>
                       </div>
                       <div class="hero__search__phone">
                           <div class="hero__search__phone__icon">
                               <i class="fa fa-phone"></i>
                           </div>
                           <div class="hero__search__phone__text">
                               <h5>0123.456.789</h5>
                               <span>Hổ trợ 24/7 </span>
                           </div>
                       </div>
                   </div>
                   <!-- Start WOWSlider.com BODY section -->
                   <div id="wowslider-container1">
                       <div class="ws_images">
                           <ul>
                               <li><img src="data1/images/629656431388523.jpg" alt="629656431388523" title="629656431388523" id="wows1_0" /></li>
                               <li><img src="data1/images/219007695964179.jpg" alt="219007695964179" title="219007695964179" id="wows1_1" /></li>
                               <li><img src="data1/images/7801250539118200.jpg" alt="jquery image slider" title="7801250539118200" id="wows1_2" /></a></li>
                               <li><img src="data1/images/sneakerfeature.jpg" alt="sneakerfeature" title="sneakerfeature" id="wows1_3" /></li>
                           </ul>
                       </div>
                       <div class="ws_bullets">
                           <div>
                               <a href="#" title="629656431388523"><span><img src="data1/tooltips/629656431388523.jpg" alt="629656431388523" />1</span></a>
                               <a href="#" title="219007695964179"><span><img src="data1/tooltips/219007695964179.jpg" alt="219007695964179" />2</span></a>
                               <a href="#" title="7801250539118200"><span><img src="data1/tooltips/7801250539118200.jpg" alt="7801250539118200" />3</span></a>
                               <a href="#" title="sneakerfeature"><span><img src="data1/tooltips/sneakerfeature.jpg" alt="sneakerfeature" />4</span></a>
                           </div>
                       </div>
                       <div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net">css slideshow</a> by WOWSlider.com v9.0</div>
                       <div class="ws_shadow"></div>
                   </div>
                   <script type="text/javascript" src="engine1/wowslider.js"></script>
                   <script type="text/javascript" src="engine1/script.js"></script>
                   <!-- End WOWSlider.com BODY section -->
   </section>
   <!-- Featured Section Begin -->
   <section class="featured spad">
       <div class="container">
           <div class="row">
               <div class="col-lg-12">
                   <div class="section-title">
                       <h2>Sản phẩm nổi bật</h2>
                   </div>

               </div>
           </div>
           <div class="row featured__filter">
               <?php
                $get_ProductbyType = $pro->Get_ProductFeathered();
                if ($get_ProductbyType) {
                    while ($result = $get_ProductbyType->fetch_assoc()) {

                ?>
                       <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                           <div class="featured__item">
                               <div class="featured__item__pic set-bg" data-setbg="admin/uploads/<?php echo $result['image'] ?>">
                                   <ul class="featured__item__pic__hover">
                                       <!-- <li><a href="#"><i class="fa fa-heart"></i></a></li> -->
                                       <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                       <li><a href="details.php?proname=<?php echo $result['productName'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                   </ul>
                               </div>
                               <div class="featured__item__text">
                                   <h6><a href="details.php?proname=<?php echo $result['productName'] ?>"><?php echo $result['productName'] ?></a></h6>
                                   <h5><?php echo $fm->format_currency($result['price']) ?> VNĐ</h5>
                               </div>
                           </div>
                       </div>
               <?php
                    }
                }
                ?>

           </div>
       </div>
   </section>
   <section class="featured spad">
       <div class="container">
           <div class="row">
               <div class="col-lg-12">
                   <div class="section-title">
                       <h2>Sản phẩm mới</h2>
                   </div>
               </div>
           </div>
           <div class="row featured__filter">
               <?php
                $get_ProductbyType = $pro->get_ProductNew();
                if ($get_ProductbyType) {
                    while ($result = $get_ProductbyType->fetch_assoc()) {

                ?>
                       <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                           <div class="featured__item">
                               <div class="featured__item__pic set-bg" data-setbg="admin/uploads/<?php echo $result['image'] ?>">
                                   <ul class="featured__item__pic__hover">
                                       <li><a href="details.php?proname=<?php echo $result['productName'] ?>"><i class="fa fa-retweet"></i></a></li>
                                       <li><a href="details.php?proname=<?php echo $result['productName'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                   </ul>
                               </div>
                               <div class="featured__item__text">
                                   <h6><a href="details.php?proname=<?php echo $result['productName'] ?>"><?php echo $result['productName'] ?></a></h6>
                                   <h5><?php echo $fm->format_currency($result['price']) ?> VNĐ</h5>
                               </div>
                           </div>
                       </div>
               <?php
                    }
                }
                ?>

           </div>
       </div>
       <script type="text/javascript" src="js/wowslider.js"></script>

   </section>


   <?php include 'inc/footer.php'; ?>

   <!-- <style>
       #slider {
           margin-top: 40px;
       }

       #slider .item {
           height: 300px;
       }

       #slide1 {
           background: url('./img/banner/sneaker1.jpg') center no-repeat;
       }

       #slide2 {
           background: url('img/banner/sneaker2.jpg') center no-repeat;
       }

       #slide3 {
           background: url('img/banner/sneaker3.jpg') center no-repeat;
       }

       #slide4 {
           background: url('img/banner/sneaker4.jpg') center no-repeat;
       }

       .carousel-caption {
           font-size: 18px;
       }
   </style> -->