
@extends('main')
@section('body')
<form class="form-horizontal" action="{{url('add')}}" method="POST" enctype="multipart/form-data" style="width:70%; align:center; border:2px solid; margin-left:10px">
  {{csrf_field()}}
  <fieldset style="margin-left:10px; margin:2%;  border-radius: 9px; paddin:5px;">
    <div id="legend">
      <legend class="">Register</legend>
    </div>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="recipe">Recipe name:</label>
      <div class="controls">
        <input type="text" id="recipe" name="recipe" placeholder="" class="input-xlarge">
      </div>
    </div>
 
     <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="ingredients">Ingredients:</label>
      <div class="controls">
        <input type="text" id="ingredients" name="ingredients" placeholder="" class="input-xlarge">
      </div>
    </div>
 
     <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="desc">Description:</label>
      <div class="controls">
   <input type="text" id="desc" name="desc" placeholder="" class="input-xlarge">
      </div>
    </div>
 
     <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="image">image:</label>
      <div class="controls">
        <input type="file" id="image" name="image">
      </div>
    </div>
 
     <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="info">Recipe info:</label>
      <div class="controls">
        <input type="text" id="info" name="info" placeholder="" class="input-xlarge">
      </div>
    </div>
   
 
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success">Register</button>
      </div>
    </div>
  </fieldset>
</form>
@endsection
