@extends('main')
@section('body')

 <!-- Page Content -->
 @foreach ($recipelist as $selected)
    <div class="container">

        <!-- Portfolio Item Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{$selected->Recipe_name}}
                    <small>Item Subheading</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">
                <img class="img-responsive" src="/upload/images/{{$selected->image}}" alt="">
            </div>

            <div class="col-md-4">

                <h3>Recipe Description</h3>
                <p>{{$selected->Recipe_desc}}</p>

                <h3>Ingredients</h3>
                <ul>
                    <li>{{$selected->recipe_ingredients}}</li>
                    
                </ul>
            </div>
            
<div id="disqus_thread"></div>
@endforeach
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://foodporn-1.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>


        </div>
        <!-- /.row -->

        <!-- Related Projects Row -->
        <div class="row">

            <div class="col-lg-12">
                <h3 class="page-header">Similar Items</h3>
            </div>

             @foreach($recipes as $recipe)
    <div class="col-md-4 portfolio-item">
        <a href="{{ url('view/'.$recipe->recipe_id) }}">
            <img class="img-responsive" src="/upload/images/{{$recipe->image}}" alt="">
      
        <h3>
            {{$recipe->recipe_name}}</a>
        </h3>
        <p>Description: {{$recipe->recipe_desc}}</p>
        <p>Ingredients: {{$recipe->recipe_ingredients}}</p>
    </div>          
@endforeach 

        </div>
        <!-- /.row -->

        <hr>

@endsection