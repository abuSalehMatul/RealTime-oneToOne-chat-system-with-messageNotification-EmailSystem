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
Route::middleware(['guest'])->group(function () {

  Route::get('/', 'PublicPageController@welcome')->name('welcome');
  // Visitors
  Route::get('sell/{id}', 'PublicPageController@SellView')->name('sell');
  Route::get('buy/{id}', 'PublicPageController@BuyView')->name('buy');
  //Waqas Changes
  Route::get('/email-verification', 'UserController@emailVerification')->name('emailVerification');
});
//Route::get('/deploy-923457286', 'Controller@deploy')->name('deploy');
// Default
Auth::routes(['verify' => true]);
Route::middleware(['auth'])->group(function () {
  //home
  Route::get('/home', 'HomeController@index')->name('home');
  // Admin
  Route::get('admin', 'PageController@viewAdmin')->name('admin');
  //Waqas Changes
  Route::get('findmenu_options', 'PageController@findmenu_options')->name('findmenu_options');
  Route::post('add_user_menu', 'PageController@add_user_menu')->name('add_user_menu');
  Route::get('brandupdate', 'PageController@brandupdate')->name('brandupdate');
  Route::post('brandupdate', 'PageController@brandupdate')->name('brandupdate');
  //Admin dropdown
  Route::get('wallet', 'PageController@wallet')->name('wallet');
  Route::get('UserAccess', 'PageController@userAccess')->name('UserAccess');
  Route::get('accountant', 'PageController@accountant')->name('accountant');
  Route::get('membership', 'PageController@membership')->name('membership');
  Route::get('userMembershipdetails', 'PageController@userMembershipdetails')->name('userMembershipdetails');
  Route::post('updateShareRate', 'PageController@updateShareRate')->name('updateShareRate');
 
  //matul ...
  Route::get('/user_access_search','PageController@user_access_search')->name('user_access_search');
  Route::get('/get_user_image_and_link','PageController@get_user_image_and_link')->name('get_user_image_and_link');
  Route::get('/testmatul','UserController@test');
  //matul
  //login_system by matul.........
Route::get('/create_user_with_verification','UserController@registeruser');
Route::get('/create_user_without_verification','UserController@registeruserwithout');
Route::get('/verified_email/{email}/{token}','UserController@verified_email')->name('verified_email');
//endof login system by matul......

 
  Route::get('CategorySetup', 'PageController@categorySetup')->name('categorySetup');
    Route::get('CategorySetup2', 'PageController@test')->name('test');
  Route::get('QueryScreen', 'PageController@queryscreen')->name('queryscreen');
  Route::post('TakeQuery', 'PageController@takeQuery')->name('takequery');
  Route::post('SaveQuery', 'PageController@saveQuery')->name('saveQuery');
  Route::post('DeleteQuery', 'PageController@deleteQuery')->name('deleteQuery');
  Route::post('SavePost', 'PageController@savePost')->name('savePost');
  Route::post('credit', 'PageController@credit')->name('credit');
  Route::post('transfer', 'PageController@transfer')->name('transfer');
  Route::post('memberData', 'PageController@memberData')->name('memberData');
  Route::post('uploadMemberPdfFile', 'PageController@uploadMemberPdfFile')->name('uploadMemberPdfFile');
  Route::get('downloadMemberPdfFile', 'PageController@downloadMemberPdfFile')->name('downloadMemberPdfFile');
  Route::post('getIdNameList', 'PageController@getIdNameList')->name('getIdNameList');
  Route::post('OpacityUpdate', 'PageController@opacityUpdate')->name('opacityUpdate');
  Route::post('getEmailBasedData', 'PageController@getEmailBasedData')->name('getEmailBasedData');
  Route::post('getTransByDateRange', 'PageController@getTransByDateRange')->name('getTransByDateRange');
  Route::post('moveToExcel', 'PageController@moveToExcel')->name('moveToExcel');
  
  // Admin
  Route::get('admin', 'PageController@viewAdmin')->name('admin');
  Route::get('findmenu_options', 'PageController@findmenu_options')->name('findmenu_options');
  Route::post('add_user_menu', 'PageController@add_user_menu')->name('add_user_menu');
  Route::get('brandupdate', 'PageController@brandupdate')->name('brandupdate');
  Route::post('brandupdate', 'PageController@brandupdate')->name('brandupdate');
//Babar works 
  Route::get('/booking', 'BookingController@booking')->name('booking');
  // User Profile
  Route::get('/profile', 'UserController@showProfile')->name('profile');
    Route::get('/userprofile', 'UserController@userProfile');
  Route::post('/profile', 'UserController@updatePic')->name('updatePic');
  Route::post('/updateUser', 'UserController@updateUser')->name('updateUser');
  //matul..
  Route::get('/profile/{id}','UserController@showProfilewithid');
  //matul...
  Route::get('/upcoming_services', 'PageController@upcomingServices')->name('upcomingServices');
  

  //My Posts
  Route::get('/my_posts', 'PageController@myPosts')->name('myPosts');
  Route::get('saved_posts', 'PageController@getSavePost')->name('getSavePost');
  //Coupon
  Route::get('/coupon', 'CouponController@coupons')->name('coupons'); 
  Route::get('/coupon/action', 'CouponController@action')->name('coupon.action');
  Route::get('/coupon/create', 'CouponController@create')->name('coupon.create');
  Route::post('/coupon/create', 'CouponController@store')->name('coupon.store'); 
  Route::get('/coupon/{id}/edit', 'CouponController@editCoupon')->name('coupon.edit'); 
  Route::post('/coupon/{id}/update', 'CouponController@updateCoupon')->name('coupon.update');  
  Route::get('/coupon/{id}/delete', 'CouponController@deleteCoupon')->name('coupon.delete');


  // All Order details
  //Show All Orders
  Route::get('/order', 'OrderController@index')->name('order');
  //Buyer order from single buyer post
  Route::PUT('/buyerOrder/{id}', 'OrderController@buyerOrder')->name('buyerOrder');
  Route::get('/buyerShow/{id}', 'OrderController@buyerShow')->name('buyerShow');
  Route::get('/buyerSingle/{id}', 'OrderController@buyerSingle')->name('buyerSingle');
  Route::PUT('/buyerStatus/{id}', 'OrderController@buyerStatus')->name('buyerStatus');
  //Seller order from single seller post
  Route::PUT('/sellerOrder/{id}', 'OrderController@sellerOrder')->name('sellerOrder');
  // Route::get('/sellerShow/{id}', 'OrderController@sellerShow')->name('sellerShow');
  Route::get('/sellerSingle/{id}', 'OrderController@sellerSingle')->name('sellerSingle');
  Route::PUT('/sellerStatus/{id}', 'OrderController@sellerStatus')->name('sellerStatus');
  //Posts (buyer, seller, article)
  Route::resource('/buyer', 'BuyerController');
  Route::resource('/seller', 'SellerController');
  Route::resource('/article', 'ArticleController');
  //email
  Route::resource('/email', 'EmailController');


});
//Waqas Changes
Route::middleware(['auth'])->group(function () {
    Route::post('user-access-ajax', 'PageController@userAccessAjax')->name('UserAccessAjax');
    Route::post('edit-or-create-new-user', 'PageController@saveExistingUser')->name('saveExistingUser');
    Route::post('create-user/{flag}', 'PageController@CreateUserWith')->name('CreateUserWith');
    Route::post('delete-user', 'PageController@deleteProfile')->name('deleteProfile');

});

