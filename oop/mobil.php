<?php 

include "Kendaraan.php";
class Mobil extends Kendaraan {

	public function setBan($b)
	{
		$this->ban = $b;
	}

	public function setWarna($w)
	{
		$this->warna = $w;
	}
	


	public function setMerk($m)
	{
		$this->merk = $m;
	}

	public function getBan()
	{
		return $this->ban;
	}

	public function getWarna()
	{
		return $this->warna;
	}

	public function getMerk()
	{
		return $this->merk;
	}
}


// proses deklarasi object
$mobilToyota = new Mobil;
$mobilHonda  = new Mobil;
$mobilMazda  = new Mobil;


// proses inisiasi value object

$mobilToyota->setWarna("Hitam");
$mobilToyota->setBan(4);
$mobilToyota->setMerk("Toyota Raize");

$mobilHonda->setWarna("Putih");
$mobilHonda->setBan(4);
$mobilHonda->setMerk("Honda CR-V");

$mobilMazda->setWarna("Hitam");
$mobilMazda->setBan(4);
$mobilMazda->setMerk("Honda CX-5");

echo "Merk Mobil {$mobilToyota->getMerk()} \n";
echo "Warna Mobil {$mobilToyota->getWarna()} \n";
echo "Ban Mobil {$mobilToyota->getBan()} \n \n";

echo "Merk Mobil {$mobilHonda->getMerk()} \n";
echo "Warna Mobil {$mobilHonda->getWarna()} \n";
echo "Ban Mobil {$mobilHonda->getBan()} \n \n";

echo "Merk Mobil {$mobilMazda->getMerk()} \n";
echo "Warna Mobil {$mobilMazda->getWarna()} \n";
echo "Ban Mobil {$mobilMazda->getBan()} \n \n";

 ?>