<?php

namespace Pamo\Book;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Pamo\Book\HTMLForm\CreateForm;
use Pamo\Book\HTMLForm\EditForm;
use Pamo\Book\HTMLForm\DeleteForm;
use Pamo\Book\HTMLForm\UpdateForm;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample controller to show how a controller class can be implemented.
 */
class BookController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;



    /**
     * @var $data description
     * @var $base url
     * @var $title name
     * @var $navData data
     */
    //private $data;
    private $base;
    private $title;
    private $navData;



    /**
     * The initialize method is optional and will always be called before the
     * target method/action. This is a convienient method where you could
     * setup internal properties that are commonly used by several methods.
     *
     * @return void
     */
    public function initialize() : void
    {
        $this->base = "book";
        $this->title = "Books";
        $this->navData = [
            "baseUrl" => $this->base . "/",
            "navLinks" => [
                ["url" => "view"],
                ["url" => "create"],
                ["url" => "delete"]
            ]
        ];
    }



    /**
     * Landingg page.
     *
     * @return object as a response object
     */
    public function indexActionGet() : object
    {
        $page = $this->di->get("page");

        $data = [
            "title" => $this->title
        ];

        $page->add("block/nav-admin", $this->navData);
        $page->add($this->base . "/index", $data);

        return $page->render();
    }



    /**
     * Show all items.
     *
     * @return object as a response object
     */
    public function viewActionGet() : object
    {
        $page = $this->di->get("page");
        $book = new Book();
        $book->setDb($this->di->get("dbqb"));

        $page->add("block/nav-admin", $this->navData);
        $page->add($this->base . "/crud/view-all", [
            "items" => $book->findAll(),
        ]);

        return $page->render([
            "title" => "A collection of items",
        ]);
    }



    /**
     * Handler with form to create a new item.
     *
     * @return object as a response object
     */
    public function createAction() : object
    {
        $page = $this->di->get("page");
        $form = new CreateForm($this->di);
        $form->check();

        $page->add("block/nav-admin", $this->navData);
        $page->add($this->base . "/crud/create", [
            "form" => $form->getHTML(),
        ]);

        return $page->render([
            "title" => "Create a item",
        ]);
    }



    /**
     * Handler with form to delete an item.
     *
     * @return object as a response object
     */
    public function deleteAction() : object
    {
        $page = $this->di->get("page");
        $form = new DeleteForm($this->di);
        $form->check();

        $page->add("block/nav-admin", $this->navData);
        $page->add($this->base . "/crud/delete", [
            "form" => $form->getHTML(),
        ]);

        return $page->render([
            "title" => "Delete an item",
        ]);
    }



    /**
     * Handler with form to update an item.
     *
     * @param int $id the id to update.
     *
     * @return object as a response object
     */
    public function updateAction(int $id) : object
    {
        $page = $this->di->get("page");
        $form = new UpdateForm($this->di, $id);
        $form->check();

        $page->add("block/nav-admin", $this->navData);
        $page->add($this->base . "/crud/update", [
            "form" => $form->getHTML(),
        ]);

        return $page->render([
            "title" => "Update an item",
        ]);
    }

    /**
     * This sample method dumps the content of $di.
     * GET mountpoint/dump-app
     *
     * @return string
     */
    public function dumpDiActionGet() : string
    {
        // Deal with the action and return a response.
        $services = implode(", ", $this->di->getServices());
        return __METHOD__ . "<p>\$di contains: $services";
    }



    /**
     * Adding an optional catchAll() method will catch all actions sent to the
     * router. You can then reply with an actual response or return void to
     * allow for the router to move on to next handler.
     * A catchAll() handles the following, if a specific action method is not
     * created:
     * ANY METHOD mountpoint/**
     *
     * @param array $args as a variadic parameter.
     *
     * @return mixed
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function catchAll(...$args)
    {
        // Deal with the request and send an actual response, or not.
        //return __METHOD__ . ", \$db is {$this->db}, got '" . count($args) . "' arguments: " . implode(", ", $args);
        return;
    }
}