//Routes for advertisement

Route::get('/advertisement', 'AdvertisementController@index')->name('AdvertisementPage');

Route::post('/AdvertisementAction', 'AdvertisementController@action')->name('AdvertisementAction');
Route::get('/advertisement/show', 'AdvertisementController@viewAds')->name('AdvertisementShow');
Route::post('deleteAdd', 'AdvertisementController@deleteAdd')->name('deleteAdd');
Route::post('getAdsData', 'AdvertisementController@getAdsData')->name('getAdsData');
Route::post('addProfession', 'PageController@addProfession')->name('addProfession');
Route::post('getProfession', 'PageController@getProfession')->name('getProfession');
Route::post('updateProfession', 'PageController@updateProfession')->name('updateProfession');
Route::post('deleteProfession', 'PageController@deleteProfession')->name('deleteProfession');
Route::post('getProfessionOfType', 'PageController@getProfessionOfType')->name('getProfessionOfType');
Route::post('submitMembershipForm', 'PageController@submitMembershipForm')->name('submitMembershipForm');


Route::get('foo', function () {
  return 'Hello World';
});

/////////////////// ///////////////////////////////////
  ///////////////////////// Abdul Rehman Code ///////////////////////

  Route::get('/faqsetup', 'FaqController@faqs')->name('faqs');
  Route::get('/faq', 'FaqController@faquser')->name('faquser');
  Route::post('/faqsetup/create', 'FaqController@store')->name('faq.store'); 
  Route::get('/faqsetup/{id}/delete', 'FaqController@deleteFaq')->name('faq.delete');
  Route::get('/faqsetup/{id}/edit', 'FaqController@editFaq')->name('faq.edit'); 
  Route::post('/faqsetup/{id}/update', 'FaqController@updateFaq')->name('faq.update');


  //Exam
  
  Route::get('/examsetup', 'ExamController@exams')->name('exams');
  Route::get('/exam', 'ExamController@examuser')->name('examuser');
  Route::post('/examsetup/create', 'ExamController@store')->name('exam.store'); 
  Route::get('/examsetup/{id}/delete', 'ExamController@deleteExam')->name('exam.delete');
  Route::get('/examsetup/{id}/edit', 'ExamController@editExam')->name('exam.edit'); 
  Route::post('/examsetup/{id}/update', 'ExamController@updateExam')->name('exam.update');
    Route::post('/examsetup/check', 'ExamController@checkExam')->name('exam.check');


  //Train
  Route::get('/trainsetup', 'TrainController@trains')->name('trains');
  Route::get('/train', 'TrainController@trainuser')->name('trainuser');
  Route::post('/trainsetup/create', 'TrainController@store')->name('train.store'); 
  Route::get('/trainsetup/{id}/delete', 'TrainController@deleteTrain')->name('train.delete');
  Route::get('/trainsetup/{id}/edit', 'TrainController@editTrain')->name('train.edit'); 
  Route::post('/trainsetup/{id}/update', 'TrainController@updateTrain')->name('train.update');

