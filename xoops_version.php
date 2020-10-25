<?php

$modversion['name'] = _MI_CHTML_NAME;
$modversion['version'] = 1.01;
$modversion['description'] = _MI_CHTML_DESC;
$modversion['credits'] = 'Проект AlCol Studio - www.alcolstudio.net и www.xoops2.ru!';
$modversion['author'] = 'Alexxus';
$modversion['help'] = '';
$modversion['license'] = 'GNU General Public License (GPL)';
$modversion['official'] = 0;
$modversion['image'] = 'images/c-html_logo.png';
$modversion['dirname'] = 'c-html';

//MySQL
$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';

// Tables created by sql file (without prefix!)
$modversion['tables'][0] = 'chtml_aliases';

// Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu'] = 'admin/menu.php';
// Menu
$modversion['hasMain'] = 1;
