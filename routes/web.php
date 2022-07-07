<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\people;


  
//Route::get('image-upload', [ people::class, 'imageUpload' ])->name('image.upload');
//Route::post('/image-upload', [ people::class, 'imageUploadPost' ])->name('image.upload.post');


Route::get('/',[people::class,'index'])->name('index');

Route::get('/view/{id}',[people::class,'printx']);
//Route::get('/view/{id}',function(){return view('yamin');});

Route::post('/',[people::class,'create','imageUploadPost'])->name('image.upload.post');
Route::get('delete/{id}',[people::class,'destroy']);
