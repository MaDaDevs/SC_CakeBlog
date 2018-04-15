<?php
use Cake\Utility\Text;
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>
<?php if(isset($this->request->session()->read('Auth')['User'])): ?>
    <nav class="large-3 medium-4 columns" id="actions-sidebar">
        <ul class="side-nav">
            <li class="heading"><?= __('Actions') ?></li>
            <li><?= $this->Html->link(__('List Articles'), ['action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('List Commentaires'), ['controller' => 'Commentaires', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('New Commentaire'), ['controller' => 'Commentaires', 'action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
        </ul>
    </nav>
<?php else: ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Commentaires'), ['controller' => 'Commentaires', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
    </ul>
</nav>
<?php endif; ?>
<div class="articles view large-9 medium-8 columns content">
    <h3><?= h($article->title) ?></h3>
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
        <?= Text::highlight($article->body, $keyword, ['format' => '<span class="highlight">\1</span>', 'html' => true]); ?>
    </div>
    <hr>
    <form method="post" accept-charset="utf-8" action="/Projets_MVC_Blog/commentaires/add">
        <div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>
        <fieldset>
            <legend>Add Commentaire</legend>
            <input type="hidden" name="article_id" id="article-id" value="<?= $id ?>">
            <div class="input textarea required">
                <label for="body">Comment</label>
                <input type="text" name="body" required="required" id="body" rows="5">
            </div>
        </fieldset>
    <button type="submit">Submit</button>
    </form>
    <hr>
    <br>
    <div class="related">
        <h4><?= __('Related Commentaires') ?></h4>
        <?php if (!empty($article->commentaires)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Article Id') ?></th>
                <th scope="col"><?= __('Body') ?></th>
                <th scope="col"><?= __('Published') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($article->commentaires as $commentaires): ?>
            <tr>
                <td><?= h($commentaires->id) ?></td>
                <td><?= h($commentaires->user_id) ?></td>
                <td><?= h($commentaires->article_id) ?></td>
                <td><?= h($commentaires->body) ?></td>
                <td><?= h($commentaires->published) ?></td>
                <td><?= h($commentaires->created) ?></td>
                <td><?= h($commentaires->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Commentaires', 'action' => 'view', $commentaires->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Commentaires', 'action' => 'edit', $commentaires->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Commentaires', 'action' => 'delete', $commentaires->id], ['confirm' => __('Are you sure you want to delete # {0}?', $commentaires->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
