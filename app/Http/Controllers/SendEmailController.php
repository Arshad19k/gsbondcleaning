<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\EmailHistory;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    //

    public function index(Request $request)
    {
        $validate = $request->validate([
            'customer_email' => 'required',
            'email_message' => 'required',
            'subject' => 'required'
        ]);

        $cust_data = Order::where('email', $request->customer_email)->first();

        $data = [];

        $status = false;

        $data = EmailHistory::create([
            'order_id' =>  $cust_data->id,
            'user_id' => Auth::id(),
            'email' => $request->customer_email,
            'subject' => $request->subject,
            'message' => $request->email_message,
            'status' => 0
        ]);

        if ($data) {

            $response = $this->sendEmailUsingSmtp($request->customer_email, $request->subject, $request->email_message);

            if($response) {
                $status = true;
                EmailHistory::where('id', $data->id)->update(['status'=> 1]);
            }
        }

        if ($status) {
            return response()->json(['status' => true, 'msg' => 'Email sent successfully.']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Something went wrong..!']);
        }
    }

    protected function sendEmailUsingSmtp($email, $subject, $message)
    {
        try {
            
            Mail::send('email.customerEmail', ['body' => $message], function($msg) use($email, $subject) {
                
            $msg->to($email);
                $msg->subject($subject);
            });

            return ['status' => true, 'msg' => 'Email send successfully'];

        } catch (\Throwable $th) {
            return ['status' => false, 'msg' => $th->getMessage()];
        }
    }
}
