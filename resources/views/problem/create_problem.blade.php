@extends('admin.home')

@section('custom_css')
    <link href="{{ asset("/vendor/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/vendor/adminlte/plugins/daterangepicker/daterangepicker.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/vendor/adminlte/plugins/select2/select2.min.css")}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
	<section class="content-header">
                <h1>
                @if(isset($addToContest))
                  Add Problem to "{{ $addToContest->title }}"
                @else Create New Problem
                @endif
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
        <form method="POST" action="/problem/add">
          {{ csrf_field() }}

          <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Problem Title</label>
                  <input name="title" type="text" class="form-control pull-right" style="width: 100%;" placeholder="Give a title">
                  </input>
                </div>
              </div>
              <!-- /.col -->

              <div class="col-md-6">
                <div class="form-group">
                  <label>Select a contest</label>
                  <select name="contest_id" class="form-control" data-placeholder="Select a Contest" style="width: 100%;">

                  @foreach($contests as $contest)
                    @if(isset($addToContest) && $contest==$addToContest)
                      <option selected="selected" value="{{ $contest->id }}">{{ $contest->title }}</option>
                    @else
                      <option value="{{ $contest->id }}">{{ $contest->title }}</option>
                    @endif

                  @endforeach

                  </select>

                </div>
              </div>
            </div>
              <!-- /.col -->


              <div class="col-md-12">
                <div class="form-group">
                  <label>Problem Description:</label>
                    <textarea name="description" class="textarea description" placeholder="Place some Description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
                <!-- /.form group -->
              </div>
              <!-- /.col-->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Sample Input:</label>
                    <textarea id="input" name="input" class="textarea input" placeholder="Place Sample Input" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
                <!-- /.form group -->
              </div>
              <!-- /.col-->

              <div class="col-md-6">
                <div class="form-group"> 
                  <label>Sample Output:</label>
                    <textarea id="output" name="output" class="textarea output" placeholder="Place Sample Output" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
                <!-- /.form group -->
              </div>
              <!-- /.col-->
            </div>
            <!-- /.row -->

            <div class="box-footer">
                <button type="submit" class="btn bg-olive btn-flat ">Create</button>
                <button type="reset" class="btn bg-orange btn-flat ">Cancel</button>
            </div>

            </div>

          </form>

        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->


@endsection



@section('custom_js')

    <script src="{{ asset ("/vendor/adminlte/plugins/daterangepicker/moment.min.js") }}"></script>
    <script src="{{ asset ("/vendor/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js") }}"></script>
    <script src="{{ asset ("/vendor/adminlte/plugins/daterangepicker/daterangepicker.js") }}"></script>
    <script src="{{ asset ("/vendor/adminlte/plugins/select2/select2.min.js") }}"></script>



    <script>
    $(function () {

    $(".description").wysihtml5();

  });
    </script>

@endsection