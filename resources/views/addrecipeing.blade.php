@extends('main')
@section('body')

@foreach($recipe as $rec)
<legend>Select the ingredients for <h1>"{{$rec->Recipe_name}}"</h1> </legend>
@endforeach  
<!----- -veg---  --> 
<form  class="well form-horizontal" action="{{url('upload/recipe/add/ing')}}" method="POST" enctype="multipart/form-data"  id="contact_form">
{{csrf_field()}}
    @foreach($recipe as $rec)
<input type="hidden" name="id" value= "{{$rec->user_rec_id}}"> 
    @endforeach  
     <h4>Vegetable</h4>
   
    	@foreach ($ving as $veg)
      <div class="funkyradio-success">
            <input type="checkbox" name="ing[]" value="{{$veg->ing_id}}" />
            <label for="{{$veg->Ing_name}}">{{$veg->Ing_name}}</label>
      </div>
        	@endforeach
   
<!----- -veg---  --> 


<!----- -dairy---  --> 

     <h4>Dairy</h4>

    	@foreach ($ding as $dairy)

            <input type="checkbox" name="ing[]" value="{{$dairy->ing_id}}" >
            <label for="{{$dairy->Ing_name}}">{{$dairy->Ing_name}}</label>
        </div>
        	@endforeach
<!----- -dairy---  --> 



<!----- -Meat---  --> 
     <h4>Meat</h4>
    	@foreach ($ming as $meat)
        <div class="funkyradio-danger">
            <input type="checkbox" name="ing[]" value="{{$meat->ing_id}}" >
            <label for="{{$meat->Ing_name}}">{{$meat->Ing_name}}</label>
        </div>
        	@endforeach
  <!----- -Meat---  --> 
  <div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button type="submit" class="btn btn-warning" >Add Ingredients <span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>

</form>
<style type="text/css">
  @import('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.0/css/bootstrap.min.css') 

.funkyradio div {
  clear: both;
  overflow: hidden;
}

.funkyradio label {
  width: 100%;
  border-radius: 3px;
  border: 1px solid #D1D3D4;
  font-weight: normal;
}

.funkyradio input[type="radio"]:empty,
.funkyradio input[type="checkbox"]:empty {
  display: none;
}

.funkyradio input[type="radio"]:empty ~ label,
.funkyradio input[type="checkbox"]:empty ~ label {
  position: relative;
  line-height: 2.5em;
  text-indent: 3.25em;
  margin-top: 2em;
  cursor: pointer;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}

.funkyradio input[type="radio"]:empty ~ label:before,
.funkyradio input[type="checkbox"]:empty ~ label:before {
  position: absolute;
  display: block;
  top: 0;
  bottom: 0;
  left: 0;
  content: '';
  width: 2.5em;
  background: #D1D3D4;
  border-radius: 3px 0 0 3px;
}

.funkyradio input[type="radio"]:hover:not(:checked) ~ label,
.funkyradio input[type="checkbox"]:hover:not(:checked) ~ label {
  color: #888;
}

.funkyradio input[type="radio"]:hover:not(:checked) ~ label:before,
.funkyradio input[type="checkbox"]:hover:not(:checked) ~ label:before {
  content: '\2714';
  text-indent: .9em;
  color: #C2C2C2;
}

.funkyradio input[type="radio"]:checked ~ label,
.funkyradio input[type="checkbox"]:checked ~ label {
  color: #777;
}

.funkyradio input[type="radio"]:checked ~ label:before,
.funkyradio input[type="checkbox"]:checked ~ label:before {
  content: '\2714';
  text-indent: .9em;
  color: #333;
  background-color: #ccc;
}

.funkyradio input[type="radio"]:focus ~ label:before,
.funkyradio input[type="checkbox"]:focus ~ label:before {
  box-shadow: 0 0 0 3px #999;
}

.funkyradio-default input[type="radio"]:checked ~ label:before,
.funkyradio-default input[type="checkbox"]:checked ~ label:before {
  color: #333;
  background-color: #ccc;
}

.funkyradio-primary input[type="radio"]:checked ~ label:before,
.funkyradio-primary input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #337ab7;
}

.funkyradio-success input[type="radio"]:checked ~ label:before,
.funkyradio-success input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #5cb85c;
}

.funkyradio-danger input[type="radio"]:checked ~ label:before,
.funkyradio-danger input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #d9534f;
}

.funkyradio-warning input[type="radio"]:checked ~ label:before,
.funkyradio-warning input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #f0ad4e;
}

.funkyradio-info input[type="radio"]:checked ~ label:before,
.funkyradio-info input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #5bc0de;
}


</style>
@endsection

