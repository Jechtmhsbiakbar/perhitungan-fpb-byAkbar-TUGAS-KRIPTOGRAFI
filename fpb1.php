<?php
class FPB
{
    public function hitungFPB($m, $n, &$proses = [])
    {
        while ($n != 0) {
            $kali = floor($m / $n);
            $sisa = $m % $n;
            $proses[] = "$m = $kali x $n + $sisa";
            $temp = $n;
            $n = $m % $n;
            $m = $temp;
        }
        return $m;
    }
}
?>