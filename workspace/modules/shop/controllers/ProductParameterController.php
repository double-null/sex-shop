<?php


namespace workspace\modules\shop\controllers;


use core\App;
use core\Controller;
use workspace\modules\shop\models\ProductParameter;
use workspace\modules\shop\requests\ProductParameterSearchRequest;

class ProductParameterController extends Controller
{
    protected function init()
    {
        $this->viewPath = '/modules/shop/views/';
        $this->layoutPath = App::$config['adminLayoutPath'];
        App::$breadcrumbs->addItem(['text' => 'AdminPanel', 'url' => 'adminlte']);
        App::$breadcrumbs->addItem(['text' => 'Характеристики товара', 'url' => 'admin/product_parameters']);
    }

    public function actionIndex()
    {
        $request = new ProductParameterSearchRequest();
        $model = ProductParameter::search($request);

        return $this->render('product_parameters/index.tpl', ['h1' => 'Характеристики товара', 'options' => $this->setOptions($model)]);
    }

    public function actionView($id)
    {
        $model = ProductParameter::where('id', $id)->first();

        $options = $this->setOptions($model);

        return $this->render('product_parameters/view.tpl', ['model' => $model, 'options' => $options]);
    }

    public function actionStore()
    {
        if($this->validation()) {
            $model = new ProductParameter();
            $model->_save();

            $this->redirect('admin/product_parameters');
        } else
            return $this->render('product_parameters/store.tpl', ['h1' => 'Добавить']);
    }

    public function actionEdit($id)
    {
        $model = ProductParameter::where('id', $id)->first();

        if($this->validation()) {
            $model->_save();
            $this->redirect('admin/product_parameters');
        } else
            return $this->render('product_parameters/edit.tpl', ['h1' => 'Редактировать: ', 'model' => $model]);
    }

    public function actionDelete()
    {
        if ($_POST['param'] && $_POST['product']) {
            ProductParameter::where('parameter_id', $_POST['param'])
                ->where('product_id', $_POST['product'])
                ->delete();
        } else {
            ProductParameter::where('id', $_POST['id'])->delete();
        }
    }

    public function setOptions($data)
    {
        return [
            'data' => $data,
            'serial' => '#',
            'fields' => [
                'id' => 'Id',
                'product_id' => 'Product_id',
                'parametr_id' => 'Parametr_id',
                'value' => 'Value',
            ],
            'baseUri' => 'product_parameters'
        ];
   }

   public function validation()
   {
       return (isset($_POST["product_id"]) && isset($_POST["parametr_id"]) && isset($_POST["value"])) ? true : false;
   }
}