<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama'   => 'required|string|max:100',
            'email'  => 'required|email',
            'pesan'  => 'required|string|max:1000',
        ]);

        Mail::to('ghozialfarizi2@gmail.com') 
            ->send(new FeedbackMail($request->nama, $request->email, $request->pesan));

        return back()->with('success', 'Masukan Anda telah dikirim. Terima kasih!');
    }
}

