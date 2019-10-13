<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app->group('/api/info', function () use ($app) {

    //AUTHOR INFORMATION
    $app->group('/author', function () use ($app) {
        $app->get('', function( Request $request, Response $response){
            $page = (isset($_GET['page']) && $_GET['page'] > 0) ? $_GET['page'] : 1;
            $limit = isset($_GET['limit']) ? $_GET['limit'] : 10;
        
            $countsql = "SELECT COUNT(*) as COUNT FROM AUTHOR";
            $datasql = "SELECT * , (SELECT COUNT(*) FROM ART WHERE ART.AUTHOR_ID = AUTHOR.ID) as COUNT FROM AUTHOR LIMIT :limit OFFSET :offset";
        /*
            $input=array();
            array_push($input, array("key" => ":keyword","keyvalue" => "ALLERGY"));
        */  
        
            $data = getData ($countsql, $datasql, $page, $limit, $input, $response);
            return $data;
        });

        $app->get('/{id:[0-9]+}', function( Request $request, Response $response){
            $id = $request->getAttribute('id');
            $page = (isset($_GET['page']) && $_GET['page'] > 0) ? $_GET['page'] : 1;
            $limit = isset($_GET['limit']) ? $_GET['limit'] : 10;
        
            $countsql = "SELECT COUNT(*) as COUNT FROM AUTHOR WHERE ID = :id";
            $datasql = "SELECT *  , (SELECT COUNT(*) FROM ART WHERE ART.AUTHOR_ID = AUTHOR.ID) as COUNT FROM AUTHOR  WHERE ID = :id LIMIT :limit OFFSET :offset";
        
            $input=array();
            array_push($input, array("key" => ":id","keyvalue" => $id));
          
        
            $data = getData ($countsql, $datasql, $page, $limit, $input, $response);
            return $data;
        });

        $app->get('/{char:[a-z]}', function( Request $request, Response $response){
            $char = "{$request->getAttribute('char')}%";
            $page = (isset($_GET['page']) && $_GET['page'] > 0) ? $_GET['page'] : 1;
            $limit = isset($_GET['limit']) ? $_GET['limit'] : 10;

            $countsql = "SELECT COUNT(*) as COUNT FROM AUTHOR WHERE AUTHOR LIKE :char";
            $datasql = "SELECT * , (SELECT COUNT(*) FROM ART WHERE ART.AUTHOR_ID = AUTHOR.ID) as COUNT FROM AUTHOR  WHERE AUTHOR LIKE :char LIMIT :limit OFFSET :offset";
        
            $input=array();
            array_push($input, array("key" => ":char","keyvalue" => $char));
          
        
            $data = getData ($countsql, $datasql, $page, $limit, $input, $response);
            return $data;
        });

    });    
    
    //TYPE INFORMATION
    $app->group('/type', function () use ($app) {
        $app->get('', function( Request $request, Response $response){
            $page = (isset($_GET['page']) && $_GET['page'] > 0) ? $_GET['page'] : 1;
            $limit = isset($_GET['limit']) ? $_GET['limit'] : 10;
        
            $countsql = "SELECT COUNT(*) as COUNT FROM TYPE";
            $datasql = "SELECT * , (SELECT COUNT(*) FROM ART WHERE ART.TYPE_ID = TYPE.ID) as COUNT FROM TYPE LIMIT :limit OFFSET :offset";
        /*
            $input=array();
            array_push($input, array("key" => ":keyword","keyvalue" => "ALLERGY"));
        */  
        
            $data = getData ($countsql, $datasql, $page, $limit, $input, $response);
            return $data;
        });

        $app->get('/{id:[0-9]+}', function( Request $request, Response $response){
            $id = $request->getAttribute('id');
            $page = (isset($_GET['page']) && $_GET['page'] > 0) ? $_GET['page'] : 1;
            $limit = isset($_GET['limit']) ? $_GET['limit'] : 10;
        
            $countsql = "SELECT COUNT(*) as COUNT FROM TYPE WHERE ID = :id";
            $datasql = "SELECT *, (SELECT COUNT(*) FROM ART WHERE ART.TYPE_ID = TYPE.ID) as COUNT FROM TYPE WHERE ID = :id LIMIT :limit OFFSET :offset";
        
            $input=array();
            array_push($input, array("key" => ":id","keyvalue" => $id));
          
        
            $data = getData ($countsql, $datasql, $page, $limit, $input, $response);
            return $data;
        });
    });    
    
    //SCHOOL INFORMATION
    $app->group('/school', function () use ($app) {
        $app->get('', function( Request $request, Response $response){
            $page = (isset($_GET['page']) && $_GET['page'] > 0) ? $_GET['page'] : 1;
            $limit = isset($_GET['limit']) ? $_GET['limit'] : 10;
        
            $countsql = "SELECT COUNT(*) as COUNT FROM SCHOOL";
            $datasql = "SELECT *, (SELECT COUNT(*) FROM ART WHERE ART.SCHOOL_ID = SCHOOL.ID) as COUNT FROM SCHOOL LIMIT :limit OFFSET :offset";
        /*
            $input=array();
            array_push($input, array("key" => ":keyword","keyvalue" => "ALLERGY"));
        */  
        
            $data = getData ($countsql, $datasql, $page, $limit, $input, $response);
            return $data;
        });

        $app->get('/{id:[0-9]+}', function( Request $request, Response $response){
            $id = $request->getAttribute('id');
            $page = (isset($_GET['page']) && $_GET['page'] > 0) ? $_GET['page'] : 1;
            $limit = isset($_GET['limit']) ? $_GET['limit'] : 10;
        
            $countsql = "SELECT COUNT(*) as COUNT FROM SCHOOL WHERE ID = :id";
            $datasql = "SELECT *, (SELECT COUNT(*) FROM ART WHERE ART.SCHOOL_ID = SCHOOL.ID) as COUNT FROM SCHOOL WHERE ID = :id LIMIT :limit OFFSET :offset";
        
            $input=array();
            array_push($input, array("key" => ":id","keyvalue" => $id));
          
        
            $data = getData ($countsql, $datasql, $page, $limit, $input, $response);
            return $data;
        });
    });

    //TIMEFRAME INFORMATION
    $app->group('/timeframe', function () use ($app) {
        $app->get('', function( Request $request, Response $response){
            $page = (isset($_GET['page']) && $_GET['page'] > 0) ? $_GET['page'] : 1;
            $limit = isset($_GET['limit']) ? $_GET['limit'] : 10;
        
            $countsql = "SELECT COUNT(*) as COUNT FROM TIMEFRAME";
            $datasql = "SELECT *, (SELECT COUNT(*) FROM ART WHERE ART.TIMEFRAME_ID = TIMEFRAME.ID) as COUNT FROM TIMEFRAME LIMIT :limit OFFSET :offset";
        /*
            $input=array();
            array_push($input, array("key" => ":keyword","keyvalue" => "ALLERGY"));
        */  
        
            $data = getData ($countsql, $datasql, $page, $limit, $input, $response);
            return $data;
        });

        $app->get('/{id:[0-9]+}', function( Request $request, Response $response){
            $id = $request->getAttribute('id');
            $page = (isset($_GET['page']) && $_GET['page'] > 0) ? $_GET['page'] : 1;
            $limit = isset($_GET['limit']) ? $_GET['limit'] : 10;
        
            $countsql = "SELECT COUNT(*) as COUNT FROM TIMEFRAME WHERE ID = :id";
            $datasql = "SELECT *, (SELECT COUNT(*) FROM ART WHERE ART.TIMEFRAME_ID = TIMEFRAME.ID) as COUNT  FROM TIMEFRAME WHERE ID = :id LIMIT :limit OFFSET :offset";
        
            $input=array();
            array_push($input, array("key" => ":id","keyvalue" => $id));
          
        
            $data = getData ($countsql, $datasql, $page, $limit, $input, $response);
            return $data;
        });
    });

    //LOCATION INFORMATION
    $app->group('/location', function () use ($app) {
        $app->get('', function( Request $request, Response $response){
            $page = (isset($_GET['page']) && $_GET['page'] > 0) ? $_GET['page'] : 1;
            $limit = isset($_GET['limit']) ? $_GET['limit'] : 10;
        
            $countsql = "SELECT COUNT(*) as COUNT FROM LOCATION";
            $datasql = "SELECT *, (SELECT COUNT(*) FROM ART WHERE ART.LOCATION_ID = LOCATION.ID) as COUNT  FROM LOCATION LIMIT :limit OFFSET :offset";
        /*
            $input=array();
            array_push($input, array("key" => ":keyword","keyvalue" => "ALLERGY"));
        */  
        
            $data = getData ($countsql, $datasql, $page, $limit, $input, $response);
            return $data;
        });

        $app->get('/{id:[0-9]+}', function( Request $request, Response $response){
            $id = $request->getAttribute('id');
            $page = (isset($_GET['page']) && $_GET['page'] > 0) ? $_GET['page'] : 1;
            $limit = isset($_GET['limit']) ? $_GET['limit'] : 10;
        
            $countsql = "SELECT COUNT(*) as COUNT FROM LOCATION WHERE ID = :id";
            $datasql = "SELECT * , (SELECT COUNT(*) FROM ART WHERE ART.LOCATION_ID = LOCATION.ID) as COUNT FROM LOCATION WHERE ID = :id LIMIT :limit OFFSET :offset";
        
            $input=array();
            array_push($input, array("key" => ":id","keyvalue" => $id));
          
        
            $data = getData ($countsql, $datasql, $page, $limit, $input, $response);
            return $data;
        });
    });


    //FORM INFORMATION
    $app->group('/form', function () use ($app) {
        $app->get('', function( Request $request, Response $response){
            $page = (isset($_GET['page']) && $_GET['page'] > 0) ? $_GET['page'] : 1;
            $limit = isset($_GET['limit']) ? $_GET['limit'] : 10;
        
            $countsql = "SELECT COUNT(*) as COUNT FROM FORM";
            $datasql = "SELECT *, (SELECT COUNT(*) FROM ART WHERE ART.FORM_ID = FORM.ID) as COUNT FROM FORM LIMIT :limit OFFSET :offset";
        /*
            $input=array();
            array_push($input, array("key" => ":keyword","keyvalue" => "ALLERGY"));
        */  
        
            $data = getData ($countsql, $datasql, $page, $limit, $input, $response);
            return $data;
        });

        $app->get('/{id:[0-9]+}', function( Request $request, Response $response){
            $id = $request->getAttribute('id');
            $page = (isset($_GET['page']) && $_GET['page'] > 0) ? $_GET['page'] : 1;
            $limit = isset($_GET['limit']) ? $_GET['limit'] : 10;
        
            $countsql = "SELECT COUNT(*) as COUNT FROM FORM WHERE ID = :id";
            $datasql = "SELECT *, (SELECT COUNT(*) FROM ART WHERE ART.FORM_ID = FORM.ID) as COUNT FROM FORM WHERE ID = :id LIMIT :limit OFFSET :offset";
        
            $input=array();
            array_push($input, array("key" => ":id","keyvalue" => $id));
          
        
            $data = getData ($countsql, $datasql, $page, $limit, $input, $response);
            return $data;
        });
    });

    //ART INFORMATION
    $app->group('/art', function () use ($app) {
        $app->get('', function( Request $request, Response $response){
            $page = (isset($_GET['page']) && $_GET['page'] > 0) ? $_GET['page'] : 1;
            $limit = isset($_GET['limit']) ? $_GET['limit'] : 10;
        
            $countsql = "SELECT COUNT(*) as COUNT FROM ART";
            $datasql = "SELECT * FROM ART LIMIT :limit OFFSET :offset";
        /*
            $input=array();
            array_push($input, array("key" => ":keyword","keyvalue" => "ALLERGY"));
        */  
        
            $data = getData ($countsql, $datasql, $page, $limit, $input, $response);
            return $data;
        });

        $app->get('/{id:[0-9]+}', function( Request $request, Response $response){
            $id = $request->getAttribute('id');
            $page = (isset($_GET['page']) && $_GET['page'] > 0) ? $_GET['page'] : 1;
            $limit = isset($_GET['limit']) ? $_GET['limit'] : 10;
        
            $countsql = "SELECT COUNT(*) as COUNT FROM ART WHERE ID = :id";
            $datasql = "SELECT * FROM ART WHERE ID = :id LIMIT :limit OFFSET :offset";
        
            $input=array();
            array_push($input, array("key" => ":id","keyvalue" => $id));
          
        
            $data = getData ($countsql, $datasql, $page, $limit, $input, $response);
            return $data;
        });
    });
});