<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'pesan' => 'required',
        ]);

        $this->sendEmail($request->all());
        
        // Kirim email
        $nama = $request->nama;
        $email = $request->email;
        $pesan = $request->pesan;
        // try {
        
        DB::commit();
        return redirect()->route('contact')->with('success', 'send emamil succes');
        // } catch (\Exception $e) {
        // DB::rollBack();
        //     return back()->with('error', 'Gagal mengirim email. Silakan coba lagi.');
        // }
    }

    private function sendEmail($data)
    {
        Mail::send('contactsend', $data, function($pesan) use ($data) {
            $pesan->to($data['email'], $data['nama'])
            ->subject('Email from pegawai');
           });
    }
}