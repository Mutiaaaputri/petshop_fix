<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Pembayaran;
use App\Models\Status;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BayarController extends Controller
{
    public function bayar(string $id)
    {
        $pageTitle = 'Pembayaran';
        $bayar= Pembayaran::find($id);
        $vc = 3598560000 + $id;


        return view('bayar', [
        'pageTitle' => $pageTitle,
        'bayar' => $bayar,
        'vc' => $vc
    ]);
    }



    public function uplodbukti(Request $request, string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
        ];

        $validator = Validator::make($request->all(), [
            'bukti' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $iuser = $request->iduser;
        $bayar= Pembayaran::find($id);
        // Hapus file CV lama
        $file = $request->file('bukti');
        $originalFilename = $file->getClientOriginalName();
        $encryptedFilename = $file->hashName();
        $file->store('public/files/bukti');
        $bayar->statuse_id = 2;
        $bayar->original_buktiimage = $originalFilename;
        $bayar->encrypted_buktiimage = $encryptedFilename;
        $bayar->save();
        Alert::success('Berhasil', 'Upload Bukti Pembayaran Berhasil.');
        return redirect()->route('history2', [$iuser]);
    }

}
