<?php

namespace Pamo\Book;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * BookControllerTest.
 */
class BookControllerTest extends TestCase
{

    // Create the di container.
    protected $di;
    protected $controller;



    /**
     * Prepare before each test.
     */
    protected function setUp()
    {
        global $di;

        // Setup di
        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        // Use a different cache dir for unit test
        $this->di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");

        // View helpers uses the global $di so it needs its value
        $di = $this->di;

        // Setup the controller
        $this->controller = new BookController();
        $this->controller->setDI($this->di);
        $this->controller->initialize();
    }



    /**
     * Test the route "index".
     */
    public function testIndexActionGet()
    {
        $res = $this->controller->indexActionGet();
        $this->assertIsObject($res);
        $this->assertInstanceOf("Anax\Response\Response", $res);
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);
    }



    /**
     * Test the route "view".
     */
    public function testViewActionGet()
    {
        $res = $this->controller->viewActionGet();
        $this->assertIsObject($res);
        $this->assertInstanceOf("Anax\Response\Response", $res);
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);
    }



    /**
     * Test the route "create".
     */
    public function testCreateAction()
    {
        $res = $this->controller->createAction();
        $this->assertIsObject($res);
        $this->assertInstanceOf("Anax\Response\Response", $res);
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);

        $this->di->request->setGlobals([
            "post" => [
                "anax/htmlform-id" => "Pamo\Book\HTMLForm\CreateForm",
                "title" => "test-title",
                "author" => "test-author",
                "image" => "test-image",
                "submit" => "Create item"
            ]
        ]);

        $res = $this->controller->createAction();
        $this->assertIsObject($res);
        $this->assertInstanceOf("Anax\Response\Response", $res);
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);
    }



    /**
     * Test the route "delete".
     */
    public function testDeleteAction()
    {
        $res = $this->controller->deleteAction();
        $this->assertIsObject($res);
        $this->assertInstanceOf("Anax\Response\Response", $res);
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);

        $this->di->request->setGlobals([
            "post" => [
                "anax/htmlform-id" => "Pamo\Book\HTMLForm\DeleteForm",
                "select" => "1",
                "submit" => "Delete item"
            ]
        ]);

        $res = $this->controller->deleteAction();
        $this->assertIsObject($res);
        $this->assertInstanceOf("Anax\Response\Response", $res);
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);
    }



    /**
     * Test the route "update".
     */
    public function testUpdateAction()
    {
        $res = $this->controller->updateAction(1);
        $this->assertIsObject($res);
        $this->assertInstanceOf("Anax\Response\Response", $res);
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);

        $this->di->request->setGlobals([
            "post" => [
                "anax/htmlform-id" => "Pamo\Book\HTMLForm\UpdateForm",
                "id" => "1",
                "title" => "test-title",
                "author" => "test-author",
                "image" => "test-image",
                "submit" => "Save"
            ]
        ]);

        $res = $this->controller->updateAction(1);
        $this->assertIsObject($res);
        $this->assertInstanceOf("Anax\Response\Response", $res);
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);
    }



    /**
     * Test the route "dump-di".
     */
    public function testDumpDiActionGet()
    {
        $res = $this->controller->dumpDiActionGet();
        $this->assertContains("di contains", $res);
        $this->assertContains("configuration", $res);
        $this->assertContains("request", $res);
        $this->assertContains("response", $res);
    }



    /**
     * Call the controller catchAll ANY.
     */
    public function testCatchAllGet()
    {
        $res = $this->controller->catchAll();
        $this->assertNull($res);
    }
}
