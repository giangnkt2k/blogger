<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function HomeSlider()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.index',compact('sliders'));
    }

    public function AddSlider()
    {
        return view('admin.slider.create');
    }

    public function StoreSlider(Request $request)
    {
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1920,1088)->save('image/slider/'.$name_gen);
        $last_img = 'image/slider/'.$name_gen;
        Slider::insert([
            'title' => $request->title,
            'image' => $last_img,
            'description' => $request->description,
            'link' => $request->link,
        ]);
        return  redirect()->route('home.slider')->with('success','Slider Tao thanh cong');
    }
    public function EditSlider($id){

        $sliders = DB::table('sliders')->where('id',$id)->first();
        return view('admin.slider.edit', compact('sliders'));
    }
    public function UpdateSlider(Request $request, $id){
        $old_image = $request->old_image;
        $image = $request->file('image');
        if($image){
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'image/slider/';
            $last_img = $up_location.$img_name;
            $image->move($up_location,$img_name);
            unlink($old_image);
            Slider::find($id)->update([
                'title' => $request->title,
                'image' => $last_img,
                'description' => $request->description,
                'link' => $request->link,
            ]);
        }else{
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'link' => $request->link,
            ]);
        }
        return redirect()->route('home.slider')->with('success',' Edit thành công!');

    }

    public function DeleteSlider($id)
    {
        $image = Slider::find($id);
        $old_image = $image->image;
        unlink($old_image);
        Slider::find($id)->delete();
        return redirect()->route('home.slider')->with('success',' Delete thành công!');
    }

}
