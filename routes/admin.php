<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Manage\ProductController;
use App\Http\Controllers\Manage\CategoryController;
use App\Http\Controllers\Manage\AdminController;
use App\Http\Controllers\Manage\SliderController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Manage\Check2faController;
use App\Http\Controllers\Manage\SettingsController;
use App\Http\Controllers\Manage\PagesController;
use App\Http\Controllers\Manage\BlogController;
use App\Http\Controllers\Manage\FaqController;
use App\Http\Controllers\Manage\ManualPaymentController;
use App\Http\Controllers\Manage\OrderController;
use App\Http\Controllers\Manage\PageController;
use App\Http\Controllers\Manage\PrescriptionController;
use App\Http\Controllers\Manage\ShippingController;
use App\Http\Controllers\Manage\ServiceController;

Route::prefix('manage')->group(function () {
    Route::controller(AdminLoginController::class)->group(function () {
        Route::post('/login', 'store')->name('admin.login.submit');
        Route::get('/login', 'showLogin')->name('admin-login');
        Route::post('/logout', 'logout')->name('admin.logout');
    });
    Route::get('/2fa', [Check2faController::class, 'Index'])->name('check2fa');
    Route::post('/verify/2fa', [Check2faController::class, 'VerifyCode'])->name('verify.otp');

    Route::middleware(['auth:admin'])->group(function () {
        Route::middleware(['Check2fa'])->group(function(){
        Route::controller(AdminController::class)->group(function () {
            Route::get('/index', 'index')->name('admin.home');
            Route::get('/', 'index')->name('admin.index');
            Route::get('/transactions', 'Transactions')->name('admin.transctions');
            Route::get('/transaction/details/{id}', 'transactionDetails')->name('admin.transactions-details');
            Route::get('/admin/users/order/{id}', 'userOrders')->name('admin.user-orders');
            Route::get('/admin/users/transaction/{id}', 'userTransactions')->name('admin.user-transactions');
            Route::post('/users/notification', 'pushNotify')->name('pushNotify');
            Route::get('/users/notify', 'notify')->name('admin.notify');
            Route::get('analytics', 'Analytical')->name('admin.analytical');
            Route::get('/profile', 'adminProfile')->name('admin.profile');
            Route::post('/profile/update', 'updateProfile')->name('updateProfile');
            Route::post('/notification/clear', 'AdminNotify_clear');
            Route::get('/users', 'Users')->name('admin.users');
        });

        Route::resource('/category', CategoryController::class);
        Route::resource('/product', ProductController::class);

        Route::controller(ProductController::class)->group(function () {
            Route::post('/product/status/{id}', 'status')->name('product.status');
            Route::post('/product/delete/{id}', 'delete')->name('product.delete');
        });

        Route::controller(OrderController::class)->group(function () {
            Route::get('/orders', 'Order')->name('admin.orders');
            Route::get('/order/status/{id}', 'status')->name('order.status');
            Route::post('/status/update/{id}', 'updateStatus')->name('updateStatus');
            Route::get('/orders/details/{id}', 'OrderDetails')->name('admin.order-details');
        });

        Route::controller(ShippingController::class)->group(function () {
            Route::get('/order/shipping/{id}', 'Shipping')->name('admin.shipping');
        });

        Route::controller(PagesController::class)->group(function () {
            Route::get('/add/menu', 'AddMenu')->name('admin.addMenu');
            Route::post('/add/create/', 'createMenu');
            Route::get('/menu/index/', 'MenuIndex')->name('admin.MenuIndex');
            Route::get('/menu/edit/{id}', 'EditMenu')->name('menuEdit');
            Route::post('/menu/update/{id}', 'updateMenu');
        });


        Route::controller(SliderController::class)->group(function () {
            Route::get('settings/sliders/index', 'Index')->name('slider.index');
            Route::get('settings/sliders/create', 'Create')->name('admin.sliderCreate');
            Route::post('settings/sliders/store', 'Store')->name('admin.sliderStore');
            Route::get('settings/sliders/edit/{id}', 'Edit')->name('admin.sliderEdit');
            Route::post('settings/sliders/update/{id}', 'Update')->name('admin.sliderUpdate');
            Route::get('settings/sliders/delete/{id}', 'Delete')->name('admin.sliderDelete');
            Route::get('settings/sliders/activate/{id}', 'Activate')->name('admin.sliderActivate');
            Route::get('settings/sliders/deactivate/{id}', 'Deactivate')->name('admin.sliderDeactivate');
        });


        Route::controller(SettingsController::class)->group(function () {
            Route::get('/website/settings/index',  'Index')->name('admin.settings.index');
            Route::get('/website/settings/socials',  'Socials')->name('admin.settings.socials');
            Route::get('/website/settings/about',  'Abouts')->name('admin.settings.abouts');
            Route::get('/website/settings/aboutus',  'Aboutus')->name('admin.settings.aboutus');
            Route::get('/website/settings/aboutus/create',  'AboutusCreate')->name('admin.settings.createaboutus');
            Route::post('/website/settings/aboutus/create',  'AboutusStore')->name('admin.settings.storeAboutus');
            Route::get('/website/edit/aboutus/{id}',  'AboutusEdit')->name('admin.settings.aboutusEdit');
            Route::post('/website/update/aboutus/{id}',  'AboutusUpdate')->name('admin.settings.aboutusUpdate');
            Route::get('/website/delete/aboutus/{id}',  'AboutusDelete')->name('admin.settings.aboutusDelete');
            Route::get('/website/settings/privacypolicy',  'PrivacyPolicy')->name('admin.settings.privacyPolicy');
            Route::get('/website/settings/privacypolicy/create',  'PrivacyPolicyCreate')->name('admin.settings.createprivacy');
            Route::post('/website/settings/privacypolicy/store',  'PrivacyPolicyStore')->name('admin.settings.storePrivacy');
            Route::get('/website/settings/edit/privacypolicy/{id}',  'PrivacyPolicyEdit')->name('admin.settings.privaprivacyEdit');
            Route::post('/website/update/privacypolicy/{id}',  'PrivaprivacyUpdate')->name('admin.settings.privaprivacyUpdate');
            Route::get('/website/delete/privacypolicy/{id}',  'PrivacyPolicyDelete')->name('admin.settings.privaprivacyDelete');
            Route::get('/website/settings/terms/conditions',  'TermsConditions')->name('admin.settings.termsConditions');
            Route::get('/website/settings/termsConditions/create',  'TermsConditionsCreate')->name('admin.settings.createtermsConditions');
            Route::post('/website/settings/termsConditions/create',  'TermsConditionsStore')->name('admin.settings.storetermsConditions');
            Route::get('/website/edit/termsConditions/{id}',  'TermsConditionsEdit')->name('admin.settings.termsConditionsEdit');
            Route::post('/website/update/termsConditions/{id}',  'TermsConditionsUpdate')->name('admin.settings.termsConditionsUpdate');
            Route::get('/website/delete/termsConditions/{id}',  'TermsConditionsDelete')->name('admin.settings.termsConditionsDelete');
            Route::post('/website/settings/update/socials',  'UpdateSocials')->name('admin.settings.updateSocials');
            Route::post('/website/settings/update/settings',  'UpdateSettings')->name('admin.settings.updateSettings');
            Route::post('/website/settings/termsandconditions',  'termsandconditions')->name('admin.termsandconditions.index');
        });

        Route::controller(PrescriptionController::class)->group(function(){
        Route::get('prescription/all', 'Index')->name('admin.prescription');
        });

        Route::controller(BlogController::class)->group(function(){
            Route::get('/blogs', 'Index')->name('admin.blog.index');
            Route::get('blog/create', 'Create')->name('admin.blog.create');
            Route::post('/blog/store', 'Store')->name('admin.blog.store');
            Route::get('/blog/edit/{id}', 'Edit')->name('admin.blog.edit');
            Route::post('blog/update/{id}', 'Update')->name('admin.blog.update');
            Route::post('blog/delete/{id}', 'Delete')->name('admin.blog.delete');
        });

        Route::controller(ServiceController::class)->group(function(){
            Route::get('/services', 'Index')->name('admin.service.index');
            Route::get('service/create', 'Create')->name('admin.service.create');
            Route::post('/service/store', 'Store')->name('admin.service.store');
            Route::get('/service/edit/{id}', 'Edit')->name('admin.service.edit');
            Route::post('service/update/{id}', 'Update')->name('admin.service.update');
            Route::post('service/delete/{id}', 'Delete')->name('admin.service.delete');
        });

        Route::controller(FaqController::class)->group(function (){
            Route::get('/faq', 'Index')->name('admin.faq.index');
            Route::get('faq/create', 'Create')->name('admin.settings.faq');
            Route::post('faq/store', 'Store')->name('admin.settings.storeFaq');
            Route::get('faq/edit/{id}', 'Edit')->name('admin.settings.EditFaq');
            Route::post('faq/update/{id}', 'Update')->name('admin.settings.faqUpdate');
            Route::get('/faq/delete/{id}', 'Delete')->name('admin.settings.faqDelete');
        });

        Route::controller(ManualPaymentController::class)->group(function() {
        Route::get('manual/payments', 'Index')->name('admin.manual.payments');
        Route::get('manual/payment/create', 'Create')->name('admin.create.payments');
        Route::post('manual/payment/store', 'AdminInitiatePayment')->name('AdminInitiatePayment.store');
        Route::post('payment/send/email', 'SendEmail')->name('send.payment.email');
        });

    });


});
});
