@if(Session::has('message'))
  <br>
        <div class="container">
            <div class="alert {{ Session::get('alert-class','alert-info')}} alert-dismissible col-md-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> {{ Session::get('alert-heading','Alert!')}}</h4>
                    {{ Session::get('message')}}
            </div>
  </div>
@endif