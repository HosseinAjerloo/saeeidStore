<?php
function normalizeDate($date){
    $date=substr($date,0,10);
    return date('Y-m-d',$date);
}
function numberFormatAble($value){
    return number_format($value,0,'/','.');
}
