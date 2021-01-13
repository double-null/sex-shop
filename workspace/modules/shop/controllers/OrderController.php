<?php

namespace workspace\modules\shop\controllers;

use core\App;
use core\Controller;
use workspace\modules\shop\models\Order;
use workspace\modules\shop\models\Product;
use workspace\modules\shop\requests\OrderSearchRequest;

class OrderController extends Controller
{
    protected function init()
    {
        $this->viewPath = '/modules/shop/views/';
        $this->layoutPath = App::$config['adminLayoutPath'];
        App::$breadcrumbs->addItem(['text' => 'AdminPanel', 'url' => 'adminlte']);
        App::$breadcrumbs->addItem(['text' => 'Заказы', 'url' => 'admin/orders']);
    }

    public function actionIndex()
    {
        $request = new OrderSearchRequest();
        $model = Order::search($request);

        return $this->render('orders/index.tpl', ['h1' => 'Список заказов', 'options' => $this->setOptions($model)]);
    }

    public function actionView($id)
    {
        $model = Order::where('id', $id)->first();
        $productIds = array_column(json_decode($model->products), 'product');
        $products = Product::find($productIds);
        $options = $this->setOptions($model);
        return $this->render('orders/view.tpl', [
            'model' => $model,
            'products' => $products,
        ]);
    }

    public function actionStore()
    {
        if($this->validation()) {
            $model = new Order();
            $model->_save();

            $this->redirect('admin/orders');
        } else
            return $this->render('orders/store.tpl', ['h1' => 'Добавить']);
    }

    public function actionEdit($id)
    {
        $model = Order::where('id', $id)->first();

        if($this->validation()) {
            $model->_save();

            $this->redirect('admin/orders');
        } else
            return $this->render('orders/edit.tpl', ['h1' => 'Редактировать: ', 'model' => $model]);
    }

    public function actionDelete()
    {
        Order::where('id', $_POST['id'])->delete();
    }

    public function setOptions($data)
    {
        return [
            'data' => $data,
            'serial' => '#',
            'fields' => [
                'id' => 'Id',
                'name' => 'Name',
                'surname' => 'Surname',
                'delivery_address' => 'Delivery_address',
                'phone' => 'Phone',
                'email' => 'Email',
                'comment' => 'Comment',
                'products' => 'Products',
                'status' => 'Status',
            ],
            'baseUri' => 'orders'
        ];
    }

    public function validation()
    {
        return (isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["delivery_address"]) && isset($_POST["phone"]) && isset($_POST["email"]) && isset($_POST["comment"]) && isset($_POST["products"]) && isset($_POST["status"])) ? true : false;
    }
}
