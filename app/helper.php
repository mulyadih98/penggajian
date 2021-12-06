<?php

function toRupiah($number){
    return 'Rp. '.strrev(implode('.',str_split(strrev(strval($number)),3)));
}