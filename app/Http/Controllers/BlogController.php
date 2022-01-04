<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use Auth;
use Image;
class BlogController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function AdminBlog()
    {
        $blogs = Blog::latest()->paginate(5);

        return view('admin.blog.index',compact('blogs'));
    }
    public function AddBlog()
    {
        $categories = Category::all();
        return view('admin.blog.create',compact('categories'));
    }
    public function StoreBlog(Request $request){
        // dd($request);
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]
        );
        $image = $request->file('image');

        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->save('image/blog/'.$name_gen);
        $last_img = 'image/blog/'.$name_gen;
        Blog::insert([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::user()->id,
            'category' => $request->category,
            'short_dip'=> $request->short_dip,
            'image'=> $last_img,
            'created_at' => Carbon::now()
        ]);

        $noti = array(
            'message'=> "Tạo thành công",
            'alert-type'=>'success'
        );
        return  redirect()->back()->with($noti);
    }

    public function EditBlog($id){
        // $categories = Category::find($id);
        $categories = Category::all();
        $blogs = DB::table('blogs')->where('id',$id)->first();
        return view('admin.blog.edit', compact('blogs','categories'));
    }
    public function UpdateBlog(Request $request, $id){
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
        ]
        );
        $old_image = $request->old_image;
        $image = $request->file('image');
        if($image){
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'image/blog/';
            $last_img = $up_location.$img_name;
            $image->move($up_location,$img_name);
            if($old_image){
                unlink($old_image);
            }
        Blog::find($id)->update([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::user()->id,
            'category' => $request->category,
            'short_dip'=> $request->short_dip,
            'image'=> $last_img,
            'created_at' => Carbon::now()
            ]);
        }
        else{
            Blog::find($id)->update([
                'title' => $request->title,
                'body' => $request->body,
                'user_id' => Auth::user()->id,
                'category' => $request->category,
                'short_dip'=> $request->short_dip,
                'created_at' => Carbon::now()
                ]);
        }
        $noti = array(
            'message'=> "Edit thành công",
            'alert-type'=>'success'
        );


        return redirect()->route('admin.blog')->with($noti);

    }

    public function DeleteBlog($id)
    {
        Blog::find($id)->delete();
        $noti = array(
            'message'=> "Delete thành công",
            'alert-type'=>'success'
        );
        return redirect()->route('admin.blog')->with($noti);
    }

    //Home page
    public function BlogPage(Request $request)
    {
        $allBlog = Blog::latest()->paginate(5);
        $keyWord = Arr::get($request->all(), 'search', '');
        if($keyWord == ''){
          $blogs = Blog::latest()->paginate(5);
        }
        else {
          $blogs = Blog::where('title', 'like','%'.$keyWord.'%')->paginate(5);
          if(count($blogs) == null){
            $blogs = Blog::latest()->paginate(5);
          }
        }
        $categories = Category::all();
        $packs = [];
        for ( $i=0;$i<count($blogs); $i++ ) {
            $user_name= User::where('id',$blogs[$i]->user_id)->value('name');
            array_push($packs,$user_name);
        }
        return view('pages.blog',compact('blogs','categories','packs','allBlog'));
    }
    public function BlogPageInsertByCategory(Request $name)
    {
        $category = Category::where('category_name',$name->name)->get();
        $categories = Category::all();

        if($categories[0]){
            $blogs = Blog::where('category',$category[0]->id)->paginate(5);
            $packs = [];
            for ( $i=0;$i<count($blogs); $i++ ) {
                $user_name= User::where('id',$blogs[$i]->user_id)->value('name');
                array_push($packs,$user_name);
            }
            return view('pages.blog',compact('blogs','packs','categories'));
        }
        else{
            $blogs = Blog::latest()->paginate(5);
            $packs = [];
            for ( $i=0;$i<count($blogs); $i++ ) {
                $user_name= User::where('id',$blogs[$i]->user_id)->value('name');
                array_push($packs,$user_name);
            }
            return view('pages.blog',compact('blogs','packs','categories'));
        }
    }
    public function SingleBlogPage($id)
    {
        $blog =Blog::find($id);
        $categories = Category::all();
        $blogs = Blog::latest()->paginate(5);
        $allBlog = Blog::latest()->paginate(5);
        return view('pages.blog-single',compact('blog','categories','blogs','allBlog'));
    }
}
