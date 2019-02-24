<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery\Image;
use App\Models\Gallery\Video;
use App\Models\Home\Home;
use App\Models\Navigation\Element;
use App\Models\Navigation\ElementTranslation;
use App\Models\Words\Word;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

//    ****custom****
        protected function editHeader($id,$locale,$value){
            $tr = ElementTranslation::where([['element_id',$id],['locale',$locale]])->first();
            $tr->page_info = $value;
            $tr->update();

        }

//    ****custom****


    public function index()
    {

        return view('admin.home.index')
            ->with('home',Home::first())
            ->with('menu',Element::with('element_tr')->where('status','menu')->first())
            ->with('promo',Element::with('element_tr')->where('status','promo')->first())
            ->with('service',Element::with('element_tr')->where('status','service')->first())
            ;
    }


    public function edit(Request $request){

            if ($request->section == "madrid" ){
                $image = $request->section.'_'.'img';
                return view('admin.home.edit')
                    ->with('element',Home::first())
                    ->with('section','madrid')
                    ->with('image',Home::first()[$image]);
            }else if($request->section == "chef"){
                $image = $request->section.'_'.'img';
                return view('admin.home.edit')
                    ->with('element',Home::first())
                    ->with('section','chef')
                    ->with('image',Home::first()[$image]);

            }else{
                $image = $request->section.'_'.'img';

                $element = Element::where('status',$request->section)->first();
                return view('admin.home.edit')
                    ->with('element',$element)
                    ->with('section','standart')
                    ->with('image',Home::first()[$image]);

            }

    }

    public function update(Request $request){



        if ($request->section == "madrid" ){

            if($request->hasFile('image')){


                $request->validate([
                    'info.*' => 'required|max:255',
                    'link.*' => 'required|max:255',
                    'image' => 'image|mimes:jpeg,jpg,png',
                ]);

                $oldImage = $request->section.'_'.'img';
                $img= Home::first()[$oldImage];
                $img_path = public_path().'/'.$img;
                if (file_exists($img_path)) {
                    unlink($img_path);
                }
                $home=Home::first();
                $image = $request->image;
                $image_new_name=time().$image->getClientOriginalName();
                $image->move('homeImages/',$image_new_name);
                $home[$oldImage] = 'homeImages/'.$image_new_name;
                $home->update();

                Home::MadridElementTranslation($request);

            }else{
                $request->validate([
                    'info.*' => 'required|max:255',
                    'link.*' => 'required|max:255',

                ]);

                Home::MadridElementTranslation($request);
            };
        }else if($request->section == "chef"){
            if($request->hasFile('image')){


                $request->validate([
                    'info.*' => 'required|max:255',
                    'title.*' => 'required|max:255',
                    'image' => 'image|mimes:jpeg,jpg,png',
                ]);

                $oldImage = $request->section.'_'.'img';
                $img= Home::first()[$oldImage];
                $img_path = public_path().'/'.$img;
                if (file_exists($img_path)) {
                    unlink($img_path);
                }
                $home=Home::first();
                $image = $request->image;
                $image_new_name=time().$image->getClientOriginalName();
                $image->move('homeImages/',$image_new_name);
                $home[$oldImage] = 'homeImages/'.$image_new_name;
                $home->update();

                Home::ChefElementTranslation($request);

            }else{
                $request->validate([
                    'info.*' => 'required|max:255',
                    'title.*' => 'required|max:255',

                ]);

                Home::ChefElementTranslation($request);
            };

        }else{
            if($request->hasFile('image')){


                $request->validate([
                    'info.*' => 'required|max:255',
                    'title.*' => 'required|max:255',
                    'image' => 'image|mimes:jpeg,jpg,png',
                ]);

                $oldImage = $request->section.'_'.'img';
                $img= Home::first()[$oldImage];
                $img_path = public_path().'/'.$img;
                if (file_exists($img_path)) {
                    unlink($img_path);
                }
                $home=Home::first();
                $image = $request->image;
                $image_new_name=time().$image->getClientOriginalName();
                $image->move('homeImages/',$image_new_name);
                $home[$oldImage] = 'homeImages/'.$image_new_name;
                $home->update();

                Element::EditElementTranslation($request);

            }else{
                $request->validate([
                    'info.*' => 'required|max:255',
                    'title.*' => 'required|max:255',
                ]);

                Element::EditElementTranslation($request);
            };
        }



        return redirect()->back();
    }


//    public function section_image(Request $r){
//
//
//        $img =Home::first()[$r->image];
//
//        return view('admin.home.edit_image')
//            ->with('id',$r->image)
//            ->with('img',$img);
//    }

//public function update_section_image(Request $r){
//
//    $home = Home::first();
//    $img =$home[$r->id];
//
//    if($r->hasFile('image')){
//
//
//        $img_path = public_path().'/'.$img;
//
//
//
//        if (file_exists($img_path)) {
//
//            unlink($img_path);
//        }
//
//        $image=$r->image;
//        $image_new_name=time().$image->getClientOriginalName();
//        $image->move('homeImages/',$image_new_name);
//
//        $home[$r->id] = 'homeImages/'.$image_new_name;
//        $home->update();
//
//    };
//
//    return redirect()->route('admin_home');
//}

}
