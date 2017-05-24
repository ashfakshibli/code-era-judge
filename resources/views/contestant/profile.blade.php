@extends('contestant.home')



@section('content')
<!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-green">
              <div class="widget-user-image">
                <img class="img-circle" src={{ asset("/images/default_user.png") }} alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">{{ Auth::user()->name }}</h3>
              <br>
            </div>

            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a><b>Email:</b> <p class="pull-right">{{ Auth::user()->email }}</p></a></li>
                {{-- <li><a><b>Contest(s) Participated:</b> <span class="pull-right badge bg-aqua">0</span></a></li>
                <li><a><b>Problem(s) Solved:</b> <span class="pull-right badge bg-green">0</span></a></li>
                <li><a><b>Problem(s) Tried:</b> <span class="pull-right badge bg-blue">0</span></a></li> --}}
              </ul>
            </div>

          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs ">
              <li class="active"><a href="#timeline" data-toggle="tab">Timeline</a></li>
              <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>

            <div class="tab-content">
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <!-- LINE CHART -->
                <div class="box-body chart-responsive">
                  <div class="chart" id="line-chart" style="height: 300px;"></div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <a href="/password/change" class="btn btn-warning btn-flat margin">Change Password</a>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->

@endsection