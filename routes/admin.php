<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix'=>'AdminPanel','middleware'=>['isAdmin','auth']], function(){
    Route::get('/','admin\AdminPanelController@index')->name('admin.index');

    Route::get('/read-all-notifications','admin\AdminPanelController@readAllNotifications')->name('admin.notifications.readAll');
    Route::get('/notification/{id}/details','admin\AdminPanelController@notificationDetails')->name('admin.notification.details');

    Route::get('/my-profile','admin\AdminPanelController@EditProfile')->name('admin.myProfile');
    Route::post('/my-profile','admin\AdminPanelController@UpdateProfile')->name('admin.myProfile.update');
    Route::get('/my-password','admin\AdminPanelController@EditPassword')->name('admin.myPassword');
    Route::post('/my-password','admin\AdminPanelController@UpdatePassword')->name('admin.myPassword.update');
    Route::get('/notifications-settings','admin\AdminPanelController@EditNotificationsSettings')->name('admin.notificationsSettings');
    Route::post('/notifications-settings','admin\AdminPanelController@UpdateNotificationsSettings')->name('admin.notificationsSettings.update');

    Route::group(['prefix'=>'admins'], function(){
        Route::get('/','admin\AdminUsersController@index')->name('admin.adminUsers');
        Route::get('/create','admin\AdminUsersController@create')->name('admin.adminUsers.create');
        Route::post('/create','admin\AdminUsersController@store')->name('admin.adminUsers.store');
        Route::get('/{id}/block/{action}','admin\AdminUsersController@blockAction')->name('admin.adminUsers.block');
        Route::get('/{id}/edit','admin\AdminUsersController@edit')->name('admin.adminUsers.edit');
        Route::post('/{id}/edit','admin\AdminUsersController@update')->name('admin.adminUsers.update');
        Route::get('/{id}/delete','admin\AdminUsersController@delete')->name('admin.adminUsers.delete');
    });

    // Route::group(['prefix'=>'publishers'], function(){
    //     Route::get('/','admin\PublisherUsersController@index')->name('admin.publisherUsers');
    //     Route::get('/create','admin\PublisherUsersController@create')->name('admin.publisherUsers.create');
    //     Route::post('/create','admin\PublisherUsersController@store')->name('admin.publisherUsers.store');
    //     Route::get('/{id}/edit','admin\PublisherUsersController@edit')->name('admin.publisherUsers.edit');
    //     Route::post('/{id}/edit','admin\PublisherUsersController@update')->name('admin.publisherUsers.update');
    //     Route::get('/{id}/delete','admin\PublisherUsersController@delete')->name('admin.publisherUsers.delete');
    // });

    // Route::group(['prefix'=>'clients'], function(){
    //     Route::get('/','admin\ClientUsersController@index')->name('admin.clientUsers');
    //     Route::get('/create','admin\ClientUsersController@create')->name('admin.clientUsers.create');
    //     Route::post('/create','admin\ClientUsersController@store')->name('admin.clientUsers.store');
    //     Route::get('/{id}/edit','admin\ClientUsersController@edit')->name('admin.clientUsers.edit');
    //     Route::post('/{id}/edit','admin\ClientUsersController@update')->name('admin.clientUsers.update');
    //     Route::get('/{id}/delete','admin\ClientUsersController@delete')->name('admin.clientUsers.delete');
    // });

    // educational Routes
    Route::group(['prefix'=>'courses'], function(){
        Route::get('/','admin\CoursesController@index')->name('admin.courses');
        Route::get('/create','admin\CoursesController@create')->name('admin.courses.create');
        Route::post('/create','admin\CoursesController@store')->name('admin.courses.store');
        Route::get('/{id}/edit','admin\CoursesController@edit')->name('admin.courses.edit');
        Route::post('/{id}/edit','admin\CoursesController@update')->name('admin.courses.update');
        Route::get('/{id}/delete','admin\CoursesController@delete')->name('admin.courses.delete');
    });

    Route::group(['prefix'=>'videos'], function(){
        Route::get('/','admin\VideoController@index')->name('admin.videos');
        Route::get('/create','admin\VideoController@create')->name('admin.videos.create');
        Route::post('/create','admin\VideoController@store')->name('admin.videos.store');
        Route::get('/{id}/edit','admin\VideoController@edit')->name('admin.videos.edit');
        Route::post('/{id}/edit','admin\VideoController@update')->name('admin.videos.update');
        Route::get('/{id}/delete','admin\VideoController@delete')->name('admin.videos.delete');
    });

    Route::group(['prefix'=>'reviews'], function(){
        Route::get('/','admin\ReviewController@index')->name('admin.reviews');
        Route::get('/create','admin\ReviewController@create')->name('admin.reviews.create');
        Route::post('/create','admin\ReviewController@store')->name('admin.reviews.store');
        Route::get('/{id}/edit','admin\ReviewController@edit')->name('admin.reviews.edit');
        Route::post('/{id}/edit','admin\ReviewController@update')->name('admin.reviews.update');
        Route::get('/{id}/delete','admin\ReviewController@delete')->name('admin.reviews.delete');
    });

    Route::group(['prefix'=>'contact-messages'], function(){
        Route::get('/','admin\ContactMessagesController@index')->name('admin.contactmessages');
        Route::get('/{id}/details','admin\ContactMessagesController@details')->name('admin.contactmessages.details');
        Route::get('/{id}/delete','admin\ContactMessagesController@delete')->name('admin.contactmessages.delete');
    });






    // Route::group(['prefix'=>'roles'], function(){
    //     Route::get('/','admin\RolesController@index')->name('admin.roles');
    //     Route::post('/create','admin\RolesController@store')->name('admin.roles.store');
    //     Route::post('/{id}/edit','admin\RolesController@update')->name('admin.roles.update');
    //     Route::get('/{id}/delete','admin\RolesController@delete')->name('admin.roles.delete');
    // });

    // Route::group(['prefix'=>'countries'], function(){
    //     Route::get('/','admin\CountriesController@index')->name('admin.countries');
    //     Route::post('/create','admin\CountriesController@store')->name('admin.countries.store');
    //     Route::post('/{id}/edit','admin\CountriesController@update')->name('admin.countries.update');
    //     Route::get('/{id}/delete','admin\CountriesController@delete')->name('admin.countries.delete');

    //     Route::group(['prefix'=>'{countryId}/governorates'], function(){
    //         Route::get('/','admin\GovernoratesController@index')->name('admin.governorates');
    //         Route::post('/create','admin\GovernoratesController@store')->name('admin.governorates.store');
    //         Route::post('/{governorateId}/edit','admin\GovernoratesController@update')->name('admin.governorates.update');
    //         Route::get('/{governorateId}/delete','admin\GovernoratesController@delete')->name('admin.governorates.delete');

    //         Route::group(['prefix'=>'{governorateId}/cities'], function(){
    //             Route::get('/','admin\CitiesController@index')->name('admin.cities');
    //             Route::post('/create','admin\CitiesController@store')->name('admin.cities.store');
    //             Route::post('/{cityId}/edit','admin\CitiesController@update')->name('admin.cities.update');
    //             Route::get('/{cityId}/delete','admin\CitiesController@delete')->name('admin.cities.delete');
    //         });
    //     });
    // });


    // Route::group(['prefix'=>'shippingLocales'], function(){
    //     Route::get('/','admin\shippingLocalesController@index')->name('admin.shippingLocales');
    //     Route::post('/create','admin\shippingLocalesController@store')->name('admin.shippingLocales.store');
    //     Route::post('/{id}/edit','admin\shippingLocalesController@update')->name('admin.shippingLocales.update');
    //     Route::get('/{id}/delete','admin\shippingLocalesController@delete')->name('admin.shippingLocales.delete');
    // });

    // Route::group(['prefix'=>'currencies'], function(){
    //     Route::get('/','admin\CurrenciesController@index')->name('admin.currencies');
    //     Route::post('/create','admin\CurrenciesController@store')->name('admin.currencies.store');
    //     Route::post('/{id}/edit','admin\CurrenciesController@update')->name('admin.currencies.update');
    //     Route::get('/{id}/delete','admin\CurrenciesController@delete')->name('admin.currencies.delete');
    // });

    // Route::group(['prefix'=>'faqs'], function(){
    //     Route::get('/','admin\FAQsController@index')->name('admin.faqs');
    //     Route::post('/create','admin\FAQsController@store')->name('admin.faqs.store');
    //     Route::post('/{id}/edit','admin\FAQsController@update')->name('admin.faqs.update');
    //     Route::get('/{id}/delete','admin\FAQsController@delete')->name('admin.faqs.delete');
    // });

    // Route::group(['prefix'=>'publishersfaqs'], function(){
    //     Route::get('/','admin\publishersfaqsController@index')->name('admin.publishersfaqs');
    //     Route::post('/create','admin\publishersfaqsController@store')->name('admin.publishersfaqs.store');
    //     Route::post('/{id}/edit','admin\publishersfaqsController@update')->name('admin.publishersfaqs.update');
    //     Route::get('/{id}/delete','admin\publishersfaqsController@delete')->name('admin.publishersfaqs.delete');
    // });

    // Route::group(['prefix'=>'pages'], function(){
    //     Route::get('/','admin\PagesController@index')->name('admin.pages');
    //     Route::post('/create','admin\PagesController@store')->name('admin.pages.store');
    //     Route::post('/{id}/edit','admin\PagesController@update')->name('admin.pages.update');
    //     Route::get('/{id}/delete','admin\PagesController@delete')->name('admin.pages.delete');
    // });



    // Route::group(['prefix'=>'publishers-contact-messages'], function(){
    //     Route::get('/','admin\ContactMessagesController@publishersindex')->name('admin.publishersContactMessages');
    // });

    Route::group(['prefix'=>'settings'], function(){
        Route::get('/','admin\SettingsController@generalSettings')->name('admin.settings.general');
        Route::post('/','admin\SettingsController@updateSettings')->name('admin.settings.update');
        Route::get('/{key}/deletePhoto','admin\SettingsController@deleteSettingPhoto')->name('admin.settings.deletePhoto');
    });

    // Route::group(['prefix'=>'writers'], function(){
    //     Route::get('/','admin\WritersController@index')->name('admin.writers');
    //     Route::get('/{id}/books','admin\WritersController@books')->name('admin.writers.books');
    //     Route::post('/create','admin\WritersController@store')->name('admin.writers.store');
    //     Route::post('/{id}/edit','admin\WritersController@update')->name('admin.writers.update');
    //     Route::get('/{id}/delete','admin\WritersController@delete')->name('admin.writers.delete');

    //     Route::post('/createWritersFromExcel','admin\WritersController@storeExcel')->name('admin.writers.store.excel');
    // });

    // Route::group(['prefix'=>'sections'], function(){
    //     Route::get('/','admin\SectionsController@index')->name('admin.sections');
    //     Route::post('/create','admin\SectionsController@store')->name('admin.sections.store');
    //     Route::post('/{id}/edit','admin\SectionsController@update')->name('admin.sections.update');
    //     Route::get('/{id}/delete','admin\SectionsController@delete')->name('admin.sections.delete');

    //     Route::group(['prefix'=>'{sectionId}/subs'], function(){
    //         Route::get('/','admin\SectionsController@subindex')->name('admin.sections.subs');
    //         Route::post('/create','admin\SectionsController@substore')->name('admin.sections.subs.store');
    //     });
    // });

    // Route::group(['prefix'=>'books'], function(){
    //     Route::get('/','admin\BooksController@index')->name('admin.books');
    //     Route::get('/create','admin\BooksController@create')->name('admin.books.create');
    //     Route::post('/create','admin\BooksController@store')->name('admin.books.store');
    //     Route::get('/{id}/edit','admin\BooksController@edit')->name('admin.books.edit');
    //     Route::post('/{id}/edit','admin\BooksController@update')->name('admin.books.update');
    //     Route::get('/{id}/reviews','admin\BooksController@reviews')->name('admin.books.reviews');
    //     Route::get('/{id}/reviews/{review_id}/{action}','admin\BooksController@reviewAction')->name('admin.books.reviewAction');
    //     Route::get('/{id}/delete','admin\BooksController@delete')->name('admin.books.delete');
    //     Route::post('/booksBulkDelete','admin\BooksController@booksBulkDelete')->name('admin.books.booksBulkDelete');
    // });


    // Route::group(['prefix'=>'orders'], function(){
    //     Route::get('/','admin\OrdersController@index')->name('admin.orders');
    //     Route::get('/{id}/details','admin\OrdersController@details')->name('admin.orders.details');
    // });

    // //coupons
    // Route::group(['prefix'=>'coupons'], function(){
    //     Route::get('/','admin\CouponsController@index')->name('admin.coupons.index');
    //     Route::get('/create','admin\CouponsController@create')->name('admin.coupons.create');
    //     Route::post('/store','admin\CouponsController@store')->name('admin.coupons.store');
    //     Route::get('/{id}/destroy','admin\CouponsController@destroy')->name('admin.coupons.destroy');
    //     Route::get('/{id}/report','admin\CouponsController@report')->name('admin.coupons.report');
    // });

    // Route::group(['prefix'=>'publisherspayments'], function(){
    //     Route::get('/','admin\PublisherPaymentsController@index')->name('admin.publisherspayments');
    //     Route::post('/create','admin\PublisherPaymentsController@store')->name('admin.publisherspayments.store');
    //     Route::post('/{id}/edit','admin\PublisherPaymentsController@update')->name('admin.publisherspayments.update');
    //     Route::get('/{id}/delete','admin\PublisherPaymentsController@delete')->name('admin.publisherspayments.delete');
    // });

});
