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


     Auth::routes();

//this general auth group route
Route::group(['middleware' => 'auth'], function () {
    
     Route::post('favourite/{post}/add','FavouriteController@addFavourite')->name('post.favourite');
     //Route for comment and it's replying
     Route::post('comment/add','CommentController@commentStore')->name('comment.store'); 
     Route::post('comment/reply/add','ReplyController@replyStore')->name('reply.store'); 

});

Route::post('subscriber','SubscriberController@index')->name('subscriber');


//this group for admin 
Route::group(['as' => 'admin.','prefix' => 'admin' , 'namespace' => 'Admin', 'middleware'=> ['auth','admin']], function () {
    
     Route::get('dashboard',['as' => 'dashboard' , 'uses' => 'DashboardController@index']); 
     Route::resource('tag', 'TagsController'); 
     Route::resource('category', 'CategoryController'); 
     Route::resource('post', 'PostController');
     

     //route for ckeditor
     // Route::get('ckeditor', 'CkeditorController@index');
     // Route::post('ckeditor/upload', 'CkeditorController@upload')->name('ckeditor.upload');

     //route for admin profile update 
     Route::get('settings','SettingsController@index')->name('settings');
     Route::PUT('profile-update/{id}','SettingsController@profileUpdate')->name('profile.update');
     Route::PATCH('password-update/{id}','SettingsController@updatePassword')->name('update.password');

     //route for receive favourite post and remove
     Route::get('favourite','FavouriteController@index')->name('favourite');
     Route::post('favourite/{post}','FavouriteController@removeFavourite')->name('post.favourite');
     
     //route for receive subscriber and destroy
     Route::get('subscriber','SubscriberController@index')->name('subscriber');
     Route::delete('subscriber/{id}','SubscriberController@destroy')->name('subscriber.destroy');

     //route for post pending and approve
     Route::get('pending/post','PostController@pending')->name('post.pending');
     Route::PATCH('/post/{id}/approve','PostController@approve')->name('post.approve');
     
     //route for comment observe and destroy
     Route::get('comments','CommentController@index')->name('comments');
     Route::delete('comments/{id}','CommentController@destroy')->name('comment.destroy');

     //route for find authors and delete
     Route::get('author','AuthorsController@index')->name('author');
     Route::delete('author/{id}','AuthorsController@destroy')->name('author.destroy');

     //route for client message 
     Route::get('client/message/data','ClientMessageController@getNotification')->name('client.message.notify');
     Route::get('single/client/message/{id}','ClientMessageController@getSingleUser')->name('single.client.message');
     Route::post('client/message/reply','ClientMessageController@replyToClient');
     

});



//this route group for author
Route::group(['as' => 'author.','prefix' => 'author' , 'namespace' => 'Author', 'middleware'=> ['auth','author']], function () {
    
    Route::get('dashboard',['as' => 'dashboard' , 'uses' => 'DashboardController@index']);  
    Route::resource('post', 'PostController');

    //route for receive favourite post and remove
    Route::get('favourite','FavouriteController@index')->name('favourite');
    Route::post('favourite/{post}','FavouriteController@removeFavourite')->name('post.favourite');
     
    //route for admin profile update 
    Route::get('settings','SettingsController@index')->name('settings');
    Route::PUT('profile-update/{id}','SettingsController@profileUpdate')->name('profile.update');
    Route::PATCH('password-update/{id}','SettingsController@updatePassword')->name('update.password');
  
     //route for comment observe and destroy
     Route::get('comments','CommentController@index')->name('comments');
     Route::delete('comments/{id}','CommentController@destroy')->name('comment.destroy');

   
});





     //Route for home page
     Route::get('/','HomeController@index')->name('home');
     // Route for get data by ajax
     Route::get('load-more/data','HomeController@getDataByAjax');

     //Route for postDetails
     Route::get('post-details/{slug}','PostController@index')->name('post.details');

     //Route for all posts
     Route::get('posts','PostController@posts')->name('post.all');

     //Route for search
     Route::get('search','SearchController@search')->name('search');

     //Route for display posts by it's category
     Route::get('category/{slug}','PostController@categoryPost')->name('category.post');

     //Route for display posts by it's category
     Route::get('tag/{slug}','PostController@tagPost')->name('tag.post');
     
     //Route for post by author profile
     Route::get('author/{username}','AuthorProfileController@index')->name('author.profile');

     //Route for my portfolio
     Route::get('portfolio','PortfolioController@index')->name('portfolio.shibbir');

     //Route for receving client message
     Route::post('client/message','ClientMessageController@clientMessage')->name('client.message');



     
          
     //those route are for user external link
     Route::get('/facebook','SocialController@facebook')->name('facebook');
     Route::get('/twitter','SocialController@twitter')->name('twitter');
     Route::get('/linkedin','SocialController@linkedin')->name('linkedin');
     Route::get('/pinterest','SocialController@pinterest')->name('pinterest');
     Route::get('/github','SocialController@github')->name('github');
     Route::get('/vimeo','SocialController@vimeo')->name('vimeo');
     Route::get('/colorlib','SocialController@colorlib')->name('colorlib');
     Route::get('/shibbirit','SocialController@shibbirit')->name('shibbirit');

     

     //route for admin social external link 
     Route::get('/facebook-admin','AdminSocialController@facebook')->name('facebook.admin');
     Route::get('/upwork-admin','AdminSocialController@upwork')->name('upwork.admin');
     Route::get('/fiver-admin','AdminSocialController@fiver')->name('fiver.admin');
     Route::get('/youtube-admin','AdminSocialController@youtube')->name('youtube.admin');
     Route::get('/instragram-admin','AdminSocialController@instragram')->name('instragram.admin');
     Route::get('/google-plus-admin','AdminSocialController@google_plus')->name('google-plus.admin');
     Route::get('/twitter-admin','AdminSocialController@twitter')->name('twitter.admin');
     Route::get('/linkedin-admin','AdminSocialController@linkedin')->name('linkedin.admin');
     Route::get('/pinterest-admin','AdminSocialController@pinterest')->name('pinterest.admin');
     Route::get('/github-admin','AdminSocialController@github')->name('github.admin');
     Route::get('/skype-admin','AdminSocialController@skype')->name('skype.admin');
   
  



// view composer for categories and tag
view()->composer('site.layout.footer', function ($view) {

     $categories= App\Category::all();
     $tags=App\Tag::all();
     $view->with('categories',$categories);
     $view->with('tags',$tags);

});








