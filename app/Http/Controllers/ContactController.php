<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;


class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('backend.admin.contacts.index', compact('contacts'));
    }
    public function store(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);

        // Contact::create($request->all());
        Contact::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'message' => $request['message'],

        ]);

        Toastr::success('Your message was sent successfully :)','Success');
        return redirect()->back()
        ->with("error");
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('backend.admin.contacts.show', compact('contact'));
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->back()
            ->with('success', 'Message was deleted successfully');
    }
}
