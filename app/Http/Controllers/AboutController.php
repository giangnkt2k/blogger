<?php

namespace App\Http\Controllers;
use App\Models\HomeAbout;
use App\Models\Multipic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function HomeAbout()
    {
        $homeabout = HomeAbout::all();
        return view('admin.home.index', compact('homeabout'));
    }
    public function AddAbout()
    {
        return view('admin.home.create');
    }

    public function StoreAbout(Request $request)
    {
        HomeAbout::insert([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
            'long_dis' => $request->long_dis,
            'choice' => 'btn-danger'
        ]);
        $noti = array(
            'message'=> "Tạo thành công",
            'alert-type'=>'success'
        );
        return  redirect()->route('home.about')->with($noti);
    }
    public function EditAbout($id){

        $homeabout = DB::table('home_abouts')->where('id',$id)->first();
        return view('admin.home.edit', compact('homeabout'));
    }
    public function UpdateAbout(Request $request, $id){
            HomeAbout::find($id)->update([
                'title' => $request->title,
                'short_dis' => $request->short_dis,
                'long_dis' => $request->long_dis,
            ]);
            $noti = array(
                'message'=> "Edit thành công",
                'alert-type'=>'success'
            );
        return redirect()->route('home.about')->with($noti);

    }

    public function DeleteAbout($id)
    {
        HomeAbout::find($id)->delete();
        $noti = array(
            'message'=> "Delete thành công",
            'alert-type'=>'success'
        );
        return redirect()->route('home.about')->with($noti);
    }

    public function Portfolio()
    {
        $images = Multipic::all();
        return view('pages.portfolio',compact('images'));
    }

    public function ChoiceAbout($id)
    {
        $old = HomeAbout::where('choice','=','btn-primary')->first();
        // dd($old);
            if($old){
                if($old->id!=$id){
                    $old->choice ='btn-danger';
                    $old->save();

                    $new=HomeAbout::find($id);
                    $new->choice ='btn-primary';
                    $new->save();
                }
            }else{
                $new=HomeAbout::find($id);
                $new->choice ='btn-primary';
                $new->save();
            }

        $noti = array(
            'message'=> "Choice thành công",
            'alert-type'=>'success'
        );
        return redirect()->route('home.about')->with($noti);
    }
}
