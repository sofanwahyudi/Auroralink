@extends('layouts.master')
@section('title')
Profil Team | Auroralink
@stop
@section('content_header')
<h1>
    <span class="fa fa-user"></span> Profil Team
</h1>
<a href="{{route('teams')}}"><i class="fa fa-arrow-left"></i> Back To List Team</a>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li>Team</li>
  <li class="active">Profi lTeam</li>
</ol>
@endsection
@section('content')
<!-- Main content -->
<section class="content">
    <div class="box box-warning">
      <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box">
              <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="{{$model->getGambar()}}" alt="User profile picture">

                <h3 class="profile-username text-center">{{$model->nama}}</h3>

                <p class="text-muted text-center">NIK : {{$model->nik}}</p>

                <p class="text-muted text-center">{{ $model->bagian['nama'] }}</p>

                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item">
                    <b>Devisi</b> <a class="pull-right"> {{ $model->devisi['name'] }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Telepon </b> <a class="pull-right"> {{$model->telepon}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email </b> <a class="pull-right"> {{$model->email}}</a>
                  </li>
                </ul>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tentang {{$model->nama}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Sekolah</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>

              <p class="text-muted">{{ $model->alamat }}</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Keahlian</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Catatan</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
                <li><a href="#timeline" data-toggle="tab">Project</a></li>
                <li><a href="#settings" data-toggle="tab">Riwayat</a></li>
              </ul>
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                  Ini tab Activity
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="timeline">
                  <!-- The timeline -->
                  <ul class="timeline timeline-inverse">
                    <!-- timeline time label -->
                    <li class="time-label">
                          <span class="bg-red">
                            10 Feb. 2014
                          </span>
                    </li>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                      <i class="fa fa-envelope bg-blue"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                        <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                        <div class="timeline-body">
                          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                          weebly ning heekya handango imeem plugg dopplr jibjab, movity
                          jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                          quora plaxo ideeli hulu weebly balihoo...
                        </div>
                        <div class="timeline-footer">
                          <a class="btn btn-primary btn-xs">Read more</a>
                          <a class="btn btn-danger btn-xs">Delete</a>
                        </div>
                      </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <li>
                      <i class="fa fa-user bg-aqua"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                        <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                        </h3>
                      </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <li>
                      <i class="fa fa-comments bg-yellow"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                        <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                        <div class="timeline-body">
                          Take me to your leader!
                          Switzerland is small and neutral!
                          We are more like Germany, ambitious and misunderstood!
                        </div>
                        <div class="timeline-footer">
                          <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                        </div>
                      </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline time label -->
                    <li class="time-label">
                          <span class="bg-green">
                            3 Jan. 2014
                          </span>
                    </li>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                      <i class="fa fa-camera bg-purple"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                        <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                        <div class="timeline-body">
                          <img src="http://placehold.it/150x100" alt="..." class="margin">
                          <img src="http://placehold.it/150x100" alt="..." class="margin">
                          <img src="http://placehold.it/150x100" alt="..." class="margin">
                          <img src="http://placehold.it/150x100" alt="..." class="margin">
                        </div>
                      </div>
                    </li>
                    <!-- END timeline item -->
                    <li>
                      <i class="fa fa-clock-o bg-gray"></i>
                    </li>
                  </ul>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="settings">
                  Ini Tab Riwayat
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
      </div>
    </div>
</section>
@stop
