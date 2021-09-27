function berechneBruttPreis(float $einzelpreis) : float
{
    static $UmSt = 19;
    $ergebnis = floatval($einzelpreis) * (1 + $UmSt/100);
    if($UmSt == 19)
    {
        $UmSt = $UmSt - 3;
    }else
    {
        $UmSt = $UmSt - 3;
    }
            
    return $ergebnis;           
}