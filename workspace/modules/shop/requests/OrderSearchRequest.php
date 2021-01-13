<?php


namespace workspace\modules\shop\requests;

use core\RequestSearch;

/**
 * Class OrderSearchRequest
 * @package workspace\modules\orders\requests
 *
 * @property int unsigned id
 * @property varchar(50) name
 * @property varchar(50) surname
 * @property varchar(250) delivery_address
 * @property varchar(15) phone
 * @property varchar(100) email
 * @property text comment
 * @property text products
 * @property tinyint status
 */

class OrderSearchRequest extends RequestSearch
{
    public $id;
    public $name;
    public $surname;
    public $delivery_address;
    public $phone;
    public $email;
    public $comment;
    public $products;
    public $status;


    public function rules()
    {
        return [];
    }
}