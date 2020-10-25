<?php

include '../../mainfile.php';
include 'include/functions.php';

if ('' !== $QUERY_STRING) {
    //обращение к конкретной странице

    if (file_exists('content/' . $QUERY_STRING)) {
        $htmlfilename = XOOPS_URL . '/modules/c-html/content/' . $QUERY_STRING;

        require XOOPS_ROOT_PATH . '/header.php';

        echo('<center><b>' . filetitle('content/' . $QUERY_STRING) . '</b></center><br>');

        include $htmlfilename;
    } else {
        require XOOPS_ROOT_PATH . '/header.php';

        echo _MD_ERROR;
    }

    //конец
} else {
    //ecли запрос к корню модуля - создаём листинг всех статей

    require XOOPS_ROOT_PATH . '/header.php';

    echo('<center><b>' . _MD_LIST . '</b></center><br>');

    //открываем корень модуля

    $listid = opendir(XOOPS_ROOT_PATH . '/modules/c-html/content');

    //читаем файлы 1

    while (false !== ($listitem = readdir($listid))) {
        //если файл - то выводим

        if (mb_strpos($listitem, '.htm')) {
            echo("<a href=?$listitem target=_top>" . filetitle('content/' . $listitem) . '</a>');
        }

        //если поддиректория 2

        if (false === mb_strpos($listitem, '.')) {
            //проверяем есть ли алиас для нёё

            $result3 = ($xoopsDB->query('SELECT id, dir, name FROM ' . $xoopsDB->prefix('chtml_aliases') . " WHERE dir='$listitem'"));

            if (list($id, $dir, $name) = $xoopsDB->fetchRow($result3)) {
                if ('' != $name) {
                    $namedir = $name;
                } else {
                    $namedir = $listitem;
                }
            } else {
                $namedir = $listitem;
            }

            echo('<br><u><b>' . $namedir . '</b></u><br>');

            $listsubid = opendir(XOOPS_ROOT_PATH . '/modules/c-html/content/' . $listitem . '/');

            while (false !== ($listsubitem = readdir($listsubid))) {
                if (mb_strpos($listsubitem, '.html')) {
                    echo("<a href=?$listitem/$listsubitem target=_top>" . filetitle('content/' . $listitem . '/' . $listsubitem) . '</a>');
                }
            }

            chdir(XOOPS_ROOT_PATH . '/modules/c-html');

            echo('/<br><br>');

            //2
        }

        // 1
    }

    //конец
}

require XOOPS_ROOT_PATH . '/footer.php';
