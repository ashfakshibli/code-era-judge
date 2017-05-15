@extends('layouts.app')

@section('content')
<div class="container">
	<div class="col-lg-12">
	<section class="content-header text-center">
      <h1>
        CodeEra Problems
      </h1>
    </section>

    @include('layouts.problems', ['column'=>'4'])

        </div>
</div>
@endsection