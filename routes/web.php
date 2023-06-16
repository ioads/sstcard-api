<?php

use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Cliente;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('test', function() {
    
    $data = Cliente::all();
    $pdf = Pdf::loadView('pdf.clientes', ['clientes' => $data]);
    return $pdf->stream();
});

Route::get('/', function () {
    return view('welcome');
});
