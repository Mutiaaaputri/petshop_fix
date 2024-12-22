<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Pembayaran;
use App\Models\statuse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HistoryController extends Controller
{
    function history(string $id)
    {
        $pageTitle = 'history';
        $Pembayaran = Pembayaran::where("statuse_id", '1')->where("user_id", $id)->get();

        return view('history', [
            'pageTitle' => $pageTitle,
            'Pembayaran' => $Pembayaran
        ]);
    }

    function history2(string $id)
    {
        $pageTitle = 'history';
        $Pembayaran = Pembayaran::where("statuse_id", '2')->where("user_id", $id)->get();

        return view('history2', [
            'pageTitle' => $pageTitle,
            'Pembayaran' => $Pembayaran
        ]);
    }

    function history3(string $id)
    {
        $pageTitle = 'history';
        $Pembayaran = Pembayaran::where("statuse_id", '3')->where("user_id", $id)->get();

        return view('history3', [
            'pageTitle' => $pageTitle,
            'Pembayaran' => $Pembayaran
        ]);
    }
}
