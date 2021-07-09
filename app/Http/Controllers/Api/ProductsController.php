<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
    	return [
    		'message' => 'Data Product'
    	];
    }

    public function store(Request $request)
    {
    	return [
    		'message' => 'Insert Data Product'
    	];
    }

    public function show($id)
    {
    	return [
    		'message' => 'Detail Data Product'
    	];
    }

    public function update($id, Request $request)
    {
    	return [
    		'message' => 'Update Data Product'
    	];
    }

    public function destroy($id, Request $request)
    {
    	return [
    		'message' => 'Delete Data Product'
    	];
    }
}
