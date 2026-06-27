<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return response()->json(Contact::latest()->get());
    }

    public function show(string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update(['status' => 'read']);

        return response()->json($contact);
    }

    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return response()->json([
            'message' => 'Message deleted successfully'
        ]);
    }
}
