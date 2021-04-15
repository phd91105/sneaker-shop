<?php
include 'inc/header.php';
?>
<?php
$bill = new bill();
$fm = new format();

?>
<?php

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $updatestt = $bill->update_Status(2, $id);
    header('Location: bill.php');
}
?>

<style>
    #customers {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        font-size: 16px;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 20px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 20px;
        padding-bottom: 22px;
        text-align: left;
        background-color: #303030;
        color: white;
    }
</style>
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Thương hiệu</span>
                    </div>
                    <ul>
                        <?php
                        $show = $brand->show_brand();
                        if ($show) {

                            while ($result = $show->fetch_assoc()) {
                        ?>
                                <li><a href="product.php?brandid=<?php echo $result['brandId'] ?>,&brandName=<?php echo $result['brandName'] ?>"><?php echo $result['brandName'] ?></a></li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="product.php" method="GET">
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
            </div>
        </div>
    </div>

    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Hóa đơn chi tiết</h4>
                <div class="row">
                    <table id="customers" width="100%">
                        <tr>
                            <th>ID</th>
                            <th>Ngày</th>
                            <th>Khách hàng</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Xem chi tiết</th>
                            <th>Thanh toán</th>
                        </tr>
                        <?php
                        $cus = session::get('customer_user');
                        $get_Bill_by_Customer = $bill->get_Bill_by_Customer($cus);
                        if ($get_Bill_by_Customer) {
                            while ($result = mysqli_fetch_array($get_Bill_by_Customer)) {


                        ?>
                                <tr>
                                    <td>#<?php echo $result['order_Id'] ?></td>
                                    <td><?php echo $fm->formatDate($result['date']) ?></td>
                                    <td><?php echo $result['receiver'] ?></td>
                                    <td><?php echo  $fm->format_currency($result['totalprice']) ?> VNĐ</td>
                                    <?php
                                    if ($result['status'] == 0) {
                                        echo '<td class="text-danger">Pedding</td>';
                                    } elseif ($result['status'] == 1) {
                                        echo '<td class="text-success">Shipping</td>';
                                    } elseif ($result['status'] == 2)
                                        echo '<td class="text-success">Success</td>';
                                    else
                                        echo '<td class="text-danger">Canncel</td>';
                                    ?>
                                    <td><a href="billdetails.php?idbill=<?php echo $result['order_Id']  ?>">Xem thông tin chi tiết</a></td>
                                    <td>
                                        <?php if($result['status'] == 2) {
                                            echo 'da thanh toan';
                                            } else { ?>
                                        <a href="https://api.phamduy.host/momo/checkout?amount=<?php echo $result['totalprice'] ?>&msg=<?php echo $result['order_Id']?>">MOMO</a>
                                        <a href="https://api.phamduy.host/vnpay/checkout?amount=<?php echo $result['totalprice'] ?>&orderInfo=<?php echo $result['order_Id']?>&orderType=1">VNPAY</a>
                                    <?php } ?>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <?php

    include 'inc/footer.php';

    ?>