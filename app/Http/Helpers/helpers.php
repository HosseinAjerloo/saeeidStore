<?php
function normalizeDate($date){
    $date=substr($date,0,10);
    return date('Y-m-d',$date);
}
