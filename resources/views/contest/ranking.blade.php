@extends('layouts.app')



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
<div class="container">

    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-warning">
        <div class="box-header with-border">
          <div class="col-md-4">
            <h3>{{ $contestData->title }}</h3>(Ranking)
          </div>
          <div class="col-md-4 pull-right">
            <button type="button" class="btn btn-flat btn-success margin">Solved problem</button>
            <button type="button" class="btn btn-flat bg-red margin">Attempted problem</button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">

            <div class="col-md-12">
              <div class="box box-warning">
                <div class="box-body">
                  <table id="example2" class="table table-bordered text-center">
                    <thead>
                    <tr class="bg-gray">
                      <th >Rank</th>
                      <th style="width: 20%">Contestant Name</th>
                      <th >Solved</th>
                      <th >Time</th>
                      @php
                      $letter = range('A', 'Z');
                       $count = count($contestData->problem);
                      @endphp
                      @for($i=0; $i<$count; $i++)
                      <th >{{ $letter[$i] }}</th>
                      @endfor
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sortedRankingData as $key => $data)
                      <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $data['contestant_name'] }}</td>
                        <td>{{ $data['solved'] }}</td>
                        <td>{{ $data['time_point'] }}</td>
                        @foreach($data['problem'] as $problem => $problem_data)
                          @if($problem_data['result'] == 'AC')
                              <td class="btn-success">
                                <i class="fa fa-check"></i>
                              </td>
                          @elseif($problem_data['result'] == 'WA')
                              <td class="bg-red">
                                <i class="fa fa-times"></i>

                              </td>
                          @else
                              <td>
                              ...
                              </td>
                          @endif
                        @endforeach
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
            <!-- /.col-->

        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
</div>

@endsection

@section('custom_js')

    <script src="{{ asset ("/vendor/adminlte/plugins/datatables/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset ("/vendor/adminlte/plugins/datatables/dataTables.bootstrap.min.js") }}"></script>
    
@endsection