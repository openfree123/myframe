<?php
/**
 * File: TodoController.php
 * Author: frame@it163.org
 * Date: 18/6/23 15:00
 * Link: http://www.it163.org/
 */

namespace app\controllers;


use app\models\Todo;

class TodoController extends BaseController
{

    public function index()
    {
        $list = Todo::all();
        $this->render('todo/index', ['list' => $list]);
    }

    public function create()
    {
        $model = new Todo();
        $model->title = $_POST['title'];
        $model->status = 1;
        if ($model->save()) {
            $this->redirect('todo/index');
        }
    }

    public function edit()
    {
        $model = Todo::byId($_POST['id']);
        $model->status = (int) $_POST['status'];
        if ($model->save()) {
            $this->redirect('todo/index');
        }
    }

    public function remove()
    {
        $model = Todo::byId($_POST['id']);
        if ($model->delete() ) {
            $this->redirect('todo/index');
        }
    }
}