<?php

function imageuploader($sourcefile): string
{
    $filename = rand(0, 9999999) . date('y - m - d - h - i - s') . '.' . pathinfo($sourcefile['name'], PATHINFO_EXTENSION);
    move_uploaded_file($sourcefile['tmp_name'], '../Asset/image/' . $filename);
    return $filename;
}

?>