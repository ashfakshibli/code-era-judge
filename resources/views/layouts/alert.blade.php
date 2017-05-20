@if(Session::has('message'))
  <br>
        <div class="container">
            <div class="alert {{ Session::get('alert-class','alert-info')}} alert-dismissible col-md-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    
                 {{--    {{ 
     					@if( Session::get('alert-class')=='alert-info')
                    		fa-info-circle
                    	@elseif( Session::get('alert-class')=='alert-danger')
                    		fa-exclamation-triangle 
                    	@else
                    		fa-check
					}} --}}
					<h4><i class="icon fa fa-info-circle"></i> {{ Session::get('alert-heading','Alert!')}}</h4>
                    {{ Session::get('message')}}
            </div>
  </div>
@endif