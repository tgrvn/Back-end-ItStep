<?php

function getJSON($data)
{
    $fileData = file_get_contents($data);

    return json_decode($fileData, true);
}
