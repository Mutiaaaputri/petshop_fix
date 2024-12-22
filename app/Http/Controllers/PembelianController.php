<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Pembayaran;
use App\Models\Metode;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PembelianController extends Controller
{
    public function beli(string $id)
    {
        $pageTitle = 'Pembelian';
        $Products = Product::find($id);
        $metod = Metode::all();
        return view('Pembelian', [
        'pageTitle' => $pageTitle,
        'Products' => $Products,
        'metod' => $metod
    ]);
    }
}
