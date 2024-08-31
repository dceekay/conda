<?php
namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $contact = Contact::create($request->all());

        Mail::raw($contact->message, function ($message) use ($contact) {
            $message->to('receiver@example.com')
                    ->subject($contact->subject)
                    ->from($contact->email, $contact->name);
        });

        return response()->json(['success' => true, 'message' => 'Thank you for contacting us!']);
    }
}
