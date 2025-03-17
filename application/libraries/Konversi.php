<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Konversi
{
	
	public function hari_indonesia($tgl){
	//array hari
	$harinya=array(1=>'Senin','Selasa','Rabu','Kamis','Jum\'at','Sabtu','Minggu');	
	$tgl_temp =explode('-',$tgl);
	$no_hari=date('N',mktime(0,0,0,$tgl_temp[1],$tgl_temp[2],$tgl_temp[0]));
	return $harinya[$no_hari]; 	
	}
	
}	
