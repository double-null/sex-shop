<?php

namespace workspace\modules\shop\requests;

use core\RequestSearch;

class ProductSearchRequest extends RequestSearch
{
    public $id;
    public $category_id;
    public $mark;
    public $name;
    public $description;
    public $price;


    public function rules()
    {
        return [];
    }
}
