@extends('main')
@section('body')
<html>
<body>
<div class="container" style=" margin-right: -90px;">
  <div class="row">
    <div class="col-xs-6 col-sm-8 col-lg user-details" style="margin: auto;">
            <div class="user-image">
                <img src="/upload/usrimg/{{$user->image}}" alt="{{$user->name}}" title="{{$user->name}}" border="5" width="100" height="100"  class="img-circle">
            </div>
            <div class="user-info-block">
                <div class="user-heading">
                    <h3>{{$user->name}}</h3>
                    <span class="help-block">{{$user->address}}</span>
                </div>
                <ul class="navigation">
                    <li class="active">
                        <a data-toggle="tab" href="#information">
                           Info
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#settings">
                            <!-- <span class="glyphicon glyphicon-cog"></span> -->
                            Saved Recipes
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#email">
                            Uploaded recipes
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#events">
                            Food Cooking??? Feeling bored
                        </a>
                    </li>
                </ul>
                <div class="user-body">
                    <div class="tab-content">
                        <div id="information" class="tab-pane active">
                            <h4>Account Information</h4>
                            <h6>{{$user->gender}}</h6><h6>Lives in {{$user->address}} </h6>
                              <h5>DOB:</h5><h6>{{$user->dob}}</h6>
                              <h5>works as: {{$user->job}}</h5>
                            <h5>About me:</h5><h6>{{$user->about}} </h6>
                        </div>
                        <div id="settings" class="tab-pane">
                            <h4>Saved Recipes</h4>

              @foreach($recipelist as $recipe)
      <div class="col-md-4 portfolio-item">
        <a href="{{ url('view/'.$recipe->recipe_id) }}">
            <img class="img-responsive" src="/upload/images/{{$recipe->image}}" alt="">
        
        <h3>
        {{$recipe->Recipe_name}}</a>
        </h3>
        <div style="  display: block;
  text-overflow: ellipsis;
  word-wrap: break-word;
  overflow: hidden;
  
  line-height: 1.8em;"><p >Description: {{$recipe->Recipe_desc}}</p>
<p>Duration: {{$recipe->Recipe_duration}}</p>

<p>Cusine: {{$recipe->Cusine_name}}</p>

<p>Type: {{$recipe->Recipe_type_name}}</p>
</div>       
        <p> {{$recipe->likes}} users like'd this recipe</p>
                            <a href="{{ url('like/'.$recipe->recipe_id) }}">like </a>
                            
                            <a href="{{ url('save/'.$recipe->recipe_id) }}">SAVE</a>
                        
  <a href="{{ url('view/'.$recipe->recipe_id) }}" cssclass="btn btn-info btn-xs" >Read more</a></p>
  <p>--------------</p>
        <div style="  display: block;
  text-overflow: ellipsis;
  word-wrap: break-word;
  overflow: hidden;
  max-height: 3.6em;
  line-height: 1.8em;"><p>Ingredients: {{$recipe->recipe_ingredients}}</p>
  </div> 

  <div class="btn-group" role="group" aria-label="Basic example"> 
  <a href="{{ url('edit/'.$recipe->recipe_id) }}" class="btn btn-success btn-sm">Edit</a>   
   <a href="{{ url('delete/'.$recipe->recipe_id) }}" class="btn btn-warning btn-sm">Delete  </a>
</div>

    </div>  

@endforeach
                        </div>
                        <div id="email" class="tab-pane">
                            <h4>Uploaded Recipes</h4>

              @foreach($uploadedrecipes as $urecipe)
      <div class="col-md-4 portfolio-item">
        <a href="{{ url('view/'.$urecipe->recipe_id) }}">
            <img class="img-responsive" src="/upload/images/{{$urecipe->image}}" alt="">
        
        <h3>
        {{$urecipe->Recipe_name}}</a>
        </h3>
        <div style="  display: block;
  text-overflow: ellipsis;
  word-wrap: break-word;
  overflow: hidden;
  
  line-height: 1.8em;"><p >Description: {{$urecipe->Recipe_desc}}</p>
<p>Duration: {{$urecipe->Recipe_duration}}</p>

<p>Cusine: {{$urecipe->Cusine_name}}</p>

<p>Type: {{$urecipe->Recipe_type_name}}</p>
</div>       
        <p> {{$urecipe->likes}} users like'd this recipe</p>
                            <a href="{{ url('like/'.$urecipe->recipe_id) }}">like </a>
                            
                            <a href="{{ url('save/'.$urecipe->recipe_id) }}">SAVE</a>
                        
  <a href="{{ url('view/'.$urecipe->recipe_id) }}" cssclass="btn btn-info btn-xs" >Read more</a></p>
  <p>--------------</p>
        <div style="  display: block;
  text-overflow: ellipsis;
  word-wrap: break-word;
  overflow: hidden;
  max-height: 3.6em;
  line-height: 1.8em;"><p>Ingredients: {{$urecipe->recipe_ingredients}}</p>
  </div> 

  <div class="btn-group" role="group" aria-label="Basic example"> 
  <a href="{{ url('edit/'.$recipe->recipe_id) }}" class="btn btn-success btn-sm">Edit</a>   
   <a href="{{ url('delete/'.$recipe->recipe_id) }}" class="btn btn-warning btn-sm">Delete  </a>
</div>

    </div>  

@endforeach
                        </div>
                        <div id="events" class="tab-pane">
                            <h4>Events</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
</div>

<style type="text/css">
    body {background: #EAEAEA;}
.user-details {position: relative; padding: 0;}
.user-details .user-image {position: relative;  z-index: 1; width: 100%; text-align: center;}
 .user-image img { clear: both; margin: auto; position: relative;}

.user-details .user-info-block {width: 100%; position: absolute; top: 55px; background: rgb(255, 255, 255); z-index: 0; padding-top: 35px;}
 .user-info-block .user-heading {width: 100%; text-align: center; margin: 10px 0 0;}
 .user-info-block .navigation {float: left; width: 100%; margin: 0; padding: 0; list-style: none; border-bottom: 1px solid #428BCA; border-top: 1px solid #428BCA;}
  .navigation li {float: left; margin: 0; padding: 0;}
   .navigation li a {padding: 20px 30px; float: left;}
   .navigation li.active a {background: #428BCA; color: #fff;}
 .user-info-block .user-body {float: left; padding: 5%; width: 90%;}
  .user-body .tab-content > div {float: left; width: 100%;}
  .user-body .tab-content h4 {width: 100%; margin: 10px 0; color: #333;}
</style>
</body>
</html>
@endsection