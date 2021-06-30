<?php

$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'],'/')) : '/';

if ($url == '/')
{

    // This is the home page
    // Initiate the home controller
    // and render the home view

    require_once __DIR__.'/models/index.php';
    require_once __DIR__.'/controllers/index.php';
    

    $indexModel = New IndexModel();
    $indexController = New IndexController($indexModel);

    print $indexView->index();

}else{

    // This is not home page
    // Initiate the appropriate controller
    // and render the required view

    //The first element should be a controller
    $requestedController = $url[0]; 

    // If a second part is added in the URI, 
    // it should be a method
    $requestedAction = isset($url[1])? $url[1] :'';

    // The remain parts are considered as 
    // arguments of the method
    $requestedParams = array_slice($url, 2); 

    // Check if controller exists. NB: 
    // You have to do that for the model and the view too
    $ctrlPath = __DIR__.'/controllers/'.$requestedController.'_controller.php';

    if (file_exists($ctrlPath))
    {
        require_once __DIR__.'/models/'.$requestedController.'_model.php';
        require_once __DIR__.'/controllers/'.$requestedController.'_controller.php';

        $modelName      = ucfirst($requestedController).'Model';
        $controllerName = ucfirst($requestedController).'Controller';
        $viewName       = ucfirst($requestedController).'View';

        $controllerObj  = new $controllerName( new $modelName );
        print $controllerObj->$requestedAction($requestedParams);

        

    }else{

        header('HTTP/1.1 404 Not Found');
        die('404 - The file - '.$ctrlPath.' - not found');
        //require the 404 controller and initiate it
        //Display its view
    }
}

?>