<?php

/**
 * @license LICENCE
 */

namespace ExampleCMS\Contract;

interface Filesystem
{

    /**
     * @param string $filename
     * @return mixed
     */
    public function loadAsPHP($filename);

    /**
     * @param string $filename
     * @return bool
     */
    public function isExists($filename);

    /**
     * @param string $pattern
     * @param int $flags
     * @return array
     */
    public function glob($pattern, $flags);

    /**
     * @param string $path
     * @return string
     */
    public function preparePath($path);

    /**
     * @return string
     */
    public function getBasePath();
}
