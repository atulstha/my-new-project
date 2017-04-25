@extends('main')
@section('body')
<form class="well form-horizontal" action="{{url('ing/updateing')}}" method="POST" enctype="multipart/form-data"  id="contact_form">
{{csrf_field()}}
<fieldset>

  

<!-- Form Name -->
<legend>Edit Ingredients!</legend>

<!-- Text input-->
@foreach ($selected as $selected)
<div class="form-group">
  <label class="col-md-4 control-label">ID:</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glysphicon glyphicon-user"></i></span>

  <input  name="id" placeholder="Ingredient ID" class="form-control"  type="text" value="{{$selected->Ing_id}}">
   
</div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Name</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="ingname" value="{{$selected->Ing_name}}" placeholder="name" class="form-control"  type="text">
    </div>
  </div>
</div>



<!-- radio checks -->
 <div class="form-group">
                        <label class="col-md-4 control-label">Type</label>
                        <div class="col-md-4">
                          @foreach($ingredients as $ingredient)
                            <div class="radio">
                                <label>
                                    <input type="radio" name="type" value="{{$ingredient->Ing_type_id}}" /> {{$ingredient->Ing_type}}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>


 @endforeach
<!-- Success message -->
<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button type="submit" s class="btn btn-warning" >Send <span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>

</fieldset>
</form>
</div>
    </div><!-- /.container -->
@endsection
