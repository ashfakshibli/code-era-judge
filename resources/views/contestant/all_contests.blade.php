@extends('contestant.home')



@section('content')
<div class="container">
	<div class="col-lg-12">
	<section class="content-header text-center">
      <h1>
        CodeEra Contests
      </h1>
    </section>

    @include('layouts.contests', ['column'=>'6'])
 
    </div>


</div>
@endsection