<?php

namespace Bolser\TinyPngBundle\Service;

use Tinify\Source;

/**
 * Class TinyPngCompressService
 *
 * You can use this class most easily by accessing it via the service `tiny_png.compress.service`
 *
 * @package Bolser\TinyPngBundle\Service
 *
 * @see https://tinypng.com/developers/reference/php#compressing-images TinyPNG Compression Documentation
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
     * Compress a single image
     *
     * @param string $input The full path of the image to compress
     *
     * @see https://tinypng.com/developers/reference/php#compressing-images TinyPNG Compression Documentation
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