@extends('admin.home')

@section('custom_css')
    <link href="{{ asset("/vendor/adminlte/plugins/datatables/dataTables.bootstrap.css")}}" rel="stylesheet" type="text/css" />

    <style>
       table { table-layout: fixed; }
       table th, table td {
            max-width: 0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
@endsection

@section('content')
	<section class="content-header">
                <h1>
                    All Contests
                   
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                    <li class="active">Here</li>
                </ol>
            </section>

            <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="width: 35%">Contest Title</th>
                  <th style="width: 20%">Start Time</th>
                  <th style="width: 20%">End Time</th>
                  <th style="width: 25%">Options</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td> Contest Title Contest Title Contest Title Contest Title Contest Title</td>
                  <td> Start Start Start Start Start Start</td>
                  <td> End End End End End End End End End</td>
                  <td>
                    <a href="#" class="btn bg-olive btn-flat tbl">Add Problem</a>
                    <a href="#" class="btn bg-orange btn-flat tbl">Update</a>
                    <a href="#" class="btn bg-red btn-flat tbl">Delete</a>
                  </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th style="width: 35%">Contest Title</th>
                  <th style="width: 20%">Start Time</th>
                  <th style="width: 20%">End Time</th>
                  <th style="width: 25%">Options</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->



@endsection


@section('custom_js')

    <script src="{{ asset ("/vendor/adminlte/plugins/datatables/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset ("/vendor/adminlte/plugins/datatables/dataTables.bootstrap.min.js") }}"></script>

    <script>
          $(function () {
            //$("#example1").DataTable();
            $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false
            });
          });
    </script>

@endsection