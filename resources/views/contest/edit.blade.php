@extends('admin.home')
{{-- {{dd($contest)}} --}}
@section('custom_css')
    <link href="{{ asset("/vendor/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/vendor/adminlte/plugins/daterangepicker/daterangepicker.css")}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
	<section class="content-header">
                <h1>
                    Update Contest
                    <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                    <li class="active">Here</li>
                </ol>
    </section>

            <!-- Main content -->
    <section class="content">

         <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        
        <!-- /.box-header -->
        <div class="box-body">

        <form method="POST" action={{ url('/contest/update/'.$contest->id) }}>
        {{ csrf_field() }}
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Conntest Title</label>
                <input name="title" type="text" class="form-control pull-right" style="width: 100%;" placeholder="Contest Name to be Shown" value='{{ $contest->title }}'>
                </input>
              </div>
            </div>
            <!-- /.col -->

            <div class="col-md-6">
              <!-- Date and time range -->
              <div class="form-group">
                <label>Conntest Duration:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                  <input name="start_end_time" type="text" class="form-control pull-right" id="reservationtime" value=" {{ Carbon\Carbon::parse($contest->start_time)->format('d/m/Y H:i').' - '.Carbon\Carbon::parse($contest->end_time)->format('d/m/Y H:i') }}" >
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
            </div>
            <!-- /.col (right) -->

            <div class="col-md-12">
              <div class="form-group">
                <label>Contest Details:</label>
             
                  <textarea value={{ $contest->description }} name="description" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            
              </div>
              <!-- /.form group -->
            </div>
            <!-- /.col-->

          </div>
          <!-- /.row -->
            <div class="box-footer">
                <button type="submit" class="btn bg-olive btn-flat">Update</button>
                <button type="reset" class="btn bg-orange btn-flat">Cancel</button>
            </div>
        </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->


    </section><!-- /.content -->


@endsection



@section('custom_js')

    <script src="{{ asset ("/vendor/adminlte/plugins/daterangepicker/moment.min.js") }}"></script>
    <script src="{{ asset ("/vendor/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js") }}"></script>
    <script src="{{ asset ("/vendor/adminlte/plugins/daterangepicker/daterangepicker.js") }}"></script>



    <script>
    $(function () {

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
        timePicker: true, 
        timePickerIncrement: 30, 
        locale: {
            format: 'DD/MM/YYYY H:mm'
        }
        });

    $(".textarea").wysihtml5({
          toolbar: {
            "fa": true
          }

      });
    $(".textarea").html('{{ $contest->description }}');


    });
    </script>

@endsection