<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
	public function __construct()
	{
		return "Lumen Controller";
	}

	public function sendMail(Request $request)
    {
		$to_name = $request->input('name');
		$to_email = $request->input('to_email');
		$data = array('name'=>"Web Service", "body" => "Test mail");
		$send = Mail::send('emails.sendmail', $data, function($message) use ($to_name, $to_email ) {
			$message->to($to_email , $to_name)
					->subject('Test Mail From Web Service');
			$message->from('aseph8083@gmail.com','Asep Hidayat');
		});
		return response()->json([
			'status' => true,
			'message' => "Mail sucessfully send",
		], 200);
    }
}
