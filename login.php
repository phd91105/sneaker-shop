<?php ob_start();
include 'inc/header.php';

?>

<?php
$check = Session::get('customer_login');
if (!isset($check)) {
  header('Location:login.php');
}
?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
  $loginCus = $user->Login_Customer($_POST);
}
?>


<section class="checkout spad">
  <div class="container">
    <div class="checkout__form">
      <h4>Đăng Nhập</h4>
      <center>
        <h3><?php if (isset($insert_Customer)) {
              echo $insert_Customer;
            } ?></h3>
      </center>
      <form action="" method="post">
        <div class="row">
          <div class="modal-body">
            <div class="checkout__input">
              <p>Tài khoản<span>*</span></p>
              <input type="text" name="username" placeholder="Enter Username">
            </div>
            <div class="checkout__input">
              <p> Mật khẩu<span>*</span></p>
              <input type="password" placeholder="Enter Password" name="password" required>
              <?php
              if (isset($loginCus)) {
                echo $loginCus;
              }
              ?>
            </div>
            <td>
              <center><button  style="width: 100%;" class="site-btn" type="submit" name="login">Login</button></center>
            </td>
          </div>

      </form>
    </div>
  </div>

</section>

<?php

include 'inc/footer.php';
ob_end_flush();
?>