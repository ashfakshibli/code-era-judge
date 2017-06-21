@extends('layouts.app')

@section('custom_css')
<style type="text/css">
    
        .btn-file {
        position: relative;
        overflow: hidden;
    }
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }

  </style>


@endsection

@section('content')
<div class="container">
  <!-- Main content -->
    <section class="content">
     @include('layouts.alert')
        @include('layouts.errors')

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Problem ID #<span class="pull-right badge bg-green">{{ $problem->id }}</span></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">

            <div class="col-md-12">
              <div class="box-body">
                <h3>{{ $problem->title }}</h3>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.col-->

            <div class="col-md-12">
              <div class="box-body">
                <label>Contest Link:</label>
                <a class="btn btn-flat bg-yellow" href="{{ url('contest/'.$problem->contest['id']) }}">{{ $problem->contest['title'] }}</a>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.col-->

            <div class="col-md-12">
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <label>Problem Description</label>
                </div>
                <div class="box-body">
                  <p style="text-align: justify;">{!! $problem->description !!}</p>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.col-->

            <div class="col-md-6">
              <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Sample Input</h3>
                </div>
                <div class="box-body">  
                  {!! $problem->input !!}
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.col-->

            <div class="col-md-6">
              <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Sample Output</h3>
                </div>
                <div class="box-body">  
                  {!! $problem->output !!}
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.col-->

          </div>
          <!-- /.row -->




          <div class="box-footer">
          @php

          $time = Carbon\Carbon::now('Asia/Dhaka');
          $start = Carbon\Carbon::parse($problem->contest['start_time']);
          $end = Carbon\Carbon::parse($problem->contest['end_time']);
          @endphp

          @if(Carbon\Carbon::parse($time)->between($start, $end))
            <div class="col-md-12">
              <a name="submit_output" type="button" class="btn bg-orange btn-flat center-block" data-toggle="modal" data-target="#inputModal" data-whatever="">Submit Output</a>
            </div>
          @endif
            <!-- /.col-->
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->




    <!-- Modal -->
  <div class="modal fade" id="inputModal" role="dialog">
    <div class="modal-dialog">
      <form method="POST" action="/code/submit" enctype="multipart/form-data">
      {{ csrf_field() }}
        <!-- Modal content-->



        <input type="hidden" name="problem_id" value="{{ $problem->id }}">
        <input type="hidden" name="input" value="{{ $problem->input }}">
        <input type="hidden" name="output" value="{{ $problem->output }}">
        

        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="modal-title">Code Submission</h3>
          </div>

          <div class="modal-body">

            <div class="form-group">
              <label class="control-label">Select a Language:</label>
              <select name="language" class="form-control">
                <option value="C">C</option>
                <option value="CPP">C++</option>
                <option value="CSHARP">C#</option>
                <option value="PYTHON">Python</option>
                <option value="JAVA">JAVA</option>
                <option value="PHP">PHP</option>
                <option value="JAVASCRIPT">JS</option>
                <option value="RUBY">Ruby</option>
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Select the program file:</label>
              <div class="input-group">
                <label class="input-group-btn">
                    <span class="btn bg-orange btn-flat">
                        Browse&hellip; <input type="file" style="display: none;" name="file" multiple>
                    </span>
                </label>
                <input type="text" class="form-control" readonly>
              </div>
            </div>

            {{-- <div class="form-group">
              <label for="message-text" class="form-control-label">Your Output:</label>
              <textarea class="form-control" id="message-text"></textarea>
            </div> --}}

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-flat" data-dismiss="modal">Close</button>
            <button type="submit" class="btn bg-orange btn-flat">Submit</button>
          </div>

        </div>
      </form> 
    </div>
  </div>
@endsection


@section('custom_js')

  <script type="text/javascript">
       // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }

      });
  });
  </script>

@endsection