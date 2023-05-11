$('.pass_open_eye').hide();
$('.cpass_open_eye').hide();
$('.alert-success').hide();
$('.alert-danger').hide();

$('#email').on('input',function(){
    var regex = /^([A-Za-z0-9_\-\.])+\@(vazecollege.net)$/;
    var email = $('#email').val();
    if (!regex.test(email)) {
        $('#emailVerify').text("Invalid email!").css("color", "red");
        $('#email').css("border-color","red");
    }
    else {
        $('#emailVerify').text("Valid email!").css("color", "green");
        $('#email').css("border-color","green");
    }
})
$('.pass_icon').on('click',function(){
    if('password' == $('#password').attr('type')){
        $('#password').prop('type', 'text');
        $('.pass_open_eye').show();
        $('.pass_close_eye').hide();

   }else{
        $('#password').prop('type', 'password');
        $('.pass_open_eye').hide();
        $('.pass_close_eye').show();
   }
})
$('.confirm_pass_icon').on('click',function(){
    if('password' == $('#confirm_password').attr('type')){
        $('#confirm_password').prop('type', 'text');
        $('.cpass_open_eye').show();
        $('.cpass_close_eye').hide();

   }else{
        $('#confirm_password').prop('type', 'password');
        $('.cpass_open_eye').hide();
        $('.cpass_close_eye').show();
   }
})
$('#password').on("input",function(){
    $password = $('#password').val();
    if($password.length >= 8){
        if(Boolean($password.match(/[A-Z]/))==true)
        {
            $('#pass_verify').text("Valid Password !").css("color", "green");
            $('#password').css("border-color","green");
        }
        else{
            $('#pass_verify').text("Password must contain a uppercase letter.").css("color", "red");
            $('#password').css("border-color","red");
        }
        
    }
    else{
        $('#pass_verify').text("Password must be more than 8 characters.").css("color", "red");
        $('#password').css("border-color","red");
    }
    
})

$('#confirm_password').on("input",function(){
    $password = $('#password').val();
    $confirm_password = $('#confirm_password').val();
    if($password==$confirm_password){
            $('#confirm_password_verify').text("Password matched with Password !").css("color", "green");
            $('#confirm_password').css("border-color","green");
    }
    else{
        $('#confirm_password_verify').text("Password not matched with Password !").css("color", "red");
            $('#confirm_password').css("border-color","red");
    }
})

function showSuccess(){
  $('.alert-success').show();
}
function showWarning(){
  $('.alert-danger').show();
}
$('#submit').on('click',function(e){
    $email =  $('#emailVerify').text();
    $password = $('#pass_verify').text();
    $confirm_password = $('#confirm_password_verify').text();
    if(($email=="Valid email!")&&($password=="Valid Password !")&&($confirm_password=="Password matched with Password !"))
    {
        $.ajax({
            type: 'post',
            url: 'myPageName.php',
            data: $('#myFormName').serialize(),
            success: function () {
             alert("Email has been sent!");
            }
          });
      e.preventDefault();
    }
})