////////////////// Home Page Setup /////////////////////

Route::get('/homepage-setup', 'UserController@homepageSetup');
Route::post('/sethomepage', 'UserController@setHomepageSetup');


//chat ........
Route::get('/chatdashboard', 'ChatDashboardController@index')->name('chatdashboard');
Route::get('/privateChat/{chatRoomId}', 'PrivateChatController@rtnChatBox')->name('privateChat');
Route::post('/send/{id}', 'PrivateChatController@store');
Route::post('/geturl', 'PrivateChatController@geturl');
Route::post('/timeformate', 'PrivateChatController@timeformate');
Route::post('/setuserlocalutc', 'PrivateChatController@setuserlocalutc');
Route::get('/getlogedinusertime', 'PrivateChatController@getlogedinusertime')->name('getlogedinusertime');

Route::post('/getOldMessage', 'ChatController@getOldMessage');
Route::post('/chatSpam/{id}', 'ChatController@spam');
Route::post('/chatReport/{id}', 'ChatController@report');
Route::get('/chatsearch', 'searchController@search')->name('chatsearch');
Route::get('/defaullevelsearch', 'searchController@defaullevelsearch')->name('defaullevelsearch');
Route::get('/levelsearch', 'searchController@levelsearch')->name('levelsearch');
Route::get('/unreadsearch', 'searchController@unreadsearch')->name('unreadsearch');
Route::get('/indeviduallevelsearch', 'searchController@indeviduallevelsearch')->name('indeviduallevelsearch');

