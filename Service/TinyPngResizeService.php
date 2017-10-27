<?php

namespace Bolser\TinyPngBundle\Service;

use Bolser\TinyPngBundle\Service\Base\BaseTinyPngService;
use Exception;
use Tinify\Source;

/**
 * Class TinyPngResizeService
 *
 * You can use this class most easily by accessing it via the service `tiny_png.resize.service`
 *
 * @package Bolser\TinyPngBundle\Service
 *
 * @link    https://tinypng.com/developers/reference/php#resizing-images TinyPNG Resizing Documentation
 */
class TinyPngResizeService extends BaseTinyPngService
{
    /**
     * Resize and compress a single image
     *
     * @link https://tinypng.com/developers/reference/php#resizing-images TinyPNG Resizing Documentation
     *
     * @param string $input     The full path of the image to compress
     * @param string $output    The location to put the compressed file (Optional: Defaults to input file location)
     * @param bool   $overwrite Overwrite the output file?
     * @param string $method    The method to use when resizing. Options are 'scale', 'fit' and 'cover'
     * @param int    $width     The desired width
     * @param int    $height    The desired height
     *
     * @return bool|int
     * @throws Exception Thrown when an output was selected, already exists, but overwrite wasn't allowed
     */
    public function resize($input, string $output = '', bool $overwrite, $method = 'fit', int $width, int $height)
    {
        /** @var Source $source */
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

        // Resize the image and compress it
        $resized = $source->resize([
            'method' => $method,
            'width'  => $width,
            'height' => $height,
        ]);

        // Save the compressed image
        return $resized->toFile($output);
    }
}
