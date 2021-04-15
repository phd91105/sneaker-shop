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

                               <input type="text" name="namepro" placeholder="What do yo u need?">
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
                   <div id="wowslider-container1">
                       <div class="ws_images">
                           <ul>
                               <li><img src="img/banner/sneaker1.jpg" alt="slide 01" title="slide 01" id="wows1_0" /></li>
                               <li><img src="img/banner/sneaker2.jpg" alt="slide 02" title="slide 02" id="wows1_1" /></li>
                               <li><img src="img/banner/sneaker3.jpg" alt="slide 03" title="slide 03" id="wows1_2" /></li>
                               <li><img src="img/banner/sneaker4.jpg" alt="slide 04" title="slide 04" id="wows1_3" /></li>
                           </ul>
                       </div>
                   </div>
                   <!-- <div class="carousel slide" id="slider" data-ride="carousel">
                       <ol class="carousel-indicators">
                           <li class="active" data-target="#slider" data-slide-to="0"></li>
                           <li data-target="#slider" data-slide-to="1"></li>
                           <li data-target="#slider" data-slide-to="2"></li>
                           <li data-target="#slider" data-slide-to="3"></li>
                       </ol>

                       <div class="carousel-inner">
                           <div class="item active" id="slide1">
                               <div class="carousel-caption">
                                   <h4>VẬN CHUYỂN TOÀN QUỐC</h4>
                                   <p>Tất cả đơn hàng</p>
                               </div>
                           </div>

                           <div class="item active" id="slide2">
                               <div class="carousel-caption">
                                   <h4>MIỄN PHÍ VỆ SINH</h4>
                                   <p>Miễn phí vệ sinh trọng đời tất cả các sản phẩm</p>
                               </div>
                           </div>

                           <div class="item active" id="slide3">
                               <div class="carousel-caption">
                                   <h4>CHÍNH SÁCH ĐỔI TRẢ</h4>
                                   <p>Hỗ trợ đổi mẫu tròng vòng 1 tuần</p>
                               </div>
                           </div>

                           <div class="item active" id="slide4">
                               <div class="carousel-caption">
                                   <h4>DỊCH VỤ HỖ TRỢ</h4>
                                   <p>0123456789</p>
                               </div>
                           </div>
                       </div>
                       <a class="left carousel-control" href="#slider" data-slide="prev" role="button"><span class="icon-prev"></span></a>
                       <a class="right carousel-control" href="#slider" data-slide="next" role="button"><span class="icon-next"></span></a>
                   </div> -->

               </div>
           </div>
       </div>
   </section>
   <!-- Hero Section End -->

   <!-- Categories Section Begin -->

   <!-- Categories Section End -->

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