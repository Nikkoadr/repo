<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('transaksi');
    }
}
