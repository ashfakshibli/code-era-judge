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

  <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Problem No. <span class="pull-right badge bg-orange">1231</span></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">

            <div class="col-md-12">
              <div class="box-body">
                <label>Problem Title:</label> name lorem lorem
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.col-->

            <div class="col-md-12">
              <div class="box-body">
                <label>Contest Link:</label>
                <a href="#">Contest link for this problem</a>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.col-->

            <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body">
                  <label>Problem Description:</label>
                  <p style="text-align: justify;">lorem Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem 
                  ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.col-->

            <div class="col-md-6">
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Sample Input:</h3>
                </div>
                <div class="box-body">  
                  <p>a) sgadkfjsdh</p><br>
                  <p>b) sgadkfjsdh</p><br>
                  <p>c) sgadkfjsdh</p><br>
                  <p>d) sgadkfjsdh</p><br>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.col-->

            <div class="col-md-6">
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Sample Output:</h3>
                </div>
                <div class="box-body">  
                  <p>a) sgadkfjsdh</p><br>
                  <p>b) sgadkfjsdh</p><br>
                  <p>c) sgadkfjsdh</p><br>
                  <p>d) sgadkfjsdh</p><br>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.col-->

          </div>
          <!-- /.row -->

          <div class="box-footer">
            <div class="col-md-12">
              <button type="button" class="btn bg-orange btn-flat center-block" data-toggle="modal" data-target="#inputModal" data-whatever="">Submit Output</button>
            </div>
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
      <form>
        <!-- Modal content-->
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="modal-title">Codde Submission</h3>
          </div>

          <div class="modal-body">

            <div class="form-group">
              <label class="control-label">Select a Language:</label>
              <select class="form-control">
                <option>option 1</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
                <option>option 5</option>
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Select the source file:</label>
              <div class="input-group">
                <label class="input-group-btn">
                    <span class="btn bg-orange btn-flat">
                        Browse&hellip; <input type="file" style="display: none;" multiple>
                    </span>
                </label>
                <input type="text" class="form-control" readonly>
              </div>
            </div>

            <div class="form-group">
              <label for="message-text" class="form-control-label">Your Output:</label>
              <textarea class="form-control" id="message-text"></textarea>
            </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-flat" data-dismiss="modal">Close</button>
            <button type="button" class="btn bg-orange btn-flat">Submit</button>
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