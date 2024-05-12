<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return "welcome";
});

Route::get('home', function () {
    return view("home");
});

Route::get('gacoan', function () {
    return "Mie Murah Tapi Ga Enak";
});

Route::get('kecoak', function () {
    return view("gambar");
});

Route::get('/pengguna/{id}', function($id) {
    var_dump($id);
});

Route::get('/array/{nomor}', function(int $nomor) {
    $vararray = [6,9,7,5,4,3,1];
    $result = [];
    foreach($vararray as $angka){
        if($angka<$nomor){
            array_push($result, $angka);
        }
    }
    return $result;
});