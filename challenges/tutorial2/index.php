<?php
ini_set('display_errors', true);
error_reporting(E_ALL);
require "../_util.php";
?>
<html>
<head>
    <title></title>
</head>
<body>
    <h1>m1z0r3 m1z0r3 m1z0r3</h1>
    <p>Find the flag from 'flag' table.</p>
    <form action="index.php">
        <input type="text" name="query" size="50" placeholder="query"
               value="<?= (isset($_REQUEST['query']) && $_REQUEST['query'] !== '') ? $_REQUEST['query'] : '' ?>">
    </form>
    <?php
    if (isset($_REQUEST['query']))
    {
        $db = new SQLite3('db.sqlite');
        echo query2table($db, $_REQUEST['query']);
    } ?>
</body>
</html>