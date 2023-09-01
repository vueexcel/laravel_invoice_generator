<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\SampleEmail;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate([
            'to' => 'required|email',
        ]);
        $attachment = $request->file('attachment')->store('pdf_attachments', 'public');
        $attachmentPath=storage_path('app/public/'.$attachment);
        $data = [
            'message' => $request->input('message'),
        ];
        $receiverEmail = $request->input('to');

        Mail::to($receiverEmail)->send(new SampleEmail($data, $attachmentPath));
        return response()->json(['message' => 'Email sent successfully!']);
    }
}
