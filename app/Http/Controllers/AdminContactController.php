<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;

class AdminContactController extends Controller
{
    public function index()
    {
        return view('admin.contact.index', ['messages' => ContactMessage::latest()->paginate(15)]);
    }

    public function destroy(ContactMessage $contact): RedirectResponse
    {
        $contact->delete();

        return back()->with('admin_success', 'Contact message deleted.');
    }
}
