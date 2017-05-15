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

              <p>{{ $contest->start_time }}</p>
              <p>{{ $contest->end_time }}</p>
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