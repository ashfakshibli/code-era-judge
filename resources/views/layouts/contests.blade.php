    <!-- Main content -->
    <section class="content">

      @foreach($contests as $contest)
        <div class="col-lg-{{$column}}">
          <!-- small box -->
          @if(($loop->iteration)%2 == 0)
            <div class="small-box bg-green">
          @else
            <div class="small-box bg-red">
          @endif

            <div class="inner">
              <h3>{{ $contest->title }}</h3>
              <h4 data-time="{{ $contest->start_time }}" class="pull-right">{{ $contest->start_time }}</h4>


              <h5>{{ Carbon\Carbon::parse($contest->start_time)->format('d-F-Y  H:i')  }}</h5>

            </div>
            <a href="{{ url('/contest/'.$contest->id) }}" class="small-box-footer">
              Go to Contest <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
        <!-- ./col -->
      </div>
      @endforeach

    </section>
    <!-- /.content -->

    @section('custom_js')
            <script src="{{ asset ("js/jquery.countdown.min.js") }}"></script>

            <script type="text/javascript">
                $('[data-time]').each(function() {
                    var $this = $(this), finalDate = $(this).data('time');
                    $this.countdown(finalDate, function(event) {
                    $this.html(event.strftime('%D days %H:%M:%S'));
                    });
                });
            </script>

    @endsection