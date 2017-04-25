<?php

namespace App\Http\Controllers;
use Validator,  Redirect; 
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Recipe;
use App\saverecipe;
use App\likerecipe;
use Auth;
use App\ingtype;
use App\recipelist;
use App\recipecusine;
use App\recipetype;
use App\User;
use App\recipeview;
use App\inglist;
use Image;
use Socialite;

class RecipeController extends Controller
{
        public function reguser(Request $request){
$rules = array(
            'email'    => 'required|email|max:255|unique:users',

        );

        $errors = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($errors->fails()) {
            return Redirect::back()
                ->withErrors($errors) // send back all errors to the login form
                ->withInput();

            $input = input::all();

        } else {            $password =  bcrypt ($request['password']);
                $user = new User;
                $user->name = $request['firstname']. ' ' . $request['lastname']; 
                $user->email = $request['email'];
                $user->password = $password;
                $user->job = $request['jobb'];
                   $user->cook_level = $request['cooklevel'];
                $user->address = $request['country']. ' ' . $request['city'];
                $user->gender = $request['gender'];
                $user->dob = $request['dob'];
                $user->about = $request['about'];
                if( $request->hasFile('image') ){
                    $image=$request->file('image');
                    $filename = time().'.'. $image->getClientOriginalExtension();
                    Image::make($image)->resize(700,400)->save(public_path('upload/usrimg/'. $filename));
                    $user->image = $filename;
                    }


                $user->save();
                    return redirect('login') ;
     }       }


      public function userprof()
      {
        $user = User::find((Auth::id()));
                $savedrecipes = DB::table('recipe_list')
->select('recipe_list.recipe_id','recipe_list.Recipe_name',
                 'recipe_list.Recipe_desc','recipe_list.Recipe_duration',
                DB::raw('group_concat(distinct ing_list.Ing_name separator ",") as recipe_ingredients'),
                'recipe_cusine.Cusine_name', 'recipe_type.Recipe_type_name','recipe_list.image',
                DB::raw(' count(distinct likerecipes.id) as likes'))
                            ->join('recipe_inglist', 'recipe_list.recipe_id','=','recipe_inglist.Recipe_id')
                            ->join('ing_list', 'recipe_inglist.Ing_id','=','ing_list.ing_id')
                            ->join('recipe_cusine', 'recipe_list.Recipe_cusine_id','=','recipe_cusine.cusine_id')
                            ->join('save_recipes', 'recipe_list.recipe_id','=','save_recipes.recipe_id')
                            ->join('recipe_type', 'recipe_list.Recipe_type_id','=','recipe_type.Recipe_typeID')
                            ->join( 'likerecipes', 'recipe_list.recipe_id', '=', 'likerecipes.recipe_id')
                            ->where('save_recipes.user_id','=', + Auth::id())
                            ->groupBy('recipe_list.recipe_id', 'recipe_list.recipe_name','recipe_list.recipe_desc','recipe_list.recipe_duration', 'recipe_cusine.Cusine_name','recipe_type.Recipe_type_name','recipe_list.image' )->get() ; 

               $uploadedrecipes  = DB::table('recipe_list')
->select('recipe_list.recipe_id','recipe_list.Recipe_name',
                 'recipe_list.Recipe_desc','recipe_list.Recipe_duration',
                DB::raw('group_concat(distinct ing_list.Ing_name separator ",") as recipe_ingredients'),
                'recipe_cusine.Cusine_name', 'recipe_type.Recipe_type_name','recipe_list.image',
                DB::raw(' count(distinct likerecipes.id) as likes'))
                            ->join('recipe_inglist', 'recipe_list.recipe_id','=','recipe_inglist.Recipe_id')
                            ->join('ing_list', 'recipe_inglist.Ing_id','=','ing_list.ing_id')
                            ->join('recipe_cusine', 'recipe_list.Recipe_cusine_id','=','recipe_cusine.cusine_id')
                            
                            ->join('recipe_type', 'recipe_list.Recipe_type_id','=','recipe_type.Recipe_typeID')
                            ->join( 'likerecipes', 'recipe_list.recipe_id', '=', 'likerecipes.recipe_id')
                            ->where('recipe_list.uploader_id','=', + Auth::id())
                            ->groupBy('recipe_list.recipe_id', 'recipe_list.recipe_name','recipe_list.recipe_desc','recipe_list.recipe_duration', 'recipe_cusine.Cusine_name','recipe_type.Recipe_type_name','recipe_list.image' )->get() ; 
                
                /*var_dump($uploadedrecipes);
                die();*/
                return view ('userprof',  ['recipelist'=>$savedrecipes, 'uploadedrecipes'=>$uploadedrecipes],compact('user'));
     }

