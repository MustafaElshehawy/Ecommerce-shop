<?php


//divide text and give separator to divide text
function words($separator, $text ,$numOfTextFromStart= 15){
    $words =explode($separator, $text);
    return implode($separator,array_slice($words,0,$numOfTextFromStart)).'...';
}