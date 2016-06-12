<?php

namespace Theorx\AutoLoaderMap;

use Theorx\AutoLoaderMap\Exceptions\MapLoadingException;
use Theorx\AutoLoaderMap\Interfaces\IAutoLoaderMap;

/**
 * Class AutoLoaderMap
 *
 * @author  Lauri Orgla <theorx@hotmail.com>
 * @package Theorx\AutoLoaderMap
 */
class AutoLoaderMap implements IAutoLoaderMap {

    /**
     * @author Lauri Orgla <theorx@hotmail.com>
     * @return array
     */
    public function getClassMap() : array {

        return $this->requireMap(__DIR__ . '/../../../composer/autoload_classmap.php');
    }

    /**
     * @author Lauri Orgla <theorx@hotmail.com>
     * @return array
     */
    public function getNamespaces() : array {

        return $this->requireMap(__DIR__ . '/../../../composer/autoload_namespaces.php');
    }

    /**
     * @author Lauri Orgla <theorx@hotmail.com>
     * @return array
     */
    public function getPSR4() : array {

        return $this->requireMap(__DIR__ . '/../../../composer/autoload_psr4.php');
    }

    /**
     * file_exists wrapper
     *
     * @author Lauri Orgla <theorx@hotmail.com>
     *
     * @param string $file
     *
     * @return bool
     */
    private function fileExists(string $file) : bool {

        return file_exists($file);
    }

    /**
     * Method for requiring composer's files
     *
     * @author Lauri Orgla <theorx@hotmail.com>
     *
     * @param string $file
     *
     * @return array
     * @throws MapLoadingException
     */
    private function requireMap(string $file) : array {

        if(!$this->fileExists($file)) {
            throw new MapLoadingException;
        }

        return (array)require_once($file);
    }
}
