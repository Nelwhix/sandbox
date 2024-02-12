<?php

declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', fn (Request $request) => $request->user());

Route::get('/relationships', function () {
    return DB::table('categories')
        ->join('brands', 'categories.id', '=', 'brands.category_id')
        ->limit(5)
        ->get();
});

Route::get('/tables', fn () => DB::select('SHOW TABLES'));
