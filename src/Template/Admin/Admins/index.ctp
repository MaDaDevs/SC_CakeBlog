<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Birthdate</th>
                <th scope="col">Password</th>
                <th scope="col">Name</th>
                <th scope="col">Lastname</th>
                <th scope="col">Role</th>
                <th scope="col">Created</th>
                <th scope="col">Modified</th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->username) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h($user->birthdate) ?></td>
                    <td><?= h($user->password) ?></td>
                    <td><?= h($user->name) ?></td>
                    <td><?= h($user->lastname) ?></td>
                    <td><?= h($user->role) ?></td>
                    <td><?= h($user->created) ?></td>
                    <td><?= h($user->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'users', 'action' => 'view', $user->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'users', 'action' => 'edit', $user->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'users', 'action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="articles index large-9 medium-8 columns content">
    <h3><?= __('Articles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $article): ?>
            <tr>
                <td><?= h($article->title) ?></td>
                <td><?= h($article->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Commenter'), ['controller' => 'articles', 'action' => 'view', $article->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'articles', 'action' => 'edit', $article->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'articles', 'action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
</div>
<br>
<hr>
<div class="commentaires index large-9 medium-8 columns content">
    <h3><?= __('Commentaires') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Created</th>
                <th scope="col">Modified</th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($commentaires as $commentaire): ?>
            <tr>
                <td><?= $this->Number->format($commentaire->id) ?></td>
                <td><?= h($commentaire->created) ?></td>
                <td><?= h($commentaire->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'commentaires', 'action' => 'view', $commentaire->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'commentaires', 'action' => 'edit', $commentaire->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $commentaire->id], ['confirm' => __('Are you sure you want to delete # {0}?', $commentaire->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
