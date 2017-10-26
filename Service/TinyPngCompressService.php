<?php

namespace Bolser\TinyPngBundle\Service;

use Tinify\Source;

/**
 * Class TinyPngCompressService
 *
 * @package Bolser\TinyPngBundle\Service
 */
class TinyPngCompressService
{
    /**
     * TinyPngCompressService constructor.
     *
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        \Tinify\setKey($apiKey);
    }

    /**
     * Compress and overwrite a single image
     *
     * @param string $input The full path of the image to compress
     *
     * @return bool|int
     */
    public function compress($input)
    {
        /** @var Source $input */
        $source = \Tinify\fromFile($input);
        return $source->toFile($input);
    }
}