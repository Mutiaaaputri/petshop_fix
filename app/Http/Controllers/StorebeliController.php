<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class StorebeliController extends Controller
{
    public function detailproduct(string $id)
    {
        $pageTitle = 'Product';
        $Products = Product::find($id);

        return view('show', [
        'pageTitle' => $pageTitle,
        'Products' => $Products
    ]);
    }

}
