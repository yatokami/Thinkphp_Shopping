<?php


function islogin() {
    return session('uname');
}

function getrandom($max) {
    $numbers = range (1,$max); 
    //shuffle 将数组顺序随即打乱 
    shuffle ($numbers); 
    //array_slice 取该数组中的某一段 
    $num=6; 
    $result = array_slice($numbers,0,$num); 

    return $result;
}
?>