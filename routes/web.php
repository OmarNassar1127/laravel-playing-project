<?php

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Photo;
use App\Models\Video;
use App\Models\Country;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use function PHPUnit\Framework\isEmpty;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//Posts controllers
//-------------------------------
// Route::get('/post/{id}', [PostController::class, 'index']);
// Route::resource('posts', PostController::class);
// Route::get('/contact', [PostController::class, 'contact']);
// Route::get('/post/{id}', [PostController::class, 'showPost']);

//Database raw SQL Queries
//-------------------------------
// Route::get('/create', function(){
//   DB::insert('Insert into posts (title, body) values (?, ?)', [
//       'Python', 
//       'Test testtesttesttest'
//   ]);
//   return 'You have successfully inserted the data!';
// });

// Route::get('/read', function(){
//   $results = DB::select('select * from posts where id=?', [1]);

//   foreach ($results as $result){
//     return $result->title;
//   }
//   // $loopTitle = $results[0]->title;
//   // $loopBody = $results[0]->body;
//   // return "Title: $loopTitle<br>Body: $loopBody";

// });

// Route::get('/update', function(){
//   $updated = DB::update('update posts set title = "Updated title" where id = ?', [1]);
//   return $updated;
// });

// Route::get('/delete', function(){
//   $delete = DB::delete('delete from posts where id=?', [1]);
//   return $delete;
// });

// Route::get('/user/{id}', function($id){
//   $user = User::findOrFail($id);
//   $getUserName = $user->name;
//   return $getUserName;
// });

//ORM 
//--------------------------------
// Route::get('/read', function(){

//   $posts = Post::all();

//   foreach ($posts as $post) {
//     $postTitle = $post->title;
//     $postBody = $post->body;

//     return "$postTitle <br> $postBody";
//   }
// });

// Route::get('/findwhere', function(){
//   $post = Post::where('id', 15)->orderBy('id', 'desc')->take(1)->get();
//   return $post;
// });

// Route::get('/basicInsert', function(){
//   $post = new Post;

//   $post->title = 'New ORM';
//   $post->body = "Wow eloquent is really cool, look at what i'M DOING, i'm going to become really successful!";
//   $post->save();

//   return 'You have inserted some data!!';
// });

// Route::get('/basicUpdate', function(){
//   $post = Post::find(4);

//   $post->title = 'New title edit from the code';
//   $post->body = "Wow eloquent is really cool, look at what i'M DOING, i'm going to become really successful!";
//   $post->save();

//   return 'You have updated some data!!';
// });

// Route::get('create', function(){
//   Post::create([
//     'title' => 'The create softdelete and that cMONNNNN',
//     'body' => 'Wow Im learning a lot with Ediwn '
//   ]);
//   return 'You have created a new item';
// });

// Route::get('/update', function(){
//   Post::where('id', 4)->where('is_admin', 0)->update(['title'=>'New PHP title', 'body' => 'I love my Laravel']);
// });

// Route::get('/delete', function(){

//   $post = Post::find(4);
//   $post->delete();
//   return 'Post deleted';

// });


// Route::get('/delete2', function(){
//   Post::destroy([10,11]);
//   return 'Post deleted';
// });

// Route::get('/softdelete', function(){
//   Post::find(12)->delete();
// });

// Route::get('/readsoftdelete', function(){
//   // $post = Post::find(15);
//   // return $post;

//   $posts = Post::withTrashed()->get();
//   return $posts;

// });

// Route::get('/restore', function(){
//   Post::withTrashed()->where('id', 15)->restore();
//   return 'You have restored a text';

// });

// Route::get('/forcedelete', function(){
  
//   Post::withTrashed()->where('id', 13)->forceDelete();
//   return 'You now have deleted the item completely';
// });

//Eloquent relationships 
//------------------
// one to one relationship
// Route::get('/user/post/{id}', function($id){
//   return User::find($id)->post->title;
//   }
// );
// Route::get('/post/user/{id}', function($id){
//   return Post::find($id)->user->name;
// });


// //One to many relationships
// Route::get('/posts', function(){
//   $user = User::find(1);

//   foreach ($user->posts as $post) {
//     echo $post->title . "<br>" . $post->body . "<br>";
//   }
// });

// Route::get('/role/user/{id}', function($id) {
//   $user = User::find($id);

//   if ($user) {
//       $roles = $user->roles;

//       foreach ($roles as $role) {
//           return $role->name;
//       }
//   } else {
//       return "User not found.";
//   }
// });

// //Accessing the intermidate table here
// Route::get('/user/pivot', function(){
//     $user = User::find(2);

//     foreach ($user->roles as $role) {
//         echo $role->pivot->updated_at;
//     }
// });

// Route::get('/user/country/{id}', function($id) {
//     $country = Country::find($id);
//     $foundPost = false;

//     foreach ($country->posts as $post) {
//         if (!empty($post->title)) {
//             $foundPost = true;
//             return $post->title;
//         }
//     }

//     if (!$foundPost) {
//         return "Sorry, there's no user that has created a post with this country id";
//     }
// });

// //Polymorphic relationships

// Route::get('/user/photo', function(){
//     $user = User::find(1);

//     foreach($user->photos as $photo){
//         return $photo;
//     }
// });

// Route::get('/post/photo', function(){
//     $posts = Post::find(2);

//     foreach($posts->photos as $photo){
//         echo $photo->parth . "<br>";
//     }
// });

// Route::get('/photo/{id}/post', function($id){
//     $photo = Photo::find($id);

//     return $photo->imageable;
// });


// // Polymorphic Many to Many
// Route::get('/tag/{id}/post', function($id){
//     $post = Post::find($id);

//     foreach ($post->tags as $tag){
//         echo $tag->name;
//     }
// });
// Route::get('/tag/{id}/video', function($id){
//     $video = Video::find($id);

//     foreach ($video->tags as $tag){
//         echo $tag->name;
//     }
// });
// Route::get('/tag/post', function(){
//     $tag = Tag::find(2);

//     foreach ($tag->posts as $post){
//         echo $post->title;
//     }
// });
// Route::get('/tag/video', function(){
//     $tag = Tag::find(1);

//     foreach ($tag->videos as $video){
//         echo $video->name;
//     }
// });
/*
|--------------------------------------------------------------------------
| Crud Application
|--------------------------------------------------------------------------
|
*/
Route::group(['middleware' => 'web'], function(){

  Route::resource('/posts', PostController::class);

  Route::get('/dates', function(){
    $date = new DateTime('+1 week');
    echo $date->format('m-d-Y');
    echo '<br>';
    echo Carbon::now();
  });
  
});















