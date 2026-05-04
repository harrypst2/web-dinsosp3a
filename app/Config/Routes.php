<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override('App\Controllers\Home::override');
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to use it, please change the following to false or delete it.
$routes->setAutoRoute(false);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

// Manipulating authentication routes
$routes->get('login', function () {
    return redirect()->to('/auth/login');
});
$routes->get('logout', 'Auth::logout', ['filter' => 'auth']);

// Route for authentication page
$routes->group('auth', function (RouteCollection $routes) {
    $routes->get('login', 'Auth::login');
    $routes->post('check', 'Auth::check');
});

// Routes for downloading media from old site
$routes->group('download', function (RouteCollection $routes) {
    $routes->get('file', 'Download::file');
    $routes->get('gallery', 'Download::gallery');
    $routes->get('photo', 'Download::photo');
    $routes->get('thumbnail', 'Download::thumbnail');
});

// Routes for news
$routes->get('news', 'News::index');
$routes->get('category/(:segment)', 'News::category/$1');
$routes->get('news/(:segment)', 'News::read/$1');

// Router for about page
$routes->get('about', 'Home::about');
$routes->get('vision-mission', 'Home::vision_mission');
$routes->get('org-chart', 'Home::org_chart');
$routes->get('employees', 'Home::employees');
$routes->get('tasks', 'Home::tasks');
$routes->get('galleries', 'Home::galleries');
$routes->get('contact', 'Home::contact');

// Router for files listing page
$routes->get('files', 'Files::index');
$routes->get('download/(:hash)', 'Files::download/$1');

// Router for service lists
$routes->get('service/(:segment)', 'Services::list/$1');
$routes->get('service/download/(:hash)', 'Services::download/$1');

// Routes for informations
$routes->group('information', function (RouteCollection $routes) {
    $routes->get('public', 'Information::public');
    $routes->get('agenda', 'Information::agenda');
    $routes->get('faqs', 'Information::faqs');
});

// Routes for detail information
$routes->get('public/(:segment)', 'Information::read_public/$1');
$routes->get('agenda/(:segment)', 'Information::read_agenda/$1');

