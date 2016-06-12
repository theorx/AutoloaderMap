<?php

namespace Theorx\AutoLoaderMap\Exceptions;

/**
 * Class MapLoadingException
 *
 * @author  Lauri Orgla <theorx@hotmail.com>
 * @package Theorx\AutoLoaderMap\Exceptions
 */
class MapLoadingException extends \Exception {

    /**
     * @var string
     */
    public $message = 'Couldn\'t load autoloader maps. Are you using composer?';
    /**
     * @var int
     */
    public $code = 2001;
}
