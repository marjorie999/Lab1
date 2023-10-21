     <?php

    use CodeIgniter\Router\RouteCollection;

    /**
     * @var RouteCollection $routes
     */
    $routes->get('/', 'MusicTrackController::index');
    $routes->get('/main', 'MusicTrackController::index');
    $routes->post('/create', 'PlaylistController::index');

    // $routes->get('/upload', 'MusicUploadController::index'); 
    $routes->post('/upload', 'MusicUploadController::upload');


    