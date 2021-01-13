<?php

namespace workspace\modules\shop\models;

use Illuminate\Database\Eloquent\Model;
use workspace\modules\shop\requests\OrderSearchRequest;

class Order extends Model
{
    protected $table = "orders";

    public $timestamps = false;

    public $fillable = ['name', 'surname', 'delivery_address', 'phone', 'email', 'comment', 'status'];

    public function _save()
    {
        $this->name = $_POST['name'];
        $this->surname = $_POST['surname'];
        $this->delivery_address = $_POST['delivery_address'];
        $this->phone = $_POST['phone'];
        $this->email = $_POST['email'];
        $this->comment = $_POST['comment'];
        $this->products = json_encode($_SESSION['cart']);
        $this->status = 0;
        $this->save();
    }

    public static function search(OrderSearchRequest $request)
    {
        $query = self::query();

        if($request->id)
            $query->where('id', 'LIKE', "%$request->id%");

        if($request->name)
            $query->where('name', 'LIKE', "%$request->name%");

        if($request->surname)
            $query->where('surname', 'LIKE', "%$request->surname%");

        if($request->delivery_address)
            $query->where('delivery_address', 'LIKE', "%$request->delivery_address%");

        if($request->phone)
            $query->where('phone', 'LIKE', "%$request->phone%");

        if($request->email)
            $query->where('email', 'LIKE', "%$request->email%");

        if($request->comment)
            $query->where('comment', 'LIKE', "%$request->comment%");

        if($request->products)
            $query->where('products', 'LIKE', "%$request->products%");

        if($request->status)
            $query->where('status', 'LIKE', "%$request->status%");


        return $query->get();
    }
}
