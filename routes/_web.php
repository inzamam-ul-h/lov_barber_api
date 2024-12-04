<?php

use App\Http\Controllers\Auth\RegisteredUserController as RegisteredUserController;

use App\Http\Controllers\CountryController;
use App\Http\Controllers\Ecommerce\EcomBankDetailController;
use App\Http\Controllers\Ecommerce\EcomCategoryController as EcomCategoryController;
use App\Http\Controllers\Ecommerce\EcomSubCategoryController as EcomSubCategoryController;

use App\Http\Controllers\Ecommerce\EcomSellerController as EcomSellerController;
use App\Http\Controllers\Ecommerce\EcomSellerCategoryController as EcomSellerCategoryController;
use App\Http\Controllers\Ecommerce\EcomSellerSubCategoryController as EcomSellerSubCategoryController;
use App\Http\Controllers\Ecommerce\EcomProductController as EcomProductController;
use App\Http\Controllers\Ecommerce\EcomOrderController as EcomOrderController;
use App\Http\Controllers\Ecommerce\EcomReviewController as EcomReviewController;

use App\Http\Controllers\classified\CaCategoryController as CaCategoryController;
use App\Http\Controllers\classified\CaSubCategoryController as CaSubCategoryController;

use App\Http\Controllers\classified\CaProductTypeController as CaProductTypeController;
use App\Http\Controllers\classified\CaProductsController as CaProductsController;
use App\Http\Controllers\classified\CaProductsReportedController as CaProductsReportedController;
use App\Http\Controllers\classified\CaProductsSoldController as CaProductsSoldController;
use App\Http\Controllers\classified\CaProductsActiveController as CaProductsActiveController;

use App\Http\Controllers\FaqController;
use App\Http\Controllers\FaqTopicController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\services\SvcBankDetailController;
use App\Http\Controllers\services\SvcCategoryController as SvcCategoryController;
use App\Http\Controllers\services\SvcSubCategoryController as SvcSubCategoryController;
use App\Http\Controllers\services\SvcServiceController as SvcServiceController;
use App\Http\Controllers\services\SvcSubServiceController as SvcSubServiceController;

use App\Http\Controllers\services\SvcVendorController as SvcVendorController;
use App\Http\Controllers\services\SvcVendorCategoryController as SvcVendorCategoryController;
use App\Http\Controllers\services\SvcVendorSubCategoryController as SvcVendorSubCategoryController;
use App\Http\Controllers\services\SvcVendorServicesController as SvcVendorServicesController;
use App\Http\Controllers\services\SvcProductController as SvcProductController;
use App\Http\Controllers\services\SvcOrderController as SvcOrderController;
use App\Http\Controllers\services\SvcReviewController as SvcReviewController;

use App\Http\Controllers\AppImprovementController as AppImprovementController;
use App\Http\Controllers\AppLabelController as AppLabelController;
use App\Http\Controllers\AppPageController as AppPageController;
use App\Http\Controllers\AppSlideController as AppSlideController;
use App\Http\Controllers\AppUserController as AppUserController;
use App\Http\Controllers\AppUserQueryController as AppUserQueryController;
use App\Http\Controllers\BadWordController as BadWordController;
use App\Http\Controllers\BannerController as BannerController;
use App\Http\Controllers\BannerLocationController as BannerLocationController;
use App\Http\Controllers\BannerPageController as BannerPageController;
use App\Http\Controllers\ContactDetailController as ContactDetailController;
use App\Http\Controllers\CurrencyController as CurrencyController;
use App\Http\Controllers\HomeItemController as HomeItemController;
use App\Http\Controllers\HomeTypeController as HomeTypeController;
use App\Http\Controllers\FlowerColorController as FlowerColorController;
use App\Http\Controllers\FlowerSizeController as FlowerSizeController;
use App\Http\Controllers\FlowerTypeController as FlowerTypeController;
use App\Http\Controllers\GeneralSettingController as GeneralSettingController;
use App\Http\Controllers\OccasionTypeController as OccasionTypeController;
use App\Http\Controllers\PaymentMethodController as PaymentMethodController;
use App\Http\Controllers\RoomTypeController as RoomTypeController;
use App\Http\Controllers\TemplateController as TemplateController;

use App\Http\Controllers\ModuleController as ModuleController;
use App\Http\Controllers\RoleController as RoleController;
use App\Http\Controllers\UserController as UserController;


use App\Http\Controllers\HomeController as HomeController;

use App\Models\CaSubCategory;

use App\Models\EcomAttribute;
use App\Models\EcomAttributeOption;
use App\Models\EcomSellerCategory;
use App\Models\EcomSellerSubCategory;
use App\Models\EcomSubCategory;
use App\Models\EcomProduct;

use App\Models\SvcAttribute;
use App\Models\SvcAttributeOption;
use App\Models\SvcBankDetail;
use App\Models\SvcService;
use App\Models\SvcSubService;
use App\Models\SvcSubCategory;
use App\Models\SvcVendorCategory;
use App\Models\SvcVendorSubCategory;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



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

require __DIR__ . '/auth.php';

Route::get('/', function () {
	return redirect()->route('dashboard');
});

// users routes

Route::middleware(['auth'])->prefix('users')->group(function ()
{
	
	
	Route::get('/', [UserController::class, 'index'])->name('users.index');
	Route::get('/create', [UserController::class, 'create'])->name('users.create');
	Route::post('/store', [UserController::class, 'store'])->name('users.store');
	Route::get('/{user_id}/edit', [UserController::class, 'edit'])->name('users.edit');
	Route::get('/{user_id}/view', [UserController::class, 'show'])->name('users.show');
	Route::get('/{user_id}/approve', [UserController::class, 'approve'])->name('users.approve');
	Route::get('/{user_id}/reject', [UserController::class, 'reject'])->name('users.reject');
	
	Route::get('/{option}/set-mode', [UserController::class, 'set_mode'])->name('users.mode_setting');
	Route::get('/{option}/set-sidebar', [UserController::class, 'set_sidebar'])->name('users.sidebar_setting');
	Route::get('/{option}/set-theme', [UserController::class, 'set_theme'])->name('users.theme_setting');
	Route::get('/{option}/set-menu', [UserController::class, 'set_menu'])->name('users.menu_setting');
	Route::get('/set-default', [UserController::class, 'set_default'])->name('users.default_setting');
	
	Route::get('/changePassword', [UserController::class, 'changePassword'])->name('users.changePassword');
	Route::post('/updatePassword', [UserController::class, 'updatePassword'])->name('users.updatePassword');
	
	Route::post('/modify', [UserController::class, 'update'])->name('users.update');
	Route::get('userPermissions/{id}',[UserController::class, 'userPermissions'])->name('userPermissions');
	Route::post('userPermissionsSubmit',[UserController::class, 'userPermissionsSubmit'])->name('userPermissionsSubmit');
	
	Route::get('users/datatable', [UserController::class, 'datatable'])->name('users_datatable');
				
	Route::get('users/dashboard/datatable', [UserController::class, 'dashboard_datatable'])->name('users_dashboard_datatable');
	
	Route::get('users/show-application/{id}', [UserController::class, 'show_application'])->name('users_show_application');
	
	Route::get('/users/inactive/{id}', [UserController::class, 'makeInActive'])->name('users-inactive');
	Route::get('/users/active/{id}', [UserController::class, 'makeActive'])->name('users-active');
});


