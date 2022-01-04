<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AllCat(){
        $categories = Category::latest()->paginate(5);
        // $categories = DB::table('categories')->latest()->paginate(5);
        // $categories =DB::table('categories')
        //     ->join('users','categories.user_id','users.id')
        //     ->select('categories.*','users.name')
        //     ->latest()->paginate(5);
        $trashCat = Category::onlyTrashed()->latest()->paginate(3);
        return view('admin.category.index',compact('categories','trashCat'));
    }

    public function AddCat(Request $request){
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],
        [
          'category_name.required' => 'Điền vào ô trên này đi bạn'
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'user_id'=> Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        // $category = new Category;
        // $category->category_name =  $request->category_name;
        // $category->user_id =  Auth::user()->id;
        // $category->save();

        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['user_id'] = Auth::user()->id;
        // DB::table('categories')->insert($data);
        $noti = array(
            'message'=> "Tạo thành công",
            'alert-type'=>'success'
        );
        return redirect()->back()->with($noti);
    }

    public function Edit($id){
        // $categories = Category::find($id);

        $categories = DB::table('categories')->where('id',$id)->first();
        return view('admin.category.edit', compact('categories'));
    }
    public function Update(Request $request, $id){
        // $update= Category::find($id)->update([
        //     'category_name' =>$request->category_name,
        //     'user_id' => Auth::user()->id
        // ]);
        $data= array();
        $data['category_name'] = $request->category_name;
        $data['user_id'] = Auth::user()->id;
        DB::table('categories')->where('id',$id)->update($data);
        $noti = array(
            'message'=> "Edit thành công",
            'alert-type'=>'success'
        );

        return redirect()->route('all.category')->with($noti);

    }
    // ham nay de xoa cho vao thung rac-> su dung soft delete da dc de ra khi su dung migration
    public function SoftDelete($id){
        $delete = Category::find($id)->delete();
        $noti = array(
            'message'=> "SoftDelete thành công",
            'alert-type'=>'success'
        );
        return redirect()->back()->with($noti);

    }
    public function Restore($id)
    {
        $delete = Category::withTrashed()->find($id)->restore();
        $noti = array(
            'message'=> "Restore thành công",
            'alert-type'=>'success'
        );
        return redirect()->back()->with($noti);
    }
    public function Pdelete($id)
    {
        $delete = Category::onlyTrashed()->find($id)->forceDelete();
        $noti = array(
            'message'=> "Delete permanently thành công",
            'alert-type'=>'success'
        );
        return redirect()->back()->with($noti);
    }


}