        public function likerec($id)
        {/*var_dump($id);
           var_dump(Auth::id());
           die();*/
            
                $like = new likerecipe;
                $like->recipe_id = $id;
                $like->user_id=(Auth::id()); 
          $like->save();
                    return redirect('view') ;
        }

         public function saverec($id)
        {/*var_dump($id);
           var_dump(Auth::id());
           die();*/
            
                $like = new saverecipe;
                $like->recipe_id = $id;
                $like->user_id=(Auth::id()); 
          $like->save();
                    return redirect('view') ;
        }

        public function logout()
        { Auth::logout(); // log the user out of our application
            return view('welcome'); // redirect the user to the login screen
        }

    /*front view*/
          public function front(){   
                $user = User::all();
                $recipes = DB::table('recipe_list')
->select('recipe_list.recipe_id','recipe_list.Recipe_name',
                 'recipe_list.Recipe_desc','recipe_list.Recipe_duration',
                DB::raw('group_concat(distinct ing_list.Ing_name separator ",") as recipe_ingredients'),
                'recipe_cusine.Cusine_name', 'recipe_type.Recipe_type_name','recipe_list.image',
                DB::raw(' count(distinct likerecipes.id) as likes'))
                            ->join('recipe_inglist', 'recipe_list.recipe_id','=','recipe_inglist.Recipe_id')
                            ->join('ing_list', 'recipe_inglist.Ing_id','=','ing_list.ing_id')
                            ->join('recipe_cusine', 'recipe_list.Recipe_cusine_id','=','recipe_cusine.cusine_id')
                            ->join('recipe_type', 'recipe_list.Recipe_type_id','=','recipe_type.Recipe_typeID')
                            ->join( 'likerecipes', 'recipe_list.recipe_id', '=', 'likerecipes.recipe_id')
                            ->where('recipe_list.uploader_id','=','1')
                            ->groupBy('recipe_list.recipe_id', 'recipe_list.recipe_name','recipe_list.recipe_desc','recipe_list.recipe_duration', 'recipe_cusine.Cusine_name','recipe_type.Recipe_type_name','recipe_list.image' )->get() ;   
                return view ('first',  ['recipelist'=>$recipes],compact('user'));

            }

              /*viewing Recipes*/
               public function recipeall(){
                $likes = likerecipe::all();
               $selected = DB::table('recipe_list')
               ->select('recipe_list.recipe_id','recipe_list.Recipe_name',
                 'recipe_list.Recipe_desc','recipe_list.Recipe_duration',
                DB::raw('group_concat(distinct ing_list.Ing_name separator ",") as recipe_ingredients'),
                'recipe_cusine.Cusine_name', 'recipe_type.Recipe_type_name','recipe_list.image',
                DB::raw(' count(distinct likerecipes.id) as likes'))
                            ->join('recipe_inglist', 'recipe_list.recipe_id','=','recipe_inglist.Recipe_id')
                            ->join('ing_list', 'recipe_inglist.Ing_id','=','ing_list.ing_id')
                            ->join('recipe_cusine', 'recipe_list.Recipe_cusine_id','=','recipe_cusine.cusine_id')
                            ->join('recipe_type', 'recipe_list.Recipe_type_id','=','recipe_type.Recipe_typeID')
                            ->join( 'likerecipes', 'recipe_list.recipe_id', '=', 'likerecipes.recipe_id')
                            ->where('recipe_list.uploader_id','=','1')
                            ->groupBy('recipe_list.recipe_id', 'recipe_list.recipe_name','recipe_list.recipe_desc','recipe_list.recipe_duration', 'recipe_cusine.Cusine_name','recipe_type.Recipe_type_name','recipe_list.image' )->get() ;
             /*$recipes = Recipe::paginate(3); */
                
       return view ('view', ['recipelist'=>$selected]);
                      }

