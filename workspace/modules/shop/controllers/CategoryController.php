<?php

namespace workspace\modules\shop\controllers;

use core\App;
use core\Controller;
use workspace\modules\shop\models\Category;
use workspace\modules\shop\requests\CategorySearchRequest;

class CategoryController extends Controller
{
    protected function init()
    {
        $this->viewPath = '/modules/shop/views/';
        $this->layoutPath = App::$config['adminLayoutPath'];
        App::$breadcrumbs->addItem(['text' => 'AdminPanel', 'url' => 'adminlte']);
        App::$breadcrumbs->addItem(['text' => 'Категории', 'url' => 'admin/categories']);
    }

    public function actionIndex()
    {
        $request = new CategorySearchRequest();
        $model = Category::search($request);

        return $this->render('categories/index.tpl', ['h1' => 'Категории', 'options' => $this->setOptions($model)]);
    }

    public function actionView($id)
    {
        $model = Category::where('id', $id)->first();

        $options = $this->setOptions($model);

        return $this->render('categories/view.tpl', ['model' => $model, 'options' => $options]);
    }

    public function actionStore()
    {
        if($this->validation()) {
            $model = new Category();
            $model->_save();

            $this->redirect('admin/categories');
        } else
            return $this->render('categories/store.tpl', ['h1' => 'Добавить']);
    }

    public function actionEdit($id)
    {
        $model = Category::where('id', $id)->first();

        if($this->validation()) {
            $model->_save();

            $this->redirect('admin/categories');
        } else
            return $this->render('categories/edit.tpl', ['h1' => 'Редактировать: ', 'model' => $model]);
    }

    public function actionDelete()
    {
        Category::where('id', $_POST['id'])->delete();
    }

    public function setOptions($data)
    {
        return [
            'data' => $data,
            'serial' => '#',
            'fields' => [
                'id' => 'Id',
                'name' => 'Name',
            ],
            'baseUri' => 'categories'
        ];
   }

   public function validation()
   {
       return (isset($_POST["name"])) ? true : false;
   }
}