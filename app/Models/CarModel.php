<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Integer;

class CarModel extends Model
{
    protected $fillable = ['name'];

    public function markas()
    {
        return $this->hasMany('App\Models\CarMarka');
    }

    public static function CreateModel(Request $request){
        CarModel::create( ['name'=>$request->name ]);
    }

    public static function UpdateModel(Request $request){

        $model = CarModel::find($request->id);
        $model->name = $request->name;
        $model->update();
    }

    public static function DeleteWithDependencies(Request $request){

        $model = CarModel::find($request->id);

        $modelCars = CarMarka::where('model_id',$model->id)->get();

        foreach ($modelCars as $car){
            $car->delete();
        }

        $model->delete();

    }

}
