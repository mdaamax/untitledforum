<a href="/site/create-topic?subsection_id=<?=$subsection_id?>"> Создать тему</a>
<div class="site-index">
    <?php foreach ($Topic as $Onetopic): ?>
        <div><a href="/site/message?topic_id=<?= $Onetopic-> id ?>"> <?= $Onetopic->name ?> </a></div>
    <?php endforeach; ?>
</div>