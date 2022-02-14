<?php


namespace App\Core;


class Controller
{
    use JsonResponser;

    public $model;
    public $view;

    function __construct()
    {
        $this->view = new View();
    }

    function index()
    {
    }

    function get(int $id)
    {
    }

    function create()
    {
    }
    public function store()
    {
    }

    function edit(int $id)
    {
    }

    function update(int $id)
    {
    }

    function delete(int $id)
    {
    }
}