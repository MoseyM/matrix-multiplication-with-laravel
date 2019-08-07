<?php
namespace Tests;

use Laravel\Lumen\Testing\TestCase as ParentTestCase;

abstract class TestCase extends ParentTestCase
{
    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        return require __DIR__.'/../bootstrap/app.php';
    }
}
