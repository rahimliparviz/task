<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class CarMarka extends Model
{
    protected $fillable = ['name','short_info','image_path','model_id'];

    //returns cars's model name
    public function model(){
        $modelName = CarModel::find($this->model_id)->name;
        return $modelName;
    }


    public static function CreateCar(Request $request){

        if($request->hasFile('image')){

            $image=$request->image;
            $image_new_name=time().$image->getClientOriginalName();
            $image->move('images/',$image_new_name);

            CarMarka::create([
                'image_path'=>'images/'.$image_new_name,
                'name'=>$request->name,
                'short_info'=>$request->info,
                "model_id"=>$request->modelId
            ]);



        };

    }



    public static function UpdateCar(Request $request){

        $marka = CarMarka::find($request->id);

        if($request->hasFile('image')){
            $img_path = public_path().'/'.$marka->image_path;
            if (file_exists($img_path)) {unlink($img_path); }
            $image=$request->image;
            $image_new_name=time().$image->getClientOriginalName();
            $image->move('images/',$image_new_name);
            $marka->image_path = 'images/'.$image_new_name;
        };

        $marka->name = $request->name;
        $marka->short_info = $request->info;
        $marka->model_id = $request->model;

        $marka->update();
    }


    public static function DestroyCarMarka(Request $request){

        $marka = CarMarka::find($request->id);

        $img_path = public_path().'/'.$marka->image_path;
        if (file_exists($img_path)) {unlink($img_path); }

        $marka->delete();


    }



}
