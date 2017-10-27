<?php

namespace Bolser\TinyPngBundle\Service;

use Bolser\TinyPngBundle\Service\Base\BaseTinyPngService;

/**
 * Class TinyPngCompressionCountService
 *
 * You can use this class most easily by accessing it via the service `tiny_png.count.service`
 *
 * @package Bolser\TinyPngBundle\Service
 *
 * @link    https://tinypng.com/developers/reference/php#compression-count TinyPNG Compression Count Documentation
 */
class TinyPngCompressionCountService extends BaseTinyPngService
{
    /**
     * Get the total number of compressions for the API key provided
     *
     * @return int
     */
    public function getCompressionCount(): int
    {
        return \Tinify\compressionCount();
    }
}