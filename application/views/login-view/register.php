<?php
defined('BASEPATH') OR exit('Permission not granted...');?>


<?php include(APPPATH.'views/login-view/common-files/header.php'); ?>

<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>Admin</b>LTE</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" id="full_name" class="form-control" placeholder="Full name">
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
        <div class="input-group mb-3">
          <input type="password" id="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="cpassword" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button id="reg_form_btn" type="button" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="<?php echo base_url('login'); ?>" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
<?php include(APPPATH.'views/login-view/common-files/footer.php'); ?>
<script>
    $(document).ready(function () {
        $('#reg_form_btn').click(function(){
            var fullname = $('#full_name').val().trim();
            var email = $('#email').val().trim();
            var password = $('#password').val().trim();
            var cpassword = $('#cpassword').val().trim();
            var agreeTerms = $('#agreeTerms').is(":checked");
            if(agreeTerms==true){
                if(fullname!='' && email!='' && password!='' && cpassword!=''){
                    if(password==cpassword){
                        $.ajax({
                            type: "post",
                            url: "<?php echo base_url('register-api'); ?>",
                            data: {
                                fullname:fullname,
                                email:email,
                                password:password
                            },
                            success: function (response) {
                                if(response=='success'){
                                    alert('Data Save Successfully...');
                                    $('#full_name').val('');
                                    $('#email').val('');
                                    $('#password').val('');
                                    $('#cpassword').val('')
                                    $('#agreeTerms').prop("checked",false);
                                }else{
                                    alert('Data Fail to Save...');
                                }
                            }
                        });
                    }else{
                        alert('Please Check Password and Confirm Password...');
                    }
                }else{
                    alert('Please Enter All Fields...');
                }
                // console.log('fullname--->'+fullname+'\n email-->'+email+'\npassword--->'+password+'\ncpassword--->'+cpassword+'\nagreetrems'+agreeTerms);
            }else{
                alert('Please Accept Terms and Condtions');
            }
        });
    });
</script>