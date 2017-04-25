
@extends('main')
@section('body')

    <form  class="well form-horizontal" action="{{url('recipe/update')}}" method="POST" enctype="multipart/form-data"  id="contact_form">
{{csrf_field()}}
<fieldset>

  

<!-- Form Name -->
<legend>Edit Recipes!</legend>


<!-- Text input-->
@foreach ($recipe as $rec)
<input type="hidden" value="{{$rec->recipe_id}}" name="rec_id">


<div class="form-group">
  <label class="col-md-4 control-label" >Name</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="recname" placeholder="name" value="{{$rec->Recipe_name}}" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Description</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="desc" placeholder="Description" value="{{$rec->Recipe_desc}}" class="form-control"  type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Duration</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="duration" placeholder="Duration (Min)" value="{{$rec->Recipe_duration}}" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- radio checks -->
 <div class="form-group">
                        <label class="col-md-4 control-label">Cusine</label>
                        <div class="col-md-4">
                          @foreach($cusine as $cusine)
                            <div class="radio">
                                <label>
                                    <input type="radio" name="cusine" value="{{$cusine->cusine_id}}" > {{$cusine->Cusine_name}}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>





                    <!-- radio checks -->
 <div class="form-group">
                        <label class="col-md-4 control-label">Type</label>
                        <div class="col-md-4">
                          @foreach($type as $type)
                            <div class="radio">
                                <label>
                                    <input type="radio" name="type" value="{{$type->Recipe_typeID}}" > {{$type->Recipe_type_name}}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>

<!-- Image -->
<div class="form-group">
      <label class="col-md-4 control-label"  for="image">Image:</label>
      <div class="controls">
        <input type="file" id="image" name="image">
      </div>
    </div>
  </div>
@endforeach


<!-- Success message -->
<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button type="submit" class="btn btn-warning" action="" >Save Recipe <span class="glyphicon glyphicon-send"></span></button>
  </div>
  <div class="col-md-4">
    <button type="submit" class="btn btn-warning" action="{{url('recipe/updaterecing')}}">Update Ingredients for this recipe <span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>

</fieldset>
</form>
@endsection
