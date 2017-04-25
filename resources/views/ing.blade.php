@extends('main')
@section('body')
<div class="container">
  <legend>Existing Ingredients!!!</legend>

    

  <div class="table">
    
    <div class="row header blue">
      <div class="cell">
        Ingredient ID 
      </div>
      <div class="cell">
        Name
      </div>
      <div class="cell">
        Type
      </div>
      <div class="cell">
        Action
      </div>
    </div>
    @foreach ($inglist as $ing)
    <div class="row">
      <div class="cell">
        {{$ing->Ing_id}}
      </div>
      <div class="cell">
        {{$ing->Ing_name}}
      </div>
      <div class="cell">
        {{$ing->Ing_type}}
      </div>
      <div class="cell">
        <a href="{{ url('ing/edit/'.$ing->Ing_id) }}" class="btn btn-success btn-sm">Edit</a>   
   <a href="{{ url('ing/delete/'.$ing->Ing_id) }}" class="btn btn-warning btn-sm">Delete  </a>
      </div>
    </div>
    @endforeach
    
  
  
</div>

    


    <form  class="well form-horizontal" action="{{url('adding')}}" method="POST" enctype="multipart/form-data"  id="contact_form">
{{csrf_field()}}
<fieldset>

  

<!-- Form Name -->
<legend>Add Ingredients!</legend>

<!-- Text input-->



<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Name</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="ingname" placeholder="name" class="form-control"  type="text">
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



<!-- Success message -->
<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button type="submit" class="btn btn-warning" >Send <span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>

</fieldset>
</form>
</div>
    </div><!-- /.container -->
@endsection
<style type="text/css">
  body {
  font-family: "Helvetica Neue", Helvetica, Arial;
  font-size: 14px;
  line-height: 20px;
  font-weight: 400;
  color: #3b3b3b;
  -webkit-font-smoothing: antialiased;
  font-smoothing: antialiased;
  background: #2b2b2b;
}

.wrapper {
  margin: 0 auto;
  padding: 40px;
  max-width: 800px;
}

.table {
  margin: 0 0 40px 0;
  width: 20%;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
  display: table;
  text-align: center;
}
@media screen and (max-width:40%) {
  .table {
    display: block;
  }
}

.row {
  display: table-row;
  background: #f6f6f6;
}
.row:nth-of-type(odd) {
  background: #e9e9e9;
}
.row.header {
  font-weight: 900;
  color: #ffffff;
  background: #ea6153;
}
.row.green {
  background: #27ae60;
}
.row.blue {
  background: #2980b9;
}
@media screen and (max-width: 580px) {
  .row {
    padding: 8px 0;
    display: block;
  }
}

.cell {
  padding: 6px 12px;
  display: table-cell;
}
@media screen and (max-width: 580px) {
  .cell {
    padding: 2px 12px;
    display: block;
  }
}

</style>