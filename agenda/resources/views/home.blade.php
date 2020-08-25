<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Mosaddek">
        <meta name="keyword" content="slick, flat, dashboard, bootstrap, admin, template, theme, responsive, fluid, retina">
        <meta name="csrf-token" content="{{ csrf_token() }}">
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
        <script type="text/javascript" src="js/maskbrphone.js"></script>
        <script src="js/mascara.js"></script>

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
                                    <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">

                                        @if(file_exists( Auth::user()->avatar ))
                                        <img src="{{(Auth::user()->avatar)}}" alt="">{{ Auth::user()->name }}
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
                        Lista de Contatos
                    </h3>

                </div>
                <!-- page head end-->

                <!--body wrapper start-->
                <div class="wrapper">

                    <div class="row">
                        <div class="col-sm-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#cadastrarUsuario">ADICIONAR</button>
                                    <a href="{{route('relatorio')}}" target="_blank" class="btn btn-primary" type="button">Relatório</a>
                                    <a href="{{route('relatorio2')}}" target="_blank" class="btn btn-danger" type="button">Relatório2</a>

                                    @if(session('success'))
                                    <br>
                                    <br>
                                    <div class="alert alert-success" role="alert">
                                        {{session('success')}}
                                    </div>
                                    @endif


                                    @if(session('error'))
                                    <br>
                                    <br>
                                    <div class="alert alert-danger" role="alert">
                                        {{session('error')}}
                                    </div>
                                    @endif

                                </header>
                                <table class="table responsive-data-table data-table">
                                    <thead>
                                        <tr>
                                            <th>
                                                ID
                                            </th>
                                            <th>
                                                Nome
                                            </th>

                                            <th>
                                                Email
                                            </th>
                                            <th>
                                                Telefone(s)
                                            </th>

                                            <th class="hidden-xs"><i class="fa fa-cogs"></i> Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <!--COMEÇO DO SELECT-->
                                        @foreach($registros as $registro)

                                        <tr>
                                            <td>
                                                {{$registro->id}}
                                            </td>
                                            <td>
                                                {{$registro->name}}
                                            </td>

                                            <td>
                                                {{$registro->email}}
                                            </td>
                                            <td>
                                                @foreach($telefones as $telefone)
                                                @if($telefone->user_id === $registro->id)
                                                {{ $telefone->tel }} &nbsp;&nbsp;&nbsp;&nbsp;

                                                @endif
                                                @endforeach
                                            </td>

                                            <td class="hidden-xs">

                                                <button class="btn btn-warning btn-xs" type="button" data-toggle="modal"
                                                        data-target="#exampleModal{{$registro->id}}"
                                                        data-whatever="{{$registro->id}}"
                                                        data-whatevernome="{{$registro->name}}"
                                                        data-whateveremail="{{$registro->email}}" onclick='modal("{{$registro->id}}")'>
                                                    <i class="fa fa-pencil"></i>
                                                </button>


                                                @if($registro->id !== Auth::user()->id)
                                                <a href="{{ route('delete', ['id' => $registro->id]) }}" class="btn btn-danger btn-xs"
                                                   onClick="return confirm('Deseja mesmo apagar o usuario selecionado?')">
                                                    <i class="fa fa-trash-o "></i></button>

                                                    @endif
                                            </td>
                                        </tr>


                                    <div class="modal fade" id="exampleModal{{$registro->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title">Alterar Usuário</h4>
                                                </div>


                                                <div class="modal-body">

                                                    <div class="alert" id="message" style="display: none; margin: 10px;"></div>

                                                    <div class="alert" id="messageDelete" style="display: none; margin: 10px;"></div>

                                                    <form id="update_user" method="POST" action="{{ route('update', ['id' => $registro->id]) }}">

                                                        {{ csrf_field() }}

                                                        <div class="modal-body">

                                                            <input type="text" id="id" name="id" placeholder="ID" class="form-control placeholder-no-fix" style="margin: 0px 0 0px 0; background-color: #f5f5f5;" readonly/>
                                                            <input type="text" id="name" name="name" placeholder="Nome" class="form-control placeholder-no-fix" style="margin: 15px 0 15px 0;" required/>
                                                            <input type="email" id="email" name="email" placeholder="Email" class="form-control placeholder-no-fix" style="margin: 15px 0 15px 0;" required/>

                                                            <h3 style="border-bottom: 1px solid #ccc; padding-bottom: 5px; font-size: 14px; margin-bottom: 20px; margin-top: 25px;">Telefones Cadastrados</h3>


                                                            @foreach($telefones as $telefone)


                                                            @if($telefone->user_id === $registro->id)



                                                            <div id="origem-antes">

                                                                <input type="text" onkeyup="mascara('(##) - #####-####',this,event,true)" maxlength="17" name="fone[]" id="fone[]" placeholder="(xx) xxxxx-xxxx"  value="{{$telefone->tel}}" style="margin: 5px 0 15px 0; background-color: #f5f5f5;" disabled>
                                                                <button type="button" class="btn btn-danger btn-xs" id="btn-fone-{{$telefone->tel}}" onclick='removerTelefone("{{$telefone->tel}}");' style="margin-top: -3px;">
                                                                    <i class="fa fa-trash-o "></i>
                                                                </button>

                                                            </div>

                                                            @endif
                                                            @endforeach

                                                            <h3 style="border-bottom: 1px solid #ccc; padding-bottom: 5px; font-size: 14px; margin-bottom: 20px; margin-top: 25px;">Novo Telefone</h3>

                                                            <div id="origem">
                                                                <label>Telefone</label><br>
                                                                <input type="text" onkeyup="mascara('(##) - #####-####',this,event,true)" maxlength="17" name="fone2[]" id="fone2[]{{$registro->id}}" placeholder="(xx) xxxxx-xxxx" maxlength="14" size="14" style="margin: 5px 0 15px 0;">
                                                                <button type="button" class="btn btn-primary btn-xs" onclick='duplicarCampos("{{$registro->id}}");' style="margin-top: -3px;">
                                                                    <i class="fa fa-plus "></i></button>

                                                            </div>

                                                            <div class="alert alert-danger" style="display: none;" id="message-tel{{$registro->id}}" role="alert">

                                                            </div>

                                                            <div id="destino{{$registro->id}}">

                                                            </div>

                                                        </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                                </div>


                                                </form>

                                            </div>

                                        </div>
                                    </div>
                                    </div>

                                    @endforeach
                                    </tbody>
                                </table>
                            </section>
                        </div>
                    </div>

                </div>
                <!--body wrapper end-->


                <!--footer section start-->
                <footer>
                    2020 &copy; SlickLab by VectorLab.
                </footer>
                <!--footer section end-->

            </div>
            <!-- body content end-->
        </section>

        <!-- Modal De Cadastro-->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="cadastrarUsuario" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Cadastrar Usuário</h4>
                    </div>

                    <form action="{{ route('create') }}" method="POST">

                        {{ csrf_field() }}

                        <div class="modal-body">

                            <input type="text" id="name" name="name" placeholder="Nome" class="form-control placeholder-no-fix" style="margin: 15px 0 15px 0;" required/>
                            <input type="email" id="email" name="email" placeholder="Email" class="form-control placeholder-no-fix" style="margin: 15px 0 15px 0;" required/>
                            <input type="password" id="password" name="password" placeholder="Senha" class="form-control placeholder-no-fix" style="margin: 15px 0 15px 0;" required/>

                            <h3 style="border-bottom: 1px solid #ccc; padding-bottom: 5px; font-size: 14px; margin-bottom: 20px; margin-top: 25px;">Adicionar Telefone(s)</h3>

                            <div id="formulario">
                                <div class="form-group">
                                    <label>Telefone</label><br>
                                    <input type="text" onkeyup="mascara('(##) - #####-####',this,event,true)" maxlength="17" name="fone[]" id="fone[]" placeholder="(xx) xxxxx-xxxx" >
                                    <button type="button" class="btn btn-primary btn-xs" id="add-campo" style="margin-top: -3px;"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>

                            <div class="alert alert-danger" style="display: none;" id="message-tel" role="alert">

                            </div>


                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                                <button class="btn btn-success" type="submit">Cadastrar</button>
                            </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- modal -->

     
        <!-- abrir modal e enviar dados -->

        <script type="text/javascript">

            function modal(id){
            $('#exampleModal' + id).on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
                    var recipient = button.data('whatever')
                    var recipientnome = button.data('whatevernome')
                    var recipientemail = button.data('whateveremail')

                    var modal = $(this)
                    modal.find('#id').val(recipient)
                    modal.find('#name').val(recipientnome)
                    modal.find('#email').val(recipientemail)

            });
            }

        </script>

        <!-- duplicar telefone na hora ade alterar -->   
        <script>

            function duplicarCampos(id){

            var tel = document.getElementById('fone2[]' + id);
            if (tel.value === ""){

            $('#message-tel' + id).css('display', 'block');
            $('#message-tel' + id).html('Primeiro digite este telefone para adicionar outros!');
            return;
            } else{

            $('#message-tel' + id).css('display', 'none');
            $('#destino' + id).append('<div id="origem"'+id+'> <label>Telefone</label><br> <input type="tel" maxlength="17" name="fone2[]" id="fone2[]" placeholder="(xx) xxxxx-xxxx" style="margin: 5px 0 15px 0;"> <button type="button" class="btn btn-danger btn-xs" onclick="removerCampos(' + id + ');" style="margin-top: -3px;"><i class="fa fa-trash-o"></i></button></div>');
            var camposClonados = clone.getElementsByTagName('input');
            for (i = 0; i < camposClonados.length; i++){
            camposClonados[i].value = '';
            }
            }
            }


            function removerCampos(id){

            var node1 = document.getElementById('destino' + id);
            node1.removeChild(node1.childNodes[0]);
            }

            function removerTelefone(tel){
            if (confirm('Tem certeza que deseja excluir esse telefone?')){

            $.ajax({
            type: 'GET',
                    url:"/delete/tel/" + tel,
                    })
                    .done(function(response) {
                    console.log(response);
                    //resposta
                    $('#messageDelete').css('display', 'block');
                    $('#messageDelete').html(response.message);
                    $('#messageDelete').addClass(response.class_name);
                    $("input[value='" + tel + "']").css('display', 'none');
                    $('#btn-fone-' + tel).css('display', 'none');
                    })
                    .fail(function() { alert("error"); })
                    .always(function() {  });
            return false;
            }


            }

        </script>


        <!-- Duplicar campos na hora de cadastrar usuário -->
        <script>

            var cont = 1;
            
            $('#add-campo').click(function () {
            var tel = document.getElementById('fone[]');
            if (tel.value === ""){
            $('#message-tel').css('display', 'block');
            $('#message-tel').html('Primeiro digite este telefone para adicionar outros!');
            return;
            } else{
            $('#message-tel').css('display', 'none');
            }

            cont++;
            
            $('#formulario').append('<div class="form-group" id="campo' + cont + '"> <label>Telefone ' + cont + '</label><br><input type="text"  maxlength="17" name="fone[]" id="fone[]" placeholder="(xx) xxxxx-xxxx" required> <button type="button" id="' + cont + '" class="btn-apagar btn btn-danger btn-xs" style="margin-top: -3px;"> <i class="fa fa-trash-o "></i> </button></div>');
            });
            $('form').on('click', '.btn-apagar', function () {
            var button_id = $(this).attr("id");
            $('#campo' + button_id + '').remove();
            if (cont < 2){
            cont = 1;
            }
            });</script>


        
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


        <!--Data Table-->
        <script src="js/data-table/js/jquery.dataTables.min.js"></script>
        <script src="js/data-table/js/dataTables.tableTools.min.js"></script>
        <script src="js/data-table/js/bootstrap-dataTable.js"></script>
        <script src="js/data-table/js/dataTables.colVis.min.js"></script>
        <script src="js/data-table/js/dataTables.responsive.min.js"></script>
        <script src="js/data-table/js/dataTables.scroller.min.js"></script>
        <!--data table init-->
        <script src="js/data-table-init.js"></script>


        <!--common scripts for all pages-->
        <script src="js/scripts.js"></script>


    </body>
</html>
