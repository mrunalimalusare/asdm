<?php include(APPPATH.'views/login-view/common-files/header.php'); ?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
      <form >
        <div class="input-group mb-3">
          <input type="text" id="full_name" class="form-control" placeholder="User Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" id="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-center">
            <button type="button" id="forget_pass_form" class="btn btn-primary btn-block">Request new password</button>
            <div class="spinner-border" id="loader" style="display:none"></div>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="<?php echo base_url('login'); ?>">Login</a>
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
    $('#forget_pass_form').click(function(){
      var full_name = $('#full_name').val();
      var email = $('#email').val();
      if(full_name!='' && email!=''){
        $('#forget_pass_form').hide();
        $('#loader').css('display','show')
        $.ajax({
          type: "post",
          url: "<?php echo base_url('forgetpass-api');?>",
          data: {
            full_name:full_name,
            email:email
          },
          success: function (response) {
            if(response=='success'){
              alert('Email Send Success...');
              $('#forget_pass_form').show();
              $('#loader').css('display','none')
            }
            if(response=='error'){
              alert('Please Check Username and Password....');
            }
          }
        });
      }else{
        alert('Please Enter All Fields....')
      }
    });
  });
</script>