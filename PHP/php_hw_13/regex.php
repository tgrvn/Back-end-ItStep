<?php


function isPhone($str)
{
    $phoneRegex = "/^\+380\s\d{2}-\d{3}-\d{2}-\d{2}$/";
    return !!preg_match($phoneRegex, $str);
}

function isValidComment($str)
{
    $commentRegex = "/^\w{0,3}$/";
    str_replace();
    return !!preg_match($commentRegex, $str);
}

var_dump(isValidComment(""));
