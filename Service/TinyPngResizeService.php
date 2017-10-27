<?php

namespace Bolser\TinyPngBundle\Service;

use Tinify\Source;

/**
 * Class TinyPngResizeService
 *
 * @package Bolser\TinyPngBundle\Service
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
