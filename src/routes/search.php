<?php
// use Namespaces for HTTP request
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

// create new Slim instance

$app->get('/api/search/{keywords}', function( Request $request, Response $response){

    $page = (isset($_GET['page']) && $_GET['page'] > 0) ? $_GET['page'] : 1;
    $limit = isset($_GET['limit']) ? $_GET['limit'] : 10;

    $keywords = $request->getAttribute('keywords');

    //$keywords=isset($_GET["s"]) ? $_GET["s"] : "";
    $keywords=htmlspecialchars(strip_tags($keywords));
    $keywords = "%{$keywords}%";

    $countsql = "
                select 
                    COUNT(*) as COUNT

                    FROM
                    
                    ARTDATA

                    WHERE
                    TITLE LIKE :keyword OR
                    DATE LIKE :keyword OR
                    TECHNIQUE LIKE :keyword OR
                    URL LIKE :keyword OR
                    AUTHOR LIKE :keyword OR
                    BORN_DIED LIKE :keyword OR
                    FORM LIKE :keyword OR
                    LOCATION LIKE :keyword OR
                    SCHOOL LIKE :keyword OR
                    TIMEFRAME LIKE :keyword OR
                    TYPE LIKE :keyword
    
                ";
    $datasql = "
                    select 
                    ART_ID,
                    TITLE,
                    DATE,
                    TECHNIQUE,
                    URL,
                    AUTHOR,
                    BORN_DIED,
                    FORM,
                    LOCATION,
                    SCHOOL,
                    TIMEFRAME,
                    TYPE

                    FROM
                    
                    ARTDATA

                    WHERE
                    TITLE LIKE :keyword OR
                    DATE LIKE :keyword OR
                    TECHNIQUE LIKE :keyword OR
                    URL LIKE :keyword OR
                    AUTHOR LIKE :keyword OR
                    BORN_DIED LIKE :keyword OR
                    FORM LIKE :keyword OR
                    LOCATION LIKE :keyword OR
                    SCHOOL LIKE :keyword OR
                    TIMEFRAME LIKE :keyword OR
                    TYPE LIKE :keyword

                    LIMIT :limit OFFSET :offset
                ";
    

    $input=array();
    array_push($input, array("key" => ":keyword","keyvalue" => $keywords));
    $data = getData ($countsql, $datasql, $page, $limit, $input);
    echo $data;
});