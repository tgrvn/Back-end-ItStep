<?php

function getImagesArray($travels, $id)
{
    $dbImages = $travels->getImgById($id);
    $allImages = array_diff(scandir($dbImages['imgpath'], 1), array('..', '.'));
    $map = function ($item) use ($dbImages) {
        return $dbImages['imgpath'] . "//" . $item;
    };

    $pathsImages = array_map($map, $allImages);

    return $pathsImages;
}
