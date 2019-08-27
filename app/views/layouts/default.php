<!doctype html>
<html lang="en">
<head>
    <?php echo $this->getMeta(); ?>
</head>
<body>
<p>Шаблон DEFAULT</p>
<?php echo $content; ?>
<br>
<br>
<br>
<?php
$logs = \R::getDatabaseAdapter()->getDatabase()->getLogger();

debug($logs->grep('SELECT'));
?>
</body>
</html>