Route::post('/seller-signup', [RegisteredUserController::class, 'store']);

Route::get('/seller-signup', [RegisteredUserController::class, 'sellerSignup'])->name('sellerSignup');

Route::middleware(['auth'])->group(function () {
	
	Route::get('/cache-clear', function () {
		Artisan::call('cache:clear');
		Artisan::call('view:clear');
		return redirect()->route('dashboard');
	})->name('cacheClear');
	
	Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
	
	//App Improvements
	{
		Route::get('app-improvements/deactivate/{id}', [AppImprovementController::class, 'makeInActive'])->name('app_improvements_deactivate');
		
		Route::get('app-improvements/activate/{id}', [AppImprovementController::class, 'makeActive'])->name('app_improvements_activate');
		
		Route::get('app-improvements/datatable', [AppImprovementController::class, 'datatable'])->name('app_improvements_datatable');
		
		Route::resource('app-improvements', AppImprovementController::class);
	}
	
	//App Labels
	{
		Route::get('app-labels/datatable', [AppLabelController::class, 'datatable'])->name('app_labels_datatable');
		
		Route::get('app-labels/deactivate/{id}', [AppLabelController::class, 'makeInActive'])->name('app_labels_deactivate');
		
		Route::get('app-labels/activate/{id}', [AppLabelController::class, 'makeActive'])->name('app_labels_activate');
		
		Route::resource('app-labels', AppLabelController::class);
	}
	
	//App Pages
	{
		Route::get('app-pages/datatable', [AppPageController::class, 'datatable'])->name('app_pages_datatable');
		
		Route::get('app-pages/deactivate/{id}', [AppPageController::class, 'makeInActive'])->name('app_pages_deactivate');
		
		Route::get('app-pages/activate/{id}', [AppPageController::class, 'makeActive'])->name('app_pages_activate');
		
		Route::resource('app-pages', AppPageController::class);
	}
	
	//App Slides
	{
		Route::get('app-slides/datatable', [AppSlideController::class, 'datatable'])->name('app_slides_datatable');
		
		Route::get('app-slides/deactivate/{id}', [AppSlideController::class, 'makeInActive'])->name('app_slides_deactivate');
		
		Route::get('app-slides/activate/{id}', [AppSlideController::class, 'makeActive'])->name('app_slides_activate');
		
		Route::resource('app-slides', AppSlideController::class);
	}
	
	//App users Details
	{
		Route::get('app-users/datatable', [AppUserController::class, 'datatable'])->name('app_users_datatable');
		
		//classified start
		{
			Route::get('app-users/to_follow_datatable/{id}', [AppUserController::class, 'to_follow_datatable'])->name('app_users_to_follow_datatable');
			
			Route::get('app-users/from_follow_datatable/{id}', [AppUserController::class, 'from_follow_datatable'])->name('app_users_from_follow_datatable');
			
			Route::get('app-users/product_datatable/{id}', [AppUserController::class, 'product_datatable'])->name('app_users_product_datatable');
			
			Route::get('app-users/to_review_datatable/{id}', [AppUserController::class, 'to_review_datatable'])->name('app_users_to_review_datatable');
			
			Route::get('app-users/from_review_datatable/{id}', [AppUserController::class, 'from_review_datatable'])->name('app_users_from_review_datatable');
			
			Route::get('app-users/favourite_datatable/{id}', [AppUserController::class, 'favourite_datatable'])->name('app_users_favourite_datatable');
			
			Route::get('app-users/reported_product_datatable/{id}', [AppUserController::class, 'reported_product_datatable'])->name('app_users_reported_product_datatable');
		}
		
		Route::get('app-users/report_datatable/{id}', [AppUserController::class, 'report_datatable'])->name('app_user_report_datatable');
		
		Route::get('/app-users/suspend/{id}/{days}', [AppUserController::class, 'suspend'])->name('app_users-suspend-days');
		
		Route::get('app-users/deactivate/{id}', [AppUserController::class, 'makeInActive'])->name('app_users_deactivate');
		
		Route::get('app-users/activate/{id}', [AppUserController::class, 'makeActive'])->name('app_users_activate');
		
		Route::resource('app-users', AppUserController::class);
	}
	
	//App user queries
	{
		Route::get('app-user-queries/datatable', [AppUserQueryController::class, 'datatable'])->name('app_user_queries_datatable');
		
		Route::resource('app-user-queries', AppUserQueryController::class);
	}
	
	//Bad Words
	{
		Route::get('bad-words/datatable', [BadWordController::class, 'datatable'])->name('bad_words_datatable');
		
		Route::get('bad-words/deactivate/{id}', [BadWordController::class, 'makeInActive'])->name('bad_words_deactivate');
		
		Route::get('bad-words/activate/{id}', [BadWordController::class, 'makeActive'])->name('bad_words_activate');
		
		Route::resource('bad-words', BadWordController::class);
	}
	
	//Banners
	{
		Route::get('banners/datatable', [BannerController::class, 'datatable'])->name('banners_datatable');
		
		Route::get('banners/deactivate/{id}', [BannerController::class, 'makeInActive'])->name('banners_deactivate');
		
		Route::get('banners/activate/{id}', [BannerController::class, 'makeActive'])->name('banners_activate');
		
		Route::resource('banners', BannerController::class);
	}
	
	//Contact Details
	{
		Route::get('contact-details/datatable', [ContactDetailController::class, 'datatable'])->name('contact_details_datatable');
		
		Route::get('contact-details/deactivate/{id}', [ContactDetailController::class, 'makeInActive'])->name('contact_details_deactivate');
		
		Route::get('contact-details/activate/{id}', [ContactDetailController::class, 'makeActive'])->name('contact_details_activate');
		
		Route::resource('contact-details', ContactDetailController::class);
	}
	
	//Currencies
	{
		Route::get('currencies/datatable', [CurrencyController::class, 'datatable'])->name('currencies_datatable');
		Route::get('currencies/rate/update', [CurrencyController::class, 'currency_rate_update'])->name('currency_rate_update');
		Route::get('currencies/deactivate/{id}', [CurrencyController::class, 'makeInActive'])->name('currencies_deactivate');
		Route::get('currencies/activate/{id}', [CurrencyController::class, 'makeActive'])->name('currencies_activate');
		Route::get('currencies/default/{id}', [CurrencyController::class, 'makeDefault'])->name('currencies_default');
		Route::resource('currencies', CurrencyController::class);
	}
	
	//Countries
	{
		Route::get('countries/datatable', [CountryController::class, 'datatable'])->name('countries_datatable');
		
		Route::get('countries/deactivate/{id}', [CountryController::class, 'makeInActive'])->name('countries_deactivate');
		
		Route::get('countries/activate/{id}', [CountryController::class, 'makeActive'])->name('countries_activate');
		
		Route::resource('countries', CountryController::class);
	}
	
	//Languages
	{
		Route::get('languages/datatable', [LanguageController::class, 'datatable'])->name('languages_datatable');
		
		Route::get('languages/deactivate/{id}', [LanguageController::class, 'makeInActive'])->name('languages_deactivate');
		
		Route::get('languages/activate/{id}', [LanguageController::class, 'makeActive'])->name('languages_activate');
		
		Route::resource('languages', LanguageController::class);
	}
	
	//Faq-Topics
	{
		Route::get('faq-topics/datatable', [FaqTopicController::class, 'datatable'])->name('faq_topics_datatable');
		
		Route::get('faq-topics/deactivate/{id}', [FaqTopicController::class, 'makeInActive'])->name('faq_topics_deactivate');
		
		Route::get('faq-topics/activate/{id}', [FaqTopicController::class, 'makeActive'])->name('faq_topics_activate');
		
		Route::resource('faq-topics', FaqTopicController::class);
	}
	
	//Faqs
	{
		Route::get('faqs/datatable', [FaqController::class, 'datatable'])->name('faqs_datatable');
		
		Route::get('faqs/deactivate/{id}', [FaqController::class, 'makeInActive'])->name('faqs_deactivate');
		
		Route::get('faqs/activate/{id}', [FaqController::class, 'makeActive'])->name('faqs_activate');
		
		Route::resource('faqs', FaqController::class);
	}
	
	//Email Templates
	{
		Route::get('templates/datatable', [TemplateController::class, 'datatable'])->name('templates_datatable');
		
		Route::get('templates/deactivate/{id}', [TemplateController::class, 'makeInActive'])->name('templates_deactivate');
		
		Route::get('templates/activate/{id}', [TemplateController::class, 'makeActive'])->name('templates_activate');
		
		Route::resource('templates', TemplateController::class);
	}
	
	//Flower Colors
	{
		Route::get('flower-colors/datatable', [FlowerColorController::class, 'datatable'])->name('flower_colors_datatable');
		
		Route::get('flower-colors/deactivate/{id}', [FlowerColorController::class, 'makeInActive'])->name('flower_colors_deactivate');
		
		Route::get('flower-colors/activate/{id}', [FlowerColorController::class, 'makeActive'])->name('flower_colors_activate');
		
		Route::resource('flower-colors', FlowerColorController::class);
	}
	
	//Flower Sizes
	{
		Route::get('flower-sizes/datatable', [FlowerSizeController::class, 'datatable'])->name('flower_sizes_datatable');
		
		Route::get('flower-sizes/deactivate/{id}', [FlowerSizeController::class, 'makeInActive'])->name('flower_sizes_deactivate');
		
		Route::get('flower-sizes/activate/{id}', [FlowerSizeController::class, 'makeActive'])->name('flower_sizes_activate');
		
		Route::resource('flower-sizes', FlowerSizeController::class);
	}
	
	//Flower Types
	{
		Route::get('flower-types/datatable', [FlowerTypeController::class, 'datatable'])->name('flower_types_datatable');
		
		Route::get('flower-types/deactivate/{id}', [FlowerTypeController::class, 'makeInActive'])->name('flower_types_deactivate');
		
		Route::get('flower-types/activate/{id}', [FlowerTypeController::class, 'makeActive'])->name('flower_types_activate');
		
		Route::resource('flower-types', FlowerTypeController::class);
	}
	
	//App General Settings
	{
		Route::get('general-settings/datatable', [GeneralSettingController::class, 'datatable'])->name('general_settings_datatable');
		
		Route::get('general-settings/deactivate/{id}', [GeneralSettingController::class, 'makeInActive'])->name('general_settings-deactivate');
		
		Route::get('general-settings/activate/{id}', [GeneralSettingController::class, 'makeActive'])->name('general_settings-activate');
		
		Route::get('general-settings/startRamadan', [GeneralSettingController::class, 'startRamadan'])->name('general_settings-startRamadan');
		
		Route::get('general-settings/endRamadan', [GeneralSettingController::class, 'endRamadan'])->name('general_settings-endRamadan');
		
		Route::get('general-settings/edit-Settings', [GeneralSettingController::class, 'edit'])->name('general_settings_edit_Settings');
		
		Route::post('general-settings/update-Settings', [GeneralSettingController::class, 'update'])->name('general_settings_update_Settings');
		
		Route::resource('general-settings', GeneralSettingController::class);
	}
	
	//Home Items
	{
		Route::get('home-items/datatable', [HomeItemController::class, 'datatable'])->name('home_items_datatable');
		
		Route::get('home-items/deactivate/{id}', [HomeItemController::class, 'makeInActive'])->name('home_items_deactivate');
		
		Route::get('home-items/activate/{id}', [HomeItemController::class, 'makeActive'])->name('home_items_activate');
		
		Route::resource('home-items', HomeItemController::class);
	}
	
	//Home Types
	{
		Route::get('home-types/datatable', [HomeTypeController::class, 'datatable'])->name('home_types_datatable');
		
		Route::get('home-types/deactivate/{id}', [HomeTypeController::class, 'makeInActive'])->name('home_types_deactivate');
		
		Route::get('home-types/activate/{id}', [HomeTypeController::class, 'makeActive'])->name('home_types_activate');
		
		Route::resource('home-types', HomeTypeController::class);
	}
	
	//Modules
	{
		Route::get('modules/datatable', [ModuleController::class, 'datatable'])->name('modules_datatable');
		
		Route::resource('modules', ModuleController::class);
	}
	
	//Occasion Types
	{
		Route::get('occasion-types/datatable', [OccasionTypeController::class, 'datatable'])->name('occasion_types_datatable');
		
		Route::get('occasion-types/deactivate/{id}', [OccasionTypeController::class, 'makeInActive'])->name('occasion_types_deactivate');
		
		Route::get('occasion-types/activate/{id}', [OccasionTypeController::class, 'makeActive'])->name('occasion_types_activate');
		
		Route::resource('occasion-types', OccasionTypeController::class);
	}
	
	//Payment Methods Details
	{
		Route::get('payment-methods/datatable', [PaymentMethodController::class, 'datatable'])->name('payment_methods_datatable');
		
		Route::get('payment-methods/deactivate/{id}', [PaymentMethodController::class, 'makeInActive'])->name('payment_methods_deactivate');
		
		Route::get('payment-methods/activate/{id}', [PaymentMethodController::class, 'makeActive'])->name('payment_methods_activate');
		
		Route::resource('payment-methods', PaymentMethodController::class);
	}
	
	//Roles
	{
		Route::get('roles/datatable', [RoleController::class, 'datatable'])->name('roles_datatable');
		
		Route::post('roles/permissions/{id}', [RoleController::class, 'permission_update'])->name('permissions_update');
		
		Route::resource('roles', RoleController::class);
	}
	
	//Room Types
	{
		Route::get('room-types/datatable', [RoomTypeController::class, 'datatable'])->name('room_types_datatable');
		
		Route::get('room-types/deactivate/{id}', [RoomTypeController::class, 'makeInActive'])->name('room_types_deactivate');
		
		Route::get('room-types/activate/{id}', [RoomTypeController::class, 'makeActive'])->name('room_types_activate');
		
		Route::resource('room-types', RoomTypeController::class);
	}




// --------------------------------------------------------------------------//
// --------------------------- SERVICES MODULE ------------------------------//
// --------------------------------------------------------------------------//
	
	
	
	
	Route::middleware(['auth'])->prefix('service')->group(function ()
	{
		//Categories
		{
			//attributes
			Route::get('categories/attributes/edit/{id}', [SvcCategoryController::class, 'editAttribute'])->name('edit_svc_attribute');
			
			Route::POST('categories/attributes/store', [SvcCategoryController::class, 'storeAttribute'])->name('store_svc_attribute');
			
			Route::POST('categories/attributes/update/{id}', [SvcCategoryController::class, 'updateAttribute'])->name('update_svc_attribute');
			
			Route::POST('categories/attribute/option/store', [SvcCategoryController::class, 'storeAttributeOption'])->name('store_svc_attribute_option');
			
			//brands
			Route::get('categories/brands/edit/{id}', [SvcCategoryController::class, 'editBrand'])->name('edit_svc_brand');
			
			Route::POST('categories/brands/store', [SvcCategoryController::class, 'storeBrand'])->name('store_svc_brand');
			
			Route::POST('categories/brands/update/{id}', [SvcCategoryController::class, 'updateBrand'])->name('update_svc_brand');
			
			Route::POST('categories/brand/option/store', [SvcCategoryController::class, 'storeBrandOption'])->name('store_svc_brand_option');
			
			
			Route::get('categories/datatable', [SvcCategoryController::class, 'datatable'])->name('svc_categories_datatable');
			
			Route::get('categories/deactivate/{id}', [SvcCategoryController::class, 'makeInActive'])->name('svc_categories_deactivate');
			
			Route::get('categories/activate/{id}', [SvcCategoryController::class, 'makeActive'])->name('svc_categories_activate');
			
			Route::resource('categories', SvcCategoryController::class);
		}
		
		//Sub Categories
		{
			//attributes
			Route::get('sub-categories/attributes/edit/{id}', [SvcSubCategoryController::class, 'editAttribute'])->name('edit_svc_subcat_attribute');
			
			Route::POST('sub-categories/attributes/store', [SvcSubCategoryController::class, 'storeAttribute'])->name('store_svc_subcat_attribute');
			
			Route::POST('sub-categories/attributes/update/{id}', [SvcSubCategoryController::class, 'updateAttribute'])->name('update_svc_subcat_attribute');
			
			Route::POST('sub-categories/attribute/option/store', [SvcSubCategoryController::class, 'storeAttributeOption'])->name('store_svc_subcat_attribute_option');
			
			//brands
			Route::get('sub-categories/brands/edit/{id}', [SvcSubCategoryController::class, 'editBrand'])->name('edit_svc_subcat_brand');
			
			Route::POST('sub-categories/brands/store', [SvcSubCategoryController::class, 'storeBrand'])->name('store_svc_subcat_brand');
			
			Route::POST('sub-categories/brands/update/{id}', [SvcSubCategoryController::class, 'updateBrand'])->name('update_svc_subcat_brand');
			
			Route::POST('sub-categories/brand/option/store', [SvcSubCategoryController::class, 'storeBrandOption'])->name('store_svc_subcat_brand_option');
			
			
			Route::get('sub-categories/datatable', [SvcSubCategoryController::class, 'datatable'])->name('svc_sub_categories_datatable');
			
			Route::get('sub-categories/deactivate/{id}', [SvcSubCategoryController::class, 'makeInActive'])->name('svc_sub_categories_deactivate');
			
			Route::get('sub-categories/activate/{id}', [SvcSubCategoryController::class, 'makeActive'])->name('svc_sub_categories_activate');
			
			Route::resource('sub-categories', SvcSubCategoryController::class);
		}
		
		//Services
		{
			Route::get('/services/{cat_id}/sub-categories.json', function($cat_id)
			{
				$sub_categories = SvcSubCategory::join('svc_categories','svc_categories.id','=','svc_sub_categories.cat_id')
					->select(['svc_sub_categories.id','svc_sub_categories.title'])
					->where(['svc_sub_categories.status'=>1])
					->where(['cat_id'=>$cat_id])
					->get();
				
				return $sub_categories;
			});
			
			//attributes
			Route::get('services/attributes/edit/{id}', [SvcServiceController::class, 'editAttribute'])->name('edit_svc_service_attribute');
			
			Route::POST('services/attributes/store', [SvcServiceController::class, 'storeAttribute'])->name('store_svc_service_attribute');
			
			Route::POST('services/attributes/update/{id}', [SvcServiceController::class, 'updateAttribute'])->name('update_svc_service_attribute');
			
			Route::POST('services/attribute/option/store', [SvcServiceController::class, 'storeAttributeOption'])->name('store_svc_service_attribute_option');
			
			//brands
			Route::get('services/brands/edit/{id}', [SvcServiceController::class, 'editBrand'])->name('edit_svc_service_brand');
			
			Route::POST('services/brands/store', [SvcServiceController::class, 'storeBrand'])->name('store_svc_service_brand');
			
			Route::POST('services/brands/update/{id}', [SvcServiceController::class, 'updateBrand'])->name('update_svc_service_brand');
			
			Route::POST('services/brand/option/store', [SvcServiceController::class, 'storeBrandOption'])->name('store_svc_service_brand_option');
			
			
			Route::get('services/datatable', [SvcServiceController::class, 'datatable'])->name('svc_services_datatable');
			
			Route::get('services/deactivate/{id}', [SvcServiceController::class, 'makeInActive'])->name('svc_services_deactivate');
			
			Route::get('services/activate/{id}', [SvcServiceController::class, 'makeActive'])->name('svc_services_activate');
			
			Route::resource('services', SvcServiceController::class);
		}
		
		//sub-Services
		{
			Route::get('/sub-services/{cat_id}/sub-categories.json', function($cat_id)
			{
				$sub_categories = SvcSubCategory::join('svc_categories','svc_categories.id','=','svc_sub_categories.cat_id')
					->select(['svc_sub_categories.id','svc_sub_categories.title'])
					->where(['svc_sub_categories.status'=>1])
					->where(['svc_sub_categories.has_services'=>1])
					->where(['cat_id'=>$cat_id])
					->get();
				
				return $sub_categories;
			});
			
			Route::get('/sub-services/{sub_cat_id}/services.json', function($sub_cat_id)
			{
				$services = SvcService::leftjoin('svc_sub_categories','svc_services.sub_cat_id','=','svc_sub_categories.id')
					->select(['svc_services.id','svc_services.title'])
					->where(['svc_services.status'=>1])
					->where(['svc_services.sub_cat_id'=>$sub_cat_id])
					->get();
				
				return $services;
			});
			
			//attributes
			Route::get('sub-services/attributes/edit/{id}', [SvcSubServiceController::class, 'editAttribute'])->name('edit_svc_sub_service_attribute');
			
			Route::POST('sub-services/attributes/store', [SvcSubServiceController::class, 'storeAttribute'])->name('store_svc_sub_service_attribute');
			
			Route::POST('sub-services/attributes/update/{id}', [SvcSubServiceController::class, 'updateAttribute'])->name('update_svc_sub_service_attribute');
			
			Route::POST('sub-services/attribute/option/store', [SvcServiceController::class, 'storeAttributeOption'])->name('store_svc_sub_service_attribute_option');
			
			//brands
			Route::get('sub-services/brands/edit/{id}', [SvcSubServiceController::class, 'editBrand'])->name('edit_svc_sub_service_brand');
			
			Route::POST('sub-services/brands/store', [SvcSubServiceController::class, 'storeBrand'])->name('store_svc_sub_service_brand');
			
			Route::POST('sub-services/brands/update/{id}', [SvcSubServiceController::class, 'updateBrand'])->name('update_svc_sub_service_brand');
			
			Route::POST('sub-services/brand/option/store', [SvcServiceController::class, 'storeBrandOption'])->name('store_svc_sub_service_brand_option');
			
			Route::get('sub-services/datatable', [SvcSubServiceController::class, 'datatable'])->name('svc_sub_services_datatable');
			
			Route::get('sub-services/deactivate/{id}', [SvcSubServiceController::class, 'makeInActive'])->name('svc_sub_services_deactivate');
			
			Route::get('sub-services/activate/{id}', [SvcSubServiceController::class, 'makeActive'])->name('svc_sub_services_activate');
			
			Route::resource('sub-services', SvcSubServiceController::class);
		}
		
		
		// Vendors
		{
			// Vendors Services AJAX Calls
			{
				Route::get('/vendors/{vend_id}/categories.json', function($vend_id)
				{
					$categories = SvcVendorCategory::leftjoin('svc_categories','svc_vendor_categories.cat_id','=','svc_categories.id')
						->select(['svc_categories.id','svc_categories.title'])
						->where(['svc_categories.has_subcategories'=>1])
						->where(['svc_vendor_categories.status'=>1])
						->where(['vend_id'=>$vend_id])
						->get();
					
					return $categories;
				});
				
				Route::get('/vendors/{cat_id}/{vend_id}/sub-categories.json', function($cat_id,$vend_id)
				{
					$sub_categories = SvcVendorSubCategory::join('svc_sub_categories','svc_sub_categories.id','=','svc_vendor_sub_categories.sub_cat_id')
						->join('svc_categories','svc_sub_categories.cat_id','=','svc_categories.id')
						->select(['svc_sub_categories.id','svc_sub_categories.title'])
						->where(['svc_sub_categories.status'=>1])
						->where(['svc_sub_categories.has_services'=>1])
						->where(['svc_vendor_sub_categories.vend_id'=>$vend_id])
						->where(['svc_categories.id'=>$cat_id])
						->get();
					
					return $sub_categories;
				});
				
				Route::get('/vendors/{sub_cat_id}/services.json', function($sub_cat_id)
				{
					$services = SvcService::leftjoin('svc_sub_categories','svc_services.sub_cat_id','=','svc_sub_categories.id')
						->select(['svc_services.id','svc_services.title'])
						->where(['svc_services.status'=>1])
						->where(['svc_services.sub_cat_id'=>$sub_cat_id])
						->get();
					
					return $services;
				});
				
				Route::get('/vendors/{service_id}/sub-services.json', function($service_id)
				{
					$sub_services = SvcSubService::leftjoin('svc_services','svc_sub_services.service_id','=','svc_services.id')
						->select(['svc_sub_services.id','svc_sub_services.title'])
						->where(['svc_sub_services.status'=>1])
						->where(['svc_sub_services.service_id'=>$service_id])
						->get();
					
					return $sub_services;
				});
				
			}
			
			//vendor sub categories
			{
				Route::get('/vendors/{vend_id}/categoriesss.json', function($vend_id)
				{
					$categories = SvcVendorCategory::leftjoin('svc_categories','svc_vendor_categories.cat_id','=','svc_categories.id')
						->select(['svc_categories.id','svc_categories.title'])
						->where(['svc_categories.has_subcategories'=>1])
						->where(['svc_vendor_categories.status'=>1])
						->where(['vend_id'=>$vend_id])
						->get();
					
					return $categories;
				});
				
				Route::get('/vendors/{cat_id}/sub-categoriesss.json', function($cat_id)
				{
					$sub_categories = SvcSubCategory::join('svc_categories','svc_categories.id','=','svc_sub_categories.cat_id')
						->select(['svc_sub_categories.id','svc_sub_categories.title'])
						->where(['svc_sub_categories.status'=>1])
						->where(['cat_id'=>$cat_id])
						->get();
					
					return $sub_categories;
				});
				
			}
			
			//vendor product
			{
				Route::get('/vendors/{vend_id}/product-categories.json', function($vend_id)
				{
					$categories = SvcVendorCategory::leftjoin('svc_categories','svc_vendor_categories.cat_id','=','svc_categories.id')
						->select(['svc_categories.id','svc_categories.title'])
						->where(['svc_categories.has_subcategories'=>1])
						->where(['svc_vendor_categories.status'=>1])
						->where(['vend_id'=>$vend_id])
						->get();
					
					return $categories;
				});
				
				Route::get('/vendors/{cat_id}/product-sub-categories.json', function($cat_id)
				{
					$sub_categories = SvcSubCategory::join('svc_categories','svc_categories.id','=','svc_sub_categories.cat_id')
						->select(['svc_sub_categories.id','svc_sub_categories.title'])
						->where(['svc_sub_categories.status'=>1])
						->where(['cat_id'=>$cat_id])
						->get();
					
					return $sub_categories;
				});
				
			}
			
			Route::get('vendors/datatable', [SvcVendorController::class, 'datatable'])->name('svc_vendors_datatable');
			
			Route::get('vendors/review_datatable/{id}', [SvcVendorController::class, 'review_datatable'])->name('vendor_review_datatable');
			
			Route::get('vendors/order_datatable/{id}', [SvcVendorController::class, 'order_datatable'])->name('vendor_order_datatable');
			
			Route::post('/vendors/timings-update', [SvcVendorController::class, 'update_timings'])->name('vendors.timings.update');
			
			Route::get('/vendors/index', [SvcVendorController::class, 'index'])->name('vendors.create');
			
			Route::get('/vendors/store', [SvcVendorController::class, 'store'])->name('vendors.store');
			
			Route::get('/vendors/show', [SvcVendorController::class, 'show'])->name('vendors.show');
			
			Route::get('/vendors/destroy', [SvcVendorController::class, 'show'])->name('vendors.destroy');
			
			Route::get('/vendors/edit', [SvcVendorController::class, 'edit'])->name('vendors.edit');
			
			Route::get('/vendors/inactive/{id}', [SvcVendorController::class, 'makeInActive'])->name('vendors-inactive');
			
			Route::get('/vendors/active/{id}', [SvcVendorController::class, 'makeActive'])->name('vendors-active');
			
			Route::get('/vendors/addFeatured/{id}', [SvcVendorController::class, 'addFeatured'])->name('add-featured-vendors');
			
			Route::get('/vendors/removeFeatured/{id}', [SvcVendorController::class, 'removeFeatured'])->name('remove-featured-vendors');
			
			Route::resource('vendors', SvcVendorController::class);
			
		}
		
		//Vendor Categories
		{
			//categories attributes
			{
				Route::get('/vendors/category_attributes/{cat_id}/category_attributes.json', function($cat_id)
				{
					$attribute_options = null;
					$attributes = SvcAttribute::where('attributable_id',$cat_id)->where('attributable_type','App/Models/SvcCategory')->get();
					if($attributes->count() > 0){
						foreach ($attributes as $attribute){
							$attribute_id = $attribute->id;
							$attribute_options = SvcAttributeOption::where('attributable_id',$attribute_id)->get();
							return $attribute_options;
						}
					}
					else{
						return $attribute_options;
					}
				});
			}
			
			Route::get('vendor-categories/datatable', [SvcVendorCategoryController::class, 'datatable'])->name('svc_vendor_categories_datatable');
			
			Route::get('vendor-categories/deactivate/{id}', [SvcVendorCategoryController::class, 'makeInActive'])->name('svc_vendor_categories_deactivate');
			
			Route::get('vendor-categories/activate/{id}', [SvcVendorCategoryController::class, 'makeActive'])->name('svc_vendor_categories_activate');
			
			Route::resource('vendor-categories', SvcVendorCategoryController::class);
		}
		
		//Vendor Bank Details
		{
			
			Route::get('vendor-bank-details/datatable', [SvcBankDetailController::class, 'datatable'])->name('svc_vendor_bank_details_datatable');
			
			Route::get('vendor-bank-details/deactivate/{id}', [SvcBankDetailController::class, 'makeInActive'])->name('svc_vendor_bank_details_deactivate');
			
			Route::get('vendor-bank-details/activate/{id}', [SvcBankDetailController::class, 'makeActive'])->name('svc_vendor_bank_details_activate');
			
			Route::resource('vendor-bank-details', SvcBankDetailController::class);
		}
		
		
		//Vendor Sub Categories
		{
			//Sub Categories Attributes
			{
				Route::get('/vendors/sub_category_attributes/{sub_cat_id}/sub_category_attributes.json', function($sub_cat_id)
				{
					$attribute_options = null;
					$attributes = SvcAttribute::where('attributable_id',$sub_cat_id)->where('attributable_type','App/Models/SvcSubCategory')->get();
					if($attributes->count() > 0){
						foreach ($attributes as $attribute){
							$attribute_id = $attribute->id;
							$attribute_options = SvcAttributeOption::where('attributable_id',$attribute_id)->get();
							return $attribute_options;
						}
					}
					else{
						return $attribute_options;
					}
				});
			}
			
			Route::get('vendor-sub-categories/datatable', [SvcVendorSubCategoryController::class, 'datatable'])->name('svc_vendor_sub_categories_datatable');
			
			Route::get('vendor-sub-categories/deactivate/{id}', [SvcVendorSubCategoryController::class, 'makeInActive'])->name('svc_vendor_sub_categories_deactivate');
			
			Route::get('vendor-sub-categories/activate/{id}', [SvcVendorSubCategoryController::class, 'makeActive'])->name('svc_vendor_sub_categories_activate');
			
			Route::resource('vendor-sub-categories', SvcVendorSubCategoryController::class);
		}
		
		//vendor Services
		{
			//Services Attributes
			{
				Route::get('/vendors/service_attributes/{service_id}/service_attributes.json', function($service_id)
				{
					$attribute_options = null;
					$attributes = SvcAttribute::where('attributable_id',$service_id)->where('attributable_type','App/Models/SvcService')->get();
					if($attributes->count() > 0){
						foreach ($attributes as $attribute){
							$attribute_id = $attribute->id;
							$attribute_options = SvcAttributeOption::where('attributable_id',$attribute_id)->get();
							return $attribute_options;
						}
					}
					else{
						return $attribute_options;
					}
				});
			}
			
			//Sub Services Attributes
			{
				Route::get('/vendors/sub_service_attributes/{sub_service_id}/sub_service_attributes.json', function($sub_service_id)
				{
					$attribute_options = null;
					$attributes = SvcAttribute::where('attributable_id',$sub_service_id)->where('attributable_type','App/Models/SvcSubService')->get();
					if($attributes->count() > 0){
						foreach ($attributes as $attribute){
							$attribute_id = $attribute->id;
							$attribute_options = SvcAttributeOption::where('attributable_id',$attribute_id)->get();
							return $attribute_options;
						}
					}
					else{
						return $attribute_options;
					}
				});
			}
			
			Route::get('vendor-services/datatable', [SvcVendorServicesController::class, 'datatable'])->name('svc_vendor_services_datatable');
			
			Route::get('vendor-services/deactivate/{id}', [SvcVendorServicesController::class, 'makeInActive'])->name('svc_vendor_services_deactivate');
			
			Route::get('vendor-services/activate/{id}', [SvcVendorServicesController::class, 'makeActive'])->name('svc_vendor_services_activate');
			
			Route::resource('vendor-services', SvcVendorServicesController::class);
		}
		
		//products
		{
			Route::get('products/datatable', [SvcProductController::class, 'datatable'])->name('svc_products_datatable');
			
			Route::get('products/deactivate/{id}', [SvcProductController::class, 'makeInActive'])->name('svc_products_deactivate');
			
			Route::get('products/activate/{id}', [SvcProductController::class, 'makeActive'])->name('svc_products_activate');
			
			Route::resource('products', SvcProductController::class);
		}
		
		//orders
		{
			Route::get('orders/datatable', [SvcOrderController::class, 'datatable'])->name('svc_orders_datatable');
				
			Route::get('orders/dashboard/datatable', [SvcOrderController::class, 'dashboard_datatable'])->name('svc_orders_dashboard_datatable');
			
			Route::get('orders/accept/{id}', [SvcOrderController::class, 'order_accept'])->name('svc_orders_accept');
			
			Route::post('orders/reject', [SvcOrderController::class, 'order_reject'])->name('svc_orders_reject');
			
			Route::resource('orders', SvcOrderController::class);
		}
		
		//Review
		{
			Route::get('reviews/datatable', [SvcReviewController::class, 'datatable'])->name('svc_reviews_datatable');
			
			Route::get('reviews/deactivate/{id}', [SvcReviewController::class, 'makeInActive'])->name('svc_reviews_deactivate');
			
			Route::get('reviews/activate/{id}', [SvcReviewController::class, 'makeActive'])->name('svc_reviews_activate');
			
			Route::resource('reviews', SvcReviewController::class);
		}
		
	});





// --------------------------------------------------------------------------//
// -------------------------- ECOMMERCE MODULE ------------------------------//
// --------------------------------------------------------------------------//
	{
		
		//  AJAX Calls  //
		//seller sub categories
		{
			Route::get('/ecommerce/sellers/{seller_id}/categories.json', function($seller_id)
			{
				$categories = EcomSellerCategory::leftjoin('ecom_categories','ecom_seller_categories.cat_id','=','ecom_categories.id')
					->select(['ecom_categories.id','ecom_categories.title'])
					//->where(['ecom_seller_categories.status'=>1])
					->where(['seller_id'=>$seller_id])
					->get();
				
				return $categories;
			});
			
			Route::get('/ecommerce/sellers/{cat_id}/sub-categories.json', function($cat_id)
			{
				$sub_categories = EcomSubCategory::join('ecom_categories','ecom_categories.id','=','ecom_sub_categories.cat_id')
					->select(['ecom_sub_categories.id','ecom_sub_categories.title'])
					//->where(['ecom_sub_categories.status'=>1])
					->where(['cat_id'=>$cat_id])
					->get();
				
				return $sub_categories;
			});
			
		}
		
		//seller product
		{
			Route::get('/ecommerce/sellers/{seller_id}/product-categories.json', function($seller_id)
			{
				$categories = EcomSellerCategory::leftjoin('ecom_categories','ecom_seller_categories.cat_id','=','ecom_categories.id')
					->select(['ecom_categories.id','ecom_categories.title'])
					->where(['ecom_categories.has_subcategories'=>1])
					->where(['ecom_seller_categories.status'=>1])
					->where(['seller_id'=>$seller_id])
					->get();
				
				return $categories;
			});
			
			Route::get('/ecommerce/sellers/{cat_id}/product-sub-categories.json', function($cat_id)
			{
				$sub_categories = EcomSubCategory::join('ecom_categories','ecom_categories.id','=','ecom_sub_categories.cat_id')
					->select(['ecom_sub_categories.id','ecom_sub_categories.title'])
					->where(['ecom_sub_categories.status'=>1])
					->where(['cat_id'=>$cat_id])
					->get();
				
				return $sub_categories;
			});
			
			//Attributes
			{
				//Attributes
				Route::get('/ecommerce/products/{sub_cat_id}/products_attributes.json', function($sub_cat_id)
				{
					$attributes = null;
					$attributes = EcomAttribute::where('attributable_id',$sub_cat_id)
						->where('attributable_type','App/Models/EcomSubCategory')
						->get();
					
					if($attributes->count() > 0){
						return $attributes;
					}
					else{
						return $attributes;
					}
				});
				
				
				//Attribute Ooptions
				Route::get('/ecommerce/products/attribute_option/{attribute_id}/products_attribute_options.json', function($attribute_id)
				{
					$options = null;
					$options = EcomAttributeOption::where('attributable_id',$attribute_id)->get();
					
					if($options->count() > 0){
						return $options;
					}
					else{
						return $options;
					}
				});
			}
			
		}
		
		//Bank Details
		Route::resource('ecommerce-seller-bank-details', EcomBankDetailController::class);
		
		//Categories
		Route::resource('ecommerce-categories', EcomCategoryController::class);
		
		//Sub Categories
		Route::resource('ecommerce-sub-categories', EcomSubCategoryController::class);
		
		//Sellers
		Route::resource('ecommerce-sellers', EcomSellerController::class);
		
		//Seller Categories
		Route::resource('ecommerce-seller-categories', EcomSellerCategoryController::class);
		
		//Seller SubCategories
		Route::resource('ecommerce-seller-sub-categories', EcomSellerSubCategoryController::class);
		
		//Products
		Route::resource('ecommerce-products', EcomProductController::class);
		
		//Orders
		Route::resource('ecommerce-orders', EcomOrderController::class);
		
		//Reviews
		Route::resource('ecommerce-reviews', EcomReviewController::class);
		
		
		Route::middleware(['auth'])->prefix('ecommerce')->group(function ()
		{
			
			//Bank Details
			{
				Route::get('ecommerce-seller-bank-details/datatable', [EcomBankDetailController::class, 'datatable'])->name('ecom_seller_bank_details__datatable');
				
				Route::get('ecommerce-seller-bank-details/deactivate/{id}', [EcomBankDetailController::class, 'makeInActive'])->name('ecom_seller_bank_details_deactivate');
				
				Route::get('ecommerce-seller-bank-details/activate/{id}', [EcomBankDetailController::class, 'makeActive'])->name('ecom_seller_bank_details_activate');
			}
			
			//Categories
			{
				Route::get('categories/datatable', [EcomCategoryController::class, 'datatable'])->name('ecom_categories_datatable');
				
				Route::get('categories/deactivate/{id}', [EcomCategoryController::class, 'makeInActive'])->name('ecom_categories_deactivate');
				
				Route::get('categories/activate/{id}', [EcomCategoryController::class, 'makeActive'])->name('ecom_categories_activate');
			}
			
			//Sub Categories
			{
				Route::get('sub-categories/datatable', [EcomSubCategoryController::class, 'datatable'])->name('ecom_sub_categories_datatable');
				
				Route::get('sub-categories/deactivate/{id}', [EcomSubCategoryController::class, 'makeInActive'])->name('ecom_sub_categories_deactivate');
				
				Route::get('sub-categories/activate/{id}', [EcomSubCategoryController::class, 'makeActive'])->name('ecom_sub_categories_activate');
			}
			
			//Sellers
			{
				Route::get('sellers/datatable', [EcomSellerController::class, 'datatable'])->name('ecom_sellers_datatable');
				
				Route::get('/sellers/index', [EcomSellerController::class, 'index'])->name('sellers.create');
				
				Route::get('/sellers/store', [EcomSellerController::class, 'store'])->name('sellers.store');
				
				Route::get('/sellers/show', [EcomSellerController::class, 'show'])->name('sellers.show');
				
				Route::get('/sellers/destroy', [EcomSellerController::class, 'show'])->name('sellers.destroy');
				
				Route::get('/sellers/edit', [EcomSellerController::class, 'edit'])->name('sellers.edit');
				
				Route::get('/sellers/inactive/{id}', [EcomSellerController::class, 'makeInActive'])->name('sellers-inactive');
				Route::get('/sellers/active/{id}', [EcomSellerController::class, 'makeActive'])->name('sellers-active');
				
				Route::get('/sellers/addFeatured/{id}', [EcomSellerController::class, 'addFeatured'])->name('add-featured-sellers');
				
				Route::get('/sellers/removeFeatured/{id}', [EcomSellerController::class, 'removeFeatured'])->name('remove-featured-sellers');
				
			}
			
			//Seller Categories
			{
				Route::get('seller-categories/datatable', [EcomSellerCategoryController::class, 'datatable'])->name('ecom_seller_categories_datatable');
				
				Route::get('seller-categories/deactivate/{id}', [EcomSellerCategoryController::class, 'makeInActive'])->name('ecom_seller_categories_deactivate');
				
				Route::get('seller-categories/activate/{id}', [EcomSellerCategoryController::class, 'makeActive'])->name('ecom_seller_categories_activate');
			}
			
			//Seller SubCategories
			{
				Route::get('seller-sub-categories/datatable', [EcomSellerSubCategoryController::class, 'datatable'])->name('ecom_seller_sub_categories_datatable');
				
				Route::get('seller-sub-categories/attributes/{vend_id}/{sub_cat_id}', [EcomSellerSubCategoryController::class, 'attributes'])->name('seller_sub_categories_attributes');
				
				Route::get('seller-sub-categories/attributes/edit/{vend_id}/{sub_cat_id}', [EcomSellerSubCategoryController::class, 'attributes_edit'])->name('seller_sub_categories_attributes_edit');
				
				Route::post('seller-sub-categories/attributes/update', [EcomSellerSubCategoryController::class, 'attributes_update'])->name('seller_sub_categories_attributes_update');
				
				Route::get('seller-sub-categories/deactivate/{id}', [EcomSellerSubCategoryController::class, 'makeInActive'])->name('ecom_seller_sub_categories_deactivate');
				
				Route::get('seller-sub-categories/activate/{id}', [EcomSellerSubCategoryController::class, 'makeActive'])->name('ecom_seller_sub_categories_activate');
			}
			
			//Products
			{
				Route::get('products/orders_datatable', [EcomProductController::class, 'orders_datatable'])->name('ecom_products_orders_datatable');
				
				Route::get('products/review_datatable', [EcomProductController::class, 'review_datatable'])->name('ecom_products_review_datatable');
				
				Route::get('products/datatable', [EcomProductController::class, 'datatable'])->name('ecom_products_datatable');
				
				Route::get('products/deactivate/{id}', [EcomProductController::class, 'makeInActive'])->name('ecom_products_deactivate');
				
				Route::get('products/activate/{id}', [EcomProductController::class, 'makeActive'])->name('ecom_products_activate');
				
				Route::get('/products/addFeatured/{id}', [EcomProductController::class, 'addFeatured'])->name('add_to_featured_ecom_products');
				
				Route::get('/products/removeFeatured/{id}', [EcomProductController::class, 'removeFeatured'])->name('remove_from_featured_ecom_products');
				
				Route::post('/product-images/order/{id}', [EcomProductController::class, 'saveImagesOrder'])->name('ecom_products_images.order');
			}
			
			//Orders
			{
				Route::get('orders/datatable', [EcomOrderController::class, 'datatable'])->name('ecom_orders_datatable');
				
				Route::get('orders/dashboard/datatable', [EcomOrderController::class, 'dashboard_datatable'])->name('ecom_orders_dashboard_datatable');
				
				Route::get('orders/deactivate/{id}', [EcomOrderController::class, 'makeInActive'])->name('ecom_orders_deactivate');
				
				Route::get('orders/activate/{id}', [EcomOrderController::class, 'makeActive'])->name('ecom_orders_activate');
			}
			
			//Reviews
			{
				Route::get('reviews/datatable', [EcomReviewController::class, 'datatable'])->name('ecom_reviews_datatable');
				
				Route::get('reviews/deactivate/{id}', [EcomReviewController::class, 'makeInActive'])->name('ecom_reviews_deactivate');
				
				Route::get('reviews/activate/{id}', [EcomReviewController::class, 'makeActive'])->name('ecom_reviews_activate');
				
				Route::post('reviews/report-review', [EcomReviewController::class, 'report_review'])->name('ecom_report_review');
			}
			
		});
		
		
	}

// --------------------------------------------------------------------------//
// -------------------------- CLASSIFIED MODULE -----------------------------//
// --------------------------------------------------------------------------//
	{
		
		//  AJAX Calls  //
		{
			Route::get('/classified-product-types/{cat_id}/sub-categories.json', function ($cat_id) {
				$sub_categories = CaSubCategory::join('ca_categories', 'ca_categories.id', '=', 'ca_sub_categories.cat_id')
					->select(['ca_sub_categories.id', 'ca_sub_categories.title'])
					->where(['ca_sub_categories.status' => 1])
					->where(['cat_id' => $cat_id])
					->get();
				
				return $sub_categories;
			});
		}
		
		//Classified Categories
		Route::resource('classified-categories', CaCategoryController::class);
		
		//Classified Sub-Categories
		Route::resource('classified-sub-categories', CaSubCategoryController::class);
		
		//Classified product-types
		Route::resource('classified-product-types', CaProductTypeController::class);
		
		//Classified all products
		Route::resource('classified-products', CaProductsController::class);
		
		//Classified active products
		Route::resource('classified-active-products', CaProductsActiveController::class);
		
		//Classified reported products
		Route::resource('classified-reported-products', CaProductsReportedController::class);
		
		//Classified sold products
		Route::resource('classified-sold-products', CaProductsSoldController::class);
		
		
		Route::middleware(['auth'])->prefix('classified')->group(function ()
		{
			
			//Classified Categories
			{
				Route::get('categories/datatable', [CaCategoryController::class, 'datatable'])->name('ca_categories_datatable');
				
				Route::get('categories/deactivate/{id}', [CaCategoryController::class, 'makeInActive'])->name('ca_categories_deactivate');
				
				Route::get('categories/activate/{id}', [CaCategoryController::class, 'makeActive'])->name('ca_categories_activate');
				
				Route::get('categories/attributes/edit/{id}', [CaCategoryController::class, 'editAttribute'])->name('edit_ca_category_attribute');
				
				Route::POST('categories/attributes/store', [CaCategoryController::class, 'storeAttribute'])->name('store_ca_category_attribute');
				
				Route::POST('categories/attributes/update/{id}', [CaCategoryController::class, 'updateAttribute'])->name('update_ca_category_attribute');
				
				Route::POST('categories/attribute/option/store', [CaCategoryController::class, 'storeAttributeOption'])->name('store_ca_category_attribute_option');
			}
			
			//Classified Sub-Categories
			{
				Route::get('sub-categories/datatable', [CaSubCategoryController::class, 'datatable'])->name('ca_sub_categories_datatable');
				
				Route::get('sub-categories/deactivate/{id}', [CaSubCategoryController::class, 'makeInActive'])->name('ca_sub_categories_deactivate');
				
				Route::get('sub-categories/activate/{id}', [CaSubCategoryController::class, 'makeActive'])->name('ca_sub_categories_activate');
				
				Route::get('sub-categories/attributes/edit/{id}', [CaSubCategoryController::class, 'editAttribute'])->name('edit_ca_sub_category_attribute');
				
				Route::POST('sub-categories/attributes/store', [CaSubCategoryController::class, 'storeAttribute'])->name('store_ca_sub_category_attribute');
				
				Route::POST('sub-categories/attributes/update/{id}', [CaSubCategoryController::class, 'updateAttribute'])->name('update_ca_sub_category_attribute');
				
				Route::POST('sub-categories/attribute/option/store', [CaSubCategoryController::class, 'storeAttributeOption'])->name('store_ca_sub_category_attribute_option');
			}
			
			//Classified product-types
			{
				Route::get('product-types/datatable', [CaProductTypeController::class, 'datatable'])->name('ca_product_types_datatable');
				
				Route::get('product-types/deactivate/{id}', [CaProductTypeController::class, 'makeInActive'])->name('ca_product_types_deactivate');
				
				Route::get('product-types/activate/{id}', [CaProductTypeController::class, 'makeActive'])->name('ca_product_types_activate');
				
				Route::get('product-types/attributes/edit/{id}', [CaProductTypeController::class, 'editAttribute'])->name('edit_ca_product_types_attribute');
				
				Route::POST('product-types/attributes/store', [CaProductTypeController::class, 'storeAttribute'])->name('store_ca_product_types_attribute');
				
				Route::POST('product-types/attributes/update/{id}', [CaProductTypeController::class, 'updateAttribute'])->name('update_ca_product_types_attribute');
				
				Route::POST('product-types/attribute/option/store', [CaProductTypeController::class, 'storeAttributeOption'])->name('store_ca_product_types_attribute_option');
			}
			
			//Classified all products
			{
				Route::get('products/datatable', [CaProductsController::class, 'datatable'])->name('ca_products_datatable');
				
				Route::get('products/deactivate/{id}', [CaProductsController::class, 'makeInActive'])->name('ca_products_deactivate');
				
				Route::get('products/activate/{id}', [CaProductsController::class, 'makeActive'])->name('ca_aproducts_activate');
			}
			
			//Classified active products
			{
				Route::get('active-products/datatable', [CaProductsActiveController::class, 'datatable'])->name('ca_active_products_datatable');
				
				Route::get('active-products/deactivate/{id}', [CaProductsActiveController::class, 'makeInActive'])->name('ca_active_products_deactivate');
				
				Route::get('active-products/activate/{id}', [CaProductsActiveController::class, 'makeActive'])->name('ca_active_products_activate');
			}
			
			//Classified reported products
			{
				Route::get('reported-products/datatable', [CaProductsReportedController::class, 'datatable'])->name('ca_reported_products_datatable');
				
				Route::get('reported-products/reported_product_by_user_datatable/{id}', [CaProductsReportedController::class, 'reported_product_by_user_datatable'])->name('ca_reported_products_by_user_datatable');
				
				Route::get('reported-products/deactivate/{id}', [CaProductsReportedController::class, 'makeInActive'])->name('ca_reported_products_deactivate');
				
				Route::get('reported-products/activate/{id}', [CaProductsReportedController::class, 'makeActive'])->name('ca_reported_products_activate');
			}
			
			//Classified sold products
			{
				Route::get('sold-products/datatable', [CaProductsSoldController::class, 'datatable'])->name('ca_sold_products_datatable');
				
				Route::get('sold-products/deactivate/{id}', [CaProductsSoldController::class, 'makeInActive'])->name('ca_sold_products_deactivate');
				
				Route::get('sold-products/activate/{id}', [CaProductsSoldController::class, 'makeActive'])->name('ca_sold_products_activate');
			}
			
		});
	}
	
});