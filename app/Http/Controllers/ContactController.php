<?php

namespace App\Http\Controllers;

use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showContacts()
    {
        $messages = Contact::latest()->paginate(10);

        return view('emails.index', compact('messages'));
    }

    public function deleteContacts($id)
    {
        Contact::findOrFail($id)->delete();

        $notification = [
            'message' => 'Your message has been moved to trash successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('messages')->with($notification);
    }

    public function showTrashedContacts()
    {
        $trashedMessages = Contact::onlyTrashed()->latest()->paginate(10);

        return view('emails.trash', compact('trashedMessages'));
    }

    public function restoreContact($id)
    {
        Contact::withTrashed()->findOrFail($id)->restore();

        $notification = [
            'message' => 'Your post has been restored successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    public function permanentDeleteContact($id)
    {
        Contact::withTrashed()->findOrFail($id)->forceDelete();

        $notification = [
            'message' => 'Your post has been deleted successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
