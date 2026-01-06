<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP Rest server Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
                <!-- .panel-heading: -->
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <div id="success" style="display:none;"></div>
                            <div class="error" style="display:none;"></div>
                            <a href="#" class="active" id="login-form-link">Login</a>
                        </div>
                        
                        <div class="col-xs-6">
                            <a href="#" id="register-form-link">Register</a>
                        </div>
                    </div>
                    <hr>
                </div><!-- End of .panel-heading -->
                <!-- .panel-body: -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            
                            <!-- Login Form ========================================================================== -->
                            <form id="login-form" action="#" method="post" role="form" style="display: block;">

                                <div class="form-group">
                                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                                </div>

                                <div class="form-group">
                                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                </div>

                                <div class="form-group text-center">
                                    <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                    <label for="remember"> Remember Me</label>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="text-center">
                                                <a href="#" tabindex="5" class="forgot-password">Forgot Password?</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form> <!-- end of #login-form -->
                            <!-- ======================================================================================= -->
                            <?php
                            // For login submit:
                                session_start();

                                if(isset($_POST['login-submit'])){
                                
                                    require_once($_SERVER['DOCUMENT_ROOT'] . "/rest/server/config/config.php");

                                    $users = new Users();
                                    $users->userLogin();
                                }

                            ?>

                            <!-- Show the message from the success object: -->
                            <div id="success" style="display: none;"></div>
                            
                            <!-- Register Form ======================================================================= -->
                            <form id="register-form" action="#" method="post" role="form" style="display: none;">
                                <div class="form-group">
                                    <input type="text" name="username1" id="username1" tabindex="1" class="form-control" placeholder="Username" value="" >
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email1" id="email1" tabindex="1" class="form-control" placeholder="Email Address" value="" >
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password1" id="password1" tabindex="2" class="form-control" placeholder="Password" >
                                </div>
                                <div class="form-group">
                                    <input type="password" name="confirm-password1" id="confirm_password1" tabindex="2" class="form-control" placeholder="Confirm Password" >
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <!-- .reg -->
                                            <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register reg " value="Register Now">
                                        </div>
                                    </div>
                                </div>
                            </form> <!-- end of #register-form -->
                            <!-- ===================================================================================== -->

                        </div><!-- end of.col-lg-12 -->
                    </div><!-- end of .row -->
                </div><!-- end of .panel-body -->

            </div><!-- end of .panel panel-login -->
        </div><!-- end of .col-md-6 col-md-offset-3 -->

    </div><!-- end of first .row -->
</div><!-- end of .container -->


</body>
</html>

<script>

    //REGISTRATION:
    // Ajax request:
    $(document).ready(function () {
        $(".reg").click(function (e) {
    
            e.preventDefault(); // Don't refresh
    
            var username = $("#username1").val();
            var email = $("#email1").val();
            var password = $("#password1").val();
            var conf_pass = $("#confirm_password1").val();
            var action = "register";
    
            $.ajax({
                method:"POST",
                url: "classes/Users.php",
                data:{"action":action, "username":username, "email":email, "password":password, "conf_pass":conf_pass},
                // success object:
                success: function(data){
                    // append data:
                    $("#success").append(data.message).css("display","block");
                }
    
            });
        });
    });
    
    // JQUERY animation for login-register form:
    $(function() {
        $('#login-form-link').click(function(e) {
            $("#login-form").delay(100).fadeIn(100);
            $("#register-form").fadeOut(100);
            $('#register-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });
        
        $('#register-form-link').click(function(e) {
            $("#register-form").delay(100).fadeIn(100);
            $("#login-form").fadeOut(100);
            $('#login-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });
    
    });

</script>