               public function alluserrecipe(){
                $likes = likerecipe::all();
               $selected = DB::table('recipe_list')
               ->select('recipe_list.recipe_id','recipe_list.Recipe_name',
                 'recipe_list.Recipe_desc','recipe_list.Recipe_duration',
                DB::raw('group_concat(distinct ing_list.Ing_name separator ",") as recipe_ingredients'),
                'recipe_cusine.Cusine_name', 'recipe_type.Recipe_type_name','recipe_list.image',
                DB::raw(' count(distinct likerecipes.id) as likes'))
                            ->join('recipe_inglist', 'recipe_list.recipe_id','=','recipe_inglist.Recipe_id')
                            ->join('ing_list', 'recipe_inglist.Ing_id','=','ing_list.ing_id')
                            ->join('recipe_cusine', 'recipe_list.Recipe_cusine_id','=','recipe_cusine.cusine_id')
                            ->join('recipe_type', 'recipe_list.Recipe_type_id','=','recipe_type.Recipe_typeID')
                            ->join( 'likerecipes', 'recipe_list.recipe_id', '=', 'likerecipes.recipe_id')
                            ->where('recipe_list.uploader_id','!=','1')
                            ->groupBy('recipe_list.recipe_id', 'recipe_list.recipe_name','recipe_list.recipe_desc','recipe_list.recipe_duration', 'recipe_cusine.Cusine_name','recipe_type.Recipe_type_name','recipe_list.image' )->get() ;
             /*$recipes = Recipe::paginate(3); */
                
       return view ('alluserrecipe', ['recipelist'=>$selected]);
                      }                      


            public function view($id){
            $selected = DB::table('recipe_list')
               ->select('recipe_list.recipe_id','recipe_list.Recipe_name',
                 'recipe_list.Recipe_desc','recipe_list.Recipe_duration',
                DB::raw('group_concat(distinct ing_list.Ing_name)  separator ",") as recipe_ingredients'),

                'recipe_cusine.Cusine_name', 'recipe_type.Recipe_type_name','recipe_list.image',
                DB::raw(' count(distinct likerecipes.id) as likes'))
                            ->join('recipe_inglist', 'recipe_list.recipe_id','=','recipe_inglist.Recipe_id')
                            ->join('ing_list', 'recipe_inglist.Ing_id','=','ing_list.ing_id')
                            ->join('recipe_cusine', 'recipe_list.Recipe_cusine_id','=','recipe_cusine.cusine_id')
                            ->join('recipe_type', 'recipe_list.Recipe_type_id','=','recipe_type.Recipe_typeID')
                            ->join( 'likerecipes', 'recipe_list.recipe_id', '=', 'likerecipes.recipe_id')
                            ->where('recipe_list.recipe_id','>=','1')
                            ->groupBy('recipe_list.recipe_id', 'recipe_list.recipe_name','recipe_list.recipe_desc','recipe_list.recipe_duration', 'recipe_cusine.Cusine_name','recipe_type.Recipe_type_name','recipe_list.image' )->get() ;
            //dd($id);
            $recipes = Recipe::all();
            return view('detail', ['recipelist'=>$selected], compact('recipes')); 

            // $recipes = Recipe::all();   
            //return view ('detail', ['recipelist'=>$recipes]);
            }


                  /*viewing recipes*/


                 /*<------------------------------RECIPE------------------------------>*/ 
        public function rec(){
              $ing = inglist::all();
              $rcusine=recipecusine::all();
              $rtype=recipetype::all();
              $rec = DB::table('recipe_list')
               ->select('recipe_list.recipe_id','recipe_list.Recipe_name',
                 'recipe_list.Recipe_desc','recipe_list.Recipe_duration',
                DB::raw('group_concat(distinct ing_list.Ing_name separator ",") as recipe_ingredients'),
                DB::raw('group_concat(distinct recipe_inglist.quantity  separator ",") as ingredients_amount'),
                'recipe_cusine.Cusine_name', 'recipe_type.Recipe_type_name','recipe_list.image',
                DB::raw(' count(distinct likerecipes.id) as likes'))
                            ->join('recipe_inglist', 'recipe_list.recipe_id','=','recipe_inglist.Recipe_id')
                            ->join('ing_list', 'recipe_inglist.Ing_id','=','ing_list.ing_id')
                            ->join('recipe_cusine', 'recipe_list.Recipe_cusine_id','=','recipe_cusine.cusine_id')
                            ->join('recipe_type', 'recipe_list.Recipe_type_id','=','recipe_type.Recipe_typeID')
                            ->join( 'likerecipes', 'recipe_list.recipe_id', '=', 'likerecipes.recipe_id')
                            ->where('recipe_list.recipe_id','>=','1')
                            ->groupBy('recipe_list.recipe_id', 'recipe_list.recipe_name','recipe_list.recipe_desc','recipe_list.recipe_duration', 'recipe_cusine.Cusine_name','recipe_type.Recipe_type_name','recipe_list.image' )->get() ;
/*              var_dump($rec);
              die();*/
                                        
              foreach ($rec as $k => &$v) {
             $names  = explode(",", $v->recipe_ingredients);
              $amount = explode(",", $v->ingredients_amount);
              $temp   = [];
             foreach ($names as $key => $value) {
            $temp[] = $amount[$key] . ' of ' . $value;
            }
            if ($temp) {
              $v->ingredient = implode(",", $temp);
    }



            return view('recipe', ['ingredients'=>$ing, 'cusine'=>$rcusine, 'type'=>$rtype,'recipe'=>$rec]);
                

     }       }

