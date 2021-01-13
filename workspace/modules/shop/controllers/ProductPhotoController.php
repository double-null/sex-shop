<?php


namespace workspace\modules\shop\controllers;

use core\Controller;
use workspace\modules\shop\models\ProductPhoto;

class ProductPhotoController extends Controller
{
    public function actionIndex()
    {
        $photos = ProductPhoto::select(['id', 'name', 'cover'])
            ->where('product_id', $_POST['product'])
            ->get()
            ->toArray();
        echo json_encode($photos);
        die;
    }

    public function actionLoad()
    {
        $uploadDir = ROOT_DIR.'/images/';
        foreach ($_FILES as $file) {
            $photoNameChunks = explode('.', $file['name']);
            $photoType = array_pop($photoNameChunks);
            do {
                $filename = rand(10000, 99999).time().'.'.$photoType;
                $newPhoto = $uploadDir.$filename;

            } while (file_exists($newPhoto));
            if (move_uploaded_file($file['tmp_name'], $newPhoto)) {
                (new ProductPhoto)->_save($_POST['product'], $filename,0);
            }
        }
        echo json_encode(['status' => 1]);
        die;
    }

    public function actionDelete()
    {
        ProductPhoto::where('id', $_POST['id'])->delete();
        echo json_encode(['status' => 1]);
        die;
    }
}