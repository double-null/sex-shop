<?php

namespace workspace\modules\shop\models;

use Illuminate\Database\Eloquent\Model;
use workspace\modules\shop\requests\ParameterSearchRequest;

class Parameter extends Model
{
    protected $table = "parameters";

    public $timestamps = false;

    public $fillable = ['name', 'type', 'unit'];

    public function _save()
    {
            $this->name = $_POST["name"];
            $this->type = $_POST["type"];
            $this->unit = $_POST["unit"];

        $this->save();
    }

    public static function search(ParameterSearchRequest $request)
    {
        $query = self::query();

        if($request->id)
            $query->where('id', 'LIKE', "%$request->id%");

        if($request->name)
            $query->where('name', 'LIKE', "%$request->name%");

        if($request->type)
            $query->where('type', 'LIKE', "%$request->type%");

        if($request->unit)
            $query->where('unit', 'LIKE', "%$request->unit%");


        return $query->get();
    }

    public function productParameters()
    {
        return $this->belongsToMany('\modules\shop\models\ProductParameter');
    }
}
