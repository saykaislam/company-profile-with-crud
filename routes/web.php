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


use Illuminate\Support\Facades\Artisan;

use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Tags\Url;
use Psr\Http\Message\UriInterface;
use Spatie\Sitemap\SitemapGenerator;
//sitemap..........................................
Route::get('/sitemap',function(){

    SitemapGenerator::create('https://uavsurveyaustralia.com')
        ->shouldCrawl(function (UriInterface $url) {
            //All pages will be crawled, except the contact page.
//            Links present on the contact page won't be added to the
            // sitemap unless they are present on a crawlable page.

            return strpos($url->getPath(), '/uploads') === false;
        })
        ->writeToFile('sitemap.xml');
    return 'sitemap created';
});

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
     return 'cache clear';
});
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
     return 'config:cache';
});
Route::get('/view-cache', function() {
    $exitCode = Artisan::call('view:cache');
    return 'view:cache';
});
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return 'view:clear';
});

Route::get('/checkout', function () {
    return view('frontend.Pages.checkout');
});

Route::get('/', 'Frontend\IndexController@Index' )->name('index');
Route::get('/our-company', 'Frontend\AboutController@index' )->name('about-us');
Route::get('/bangladeshi-partner', 'Frontend\AboutController@grihayon' )->name('grihayon');
Route::get('/team', 'Frontend\AboutController@team' )->name('team');
Route::get('/clients', 'Frontend\AboutController@Clients' )->name('clients');
Route::get('/staff', 'Frontend\StaffController@index' )->name('staff');
Route::get('/facilities', 'Frontend\FacilitiesController@facilities' )->name('facilities');
Route::get('/our-projects', 'Frontend\ProjectController@projectList' )->name('projects');
Route::get('/project-details/{slug}', 'Frontend\ProjectController@projectDetails' )->name('project_details');
//Route::get('/project-details', 'Frontend\ProjectController@ProjectDetails' )->name('project_details');

Route::get('/services','Frontend\ServiceController@serviceList')->name('services');
Route::get('/service/{slug}','Frontend\ServiceController@serviceDetails')->name('service_details');
Route::get('/equipments','Frontend\EquipmentController@equipmentList')->name('equipments');
Route::get('/equipment/{slug}','Frontend\EquipmentController@equipmentDetails')->name('equipment_details');

Route::get('/', 'Frontend\IndexController@Index' )->name('index');
//Route::get('/about', 'Frontend\AboutController@Index' )->name('about');
Route::get('/staff', 'Frontend\StaffController@index' )->name('staff');
Route::get('/project', 'Frontend\ProjectController@project' )->name('project');
Route::get('/project/{slug}', 'Frontend\ProjectController@ProjectDetails' )->name('project_details');


Route::get('/contact-us', 'Frontend\ContactController@index' )->name('contact-us');
Route::post('/contact-store', 'Frontend\ContactController@store' )->name('contact.store');
Route::get('/gallery', 'Frontend\IndexController@gallery' )->name('gallery');

//award & publication route

Route::get('/award-publication', 'Frontend\AwardController@index' )->name('award.publication');
Route::get('/award-publication/details', 'Frontend\AwardController@awardDetails' )->name('award.publication.details');

//ongoing & Completed route
Route::get('/ongoing', 'Frontend\RealEstateController@ongoing' )->name('ongoing');
Route::get('/ongoing/details/{slug}', 'Frontend\RealEstateController@ongoingDetails' )->name('ongoing.details');
Route::get('/completed', 'Frontend\RealEstateController@completed' )->name('completed');
Route::get('/completed/details/{slug}', 'Frontend\RealEstateController@completedDetails' )->name('completed.details');

//buyer route

Route::get('/buyer', 'Frontend\BuyersController@index' )->name('buyer');
Route::post('/buyer-store', 'Frontend\BuyersController@store')->name('buyer.store');


//land owner route

Route::get('/land-owner', 'Frontend\LandOwnerController@index' )->name('landowner');
Route::post('/land-owner/store', 'Frontend\LandOwnerController@store')->name('landowner.store');

  //career route
Route::get('/career', 'Frontend\CareerController@index' )->name('career');
Route::post('/career/store', 'Frontend\CareerController@store')->name('career.store');


Route::get('/posts', 'Frontend\BlogController@Posts' )->name('posts');
Route::get('/post/category/{slug}','Frontend\BlogController@postByCategory')->name('blog.category.posts');
Route::get('/post/{slug}','Frontend\BlogController@postDetails')->name('blog.posts.details');
Route::post('/search','Frontend\BlogController@search')->name('blog.post.search');


