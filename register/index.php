<div class="limiter">
  <div class="container-login100" style="background-image: url('./assets/images/bg-01.jpg');">
    <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
      <img class="mb-5 w-100" src="./assets/images/logo.png" alt="">
        <div class="wrap-input100 validate-input m-b-23" data-validate = "Name is required">
          <span class="label-input100">Name *</span>
          <input class="input100" id="name" type="text" name="name" placeholder="Type your name">
          <span class="focus-input100" data-symbol="&#xf206;"></span>
        </div>
        <div class="invalid-feedback" id="name-feedback" style="margin-top: -23px">
            Numbers and special characters are not allowed
        </div>
        <div class="wrap-input100 validate-input m-b-23" data-validate = "Surname address is required">
          <span class="label-input100">Surname *</span>
          <input class="input100" id="surname" type="text" name="surname" placeholder="Type your surname">
          <span class="focus-input100" data-symbol="&#xf206;"></span>
        </div>
        <div class="invalid-feedback" id="surname-feedback" style="margin-top: -23px">
            Numbers and special characters are not allowed
        </div>
        <div class="wrap-input100 validate-input m-b-23" data-validate = "Mail address is required">
          <span class="label-input100">Mail Address *</span>
          <input class="input100" id="email" type="email" name="email" placeholder="Type your mail address">
          <span class="focus-input100" data-symbol=""></span>
        </div>
        <div class="invalid-feedback" id="email-feedback" style="margin-top: -23px">
            Please, enter valid email address
        </div>
        <div class="wrap-input100 validate-input m-b-23" data-validate="Password is required">
          <span class="label-input100">Password *</span>
          <input class="input100" id="password" type="password" name="pass" placeholder="Type your password">
          <span class="focus-input100" data-symbol="&#xf190;"></span>
          <button class="unmask" type="button" title="Press this icon to show/hide password"><i class="fas fa-eye"></i></button>
        </div>
        <div class="invalid-feedback password-feedback">
        </div>
        <div class="wrap-input100 validate-input m-b-23" data-validate="Password is required">
          <span class="label-input100">Password *</span>
          <input class="input100" type="password" name="pass-check" placeholder="Type your password">
          <span class="focus-input100" data-symbol="&#xf190;"></span>
          <button class="unmask" type="button" title="Press this icon to show/hide password"><i class="fas fa-eye"></i></button>
        </div>
        <div class="invalid-feedback password-feedback">
            Password doesn't match
        </div>
        <div class="container-login100-form-btn mt-5">
          <div class="wrap-login100-form-btn">
            <div class="login100-form-bgbtn"></div>
            <button class="login100-form-btn" id="register" style="opacity:.5">
              Register
            </button>
          </div>
        </div>
        <div class="flex-col-c mt-5">
          <a href="./index.php" class="txt2">
            <b>Login</b>
          </a>
        </div>
    </div>
  </div>
</div>
<script>
  let isNonEmptyText
  let isCheckedCheckBox
  let isValid
  function validation() {
    let emptyCount = 0
    $('input').each(function() {
      const element = $(this);
      if (element.val() !== $('input#email').val()) {
        if (element.val().replace(/^\s+|\s+$/g, "").length == 0) {
          emptyCount = 1
        }
        if (emptyCount > 0) {
          isNonEmptyText = false;
        } else {
          isNonEmptyText = true
        }
      }
    })
    if ($('.invalid-feedback:visible').length > 0) {
      isValid = false
    } else {
      isValid = true
    }
    if ((isNonEmptyText != false) &&  (isValid != false)) {
      $('.login100-form-btn').css('opacity','1')
    } else {
      $('.login100-form-btn').css('opacity', '.5')
    }
  }
  $('input[name=name]').on('keydown keyup mousedown mouseup', function () {
    if ( (/(?=.*\d)/).test($(this).val()) || (/[^a-z0-9\s\-]+/ig).test($(this).val()) ) {
      $('#name-feedback').show()
    } else {
      $('#name-feedback').hide()
    }
    validation()
  })
  $('input[name=surname]').on('keydown keyup mousedown mouseup', function () {
    if ( (/(?=.*\d)/).test($(this).val()) || (/[^a-z0-9\s\-]+/ig).test($(this).val()) ) {
      $('#surname-feedback').show()
    } else {
      $('#surname-feedback').hide()
    }
    validation()
  })
  $('input[type=email]').on('focusout', function () {
    if ( !(/^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i).test($(this).val()) ) {
      $('#email-feedback').show()
    } else {
      $('#email-feedback').hide()
    }
    validation()
  })
  if ( (/^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i).test($('input[type=email]').val()) ) {
    $('#email-feedback').hide()
    validation()
  }
  $('input[type=password]').on('keydown keyup mousedown mouseup', function () {
    if ($('input[type=password]:first').val() != $('input[type=password]:last').val()) {
      $('.password-feedback:last').show();
    } else {
      $('.password-feedback:last').hide();
    }
    validation()
  })
  $('input[type=password]:first').on('keydown keyup mousedown mouseup', function () {
    if ($(this).val().length < 8) {
      $('.password-feedback:first').html('Invalid password. Please, enter at least 8 characters').show()
    } else if ( !(/(?=.*[A-Z])/).test($(this).val()) ) {
      $('.password-feedback:first').html('Invalid password. Please, enter at least one <span class="font-italic">uppercase</span> character').show()
    } else if ( !(/(?=.*\d)/).test($(this).val()) ) {
      $('.password-feedback:first').html('Invalid password. Please, enter at least one <span class="font-italic">number</span>').show()
    } else if ( !(/(?=[-+_!@#$%^&*.,?])/).test($(this).val()) ) {
      $('.password-feedback:first').html('Invalid password. Please, enter at least one <span class="font-italic">special</span> character').show()
    } else {
      $('.password-feedback:first').hide()
    }
    validation()
  })
  $(document).on('click', "#register", function(){
	var name       = $('#name').val();
	var surname    = $('#surname').val();
	var email      = $('#email').val();
	var password   = $('#password').val();
	if((name != "") && (surname != "") && (email != "") && (password != "") && (isNonEmptyText != false) &&  (isValid != false)){
		$.ajax({
			url: "<?php echo "./functions/register.php";?>",
			type: "POST",
			data: {name: name,surname:surname, email:email, password:password},
			success: function(dataResult){
				var dataResult = JSON.parse(dataResult);
				if(dataResult.statusCode==200){
					iziToast.success({
							title: 'Account created has successfully.You can login the system.',
							message: '',
							position : "topCenter"
						});
						setTimeout(function()
					 {
						 window.location= "index.php";
					 }, 2000);
				}
				else if(dataResult.statusCode==201){
					iziToast.error({
					title: "System error has occurred.Please try it again later.",
					message: '',
					position : "topCenter"
				});
				}
				else if(dataResult.statusCode==202){
					iziToast.info({
						title: "E-mail address already taken.",
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
