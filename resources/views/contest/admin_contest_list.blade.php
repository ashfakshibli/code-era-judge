@extends('admin.home')



@section('custom_css')
    <link href="{{ asset("/vendor/adminlte/plugins/datatables/dataTables.bootstrap.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/vendor/adminlte/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css")}}" rel="stylesheet" type="text/css" />


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
                              <th style="width: 40%">Contest Title</th>
                              <th style="width: 15%">Start Time</th>
                              <th style="width: 10%">Duration</th>
                              <th style="width: 10%">Problem Added</th>
                              <th style="width: 25%">Options</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($contests as $contest)

                                <tr>
                                  <td> <a href={{ url('contest/'.$contest->id) }}>{{ $contest->title }}</a></td>
                                  <td> {{ Carbon\Carbon::parse($contest->start_time)->format('d-F-Y  H:i') }}</td>
                                  <td> {{ Carbon\Carbon::parse($contest->start_time)->diffInHours(Carbon\Carbon::parse($contest->end_time)) }} hour(s)
                                  </td>
                                  <td> {{ count($contest->problems) }}</td>
                                  <td>
                                    <a href={{ url('problem/add/'.$contest->id)}} class="btn bg-olive btn-flat tbl">Add Problem</a>
                                    <a href={{ url('contest/edit/'.$contest->id)}} class="btn bg-orange btn-flat tbl">Edit</a>

                                    <button type="button" class="btn bg-red btn-flat tbl confirmation" data-toggle="modal" data-target="#inputModal" data-url="{{ url('contest/destroy/'.$contest->id)}}">Delete</button>
                                  
                                  </td>
                                </tr>

                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                              <th style="width: 40%">Contest Title</th>
                              <th style="width: 15%">Start Time</th>
                              <th style="width: 10%">Duration</th>
                              <th style="width: 10%">Problem Added</th>
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



             <!-- Modal -->
              <div class="modal fade modal-danger" id="inputModal" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Confirmation</h4>
                              </div>
                              <div class="modal-body">
                                <p>Are you want to delete this contest?</p>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline button-warning pull-left" data-dismiss="modal">Close</button>
                                <a id="delete-go" href="" type="button" class="btn btn-outline">Delete</a>
                              </div>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
              </div>




@endsection


@section('custom_js')

    <script src="{{ asset ("/vendor/adminlte/plugins/datatables/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset ("/vendor/adminlte/plugins/datatables/dataTables.bootstrap.min.js") }}"></script>
    <script src="{{ asset ("https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js") }}"></script>
    <script src="{{ asset ("https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js") }}"></script>

    <script>
          $(document).ready(function() {

            $(".confirmation").on("click", function () {
                 var deleteUrl = $(this).data('url');
                 console.log(deleteUrl);
                 $("#delete-go").attr("href", deleteUrl);

            });

            //$("#example1").DataTable();
            $('#example2').DataTable({
              "order": [[ 1, "desc" ]],
              "paging": true,
              "lengthChange": false,
              "searching": true,
              "ordering": true,
              "info": true,
              "autoWidth": true
            });
          });
    </script>

@endsection