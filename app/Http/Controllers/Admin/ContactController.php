<?php

namespace App\Http\Controllers\Admin;
use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }


    public function update(Request $request, Contact $contact)
    {
        
        $this->validate($request, [
            'email' => 'required|string',
            'no_tlp' => 'required|string',
            'facebook' => 'required|string',
            'instagram' => 'required|string',
            'twitter' => 'required|string',
        ]);

        $contact->update([
            'email' => $request->email,
            'no_tlp' => $request->no_tlp,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
        ]);

        return redirect()->back()->with('success', 'contact Berhasil Diubah');
    }
}
