@extends('layouts.app')

@section('content')
<div class="container">
	<div class="col-lg-8">
	<section class="content-header text-center">
      <h1>
        Upcoming Contests
      </h1>
    </section>

    @include('layouts.contests', ['column'=>'12'])



	</div>

    <div class="col-lg-4">
    <br>
    	<div class="box box-solid text-center">
    		<div class="box-header with-border">
    			<h3 class="box-title">Our Well Wishers</h3>
		    		<div class="box-body bg-teal">
		    			<div class="box-comment ">
			                <!-- User image -->
			                <img class="img-circle img-sm" src="{{ asset("/images/default_user.png") }}" alt="User Image">
			                <span class="username">
			                        Rahma Bintey Mufiz Mukta
			                        <br>
			                        Asst. Professor, CSE, CUET
			                      </span><!-- /.username -->

			                <div class="comment-text">
			                      
			                      <br>
			                  
			                </div>
			                <!-- /.comment-text -->
			             </div>
		    		</div>
    		</div>
    		
    	</div>
    	
    	@include('layouts.portfolio')

    </div>
</div>

@endsection
