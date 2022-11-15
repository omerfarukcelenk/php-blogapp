<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->group('api', static function ($routes) {
    $routes->group('v1', static function ($routes) {
        $routes->resource('blogresource', ['namespace' => 'App\Controllers\Api\V1'], ['controller' => 'BlogResource']);

        $routes->group('product', ['namespace' => 'App\Controllers\Api\V1'], static function ($routes) {
            $routes->get('generic', 'Product::generic',);
            $routes->get('failure', 'Product::failure',);
            $routes->get('created', 'Product::created',);
            $routes->get('deleted', 'Product::deleted',);
            $routes->get('nocontent', 'Product::noContent',);
            $routes->get('unauthorized', 'Product::unauthorized',);
            $routes->get('forbidden', 'Product::forbidden',);
        });
        $routes->group('orders', ['namespace' => 'App\Controllers\Api\V1'], static function ($routes) {
            $routes->get('reqType', 'Orders::reqType');
            $routes->match(['get', 'post', 'put', 'delete'], 'methodType', 'Orders::methodType',);
            $routes->get('secureType', 'Orders::secureType');
            $routes->match(['get', 'post', 'put', 'delete'], 'inputGet', 'Orders::inputGet');
            $routes->match(['get', 'post', 'put', 'delete'], 'inputJson', 'Orders::inputJson');

        });
    });
});


$routes->group('{locale}', static function ($routes) {
    $routes->get('/', 'Frontend\Home::index',);
    $routes->get('iletisim', 'Frontend\Page::contact',);
    $routes->match(['get', 'post'], 'honeypot', 'Frontend\Form::honeypot',);
    $routes->get('sessiondersleri', 'Frontend\SessionDersleri::index',);
    $routes->get('sms/gonder', 'Frontend\KutuphaneController::index');
    $routes->get('event/calistir', 'Frontend\EventController::index');

    $routes->group('blog', static function ($routes) {
        $routes->get('single/(:any)', 'Frontend\Blog::single/$1', ['as' => 'blog_single']);
        $routes->addPlaceholder('uuid', '[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}');
        $routes->get('category/(:any)', 'Frontend\Blog::category/$1', ['as' => 'blog_category']);
    });
});


$routes->group('admin', static function ($routes) {
    $routes->get('home', 'Home::index');

    $routes->group('blog', static function ($routes) {
        $routes->get('insert', 'Backend\Blog::insert', ['as' => 'admin_blog_insert'], ['filter' => 'adminauth']);
        $routes->get('update', 'Backend\Blog::update', ['as' => 'admin_blog_update'], ['filter' => 'adminauth']);
        $routes->get('delete', 'Backend\Blog::delete', ['as' => 'admin_blog_delete'], ['filter' => 'adminauth']);
    });

    $routes->group('kullanici',  static function ($routes) {
        $routes->get('ekle', 'Backend\KullaniciController::ekle');
        $routes->get('getir/(:num)', 'Backend\KullaniciController::getir/$1');
        $routes->get('listele', 'Backend\KullaniciController::listele');
        $routes->get('duzenle/(:num)', 'Backend\KullaniciController::duzenle/$1');
        $routes->get('sil/(:num)', 'Backend\KullaniciController::sil/$1');
        $routes->get('silinenleri-listele', 'Backend\KullaniciController::silinenleriListele');
        $routes->get('aktifleri-listele', 'Backend\KullaniciController::aktifleriListele');
        $routes->get('pasifleri-listele', 'Backend\KullaniciController::pasifleriListele');
        $routes->get('sutun-listele', 'Backend\KullaniciController::sutunListele');
        $routes->get('offset-listele/(:num)/(:num)', 'Backend\KullaniciController::offsetListele/$1/$2');
        $routes->get('sorgu-olustur', 'Backend\KullaniciController::sorguOlustur');
        $routes->get('sorgu-getir/(:num)', 'Backend\KullaniciController::sorguGetir/$1');
        $routes->get('sorgu-getir/(:num)', 'Backend\KullaniciController::sorguGetir/$1');
        $routes->get('user-ekle', 'Backend\KullaniciController::userEkle');



    });

    $routes->group('send', ['filter' => 'adminauth'], static function ($routes) {
        $routes->get('sms', 'Backend\Send::sms', ['as' => 'users_send_sms'],);
    });
    $routes->group('users', ['filter' => 'adminauth'], static function ($routes) {
        $routes->get('listing', 'Backend\Users::listing', ['as' => 'users_listing'],);
        $routes->match(['get','post'],'create', 'Backend\Users::create', ['as' => 'users_creating'],);
        $routes->match(['get','post'],'new', 'Backend\Users::new', ['as' => 'users_new'],);



    });
    $routes->get('login', 'Backend\Auth::login', ['as' => 'admin_login'], ['filter' => 'adminauth'] /*['filter'=>'myfilter']*/);
    $routes->get('logout', 'Backend\Auth::logout', ['as' => 'admin_logout'], ['filter' => 'adminauth']);
    $routes->get('dashboard', 'Backend\Dashboard::index', ['as' => 'admin_dashboard'], ['filter' => 'adminauth']);
});

$routes->environment('development', static function ($routes) {
    $routes->get('/test/dev', 'Home::index', ['namespace' => 'App\Controllers\Frontend']);
});


// $routes->post('/admin/index', 'Backend\Dashboard::index');
// $routes->put('/admin/index', 'Backend\Dashboard::index');
// $routes->delete('/admin/index', 'Backend\Dashboard::index');
// $routes->match(['get', 'put', 'delete'], 'Backend\Dashboard::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}



//if (file_exists(ROOTPATH.'modules')){
//    $modulePath = ROOTPATH.'modules/';
//    $modules = scandir($modulePath);
//
//    foreach ($modules as $module){
//        if ($module === '.' || $module === '..' ) continue;
//        if (is_dir($modulePath) . '/' . $module){
//            $routesPath = $modulePath . $module . '/Config/Routes.php';
//            if (file_exists($routesPath)){
//                require($routesPath);
//            } else {
//                continue;
//            }
//        }
//    }
//}
