<?php

function ReadPlayTime($currpt)
{
    if($currpt <= 3600) return "".($currpt/60%60)." minutes, ".($currpt%60)." seconds";
    else if($currpt > 3600 && $currpt <= 86400) return "".($currpt/3600%24)." hours, ".($currpt/60%60)." minutes, ".($currpt%60)." seconds";
    else if($currpt > 86400) return "".($currpt/86400%30)." days, ".($currpt/3600%24)." hours, ".($currpt/60%60)." minutes, ".($currpt%60)." seconds";
}

function ReadLastActive($la)
{
    $total = time() - $la;
    if($total <= 3600) return "".($total/60%60)." minutes, ".($total%60)." seconds ago";
    else if($total > 3600 && $total <= 86400) return "".($total/3600%24)." hours, ".($total/60%60)." minutes, ".($total%60)." seconds ago";
    else if($total > 86400) return "".($total/86400%30)." days, ".($total/3600%24)." hours, ".($total/60%60)." minutes, ".($total%60)." seconds ago";
}

function ShowRatio($kills, $deaths)
{
    if($deaths == 0) return "Indefinite";
    else return ($kills/$deaths);
}

?>