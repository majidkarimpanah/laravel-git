<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});


/*Route::resource('/post/','PostsController');
Route::get('/show/{id}/{name}/{password}','PostsController@showMyView');
Route::get('/contact','PostsController@contact');

Route::get('/insert','PostsController@insert');
Route::get('/select','PostsController@select');
Route::get('/update','PostsController@update');
Route::get('/delete','PostsController@delete');

Route::get('posts','PostsController@getAllPosts');
Route::get('save-posts','PostsController@savePost');
Route::get('update-posts','PostsController@updatePost');
Route::get('delete-posts','PostsController@deletePost');


//on to one relation
Route::get('user/{id}/posts',function ($id){
    $user_post=\App\User::find($id)->post;
    return $user_post;
});
Route::get('post/{id}/user',function ($id){
    $user_post=\App\Post::find(3)->user;
    return $user_post;
});

//one to many relation
Route::get('user/{id}/posts',function ($id){
    $user_post=\App\User::find($id)->posts;
    return $user_post;
});
Route::get('post/{id}/user',function ($id){
    $user_post=\App\Post::find(3)->user;
    return $user_post;
});


//many to many
Route::get('user/{id}/roles',function ($id){
    $user_roles=\App\User::find($id)->roles;
    foreach ($user_roles as $role){
        echo $role->name.' '.$role->created_at .'<br>';
    }
});

Route::get('role/{id}/user',function ($id){
    $role_user=\App\User::find($id)->roels;
    return $role_user;
});

//hasManyThrough relation
Route::get('user/country',function (){
    $user_country=\App\Country::find(1);
    foreach ($user_country->posts as $item){
        echo $item->body.'<br>';
    }
});*/


//polymorphic relationship one to many
/*Route::get('user/photos',function (){
    $user_photos=\App\User::find(1);
    foreach ($user_photos->photos as $item){
        echo $item->path.'<br>';
    }
});
Route::get('photo/user',function (){
    $photo_user=\App\Photo::find(2);
    return $photo_user->imageable;
});

//polymorphic relationship many to many
Route::get('post/tags',function (){
    $post_tags=\App\video::find(2);
    foreach ($post_tags->tags as $item){
        echo $item->name.'<br>';
    }
});
Route::get('tag/post',function (){
    $tag_post=\App\Tag::find(2);
    foreach ($tag_post->videos as $item){
        echo $item->name.'<br>';
    }
});*/


//CRUD ono to many relationship
/*Route::get('/create',function (){
   $user=\App\User::find(1);
   $post=new \App\Post();
   $post->title='post new title...';
   $post->body='post new body...';
   $user->posts()->save($post);
});
Route::get('/read',function (){
    $user=\App\User::find(1);
    foreach ($user->posts as $post){
        echo $post->title.'<br>';
    }
});
Route::get('/update',function (){
    $user=\App\User::find(1);
    $user->posts()->whereId(4)->update(['title'=>'nnnnn']);
});
Route::get('/update',function (){
    $user=\App\User::find(1);
    $user->posts()->whereId(4)->delete();
});



//CRUD many to many relationship
Route::get('/create',function (){
   $user=\App\User::find(1);
   // $role=new \App\Role();
   // $role->name='نویسنده';
    $user->roles()->save($role);
});
Route::get('/read',function (){
    $user=\App\User::find(1);
    foreach ($user->roles as $role){
        echo $role->name.'<br>';
    }
});
Route::get('/update',function (){
    $user=\App\User::find(1);
    if ($user->has('roles')){
        foreach ($user->roles as $role){
            if ($role->name=='نویسنده'){
                $role->name='Author';
                $role->save();
            }
        }
    }
});
Route::get('/delete',function (){
    $user=\App\User::find(1);
    foreach ($user->roles as $role){
        if ($role->name=='َAuthor'){
            $role->delete();
        }
    }
});
Route::get('/detach',function (){
    $user=\App\User::find(1);
    $user->roles()->whereId(14)->detach();
});
Route::get('/attach',function (){
    $user=\App\User::find(1);
    $user->roles()->attach(6);
});
Route::get('/sync',function (){
    $user=\App\User::find(1);
    $user->roles()->sync([2,3]);
});



//CRUD polymorphic relationship
Route::get('/create',function (){
    $video=\App\video::find(1);
    $video->tags()->create(['name'=>'video tag2..']);
});
Route::get('read',function (){
    $video=\App\video::find(1);
    foreach ($video->tags as $tag){
        echo $tag->name.'<br>';
    }
});
Route::get('update',function (){
    $video=\App\video::find(1);
    $tag=$video->tags;
    $newTag=$tag->where('id',3)->first();
    $newTag->name='edit tag..';
    $newTag->save();
});
Route::get('delete',function (){
    $video=\App\video::find(1);
    $tag=$video->tags;
    $tagdeleted=$tag->where('id',3)->first();
    $tagdeleted->delete();
});
Route::get('detach',function (){
    $video=\App\video::find(1);
    $video->tags()->detach();
});
Route::get('attach',function (){
    $video=\App\video::find(1);
    $video->tags()->attach(1);
});
Route::get('sync',function (){
    $video=\App\video::find(1);
    $video->tags()->sync([2,3]);
});*/



//form Route

Route::get('file',function (){
    //$file=\Illuminate\Support\Facades\Storage::disk('public')->get('images/AChGoowUEAVySOW6avwSEh9Px60BBPKTWNtTH4qu.jpeg');
    $file=\Illuminate\Support\Facades\Storage::disk('public')->get('images/AChGoowUEAVySOW6avwSEh9Px60BBPKTWNtTH4qu.jpeg');
    return $file;
});





Auth::routes(['verify'=>true]);

Route::get('/home','HomeController@index')->name('home');

Route::middleware(['auth','verified'])->group(function (){
   Route::get('/home','HomeController@index')->name('home');
    Route::resource('posts','PostsController');

});

//Route::get('/');

//Route::get('/',function (){
    /*$user= Auth::user();
    $id=Auth::id();
    if (Auth::check()){
        echo "Hello usrr :".$user->name.'id :'.$id;
    }else{
        return redirect('home');
    }*/
   // $email='reza@gmail.com';
   // $password='12345678';
   // $auth=Auth::attempt(['email'=>$email,'password'=>$password]);
    //dd($auth);
    //Auth::logout();
    //$user=Auth::loginUsingId(3);
    //dd($user);
//});

Route::get('/admin',function (){
    echo "Hello admin....";
})->middleware('isAdmin:مدیر');