Route::post('/setonline', 'ChatController@setonline');
Route::post('/setoffline', 'ChatController@setoffline');
Route::post('/getallOnlineUser', 'ChatController@getallOnlineUser');
Route::post('/readwrite', 'ChatController@readwrite');

Route::get('/levelset', 'LevelController@index')->name('levelset');
Route::get('/getOldLevel', 'LevelController@getOldLevel');
Route::post('/addcustomlevel', 'LevelController@custom');
Route::get('/leveldel/{id}', 'LevelController@delete')->name('leveldel');
Route::get('/starchat/{id}', 'LevelController@starchat')->name('starchat');
Route::get('/delallchat/{id}', 'LevelController@delallchat');
Route::get('/getmessagepopup', 'messagepopController@index')->name('messagepop');
Route::get('/getmessagepopupcross', 'messagepopController@getmessagepopupcross');

Route::get('/gmtime', 'PrivateChatController@test');
Route::get('/testtt', 'searchController@test');
Route::get('/sendemailforunread', 'PrivateChatController@sendemailforunread');
Route::post('/sendmail', 'PrivateChatController@sendmail');

//end of chat..........
Route::post('getAndMoveVerifyDetails', 'PageController@getAndMoveVerifyDetails')->name('getAndMoveVerifyDetails');
Route::get('getMemberDetailsUsingEmail', 'PageController@getMemberDetailsUsingEmail')->name('getMemberDetailsUsingEmail');
//////////////////////// Blog /////////////////////////////

Route::get('/blog', 'PublicBlogContoller@index')->name('blog');
Route::get('/my-blog', 'BlogController@myBlog');
Route::get('/add-blog', 'BlogController@addBlog');
Route::post('/blog/store', 'BlogController@storeBlog');
Route::get('/public-blog', 'BlogController@publicBlog');
Route::get('/blod-details/{ids}', 'BlogController@blogDetails');
Route::post('/add_comment/{post_id}/{user_id}','BlogController@addComment');
Route::get('/delete_post/{post_id}', 'BlogController@deletePost');
Route::get('/delete_comment/{comment_id}', 'BlogController@deleteComment');
Route::get('/visitors-details/{ids}', 'PublicBlogContoller@visitorDetails');
Route::post('/blog/update/reaction', 'BlogController@updateBlogReaction');
Route::get('/blog/pay-to-read/{amount}/{owner_id}','BlogController@payToRead');

/////////////////////// Sakib changes ///////////////////

Route::resource('/events', 'EventsController');
Route::resource('/eventM', 'EventModalController');
Route::get('/search', 'EventsController@search')->name('search');
Route::get('/going-to-event/{user_id}/{owner_id}/{event_id}/{event_modal_id}','EventsController@goingToEvent');
Route::get('/not-going-to-event/{user_id}/{owner_id}/{event_id}/{event_modal_id}','EventsController@notGoingToEvent');
Route::get('/going-status/{status}/{user_id}/{event_id}/{amount}','EventsController@eventStatus');
Route::post('/event/invite/{event_id}','EventsController@eventInvite');
Route::get('/event/draft/{user_id}','EventsController@draftEvents');
Route::get('/draft/add-plan/{event_id}','EventsController@draftAddPlan');
Route::get('/event/plan&price/{event_id}','EventsController@eventPlanPrice');

//dispute work controoler
Route::get('/dispute', 'DisputeController@create')->name('dispute');
Route::post('/add_dispute', 'DisputeController@addDispute')->name('adddispute');
