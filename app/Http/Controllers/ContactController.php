<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // Everyone can view contact information
    public function index()
    {
        $contacts = Contact::orderBy('id', 'desc')->get();

        return view('contacts.index', compact('contacts'));
    }

    // Admin only - Create page
    public function create()
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Unauthorized');
        }

        return view('contacts.create');
    }

    // Admin only - Save contact
    public function store(Request $request)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email',
            'phone' => 'nullable|max:20',
            'message' => 'required'
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message
        ]);

        return redirect()->route('contacts.index')
            ->with('success', 'Contact added successfully.');
    }

    // Admin only - Delete
    public function destroy($id)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Unauthorized');
        }

        Contact::findOrFail($id)->delete();

        return redirect()->route('contacts.index')
            ->with('success', 'Contact deleted successfully.');
    }
}