<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LatihanController extends Controller
{
    public function index_1()
    {
    	return "Latihan view dari Controller";
    }

    public function index_2($a,$b)
    {
    	return "Hasilnya {$a}+{$b} = ".( $a + $b);
    }

    public function index_3($a,$b)
    {
    	$total = $a+$b;
    	return view('latihan',[
    		'a' 	=> $a,
    		'b'		=> $b,
    		'total' => $total
    	]);
    }
}
