<?php

require dirname(__DIR__, 3) . '/include/cp_header.php';
if (file_exists('../language/' . $xoopsConfig['language'] . '/main.php')) {
    include '../language/' . $xoopsConfig['language'] . '/main.php';
} else {
    include '../language/english/main.php';
}
xoops_cp_header();
if (isset($_POST)) {
    foreach ($_POST as $k => $v) {
        $postdir = $k;

        $postname = $v;

        $result = $xoopsDB->query('SELECT * FROM ' . $xoopsDB->prefix('chtml_aliases') . " where dir='$postdir'");

        if (list($id, $dir, $name) = $xoopsDB->fetchRow($result)) {
            if ($name != $postname) {
                $xoopsDB->query('update ' . $xoopsDB->prefix('chtml_aliases') . " set name='$postname' where id=$id");
            }
        } else {
            $xoopsDB->query('INSERT INTO ' . $xoopsDB->prefix('chtml_aliases') . " (dir, name) VALUES ('$postdir', '$postname')");
        }
    }
}
?>
<form action="index.php" method="post">
    <table border="0" cellpadding="0" cellspacing="3" width="100%">
        <tr>
            <td width="50%"><i><u><?php echo _MD_DIRECTORY; ?></u></i></td>
            <td width="50%"><i><u><?php echo _MD_NAME; ?></u></i></td>
        </tr>
        <?php
        //открываем корень модуля
        $listid = opendir(XOOPS_ROOT_PATH . '/modules/c-html/content');
        //читаем файлы 1
        while (false !== ($listitem = readdir($listid))) {
            //если поддиректория 2

            if (false === mb_strpos($listitem, '.')) {
                $result2 = ($xoopsDB->query('SELECT id, dir, name FROM ' . $xoopsDB->prefix('chtml_aliases') . " WHERE dir='$listitem'"));

                if (list($id, $dir, $name) = $xoopsDB->fetchRow($result2)) {
                } else {
                    $name = '';
                } ?>
                <tr>
                    <td width="50%"><b><?php echo($listitem); ?></b></td>
                    <td width="50%"><input type="text" name="<?php echo($listitem); ?>" value="<?php echo($name); ?>"></td>
                </tr>
                <?php
                //2
            }

            // 1
        }
        ?>
    </table>
    <center><input type="submit" value=<?php echo _MD_SUBMIT; ?>>
        <center>
</form>
<?php
xoops_cp_footer();
?>
