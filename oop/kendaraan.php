<?php 

class Kendaraan{

	protected $warna;

	protected $ban;

	protected $merk;

	public function setWarna($w){
		$this->warna = $w;
	}


	public function getWarna(){
		return $this->warna;
	}

}


 ?>