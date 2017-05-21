@extends('layouts.app')


@section('content')


<div class="container">
<!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-warning">
        <div class="box-header with-border bg-olive text-center">
          <h2><b>{{ $contest->title }}</b></h2>
          <button  class="btn btn-flat margin bg-orange lead"><b id="timer_one" style="font-size: 20px;"></b></button>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="col-md-12">
              <div class="box box-default box-solid">
                <div class="box-header with-border text-center">
                  <h3>Contest Description</h3>
                </div>
                <div class="box-body bg-white">
                  <p style="text-align: justify;">{!! $contest->description !!}</p>
                </div>
                <!-- /.box-body -->


          <div class="box-footer">
            <div class="col-md-4 col-md-offset-4">
              <a href="{{ url("/contest/enroll/".$contest->id)}}" class="btn bg-orange btn-flat center-block">Enroll</a>
            </div>
          </div>
              </div>
            </div>
            <!-- /.col-->

            <div class="col-md-12">
              <div class="box box-default box-solid">
                <div class="box-header with-border text-center">
                  <h3>Problem List</h3>
                </div>
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover text-center">
                    <thead>
                    <tr>
                      <th style="width: 10%">Problem No</th>
                      <th style="width: 90%">Problem Link</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($contest->problem as $problem)
                    <tr>
                      <td> ({{ $loop->count }}) </td>
                      <td>  <a href="#">{{ $problem->title }}</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
            <!-- /.col-->
        <!-- /.box-body -->
      </div>

      <!-- /.box -->
      </div>

    </section>
    <!-- /.content -->
</div>
@endsection

    @section('custom_js')
            <script src="{{ asset ("js/jquery.countdown.min.js") }}"></script>

            <script type="text/javascript">
               $('#timer_one').countdown('{{ $contest->start_time }}', function(event) {
                  $(this).html(event.strftime('%d day(s) %H:%M:%S'));
              });
            </script>

    @endsection

