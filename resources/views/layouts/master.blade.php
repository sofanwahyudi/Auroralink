<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    @include('layouts.head')
    <title>@yield('title')</title>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>L</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Aurora</b>LINK</span>
    </a>

    <!-- Header Navbar -->
    @include('layouts.header')
  <!-- Left side column. contains the logo and sidebar -->
    @include('layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    @yield('content_header')
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        @yield('content')
      <!--------------------------
        | Your Page Content Here |
        -------------------------->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
@include('layouts.footer')

  <!-- Control Sidebar -->
@include('layouts.beside')
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{url('assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('assets/dist/js/adminlte.min.js')}}"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
     <script type="text/javascript">
        {{-- ajax Form Add Post--}}
          $(document).on('click','.create-modal', function() {
            $('#create').modal('show');
            $('.form-horizontal').show();
            $('.modal-title').text('Add Post');
          });
          $("#add").click(function() {
            $.ajax({
              type: 'POST',
              url: 'addPost',
              data: {
                '_token': $('input[name=_token]').val(),
                'title': $('input[name=title]').val(),
                'body': $('input[name=body]').val()
              },
              success: function(data){
                if ((data.errors)) {
                  $('.error').removeClass('hidden');
                  $('.error').text(data.errors.title);
                  $('.error').text(data.errors.body);
                } else {
                  $('.error').remove();
                  $('#table').append("<tr class='post" + data.id + "'>"+
                  "<td>" + data.id + "</td>"+
                  "<td>" + data.title + "</td>"+
                  "<td>" + data.body + "</td>"+
                  "<td>" + data.created_at + "</td>"+
                  "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-title='" + data.title + "' data-body='" + data.body + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-title='" + data.title + "' data-body='" + data.body + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-title='" + data.title + "' data-body='" + data.body + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
                  "</tr>");
                }
              },
            });
            $('#title').val('');
            $('#body').val('');
          });

        // function Edit POST
        $(document).on('click', '.edit-modal', function() {
        $('#footer_action_button').text(" Update Post");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Post Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#fid').val($(this).data('id'));
        $('#t').val($(this).data('title'));
        $('#b').val($(this).data('body'));
        $('#myModal').modal('show');
        });

        $('.modal-footer').on('click', '.edit', function() {
          $.ajax({
            type: 'POST',
            url: 'editPost',
            data: {
        '_token': $('input[name=_token]').val(),
        'id': $("#fid").val(),
        'title': $('#t').val(),
        'body': $('#b').val()
            },
        success: function(data) {
              $('.post' + data.id).replaceWith(" "+
              "<tr class='post" + data.id + "'>"+
              "<td>" + data.id + "</td>"+
              "<td>" + data.title + "</td>"+
              "<td>" + data.body + "</td>"+
              "<td>" + data.created_at + "</td>"+
         "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-title='" + data.title + "' data-body='" + data.body + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-title='" + data.title + "' data-body='" + data.body + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-title='" + data.title + "' data-body='" + data.body + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
              "</tr>");
            }
          });
        });

        // form Delete function
        $(document).on('click', '.delete-modal', function() {
        $('#footer_action_button').text(" Delete");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Delete Post');
        $('.id').text($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.title').html($(this).data('title'));
        $('#myModal').modal('show');
        });

        $('.modal-footer').on('click', '.delete', function(){
          $.ajax({
            type: 'POST',
            url: 'deletePost',
            data: {
              '_token': $('input[name=_token]').val(),
              'id': $('.id').text()
            },
            success: function(data){
               $('.post' + $('.id').text()).remove();
            }
          });
        });

          // Show function
          $(document).on('click', '.show-modal', function() {
          $('#show').modal('show');
          $('#i').text($(this).data('id'));
          $('#ti').text($(this).data('title'));
          $('#by').text($(this).data('body'));
          $('.modal-title').text('Show Post');
          });
        </script>
</body>
</html>
