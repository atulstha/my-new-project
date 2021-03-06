@extends('main')
@section('body')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Recipes
                    <small>"Feel free to browse"</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->

        <div class="row">
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
<!-- LikeBtn.com BEGIN -->
<a href="{{ url('like/'.$recipe->recipe_id) }}"><span class="likebtn-wrapper" data-theme="drop" data-identifier="item_1" data-loader_show="true"></span>
<script>(function(d,e,s){if(d.getElementById("likebtn_wjs"))return;a=d.createElement(e);m=d.getElementsByTagName(e)[0];a.async=1;a.id="likebtn_wjs";a.src=s;m.parentNode.insertBefore(a, m)})(document,"script","//w.likebtn.com/js/w/widget.js");</script>
<!-- LikeBtn.com END --></a>
        <p> {{$recipe->likes}} users like'd this recipe</p>

                          <!-----<a href="{{ url('like/'.$recipe->recipe_id) }}">like </a> -->
                            
                            <a class="btn btn-success btn-sm" href="{{ url('save/'.$recipe->recipe_id) }}">SAVE</a>
                        
  <a href="{{ url('view/'.$recipe->recipe_id) }}" cssclass="btn btn-info btn-xs" >Read more</a></p>
  <p>--------------</p>
  <div style="  display: block;  text-overflow: ellipsis;  word-wrap: break-word; overflow: hidden; max-height: 3.6em;
  line-height: 1.8em;"><p>Ingredients: {{$recipe->recipe_ingredients}}</p>
  </div> 

  <div class="btn-group" role="group" aria-label="Basic example"> 
  <a href="{{ url('edit/'.$recipe->recipe_id) }}" class="btn btn-success btn-sm">Edit</a>   
   <a href="{{ url('delete/'.$recipe->recipe_id) }}" class="btn btn-warning btn-sm">Delete  </a>
</div>

    </div>  

@endforeach 

        </div>

        <!-- /.row -->


        <!-- /.row -->

        <hr>
        <script>
var token = '{{Session::token()}}';

        </script>
@endsection
