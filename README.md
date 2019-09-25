# api-slim-php

A SLIM Framework API capable to handling request and process accordingly.

## ER DIAGRAM OF DATABASE

![ER DIAGRAM OF DATABASE](ER.PNG)

The SQL file for this database can be found enclosed within.

## ROUTES
I have implemented following 	**ROUTES** to this API.
> public/index.php/api/info/author/1

|route|purpose|
|--|--|
|api/info/author			|Displays all the AUTHORS and their attributes  |
|api/info/author/{$id}		|Displays all the attributes for AUTHOR with id {$id}  |
|api/info/form				|Displays all the FORM and their attributes  |
|api/info/form/{$id}		|Displays all the attributes for FORM with id {$id}    	|
|api/info/location			|Displays all the LOCATION and their attributes  |
|api/info/location/{$id}	|Displays all the attributes for LOCATION with id {$id}    |
|api/info/school			|Displays all the SCHOOL and their attributes  |
|api/info/school/{$id}		|Displays all the attributes for SCHOOL with id {$id}    |
|api/info/timeframe			|Displays all the TIMEFRAME and their attributes  |
|api/info/timeframe/{$id}	|Displays all the attributes for TIMEFRAME with id {$id}    |
|api/info/type				|Displays all the TYPE and their attributes  |
|api/info/type/{$id}		|Displays all the attributes for TYPE with id {$id}    |
|--|--  |
|api/art					|Displays all the attributes from ARTDATA   |
|api/art/{$id}				|Displays all the attributes from ARTDATA with ART_ID {$id}  |
|api/art/author/{$id}		|Displays all the attributes from ARTDATA with AUTHOR_ID {$id} |
|api/art/form/{$id}			|Displays all the attributes from ARTDATA with FORM_ID {$id}    	|
|api/art/location/{$id}		|Displays all the attributes from ARTDATA with LOCATION_ID {$id}  |
|api/art/school/{$id}		|Displays all the attributes from ARTDATA with SCHOOL_ID {$id}   |
|api/art/timeframe/{$id}	|Displays all the attributes from ARTDATA with TIMEFRAME_ID {$id}  |
|api/art/type/{$id}			|Displays all the attributes from ARTDATA with TYPE_ID {$id}    |

## FEATURES

This is a well **PAGINATED** API.
 
## DIRECTORY TREE
 
Following is the directory **TREE**

    .
    ├── composer.json
    ├── composer.lock
    ├── ER.png
    ├── mercurial.sql.tar.bz2
    ├── public
    │   └── index.php
    ├── README.md
    ├── src
    │   ├── config
    │   │   └── db.php
    │   └── routes
    │       ├── art.php
    │       ├── boilerplate.php
    │       ├── info.php
    │       └── search.php
    └── vendor
