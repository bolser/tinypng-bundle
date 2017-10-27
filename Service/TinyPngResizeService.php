<?php

namespace Bolser\TinyPngBundle\Service;

use Tinify\Source;

/**
 * Class TinyPngResizeService
 *
 * You can use this class most easily by accessing it via the service `tiny_png.resize.service`
 * 
 * @package Bolser\TinyPngBundle\Service
 *
 * @link https://tinypng.com/developers/reference/php#resizing-images TinyPNG Resizing Documentation
 */
class TinyPngResizeService
{
    /**
     * TinyPngResizeService constructor.
     *
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        \Tinify\setKey($apiKey);
    }

    /**
     * Resize and compress a single image
     * 
     * @param string $input  The full path of the image to compress
     * @param string $method The method to use when resizing. Options are 'scale', 'fit' and 'cover'
     * @param int    $width  The desired width
     * @param int    $height The desired height
     *                       
     * @link https://tinypng.com/developers/reference/php#resizing-images TinyPNG Resizing Documentation
     */
    public function resize($input, $method = 'fit', int $width, int $height)
    {
        /** @var Source $source */
        $source = \Tinify\fromFile($input);

        $resized = $source->resize([
            'method' => $method,
            'width'  => $width,
            'height' => $height,
        ]);

        $resized->toFile($input);
    }
}
