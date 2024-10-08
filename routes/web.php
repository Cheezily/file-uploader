<?php

use App\Http\Controllers\PasswordController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    $settings = DB::table('settings')->orderBy('id', 'desc')->first();

    if(!is_null($settings) && $settings->filename) {
        return Storage::download('uploads/'.$settings->filename);
    }
    return 'File not found';
});


Route::get('upload', [UploadController::class, 'index'])->name('upload.index');
Route::post('upload', [UploadController::class, 'upload'])->name('upload.upload');

Route::get('password', [PasswordController::class, 'index'])->name('password.index');
Route::post('password', [PasswordController::class, 'update'])->name('password.update');
