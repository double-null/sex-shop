<?php

namespace workspace\modules\shop\requests;

use core\RequestSearch;

class ProductParameterSearchRequest extends RequestSearch
{
    public $id;
    public $product_id;
    public $parameter_id;
    public $value;


    public function rules()
    {
        return [];
    }
}
