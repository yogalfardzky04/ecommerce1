<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    public function index()
    {
    	return [
    		'message' => 'Data Cart'
    	];
    }

    public function store(Request $request)
    {
    	return [
    		'message' => 'Insert Data Cart'
    	];
    }

    public function destroy($id, Request $request)
    {
    	return [
    		'message' => 'Delete Data Cart'
    	];
    }
}
