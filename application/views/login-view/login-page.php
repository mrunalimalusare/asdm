<?php include(APPPATH.'views/login-view/common-files/header.php'); ?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <div id="error_alert"></div>
      <form  method="post">
        <div class="input-group mb-3">
          <input type="email" id="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="button" id="login_form_btn" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="<?php echo base_url('forget-password'); ?>">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="<?php echo base_url('register'); ?>" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<?php include(APPPATH.'views/login-view/common-files/footer.php'); ?>
<script>
  $(document).ready(function () {
    $('#login_form_btn').click(function(){
      var email = $('#email').val().trim();
      var password = $('#password').val().trim();
      if(email!='' && password!=''){
        $.ajax({
          type: "post",
          url: "<?php echo base_url('login-api'); ?>",
          data: {
            email:email,
            password:password
          },
          success: function (response) {
            if(response.status=='success'){
              window.location.href = response.redirect_url;
            }
            if(response.status=='block'){
              $('#error_alert').html('<div class="alert alert-warning">'+response.msg+'</div>');
            }
            if(response.status=='inactive'){
              $('#error_alert').html('<div class="alert alert-warning">'+response.msg+'</div>');
            }
            if(response.status=="error"){
              $('#error_alert').html('<div class="alert alert-danger">'+response.msg+'</div>');
            }
          }
        });
      }else{
        $('#error_alert').html('<div class="alert alert-danger">Please Enter Valid Email and Password...</div>');
      }
    });
  });

</script>








