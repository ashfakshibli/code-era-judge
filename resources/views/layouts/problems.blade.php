    <!-- Main content -->
    <section class="content">

      @foreach($problems as $problem)
        <div class="col-lg-{{$column}}">
          <!-- small box -->
          @if(($loop->iteration)%2 == 0)
            <div class="small-box bg-green">
          @else
            <div class="small-box bg-red">
          @endif

            <div class="inner">
              <h3>#{{ $problem->id }}</h3>

              <h4>{{ $problem->title }}</h4>
              <p>{{ $problem->contest['title'] }}</p>
            </div>
            <a href="{{ url('/problem/'.$problem->id) }}" class="small-box-footer">
              Go to Problem <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
        <!-- ./col -->
      </div>
      @endforeach

    </section>
    <!-- /.content -->