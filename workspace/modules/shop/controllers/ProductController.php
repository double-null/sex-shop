<?php


namespace workspace\modules\shop\controllers;

use core\App;
use core\Controller;
use workspace\modules\shop\models\{Product, Category, ProductParameter};
use workspace\modules\shop\models\ProductPhoto;
use workspace\modules\shop\requests\ProductSearchRequest;

class ProductController extends Controller
{
    protected function init()
    {
        $this->viewPath = '/modules/shop/views/';
        $this->layoutPath = App::$config['adminLayoutPath'];
        App::$breadcrumbs->addItem(['text' => 'AdminPanel', 'url' => 'adminlte']);
        App::$breadcrumbs->addItem(['text' => 'Product', 'url' => 'admin/products']);
        $this->view->registerJs('/workspace/modules/shop/resources/js/custom.js', [], true);
    }

    public function actionIndex()
    {
        $request = new ProductSearchRequest();
        $model = Product::search($request);
        return $this->render('products/index.tpl',
            ['h1' => 'Product', 'options' => $this->setOptions($model)]
        );
    }

    public function actionView($id)
    {
        $model = Product::where('id', $id)->first();
        $options = $this->setOptions($model);
        return $this->render('products/view.tpl', ['model' => $model, 'options' => $options]);
    }

    public function actionStore()
    {
        if($this->validation()) {
            $model = new Product();
            $model->_save();

            if (!empty($_FILES['photos'])) {
                $uploadDir = ROOT_DIR.'/images/';
                $photos = $_FILES['photos'];
                $keys = array_keys($photos['name']);
                foreach ($keys as $key) {
                    $photos['name'][$key];
                    $photoNameChunks = explode('.', $photos['name'][$key]);
                    $photoType = array_pop($photoNameChunks);
                    do {
                        $filename = rand(10000, 99999).time().'.'.$photoType;
                        $newPhoto = $uploadDir.$filename;

                    } while (file_exists($newPhoto));
                    if (move_uploaded_file($photos['tmp_name'][$key], $newPhoto)) {
                        (new ProductPhoto)->_save($model->id, $filename,0);
                    }
                }
            }
            if (!empty($_POST['NewParam'])) {
                foreach ($_POST['NewParam'] as $key => $paramId) {
                    if ($_POST['NewParamValue'][$key]) {
                        ProductParameter::insert([
                            'product_id' => $model->id,
                            'parameter_id' => $paramId,
                            'value' => $_POST['NewParamValue'][$key],
                        ]);
                    }
                }
            }
            $this->redirect('admin/products');
        } else
            return $this->render('products/store.tpl', [
                'categories' => Category::all(),
            ]);
    }

    public function actionEdit($id)
    {
        $model = Product::where('id', $id)->first();
        if($this->validation()) {
            $model->_save();
            if (!empty($_POST['Params'])) {
                foreach ($_POST['Params'] as $param => $value) {
                    ProductParameter::where('parameter_id', $param)
                        ->where('product_id', $id)
                        ->update(['value' => $value]);
                }
            }

            if (!empty($_POST['NewParam'])) {
                foreach ($_POST['NewParam'] as $key => $paramId) {
                    if ($_POST['NewParamValue'][$key]) {
                        ProductParameter::insert([
                            'product_id' => $id,
                            'parameter_id' => $paramId,
                            'value' => $_POST['NewParamValue'][$key],
                        ]);
                    }
                }
            }
            $this->redirect('admin/products');
        } else {
            return $this->render('products/edit.tpl', [
                'model' => $model,
                'categories' => Category::all(),
            ]);
        }
    }

    public function actionDelete()
    {
        Product::where('id', $_POST['id'])->delete();
        (new ProductPhoto())->deleteAllByProduct($_POST['id']);
    }

    public function setOptions($data)
    {
        return [
            'data' => $data,
            'serial' => '#',
            'fields' => [
                'id' => 'Id',
                'category_id' => 'Категория',
                'mark' => 'Артикул',
                'name' => 'Название',
                'description' => 'Описание',
                'price' => 'Цена',
            ],
            'baseUri' => 'products'
        ];
   }

   public function validation()
   {
       return (isset($_POST["category_id"]) && isset($_POST["mark"]) && isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["price"])) ? true : false;
   }
}