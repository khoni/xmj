<?php
class komponenBantu extends CApplicationComponent {	
	//fungsi upload file
	public function simpan_file($model,$atribut,$dir,$old_name_file=''){
		$uploadedFile = CUploadedFile::getInstance($model,$atribut);
		if( !empty($uploadedFile) and $uploadedFile->size <= (1024 * 1024) and $uploadedFile->extensionName != "php"  ){
			$nama_file = $atribut."_".(str_replace(" ","_",$uploadedFile->name));
			$this->cek_dir($dir);
			$this->cek_file($dir."/".$old_name_file);
			$uploadedFile->saveAs($dir."/".$nama_file);
			return $nama_file;
		}else{
			return $old_name_file;
		}
	}

	public function cek_dir($dir){
		if(! is_dir($dir)){
			mkdir($dir,0777,true);
			chmod($dir,0777);
			$myfile = fopen($dir."/"."index.php", "w") or die("Unable to open file!");
			fclose($myfile);
		}
	}
	
	public function cek_file($file_in_folder){
		if(is_file($file_in_folder))
			unlink($file_in_folder);
	}
	//end fungsi upload file
	
	public function nama_bulan($data) {
		$bln=array('Not Set','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember');
		return $bln[$data];
	} 
		
    public function link_kembali(){
        return '<a class="label-default label" href="#" onClick="history.back(); return false;"><i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>';
    }


}

?>