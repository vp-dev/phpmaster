<!doctype html>
<html>
    <head>
        <title>Произошла ошибка!</title>
    </head>
    <body>
        <div align="center">
            <h1>ОШИБКА</h1>
        </div>
        <div>
            <p>
                <b><?= $error_r['errno']; ?></b><br><br>
                <span><b>В файле: </b></span> <?=  $error_r['errfile']; ?><br><br>
                <span><b>В строке: </b></span><?= $error_r['errline']; ?><br><br>
                <b>=========></b><?= $error_r['errstr']; ?><br><br>
            </p>
        </div>
    </body>
</html>