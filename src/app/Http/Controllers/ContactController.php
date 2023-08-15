<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index(){
        return view('index');
    }

    public function confirm(ContactRequest $request){
        $contact = $request->only(['family', 'name', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion']);
        return view('confirm', compact('contact'));
    }

    public function store(Request $request){
        if($request->input('back') == 'back'){
            return redirect('/')
                        ->withInput();
        }

        $contact = $request->only(['family', 'name', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion']);
        if($contact['gender'] == "男性"){
            $contact['gender'] = 1;
        }elseif($contact['gender'] == "女性"){
            $contact['gender'] = 2;
        }

        $fullname = [
            'fullname' => $contact['family'].$contact['name']
        ];

        unset($contact['family']);
        unset($contact['name']);

        $contact = array_merge($fullname , $contact);
        Contact::create($contact);
        return view('thanks');
    }

    public function manage(){
        $contacts = Contact::paginate(10);
        return view('manage', compact('contacts'));
    }

    public function search(Request $request)
    {
        $contacts = Contact::NameSearch($request->name)->GenderSearch($request->gender)->BeforeSearch($request->before)
        ->AfterSearch($request->after)->EmailSearch($request->email)->paginate(10);
        return view('manage', compact('contacts'));
    }

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/manage')->with('message', 'お問い合わせを削除しました');
    }

}
