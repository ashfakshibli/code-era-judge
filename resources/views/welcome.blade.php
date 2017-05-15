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
    	<div class="box bg-green box-solid">
    		<div class="box-header with-border  text-center">
    			<h3 class="box-title">Our Well Wishers</h3>
		    		<div class="box-body">
		    			<div class="info-box">
				            <div class="info-box-content">
				              <div class="direct-chat-msg">
				                  <div class="direct-chat-info clearfix">
				                    <span class="direct-chat-name pull-left">Alexander Pierce</span>
				                  </div>
				                  <!-- /.direct-chat-info -->
				                  <img class="direct-chat-img" src="" alt="Message User Image"><!-- /.direct-chat-img -->
				                  <div class="direct-chat-text">
				                    Is this template really for free? That's unbelievable!
				                  </div>
				                  <!-- /.direct-chat-text -->
				                </div>
				            </div>
				            <!-- /.info-box-content -->
				          </div>
		    		</div>
    		</div>
    		
    	</div>
    	
    	@include('layouts.portfolio')

    </div>
</div>

@endsection
