<?php
 
class Terbilang extends CApplicationComponent {
  
    public function rupiah($uang)
    {
      $rp = $this->spellNumberInIndonesian($uang);
      //echo strtoupper( $rp.' rupiah ' ) ;
      echo $rp.' Rupiah';
    }
    public function spellNumberInIndonesian ($number) 
    {
        $number = strval($number);
        //if (!ereg("^[0-9]{1,15}$", $number))   deprecated
        if (!preg_match("/^[0-9]{1,15}$/", $number))
            return(false);
        $ones = array("", "Satu", "Dua", "Tiga", "empat",
            "Lima", "Enam", "Tujuh", "Delapan", "Sembilan");
        $majorUnits = array("", "Ribu", "Juta", "Milyar", "Trilyun");
        $minorUnits = array("", "Puluh", "Ratus");
        $result = "";
        $isAnyMajorUnit = false;
        $length = strlen($number);
        for ($i = 0, $pos = $length - 1; $i < $length; $i++, $pos--) {
            if ($number{$i} != '0') {
                if ($number{$i} != '1')
                    $result .= $ones[$number{$i}].' '.$minorUnits[$pos % 3].' ';
                else if ($pos % 3 == 1 && $number{$i + 1} != '0') {
                    if ($number{$i + 1} == '1')
                        $result .= "Sebelas ";
                    else
                        $result .= $ones[$number{$i + 1}]." belas ";
                    $i++; $pos--;
                } else if ($pos % 3 != 0)
                    $result .= "Se".strtolower($minorUnits[$pos % 3]).' ';
                else if ($pos == 3 && !$isAnyMajorUnit)
                    $result .= "Se";
                else
                    $result .= "Satu ";
                $isAnyMajorUnit = true;
            }
            if ($pos % 3 == 0 && $isAnyMajorUnit) {
                $result .= $majorUnits[$pos / 3].' ';
                $isAnyMajorUnit = false;
            }
        }
        //final result
        $result = trim($result);
        if ($result == "") $result = "nol";
        return($result);
   }
}  