            public function addrec(Request $request){
            
                $recipe = new recipelist;
                $recipe->recipe_name = $request['recname']; 
               $recipe->Recipe_desc = $request['desc'];
                $recipe->Recipe_duration = $request['duration'];
                $recipe->Recipe_cusine_id = $request['cusine'];
                $recipe->Recipe_type_id = $request['type'];
                $recipe->uploader_id = Auth::id();
                if( $request->hasFile('image') ){
                    $image=$request->file('image');
                    $filename = time().'.'. $image->getClientOriginalExtension();
                    Image::make($image)->resize(700,400)->save(public_path('upload/images/'. $filename));
                    $recipe->image = $filename;
                    }

                $recipe->save();
                    return redirect('recipe/add/ing') ;
            }
              public function selectrecing(){
                  $recipe = DB::select(DB::raw('select recipe_id, Recipe_name from recipe_list where recipe_id = (select max(`recipe_id`) from recipe_list)'));
                  $vegi=  DB::select(DB::raw('select * from ing_list where Ing_type_id=1'));
                  $dairyi=  DB::select(DB::raw('select * from ing_list where Ing_type_id=2'));
                  $meati=  DB::select(DB::raw('select * from ing_list where Ing_type_id=3'));
               
                 return view ('recipeing', ['recipe'=>$recipe, 'ving'=>$vegi, 'ding'=>$dairyi, 'ming'=>$meati] );   
                } 
            

                public function addrecing(Request $request){
            /*    var_dump($request['ing']);
                var_dump ($request['ing']);*/
              //  $checkBox = array();
               $dataSet = [];
                foreach ($request['ing'] as $ing) {
                    $dataSet[] = [

                        'Recipe_id'    =>  $request['id'],
                        'Ing_id'       => $ing,

                    ];
                }
                $like = new likerecipe;
                $like->recipe_id = $request['id'];
                $like->user_id=(Auth::id()); 
          $like->save();

                DB::table('recipe_inglist')->insert($dataSet);
               
                    return redirect('recipe');
                }


                   public function editrec($id){

              $ing = inglist::all();
              $rcusine=recipecusine::all();
              $rtype=recipetype::all();
              $rec = DB::table('recipe_list')
               ->select('recipe_list.recipe_id','recipe_list.Recipe_name','recipe_list.Recipe_desc','recipe_list.Recipe_duration', DB::raw('group_concat(ing_list.Ing_name separator ",") as recipe_ingredients'),'recipe_cusine.Cusine_name', 'recipe_type.Recipe_type_name','recipe_list.image')
                            ->join('recipe_inglist', 'recipe_list.recipe_id','=','recipe_inglist.Recipe_id')
                            ->join('ing_list', 'recipe_inglist.Ing_id','=','ing_list.ing_id')
                            ->join('recipe_cusine', 'recipe_list.Recipe_cusine_id','=','recipe_cusine.cusine_id')
                            ->join('recipe_type', 'recipe_list.Recipe_type_id','=','recipe_type.Recipe_typeID')
                            ->where('recipe_list.recipe_id','=',+$id)
                            ->groupBy('recipe_list.recipe_id', 'recipe_list.recipe_name','recipe_list.recipe_desc','recipe_list.recipe_duration', 'recipe_cusine.Cusine_name','recipe_type.Recipe_type_name','recipe_list.image' )->get() ;
/*              var_dump($rec);
              die();*/
            return view('editrecipe', ['ingredients'=>$ing, 'cusine'=>$rcusine, 'type'=>$rtype,'recipe'=>$rec]); 
            }

            public function updaterec(Request $request){
               $recipe= recipelist::find($request['rec_id']);
               $recipe->recipe_name= $request['recname'];                 
                 $recipe->recipe_desc= $request['desc'];
                 $recipe->recipe_duration = $request['duration'];
                 if( $request->has('cusine') ){
                  $recipe->recipe_cusine_id = $request['cusine'];}
                   if( $request->has('type') ){
                   $recipe->Recipe_type_id = $request['type'];}
                if( $request->hasFile('image') ){
                    $image=$request->file('image');
                    $filename = time().'.'. $image->getClientOriginalExtension();
                    Image::make($image)->resize(700,400)->save(public_path('upload/images/'. $filename));
                    $recipe->image = $filename;
                    }              
            $recipe->save();
                    return redirect('recipe');

               }




