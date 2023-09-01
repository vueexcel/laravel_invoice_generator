<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DemoEmail; // Corrected import
use App\Mail\SampleEmail;
class EmailController extends Controller
{
    public function showEmailForm()
    {
        return view('email-form');
    }
    public function sendEmail(Request $request)
    {
        $request->validate([
            'to' => 'required|email',
            'message' => 'required|string',
        ]);
        $attachmentPath = $request->file('attachment')->store('pdf_attachments', 'public');
     
        $data = [
            'message' => $request->input('message'),
        ];
        $receiverEmail = $request->input('to');
        // dd($attachmentPath);
        Mail::to($receiverEmail)->send(new SampleEmail($data,$attachmentPath)); // Corrected class name

        return redirect('/send-email')->with('success', 'Email sent successfully!');
    }
}