Route::get('user/registration','Frontend\RegistrationController@userRegForm')->name('user.reg.form');
Route::post('user/registration/store','Frontend\RegistrationController@UserStore')->name('user.reg.store');

//super admin route group..
Route::group(['middleware'=>['auth','admin']], function (){
    Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin',], function (){
        Route::resource('blog-category', 'BlogCategoryController');
        Route::resource('blog-post', 'BlogPostController');
        Route::resource('slider', 'SliderController');
        Route::resource('project/category', 'CategoryController');
        Route::resource('project', 'ProjectController');
        Route::resource('staff', 'StaffController');
        Route::resource('career', 'CareerController');
        Route::resource('land_owner', 'LandOwnerController');
        Route::resource('buyers', 'BuyerController');
        Route::resource('real-estate-project', 'RealStateController');
        Route::resource('client', 'ClientController');
        Route::resource('customer', 'CustomerController');
        Route::resource('service-categories', 'ServiceCategoryController');
        Route::resource('services', 'ServiceController');
        Route::resource('equipments', 'EquipmentController');
        Route::resource('gallery', 'GalleryController');
        Route::resource('testimonials', 'TestimonialController');
        Route::resource('profile', 'ProfileController');
        Route::resource('settings', 'SettingController');

    });
    Route::post('/admin/category/slug-change','Admin\CategoryController@slugChange')->name('admin.category.slug-change');
    Route::post('/admin/project/slug-change','Admin\ProjectController@slugChange')->name('admin.project.slug-change');
    Route::post('/admin/service/slug-change','Admin\ServiceController@slugChange')->name('admin.service.slug-change');
    Route::post('/admin/equipments/slug-change','Admin\EquipmentController@slugChange')->name('admin.equipments.slug-change');


    Route::post('admin/password/update/{id}','Admin\ProfileController@updatePassword')->name('admin.password.update');
    //route for multiple image
    Route::get('admin/customer/image/create/{id}','Admin\CustomerController@imageCreate')->name('admin.customer-image.create');
    Route::post('admin/customer/image/store/{id}','Admin\CustomerController@imageStore')->name('admin.customer-image.store');
    Route::get('admin/customer/image/edit/{id}','Admin\CustomerController@imageEdit')->name('admin.customer-image.edit');
    Route::post('admin/customer/image/update/{id}','Admin\CustomerController@imageUpdate')->name('admin.customer-image.update');
    Route::delete('admin/customer/image/delete/{id}','Admin\CustomerController@imageDestroy')->name('admin.customer-image.destroy');
    Route::get('admin/real-estate-project-show/{id}','Admin\RealStateController@imageShow')->name('real-estate-project.show');
    Route::post('admin/real-estate-project-store/','Admin\RealStateController@imageStore')->name('real-estate-project.store');
    Route::put('admin/real-estate-project-gallery/{id}','Admin\RealStateController@imageEdit')->name('admin.real-estate-project-gallery.update');
    Route::delete('admin/real-estate-project-gallery/{id}','Admin\RealStateController@imageDelete')->name('admin.real-estate-project-gallery.delete');

    //route for multiple image

    Route::delete('admin/project-gallery/{id}','Admin\ProjectController@imageDelete')->name('project-gallery.delete');
    Route::put('project-gallery/edit/{id}','Admin\ProjectController@imageEdit')->name('project-gallery.update');
    Route::post('project-gallery/store','Admin\ProjectController@imageStore')->name('project-gallery.store');

    Route::get('admin/dashboard','Admin\DashboardController@index')->name('admin.dashboard');


});

Route::post('/register/store','Frontend\RegisterController@register')->name('customer.register');

//Customer
Route::group(['middleware'=>['auth','customer']], function (){
Route::get('customer/dashboard','Customer\DashboardController@index')->name('customer.dashboard');
Route::get('customer/video_link','Customer\DashboardController@video_link')->name('customer.video_link');
Route::get('customer/other_files','Customer\DashboardController@other_files')->name('customer.other_files');
Route::get('customer/profile','Customer\DashboardController@editProfile')->name('customer.profile_edit');
Route::post('customer/profile/update','Customer\DashboardController@updateProfile')->name('customer.profile.update');
Route::get('customer/password','Customer\DashboardController@editPassword')->name('customer.password_edit');
Route::post('customer/password/update','Customer\DashboardController@updatePassword')->name('customer.password.update');
    Route::get('customer/message','Customer\DashboardController@message')->name('customer.message');

});




Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
