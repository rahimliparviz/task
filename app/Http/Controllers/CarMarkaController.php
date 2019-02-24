<?php

namespace App\Http\Controllers;

use App\Models\CarMarka;
use App\Models\CarModel;
use Illuminate\Http\Request;

class CarMarkaController extends Controller
{
    //All cars
    public function allMarkas(){
        return view('admin.markas.markas')
            ->with('markas',CarMarka::all());
    }

    //Crud operations
    public function create(Request $request){

        return view('admin.markas.create')
            ->with("modelId",$request->modelId);
    }

    public function store(Request $request){

       $this->validate($request,[
           'name'=>'required|max:191',
           'info'=>'required|max:191',
           'image'=>'required'
       ]);

       CarMarka::CreateCar($request);

        return redirect()->route('modelMarkas',['id'=>$request->modelId]);
    }

    public function edit(Request $request){

        $car = CarMarka::find($request->id);

        return view('admin.markas.edit')
            ->with('car',$car)
            ->with('models',CarModel::all());
    }

    public function update(Request $request){
        CarMarka::UpdateCar($request);
        return redirect()->route('modelMarkas',['id'=>$request->model]);
    }



    public function delete(Request $request){

        $car =CarMarka::find($request->id);

        return view('admin.markas.delete')->with("car",$car);
    }

    public function destroy(Request $request){

        $modelId = CarMarka::find($request->id)->model_id;
        CarMarka::DestroyCarMarka($request);
        return redirect()->route('modelMarkas',['id'=>$modelId]);

    }
}
