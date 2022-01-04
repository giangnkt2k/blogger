<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use App\Models\Multipic;
use Auth;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AllBrand()
    {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index',compact('brands'));
    }

    public function StoreBrand(Request $request){
        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|max:255',
            'brand_image' => 'required|mimes:jpg,jpeg,png',
        ],
        [
          'brand_name.required' => 'Điền vào ô trên này đi bạn',
          'brand_image.required' => 'Không được bỏ trống ảnh'
        ]);
        $brand_image = $request->file('brand_image');
        // $name_gen = hexdec(uniqid());
        // $img_ext = strtolower($brand_image->getClientOriginalExtension());
        // $img_name = $name_gen.'.'.$img_ext;
        // $up_location = 'image/brand/';
        // $last_img = $up_location.$img_name;
        // $brand_image->move($up_location,$img_name);

        $name_gen = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(300,200)->save('image/brand/'.$name_gen);
        $last_img = 'image/brand/'.$name_gen;
        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        $noti = array(
            'message'=> "Tạo thành công",
            'alert-type'=>'success'
        );
        return  redirect()->back()->with($noti);
    }

    public function Edit($id){
        // $categories = Category::find($id);

        $brands = DB::table('brands')->where('id',$id)->first();
        return view('admin.brand.edit', compact('brands'));
    }
    public function Update(Request $request, $id){
        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|max:255',
        ],
        [
          'brand_name.required' => 'Điền vào ô trên này đi bạn',
        ]);

        $old_image = $request->old_image;
        $brand_image = $request->file('brand_image');
        if($brand_image){
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($brand_image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'image/brand/';
            $last_img = $up_location.$img_name;
            $brand_image->move($up_location,$img_name);
            unlink($old_image);
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' => $last_img,
                'created_at' => Carbon::now()
            ]);
        }else{
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'created_at' => Carbon::now()
            ]);
        }
        $noti = array(
            'message'=> "Tạo thành công",
            'alert-type'=>'success'
        );


        return redirect()->route('all.brand')->with($noti);

    }

    public function Delete($id)
    {
        $image = Brand::find($id);
        $old_image = $image->brand_image;
        unlink($old_image);
        Brand::find($id)->delete();
        $noti = array(
            'message'=> "Tạo thành công",
            'alert-type'=>'success'
        );
        return redirect()->route('all.brand')->with($noti);
    }
    public function Multpic()
    {
        $images = Multipic::all();
       return view('admin.multipic.index',compact('images'));
    }

    public function StoreImage(Request $request)
    {
        // $validated = $request->validate([
        //     'image' => 'required|mimes:jpg,jpeg,png',
        // ],
        // [
        //   'image.required' => 'Không được bỏ trống ảnh'
        // ]);

        $images = $request->file('image');

        foreach($images as $multi_img){


        $name_gen = hexdec(uniqid()).'.'.$multi_img->getClientOriginalExtension();
        Image::make($multi_img)->resize(300,300)->save('image/multi/'.$name_gen);
        $last_img = 'image/multi/'.$name_gen;
        Multipic::insert([
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);
     }

        return  redirect()->back()->with('success','Image Tao thanh cong');
    }
    public function Logout()
    {
        Auth::logout();
        return Redirect()->route('login')->with('success','User Logout');
    }
}
