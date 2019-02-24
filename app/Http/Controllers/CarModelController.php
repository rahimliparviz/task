<?php

namespace App\Http\Controllers;

use App\Models\CarMarka;
use App\Models\CarModel;
use Illuminate\Http\Request;

class CarModelController extends Controller
{
    public function index(){
        return view('welcome')
            ->with('models',CarModel::all());
    }

    //Load cars with ajax
    public function ajaxMarkas(Request $request){
        if ($request->ajax()){

            $markas = CarMarka::where('model_id',$request->id)->get();

            return $markas;
        }else{
            return redirect('index');
        }
    }

    //Admin panel
    public function allModels(){
        return view('admin.dashboard')
            ->with('models',CarModel::all());
    }

    //Show all markas of car model
    public function markas(Request $request){

        $markas = CarMarka::where("model_id",$request->id)->get();

        return view('admin.markas.markas')
            ->with('modelId',$request->id)
            ->with('markas',$markas);
    }


    //crud operations
    public function create(){

        return view('admin.models.create');
    }

    public function store(Request $request){
        $this->validate($request,['name'=>'required|max:191' ]);
        CarModel::CreateModel($request);
        return redirect()->route('allModels');
    }

    public function edit(Request $request){

        $model = CarModel::find($request->id);
        return view('admin.models.edit')->with('model',$model);
    }

    public function update(Request $request){

        $this->validate($request,['name'=>'required|max:191' ]);
        CarModel::UpdateModel($request);
        return redirect()->route('allModels');
    }

    public function delete(Request $request){

     $model = CarModel::find($request->id);
     return view('admin.models.delete')->with('model',$model);
    }

    public function destroy(Request $request){

        CarModel::DeleteWithDependencies($request);
        return redirect()->route('allModels');
    }
}
