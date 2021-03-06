<?php

namespace workspace\modules\shop\controllers;

use core\Controller;
use workspace\modules\shop\models\{Category,Product, Order};
use workspace\modules\shop\requests\OrderCreateRequest;

class ShopController extends Controller
{
    protected function init()
    {
        $this->viewPath = '/modules/shop/views/';
        $this->layoutPath = '/modules/shop/views/';
        $categories = Category::all()->toArray();
        $this->view->tpl->assign('categories', $categories);
        $cartSize = (!empty($_SESSION['cart'])) ? count($_SESSION['cart']) : 0;
        $selectedProducts = $_SESSION['cart'] ?? [];
        $this->view->tpl->assign('cartSize', $cartSize);
        $this->view->tpl->assign('selectedProducts', $selectedProducts);
    }

    public function actionIndex($page = 1)
    {
        $category_id = (int)($_GET['category'] ?? 1);
        $category = Category::find($category_id)->first();
        $totalProducts = Product::all()->where('category_id', $category_id)
            ->count();
        $page = (int)($_GET['page'] ?? 0);
        $products = Product::with('photos')
            ->where('category_id', $category_id)
            ->skip(($page-1)*15)
            ->take(15)
            ->get();
        return $this->render('shop/index.tpl', [
            'products' => $products->toArray(),
            'category' => $category->toArray(),
            'totalProducts' => $totalProducts,
            'page' => $page,
            'categoryId' => $category_id,
        ]);
    }

    public function actionView($id)
    {
        $product = Product::with('photos')
            ->with('category')
            ->where('id', '=', $id)
            ->first();
        return $this->render('shop/view.tpl', [
            'product' => $product->toArray(),
        ]);
    }

    public function actionAddProductToCart()
    {
        $_SESSION['cart'] = $_SESSION['cart'] ?? [];
        $selectedProducts = array_column($_SESSION['cart'],'product');
        if (in_array($_POST['product'], $selectedProducts)) {
            foreach ($_SESSION['cart'] as $key => $product) {
                if ($product['product'] == (int)$_POST['product']) {
                    unset($_SESSION['cart'][$key]);
                }
            }
            $action = 1;
        } else {
            $quantity = (!empty($_POST['quantity'])) ? (int)$_POST['quantity'] : 1;
            $_SESSION['cart'][] = [
                'product' => (int)$_POST['product'],
                'quantity' => $quantity,
            ];
            $action = 2;
        }
        echo json_encode([
            'cartSize' => count($_SESSION['cart']),
            'product' => (int)$_POST['product'],
            'action' => $action,
        ]);
        die;
    }

    public function actionRemoveProductFromCart()
    {
        foreach ($_SESSION['cart'] as $key => $product) {
            if ($product['product'] == $_POST['product']) {
                unset($_SESSION['cart'][$key]);
            }
        }
        echo json_encode(['cartSize' => count($_SESSION['cart'])]);
        die;
    }

    public function actionCart()
    {
        $_SESSION['cart'] = $_SESSION['cart'] ?? [];
        $selectedProducts = array_column($_SESSION['cart'],'product');
        $products = Product::find($selectedProducts);
        if (!empty($_POST['products'])) {
            unset($_SESSION['cart']);
            foreach ($_POST['products'] as $product => $quantity) {
                $_SESSION['cart'][] = [
                    'product' => $product,
                    'quantity' => $quantity,
                ];
            }
            $this->redirect('/shop/checkout/');
        }
        return $this->render('shop/cart.tpl', [
            'products' => $products,
        ]);
    }

    public function actionCheckout()
    {
        $request = new OrderCreateRequest();
        if ($request->isPost() && $request->validate()) {

            (new Order)->_save();
            unset($_SESSION['cart']);
            $this->view->tpl->assign('success', 1);
        }
        return $this->render('shop/checkout.tpl', ['errors' => $request->getMessagesArray()]);
    }

    public function setOptions($data)
    {
        return [
            'data' => $data,
            'serial' => '#',
            'fields' => [
                'mark' => 'Артикул',
                'name' => 'Название',
                'description' => 'Описание',
                'parameters' => 'Характеристики',
                'photo' => 'Фото',
                'price' => 'Цена',
            ],
            'baseUri' => '/shop',
        ];
    }
}