// Route for app panel
$routes->group('app', ['filter' => 'auth'], function (RouteCollection $routes) {
    // Overview
    $routes->get('/', function () {
        return redirect()->to('/app/overview');
    });
    $routes->get('overview', 'App\Overview::index');

    // Categories
    $routes->group('categories', function (RouteCollection $routes) {
        $routes->get('/', 'App\Categories::index');
        $routes->get('datatable', 'App\Categories::datatable');

        $routes->post('insert', 'App\Categories::insert');
        $routes->post('update/(:num)', 'App\Categories::update/$1');
        $routes->get('delete/(:num)', 'App\Categories::delete/$1');
    });

    // News
    $routes->group('news', function (RouteCollection $routes) {
        $routes->get('/', 'App\News::index');
        $routes->get('datatable', 'App\News::datatable');
        $routes->get('add', 'App\News::add');
        $routes->get('edit/(:hash)', 'App\News::edit/$1');

        $routes->post('insert', 'App\News::insert');
        $routes->post('update/(:num)', 'App\News::update/$1');
        $routes->get('delete/(:num)', 'App\News::delete/$1');
    });

    // Information
    $routes->group('information', function (RouteCollection $routes) {
        // Public Information
        $routes->group('public', function (RouteCollection $routes) {
            $routes->get('/', 'App\General::index');
            $routes->get('datatable', 'App\General::datatable');
            $routes->get('add', 'App\General::add');
            $routes->get('edit/(:hash)', 'App\General::edit/$1');

            $routes->post('insert', 'App\General::insert');
            $routes->post('update/(:num)', 'App\General::update/$1');
            $routes->get('delete/(:num)', 'App\General::delete/$1');
        });

        // Agenda
        $routes->group('agenda', function (RouteCollection $routes) {
            $routes->get('/', 'App\Agenda::index');
            $routes->get('datatable', 'App\Agenda::datatable');
            $routes->get('add', 'App\Agenda::add');
            $routes->get('edit/(:hash)', 'App\Agenda::edit/$1');

            $routes->post('insert', 'App\Agenda::insert');
            $routes->post('update/(:num)', 'App\Agenda::update/$1');
            $routes->get('delete/(:num)', 'App\Agenda::delete/$1');
        });

        // FAQ's
        $routes->group('faqs', function (RouteCollection $routes) {
            $routes->get('', 'App\Faqs::index');
            $routes->get('datatable', 'App\Faqs::datatable');

            $routes->post('insert', 'App\Faqs::insert');
            $routes->post('update/(:num)', 'App\Faqs::update/$1');
            $routes->get('delete/(:num)', 'App\Faqs::delete/$1');
        });
    });

    // Services
    $routes->group('service', function (RouteCollection $routes) {
        // Category / Target
        $routes->group('category', function (RouteCollection $routes) {
            $routes->get('/', 'App\Targets::index');
            $routes->get('datatable', 'App\Targets::datatable');

            $routes->post('insert', 'App\Targets::insert');
            $routes->post('update/(:num)', 'App\Targets::update/$1');
            $routes->get('delete/(:num)', 'App\Targets::delete/$1');
        });

        // List
        $routes->group('list', function (RouteCollection $routes) {
            $routes->get('/', 'App\Services::index');
            $routes->get('datatable', 'App\Services::datatable');
        });

        // Services
        $routes->get('download/(:hash)', 'App\Services::download/$1');
        $routes->get('add', 'App\Services::add');
        $routes->get('edit/(:hash)', 'App\Services::edit/$1');

        $routes->post('insert', 'App\Services::insert');
        $routes->post('update/(:num)', 'App\Services::update/$1');
        $routes->get('delete/(:num)', 'App\Services::delete/$1');
    });

    // Files
    $routes->group('files', function (RouteCollection $routes) {
        $routes->get('/', 'App\Files::index');
        $routes->get('datatable', 'App\Files::datatable');

        $routes->post('insert', 'App\Files::insert');
        $routes->post('update/(:num)', 'App\Files::update/$1');
        $routes->get('delete/(:num)', 'App\Files::delete/$1');
    });

    // Galleries
    $routes->group('galleries', function (RouteCollection $routes) {
        $routes->get('/', 'App\Galleries::index');

        $routes->post('insert', 'App\Galleries::insert');
        $routes->post('update/(:num)', 'App\Galleries::update/$1');
        $routes->get('delete/(:num)', 'App\Galleries::delete/$1');
    });

    // Organization Chart
    $routes->group('org-chart', function (RouteCollection $routes) {
        $routes->get('/', 'App\Orgchart::index');
        $routes->get('datatable', 'App\Orgchart::datatable');

        $routes->post('insert', 'App\Orgchart::insert');
        $routes->post('update/(:num)', 'App\Orgchart::update/$1');
        $routes->get('delete/(:num)', 'App\Orgchart::delete/$1');
    });

    // Employees
    $routes->group('employees', function (RouteCollection $routes) {
        $routes->get('/', 'App\Employees::index');
        $routes->get('datatable', 'App\Employees::datatable');

        $routes->post('insert', 'App\Employees::insert');
        $routes->post('update/(:num)', 'App\Employees::update/$1');
        $routes->get('delete/(:num)', 'App\Employees::delete/$1');
    });

    // Sliders
    $routes->group('sliders', function (RouteCollection $routes) {
        $routes->get('/', 'App\Sliders::index');
        $routes->get('datatable', 'App\Sliders::datatable');

        $routes->post('insert', 'App\Sliders::insert');
        $routes->post('update/(:num)', 'App\Sliders::update/$1');
        $routes->get('delete/(:num)', 'App\Sliders::delete/$1');
    });

    // Partners
    $routes->group('partners', function (RouteCollection $routes) {
        $routes->get('/', 'App\Partners::index');
        $routes->get('datatable', 'App\Partners::datatable');

        $routes->post('insert', 'App\Partners::insert');
        $routes->post('update/(:num)', 'App\Partners::update/$1');
        $routes->get('delete/(:num)', 'App\Partners::delete/$1');
    });

    // About
    $routes->group('about', function (RouteCollection $routes) {
        $routes->get('/', 'App\About::index');
        $routes->post('save', 'App\About::save');
    });

    // Contact
    $routes->group('contact', function (RouteCollection $routes) {
        $routes->get('/', 'App\Contact::index');
        $routes->post('update', 'App\Contact::update');
    });

    // Profile
    $routes->group('profile', function (RouteCollection $routes) {
        $routes->get('', 'App\Profile::index');
        $routes->post('save', 'App\Profile::save');
    });

    // Users management
    $routes->group('users', function (RouteCollection $routes) {
        $routes->get('', 'App\Users::index');
        $routes->get('datatable', 'App\Users::datatable');

        $routes->post('insert', 'App\Users::insert');
        $routes->post('update/(:num)', 'App\Users::update/$1');
        $routes->get('delete/(:num)', 'App\Users::delete/$1');
    });
});
