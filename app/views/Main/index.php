<h1>Hello, world!</h1>
<?php echo $name; ?><br>
<?php echo $age; ?>
<?php var_dump($names); ?>
<?php foreach ($posts as $post): ?>
    <h3><?=$post->title; ?></h3>
<?php endforeach; ?>
