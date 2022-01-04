<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
class ContactController extends Controller
{
    public function AdminContact()
    {
        $contacts = Contact::all();
        return view('admin.contact.index',compact('contacts'));
    }
    public function AddContact()
    {
        return view('admin.contact.create');
    }

    public function StoreContact(Request $request)
    {
        Contact::insert([
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return  redirect()->route('admin.contact')->with('success','Contact Tao thanh cong');
    }
    public function EditContact($id){

        $contacts = DB::table('contacts')->where('id',$id)->first();
        return view('admin.contact.edit', compact('contacts'));
    }
    public function UpdateContact(Request $request, $id){
            Contact::find($id)->update([
                'address' => $request->address,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);
        return redirect()->route('admin.contact')->with('success',' Edit thành công!');

    }

    public function DeleteContact($id)
    {
        Contact::find($id)->delete();
        return redirect()->route('admin.contact')->with('success',' Delete thành công!');
    }

    public function Contact()
    {
        $contacts = Contact::first();
        return view('pages.contact',compact('contacts'));
    }

    public function ContactForm(Request $request)
    {
        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);
        return  redirect()->route('contact')->with('success','Contact Tao thanh cong');

    }
    public function AdminMessage()
    {
        $messages = ContactForm::all();
        return view('admin.contact.message',compact('messages'));
    }
    public function DeleteMessage($id)
    {
        ContactForm::find($id)->delete();
        return redirect()->route('admin.message')->with('success',' Delete thành công!');
    }
}
