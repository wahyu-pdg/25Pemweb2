<?php
class Member {
	//member1 variabel
	private $koneksi;

	//member2 konstruktor
	public function __construct() {
		global $dbh; //memanggil variabel di file lain
		$this->koneksi = $dbh;
	}

	//member3 fungsionalitas
public function cekLogin($data) {
    $sql = "SELECT * FROM member WHERE 
            username = ? AND password = ?";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute($data);
    $rs = $ps->fetch();
    return $rs;
}

	public function getMember($id) {
		$sql = "SELECT * FROM member WHERE id = ?";
		//PDO prepare statement
		$ps = $this->koneksi->prepare($sql);
		$ps->execute([$id]);
		$rs = $ps->fetch();
		return $rs;
	}
}