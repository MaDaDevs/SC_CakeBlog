<div class="articles view large-9 medium-8 columns content">
    <h1>Article dont le titre contient "<?= h($keyword) ?>" : </h1>
<?php foreach($articles as $article): ?>
    <a href="/Projets_MVC_Blog/billet/<?= $article->id ?>"><h3><?= h($article->title) ?></h3></a>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $article->has('user') ? $this->Html->link($article->user->id, ['controller' => 'Users', 'action' => 'view', $article->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($article->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($article->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($article->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($article->modified) ?></td>
        </tr>
    </table>
    <br>
    <br>
    <div class="row">
        <h4><?= __('Content') ?></h4>
    </div>
    <div>
        <?= $this->Text->autoParagraph(($article->body)); ?>
    </div>
<?php endforeach; ?>
<h1>Article dont un tag contient "<?= h($keyword) ?>" : </h1>
<?php foreach($articlesWithTags as $article): ?>
    <a href="/Projets_MVC_Blog/billet/<?= $article->id ?>"><h3><?= h($article->title) ?></h3></a>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $article->has('user') ? $this->Html->link($article->user->id, ['controller' => 'Users', 'action' => 'view', $article->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($article->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($article->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($article->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($article->modified) ?></td>
        </tr>
    </table>
    <br>
    <br>
    <div class="row">
        <h4><?= __('Content') ?></h4>
    </div>
    <div>
        <?= $this->Text->autoParagraph(($article->body)); ?>
    </div>
<?php endforeach; ?>
</div>
