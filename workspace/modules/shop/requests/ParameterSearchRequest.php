<?php

namespace workspace\modules\shop\requests;

use core\RequestSearch;

class ParameterSearchRequest extends RequestSearch
{
    public $id;
    public $name;
    public $type;
    public $unit;


    public function rules()
    {
        return [];
    }
}