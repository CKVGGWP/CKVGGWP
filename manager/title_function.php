<?php

function getTitle()
{

    $id = isset($_GET['id']) ? $_GET['id'] : '';

    $title = '';

    if (!empty($id)) :
        $title .= $id;
    else :
        $title .= 'Portfolio Website';
    endif;

    return $title;
}
