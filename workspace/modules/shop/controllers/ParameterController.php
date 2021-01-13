<?php

namespace workspace\modules\shop\controllers;

use core\App;
use core\Controller;
use workspace\modules\shop\models\Parameter;
use workspace\modules\shop\requests\ParameterSearchRequest;

class ParameterController extends Controller
{
    protected function init()
    {
        $this->viewPath = '/modules/shop/views/';
        $this->layoutPath = App::$config['adminLayoutPath'];
        App::$breadcrumbs->addItem(['text' => 'AdminPanel', 'url' => 'adminlte']);
        App::$breadcrumbs->addItem(['text' => 'Список характеристик', 'url' => 'admin/parameters']);
    }

    public function actionIndex()
    {
        $request = new ParameterSearchRequest();
        $model = Parameter::search($request);

        return $this->render('parameters/index.tpl', ['h1' => 'Список характеристик', 'options' => $this->setOptions($model)]);
    }

    public function actionView($id)
    {
        $model = Parameter::where('id', $id)->first();

        $options = $this->setOptions($model);

        return $this->render('parameters/view.tpl', ['model' => $model, 'options' => $options]);
    }

    public function actionStore()
    {
        if($this->validation()) {
            $model = new Parameter();
            $model->_save();
            $this->redirect('admin/parameters');
        } else
            return $this->render('parameters/store.tpl', ['h1' => 'Добавить']);
    }

    public function actionEdit($id)
    {
        $model = Parameter::where('id', $id)->first();

        if($this->validation()) {
            $model->_save();

            $this->redirect('admin/parameters');
        } else
            return $this->render('parameters/edit.tpl', ['h1' => 'Редактировать: ', 'model' => $model]);
    }

    public function actionDelete()
    {
        Parameter::where('id', $_POST['id'])->delete();
    }

    public function actionGetProductParams()
    {
        echo json_encode(Parameter::all()->toArray());
        die;
    }

    public function setOptions($data)
    {
        return [
            'data' => $data,
            'serial' => '#',
            'fields' => [
                'id' => 'Id',
                'name' => 'Name',
                'type' => 'Type',
                'unit' => 'Unit',
            ],
            'baseUri' => 'parameters'
        ];
   }

   public function validation()
   {
       return (isset($_POST["name"]) && isset($_POST["type"]) && isset($_POST["unit"])) ? true : false;
   }
}