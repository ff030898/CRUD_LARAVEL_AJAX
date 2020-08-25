<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Admin Template">
        <meta name="keywords" content="admin dashboard, admin, flat, flat ui, ui kit, app, web app, responsive">
        <link rel="shortcut icon" href="img/ico/favicon.png">
        <title>Login</title>

        <!-- Base Styles -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/style-responsive.css" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    </head>

    <body class="login-body">

        <div class="login-logo">
            <img src="img/login_logo.png" alt=""/>
        </div>

        <h2 class="form-heading">login</h2>
        <div class="container log-row">
            <form class="form-signin" id="form_login" method="post" >

                {{ csrf_field() }}

                <div class="login-wrap">

                    <div class="alert alert-danger" style="display: none;" id="message" role="alert">

                    </div>

                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" autofocus required>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    <button class="btn btn-lg btn-success btn-block" type="submit">LOGIN</button>

                </div>



            </form>
        </div>

        <script>
  $(document).ready(function () {

      $('#form_login').on('submit', function (event) {

          event.preventDefault();

          $.ajax({
              type: 'POST',
              url: "/login",
              dataType: 'json',
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              success: function (data) {
                  if (data.login === true) {
                      window.location.href = "{{route ('admin')}}";
                  } else {
                      $('#message').css('display', 'block');
                      $('#message').html(data.message);
                  }
              }
          });
          return false;


      });
  });
        </script>


        <!--jquery-1.10.2.min-->
        <script src="js/jquery-1.11.1.min.js"></script>
        <!--Bootstrap Js-->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jrespond..min.js.html"></script>

    </body>
</html>
