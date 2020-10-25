<?php

function filetitle($name)
{
    $htmlfile = fopen($name, 'rb');

    $rows = file($name);

    foreach ($rows as $row) {
        $ind = mb_strpos($row, '<title>');

        if (false !== $ind) {
            $title = strip_tags($row);

            break;
        }
    }

    fclose($name);

    return $title . '<br>';
}
