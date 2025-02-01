<?php 
var_dump($recentUsers)
?>

<div>
    <h1>Whoop!</h1>
    <?= partial('_post', ['user' => $recentUsers]) ?> 
</div>