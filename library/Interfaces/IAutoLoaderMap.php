<?php

namespace Theorx\AutoLoaderMap\Interfaces;

/**
 * Interface IAutoLoaderMap
 *
 * @author  Lauri Orgla <theorx@hotmail.com>
 * @package Theorx\AutoLoaderMap\Interfaces
 */
interface IAutoLoaderMap {

    /**
     * For loading composer autoload_classmap.php's autoloading map
     *
     * @author Lauri Orgla <theorx@hotmail.com>
     *
     * @return array
     */
    public function getClassMap() : array;

    /**
     * For loading composer autoload_namespaces.php's namespaces map
     *
     * @author Lauri Orgla <theorx@hotmail.com>
     *
     * @return array
     */
    public function getNamespaces() : array;

    /**
     * Get composer's psr4 autoload map from autoload_psr4.php
     *
     * @author Lauri Orgla <theorx@hotmail.com>
     *
     * @return array
     */
    public function getPSR4() : array;
}