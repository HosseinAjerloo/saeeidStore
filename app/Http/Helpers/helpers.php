<?php
function normalizeDate($date){
    $date=substr($date,0,10);
    return date('Y-m-d',$date);
}
function numberFormatAble($value){
    return number_format($value,0,'/','.');
}
function getParentChain($category){
    $parents=array();
    while ($category->parent){
        array_push($parents,$category->parent->name);
        $category=$category->parent;
    }
       return array_reverse($parents);

}
