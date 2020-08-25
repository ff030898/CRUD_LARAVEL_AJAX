<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="slick, flat, dashboard, bootstrap, admin, template, theme, responsive, fluid, retina">
    <link rel="shortcut icon" href="javascript:;" type="image/png">

    <title>Admin</title>

    <!--right slidebar-->
    <link href="css/slidebars.css" rel="stylesheet">

    <!--switchery-->
    <link href="js/switchery/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />

    <!--Data Table-->
    <link href="js/data-table/css/jquery.dataTables.css" rel="stylesheet">
    <link href="js/data-table/css/dataTables.tableTools.css" rel="stylesheet">
    <link href="js/data-table/css/dataTables.colVis.min.css" rel="stylesheet">
    <link href="js/data-table/css/dataTables.responsive.css" rel="stylesheet">
    <link href="js/data-table/css/dataTables.scroller.css" rel="stylesheet">
    <!-- Base Styles -->

    <!--common style-->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <style>
        #pic {
            display: none;
        }

        .newbtn {
            margin: 0;
        }

        #blah {
            max-width: 160px;
            height: 170px;
            margin: 0;
            padding: 0;

        }

        
    </style>




</head>

<body class="sticky-header">

    <section>
        <!-- sidebar left start-->
        <div class="sidebar-left">
            <!--responsive view logo start-->
            <div class="logo dark-logo-bg visible-xs-* visible-sm-*">
                <a href="{{ route('admin') }}">
                    <img src="img/logo-icon.png" alt="">
                    <!--<i class="fa fa-maxcdn"></i>-->
                    <span class="brand-name">SlickLab</span>
                </a>
            </div>
            <!--responsive view logo end-->

            <div class="sidebar-left-info">
                <!-- visible small devices start-->

                <!-- visible small devices end-->

                <!--sidebar nav start-->
                <ul class="nav nav-pills nav-stacked side-navigation">
                    <li>
                        <h3 class="navigation-title">Navigation</h3>
                    </li>
                    <li class="active"><a href="{{ route('admin') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>


                </ul>
                <!--sidebar nav end-->



            </div>
        </div>
        <!-- sidebar left end-->

        <!-- body content start-->
        <div class="body-content" style="min-height: 1000px;">

            <!-- header section start-->
            <div class="header-section">

                <!--logo and logo icon start-->
                <div class="logo dark-logo-bg hidden-xs hidden-sm">
                    <a href="{{ route('admin') }}">
                        <img src="img/logo-icon.png" alt="">
                        <!--<i class="fa fa-maxcdn"></i>-->
                        <span class="brand-name">SlickLab</span>
                    </a>
                </div>

                <div class="icon-logo dark-logo-bg hidden-xs hidden-sm">
                    <a href="{{ route('admin') }}">
                        <img src="img/logo-icon.png" alt="">
                        <!--<i class="fa fa-maxcdn"></i>-->
                    </a>
                </div>
                <!--logo and logo icon end-->

                <!--toggle button start-->
                <a class="toggle-btn"><i class="fa fa-outdent"></i></a>
                <!--toggle button end-->


                <div class="notification-wrap">


                <!--right notification start-->
                <div class="right-notification">
                    <ul class="notification-menu">


                        <li>
                            <a href="#" class="btn btn-default dropdown-toggle" id="user_profile" data-toggle="dropdown">
                            
                            @if(file_exists( $user->avatar ))
                                <img src="{{($user->avatar)}}" alt="">{{ Auth::user()->name }}
                            @else
                                <img src="/img/avatar-mini.jpg" alt="">{{ Auth::user()->name }}
                            @endif
                            

                            <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu purple pull-right">
                                <li><a href="{{ route('profile') }}"> Profile </a></li>
                                <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
                <!--right notification end-->
                </div>

            </div>
            <!-- header section end-->

            <!-- page head start-->
            <div class="page-head">
                <h3 class="m-b-less">
                    Profile
                </h3>

            </div>
            <!-- page head end-->

            <br>

      
                <div class="alert" id="message" style="display: none; margin: 10px;"></div>
                <br>
                <form method="post" id="upload_form" enctype="multipart/form-data">

             {{ csrf_field() }}

                    <div class="form-row" style="margin-top: 15px">

                        <div class="form-group col-md-12">
                        <input type="file" name="avatar" id="avatar" onchange="readURL(this);"/>
                        <br></br>
                        <div class="form-group col-md-12" style="float: left; ">

                        <label class="newbtn">
    
                        <img id="blah" src="http://placehold.it/120x120" alt="">
                       
                        </label>
                        </div>
                        </br>
                       
                        </div>
                        <div class="form-group col-md-12">
                        <label for="inputEmail4">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$user->name }}" placeholder="Email" required>
                        </div>

                        <div class="form-group col-md-12">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" placeholder="Email" required>
                        </div>


                    </div>

                    <button type="submit" class="btn btn-primary " id="upload" name="upload" style="float: right; margin-right: 1%;">Salvar Alterações</button>


            </form>

            <br />
            
            <!--footer section start-->
            <footer>
                2020 &copy; SlickLab by VectorLab.
            </footer>
            <!--footer section end-->



        </div>
        <!-- body content end-->
    </section>



<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery-migrate.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>

<!--Nice Scroll-->
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>

<!--right slidebar-->
<script src="js/slidebars.min.js"></script>

<!--switchery-->
<script src="js/switchery/switchery.min.js"></script>
<script src="js/switchery/switchery-init.js"></script>

<!--Sparkline Chart-->
<script src="js/sparkline/jquery.sparkline.js"></script>
<script src="js/sparkline/sparkline-init.js"></script>
<!--common scripts for all pages-->
<!--common scripts for all pages-->
<script src="js/scripts.js"></script>


    <script>
    $('.newbtn').bind("click", function() {
        $('#pic').click();
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#blah')
            .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
        }
    }
    </script>


<script>
$(document).ready(function(){

 $('#upload_form').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"{{ route('ajaxupload.action', ['id' => $user->id]) }}",
   method:"POST",
   data:new FormData(this),
   dataType:'JSON',
   contentType: false,
   cache: false,
   processData: false,
   success:function(data)
   {
    $('#message').css('display', 'block');
    $('#message').html(data.message);
    $('#message').addClass(data.class_name);
    $('.newbtn').html(data.uploaded_image);
    $('#user_profile').html(data.img_profile);
   }
  })
 });

});
</script>

</body>
</html>
