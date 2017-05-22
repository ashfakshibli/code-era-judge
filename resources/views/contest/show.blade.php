@extends('layouts.app')


@section('content')


<div class="container">
<!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-warning">
        <div class="box-header with-border bg-olive ">
          <div class="col-md-6">
            
            <h2 class="pull-left"><b>{{ $contest->title }}</b></h2>
          </div>
          
          <div class="col-md-4">
            <p hidden>Starting In<button  class="btn btn-flat margin bg-orange lead"><b id="timer_one" style="font-size: 20px;"></b></button></p>
            <p hidden>Ending In<button  class="btn btn-flat margin bg-orange lead"><b id="timer_two" style="font-size: 20px;"></b></button></p>
          </div>
          <div class="col-md-2" style="margin-top: 25px">
            <a href="{{ url('/ranking/'.$contest->id)}}" class="btn btn-flat bg-orange">Ranking</a>
          </div>
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
          @php
          $current = Carbon\Carbon::now('Asia/Dhaka')->toDateTimeString();
          $enrollTime = Carbon\Carbon::parse($contest->start_time)->subHours(4); 
          //var_dump(Auth::check());       
          //dd(Carbon\Carbon::now('Asia/Dhaka')->gt(Carbon\Carbon::parse($contest->start_time)));       
          @endphp

          @if(Carbon\Carbon::parse($current)->lt($enrollTime))
            @if( Auth::check() && $contest->user->contains(Auth::user()) )
            <div class="col-md-4 col-md-offset-4">
              <button class="btn bg-orange btn-flat center-block"><i class="fa fa-check"></i> Already Enrolled</button>
            </div>
            @else
            <div class="col-md-4 col-md-offset-4">
              <a href="{{ url("/contest/enroll/".$contest->id)}}" class="btn bg-orange btn-flat center-block">Enroll</a>
            </div>
            @endif
          @endif
          </div>
              </div>
            </div>
            <!-- /.col-->
          @if(Auth::check() && Carbon\Carbon::parse($current)->gt(Carbon\Carbon::parse($contest->start_time)))
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
                      <td>  <a href="{{url('problem/'.$problem->id)}}">{{ $problem->title }}</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
          @endif
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
                var $timer1 = $('#timer_one');
                var $timer2 = $('#timer_two');
                
                var $start = '{{ $contest->start_time }}';
                var $end = '{{ $contest->end_time }}';
                $timer1.parents("p").show();
                counting($start, $timer1);
                  
                $timer1.on('finish.countdown', function(event){
                          $(this).parents("p").html('');
                          $timer2.parents("p").show();
                          counting($end, $timer2);
                          
                });
                $timer2.on('finish.countdown', function(event){
                          $(this).parents("p").html('<button  class="btn btn-flat margin bg-orange lead"><b  style="font-size: 20px;">Ended</b></button>');
                       
                          
                          
                });
                  
                function counting($time, $timer) {
                  $timer.countdown($time, function(event) {
                      $(this).html(event.strftime('%-d day(s) %H:%M:%S'));
                  });
                }
            </script>

    @endsection

