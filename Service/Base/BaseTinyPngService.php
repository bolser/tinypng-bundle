<?php

namespace Bolser\TinyPngBundle\Service\Base;

use Psr\Log\LoggerInterface;

/**
 * Class BaseTinyPngService
 *
 * @package Bolser\TinyPngBundle\Service
 */
abstract class BaseTinyPngService
{
    /**
     * @var LoggerInterface $logger
     */
    protected $logger;

    /**
     * TinyPngResizeService constructor.
     *
     * @link https://tinypng.com/developers TinyPNG API
     *
     * @param string          $apiKey TinyPNG API Key
     * @param LoggerInterface $logger A Logger for logging errors and output
     */
    public function __construct(string $apiKey, LoggerInterface $logger)
    {
        $this->logger = $logger;
        try {
            \Tinify\setKey($apiKey);
            \Tinify\validate();
        } catch(\Tinify\Exception $e) {
            $logger->critical($e->getMessage());
        }
    }
}