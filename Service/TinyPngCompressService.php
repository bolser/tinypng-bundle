<?php

namespace Bolser\TinyPngBundle\Service;

use Bolser\TinyPngBundle\Service\Base\BaseTinyPngService;
use Exception;
use Tinify\Source;

/**
 * Class TinyPngCompressService
 *
 * You can use this class most easily by accessing it via the service `tiny_png.compress.service`
 *
 * @package Bolser\TinyPngBundle\Service
 *
 * @see     https://tinypng.com/developers/reference/php#compressing-images TinyPNG Compression Documentation
 */
class TinyPngCompressService extends BaseTinyPngService
{
    /**
     * Compress a single image
     *
     * @see https://tinypng.com/developers/reference/php#compressing-images TinyPNG Compression Documentation
     *
     * @param string $input     The full path of the image to compress
     * @param string $output    The location to put the compressed file (Optional: Defaults to input file location)
     * @param bool   $overwrite Overwrite the output file?
     *
     * @return bool|int
     * @throws Exception Thrown when an output was selected, already exists, but overwrite wasn't allowed
     */
    public function compress(string $input, string $output = '', bool $overwrite = false)
    {
        /** @var Source $input */
        $source = \Tinify\fromFile($input);

        // If no output selected, use the input
        if ($overwrite === '') {
            $output = $input;
        }

        // Check for overwrite permissions.
        if (file_exists($output) && !$overwrite) {
            // Log an error and skip this file
            $this->logger->error('File exists but overwrite was not allowed');

            return false;
        }

        // Save the compressed image
        return $source->toFile($output);
    }
}