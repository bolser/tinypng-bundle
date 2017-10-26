Bolser TinyPNG Bundle for Symfony
---------------------------------

This bundle will allow you to easily use the TinyPNG API with your
Symfony project.

Config
------

Add the bundle using Composer:

.. code:: bash

    composer require bolser/tinypng-bundle

Add the Bundle to your kernel:

.. code:: php

    $bundles = [
        ...
        new Bolser\TinyPngBundle\TinyPngBundle(),
        ...
    ];

You must provide your TinyPNG api key with this bundle by placing the
following in your config.yml

.. code:: yml

    tiny_png:
        api_key: 'YOUR_KEY_HERE'

Usage
-----

Once configured you can start using the bundle via the provided
services:

.. code:: php

    $compressService = $container->get('tinypng.compress.service');
    $resizeService = $container->get('tinypng.resize.service');