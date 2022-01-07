<div class="limiter">
  <div class="container-login100" style="background-image: url('./assets/images/bg-01.jpg');">
    <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
      <img class="mb-5 w-100" src="./assets/images/logo.png" alt="">
        <div class="wrap-input100 validate-input m-b-23" data-validate = "Mail address is required">
          <span class="label-input100">Mail Address</span>
          <input class="input100" id="mail" type="text" name="mail" placeholder="Type your mail address">
          <span class="focus-input100" data-symbol=""></span>
        </div>
        <div class="wrap-input100 validate-input" data-validate="Password is required">
          <span class="label-input100">Password</span>
          <input class="input100" id="pass" type="password" name="pass" placeholder="Type your password">
          <span class="focus-input100" data-symbol="&#xf190;"></span>
          <button class="unmask" type="button"  title="Press this icon to show/hide password"><i class="fas fa-eye"></i></button>
        </div>
        <div class="text-right p-t-8 p-b-31">
          <a href="#">
            Forgot password?
          </a>
        </div>
        <div class="container-login100-form-btn">
          <div class="wrap-login100-form-btn">
            <div class="login100-form-bgbtn"></div>
            <button class="login100-form-btn" id="login">
              Login
            </button>
          </div>
        </div>
        <div class="flex-col-c mt-5">
          <a href="./register.php" class="txt2">
            <b>Sign Up</b>
          </a>
        </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).on('click', "#login", function(){
    var mail      = $('#mail').val();
    var pass      = $('#pass').val();
    if((mail != "") && (pass != "")){
      $.ajax({
        url: "<?php echo "./functions/login.php";?>",
        type: "POST",
        data: {mail:mail, pass:pass},
        success: function(dataResult){
          var dataResult = JSON.parse(dataResult);
          if(dataResult.statusCode==200){
            iziToast.success({
                title: 'Logging into the system.Please wait',
                message: '',
                position : "topCenter"
              });
              setTimeout(function()
             {
               window.location= "panel.php";
             }, 2000);
          }
          else if(dataResult.statusCode==201){
            iziToast.error({
            title: "Wrong email or password.",
            message: '',
            position : "topCenter"
          });
          }
        }
      });
    }else {
        iziToast.info({
          title: "Please fill the required places.",
          message: '',
          position : "topCenter"
      });
    }
  });
</script>
