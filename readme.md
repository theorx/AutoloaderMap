# Auto-loader map
----

## Description
*This library makes composer's auto-loader map accessible without having to manually find the files for inclusion.*
*Main usage for this would be to build modularized applications which rely on composer's packages.*
*Caching of the autoload values is currently not built in, but may get implemented in the future*
*This library works on top of composer's autoloader map. This means, that*

## Requirements

* `PHP` >= 7
* `composer`

## Dev-requirements
* `phing`
* `phpunit`

## Usage

*Require theorx/autoloadermap with composer. Example: ´composer require theorx/autoloadermap´*

```
<?php

require_once(__DIR__.'/vendor/autoload.php');

$autoLoaderMap = new Theorx\AutoLoaderMap\AutoLoaderMap();

//get CLasmap
$autoLoaderMap->getClassMap(); //Returns array of classes

//get namespaces
$autoLoaderMap->getNamespaces(); // Returns array of namespaces from autoload_namespaces.php

//get PSR-4 
$autoLoaderMap->getPSR4(); // Returns psr-4


```

## Author
* Lauri Orgla `theorx@hotmail.com`