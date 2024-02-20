<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
//var_dump($section);
?>
<div class="site-index">
    <a href="/site/create-section"> Создать раздел</a>
    <?php foreach($section as $onesection): ?>
    <div> <a href="/site/subsection?section_id=<?= $onesection -> id ?>"> <?=  $onesection -> name?> </a> </div>
    <?php endforeach;?>

</div>
