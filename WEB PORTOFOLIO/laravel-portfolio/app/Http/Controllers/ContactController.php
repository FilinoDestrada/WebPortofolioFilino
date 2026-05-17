<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class ContactController extends Controller
{
    /**
     * Proses form kontak (menggantikan process.php)
     */
    public function store(Request $request)
    {
        // Validasi input (menggantikan fungsi test_input di process.php)
        $validated = $request->validate([
            'name'    => 'required|string|max:255|regex:/^[a-zA-Z\-\' ]*$/',
            'email'   => 'required|email|max:255',
            'message' => 'required|string',
        ], [
            'name.required'    => 'Nama lengkap wajib diisi.',
            'name.regex'       => 'Hanya huruf dan spasi yang diizinkan pada nama.',
            'email.required'   => 'Email wajib diisi.',
            'email.email'      => 'Format email tidak valid.',
            'message.required' => 'Pesan tidak boleh kosong.',
        ]);

        // Simpan ke database (menggantikan penyimpanan file data_pesan.txt)
        $message = Message::create($validated);

        return view('pages.contact-result', [
            'success' => true,
            'data'    => $message,
        ]);
    }
}
