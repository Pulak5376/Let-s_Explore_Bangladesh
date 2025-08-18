<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email_address' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'description' => 'required|string',
        ]);

        Contact::create($request->all());

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    public function adminIndex()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.contact', compact('contacts'));
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->back()->with('success', 'Contact message deleted successfully!');
    }
}
