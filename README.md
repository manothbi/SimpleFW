Simple Micro Web Framework Simfra
=============================

**WARNING**: Simfra is in maintenance mode only.

Simfra is personal web framework a PHP micro-framework to develop websites based on `Symfony
components`_:

.. code-block:: php

    <?php

    require_once __DIR__.'/../vendor/autoload.php';

    use Symfony\Component\Routing\RequestContext;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\RouteCollection;

    $routes = new RouteCollection();
    $requestContext = new RequestContext();
    $requestContext->fromRequest(Request::createFromGlobals());

    Core\Bootstrap::getInstance($requestContext);

Simfra works with PHP 8 or later.

Installation
------------

The recommended way to install Silex is through `Composer`_:

.. code-block:: bash

    composer require manothbi/simple-fw

Alternatively, you can download the `simfra.zip`_ file and extract it.

More Information
----------------

Read the `documentation`_ for more information and `changelog
<doc/changelog.rst>`_ for upgrading information.

Tests
-----

To run the test suite, you need `Composer`_ and `PHPUnit`_:

.. code-block:: bash

    composer install
    phpunit

Support
-------

If you think there is an actual problem in Simfra, please `open an issue`_ if there isn't one already created.

License
-------
