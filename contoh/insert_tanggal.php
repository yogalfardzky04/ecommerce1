public function FunctionName(type $var = null)
{
    Contoh::insert([
        'tanggal' => date('Y-m-d H:i:s'), //cara 1
        'tanggal' => Carbon::now() // cara 2
        ])
}

 //ditulisnya di controller ya untuk inser tangggal