<?php ob_start();
include 'inc/header.php';
?>
<?php
$login = Session::get('customer_login');
if ($login == false) {
  header('Location:login.php');
}
?>
<?php
$username = session::get('customer_user');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
  $updateCus = $user->Update_Customer($_POST, $username);
}
?>

<section class="checkout spad">
  <div class="container">

    <div class="checkout__form">
      <h4>Thông tin khách hàng</h4>
      <center>
        <h3><?php if (isset($insert_Customer)) {
              echo $insert_Customer;
            } ?></h3>
      </center>
      <form>
        <?php

        $Get_User = $user->Get_User($username);
        if ($Get_User) {
          while ($result = mysqli_fetch_array($Get_User)) {

        ?>
            <div class="row">
              <div class="modal-body">

                <div class="checkout__input">
                  <p>Tài khoản<span>*</span></p>
                  <input type="text" name="username" placeholder="Enter Username" value="<?php echo $username; ?>">
                </div>
                <div class="checkout__input">
                  <p> Họ và tên<span>*</span></p>
                  <input type="text" name="name" placeholder="Enter Name" value="<?php echo $result['nameCus']; ?>">
                </div>
                <div class="checkout__input">
                  <p> Mật khẩu<span>*</span></p>
                  <input type="password" name="password" placeholder="Enter Password">
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="checkout__input">
                      <p>Số điện thoại<span>*</span></p>
                      <input type="text" name="phone" placeholder="Enter Phone" value="<?php echo $result['phone']; ?>">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="checkout__input">
                      <p>Email<span>*</span></p>
                      <input type="text" name="email" placeholder="Enter Email" value="<?php echo $result['emailCus']; ?>">
                    </div>
                  </div>

                </div>

                <div class="checkout__input">
                  <p>Địa chỉ<span>*</span></p>
                  <input type="text" name="address" placeholder="Enter Address" value="<?php echo $result['address']; ?>">
                </div>
                <center><button style="width: 100%;" type="submit" class="site-btn" name="register">UPDATE</button></center>
              </div>
          <?php
          }
        }
          ?>
      </form>
    </div>
  </div>

</section>


<style type="text/css" media="screen">
  input {
    width: 50%;
    text-align: center;
  }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php

include 'inc/footer.php';

ob_end_flush();
?>