               public function deleterec($id){
                $delete = DB::delete('delete FROM recipe_inglist WHERE recipe_inglist.recipe_id = ?',[$id]);
                  $delete = DB::delete('delete FROM recipe_list WHERE recipe_list.recipe_id = ?',[$id]);
                  $delete = DB::delete('delete FROM likerecipes WHERE likerecipes.recipe_id = ?',[$id]);
                  $delete = DB::delete('delete FROM save_recipes WHERE save_recipes.recipe_id = ?',[$id]);
                  
                 return redirect::back()->with('message','Operation Successful !'); 
                }                

               /*<------------------------------RECIPE------------------------------>*/ 







             /*<------------------------------INGREDIENT------------------------------>*/


            public function ing(){
              $ing = ingtype::all();
              $alling= DB::select('select il.Ing_id, il.Ing_name, it.Ing_type 
                    from ing_list il 
                    inner join ing_type it on il.Ing_type_id = it.Ing_type_id
                    order by il.ing_id;');
            return view('ing', ['ingredients'=>$ing, 'inglist'=>$alling]); 
                

            }
             public function adding(Request $request){
        
                $ingredient = new inglist;
                $ingredient->Ing_name = $request['ingname'];
                $ingredient->Ing_type_id = $request['type'];     
                $ingredient->save();
                    return redirect('ing');
            }

            public function editing($id){
            $ing = ingtype::all();
            $selected = DB::select("select Ing_id, Ing_name, Ing_type_id from ing_list where Ing_id=?",[$id]);
            
            return view('editing', compact('selected'), ['ingredients'=>$ing]);     
            }

             public function updateing(Request $request){
                DB::table('ing_list')
                     ->where('Ing_id',$request['id'])
                     ->update(['Ing_name' => $request['ingname'],

                                'Ing_type_id' => $request['type'] ]);
    /*             $ingredient= inglist::find($request['id']);
                 $ingredient->Ing_name= $request['ingname'];
                 $ingredient->Ing_type_id= $request['type'];*/
          /*  $ingredient->save();*/
                    return redirect('ing');

            }

             public function deleteing($id){
                  $delete = DB::delete('delete FROM ing_list WHERE ing_list.ing_id = ?',[$id]);
                 return redirect ('ing');   
                }                



                          /*<------------------------------INGREDIENT------------------------------>*/  

            public function form(){   
           
                return view ('form');

            }

            
            public function eg(){   
               

                return view ('register1');

            }

      public function main(){   
                $user = User::all();   
                return view('main', compact('user'));
            }

           
 

           public function addrecipe(){
                return view ('addrecipe');
                //$users = User::all();   
                //return view ('addrecipe', ['userslist'=>$users]);
            } //

 

            public function add(Request $request){
            
              $recipe = new Recipe;
              $recipe->recipe_name = $request['recipe'];
              $recipe->recipe_ingredients = $request['ingredients'];
              $recipe->recipe_desc = $request['desc'];
              $recipe->recipe_info = $request['info'];
              
              if( $request->hasFile('image') ){
                $image=$request->file('image');
                $filename = time().'.'. $image->getClientOriginalExtension();
                Image::make($image)->resize(700,400)->save(public_path('upload/images/'. $filename));
                $recipe->image = $filename;
          }               
                $recipe->save();
                return redirect('view');
            }

                  public function edit($id){
             $selected = Recipe::find($id);
            return view('editrecipe', compact('selected'));    
            }


            public function update(Request $request){
                 $recipe= Recipe::find($request['id']);
               
                 /*  var_dump($recipe);
                 die; */
                 $recipe->recipe_name= $request['recipe'];
                 $recipe->recipe_ingredients= $request['ingredients'];
                 $recipe->recipe_desc= $request['desc'];
                if( $request->hasFile('image') ){
                    $image=$request->file('image');
                    $filename = time().'.'. $image->getClientOriginalExtension();
                    Image::make($image)->resize(700,400)->save(public_path('upload/images/'. $filename));
                    $recipe->image = $filename;
                    }              
            $recipe->save();
                    return redirect('view');

            }


            public function delete($id){
                  if ( recipelist::find($id)->delete() ){
                 return redirect ('view');   
                }
            }  





             }
           

