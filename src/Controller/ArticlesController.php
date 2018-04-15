<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 *
 * @method \App\Model\Entity\Article[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Commentaires']
        ];

        $articles = $this->paginate($this->Articles);
        $this->set(compact('articles'));
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $check = false;
        $articleList = $this->Articles->find('list', ['conditions' => 'id = ' . $id]);
        foreach($articleList as $content)
        {
            if(is_string($content))
            {
                $check = true;
                $article = $this->Articles->get($id, [
                    'contain' => ['Users', 'Tags', 'Commentaires']
                ]);
                $users = $this->Articles->Users->find('all', ['limit' => 200, 'fields' => ['id', 'username']]);
                $this->set('id', $id);
                $this->set('article', $article);
                $this->set('users',$users);
            }
        }
        if($check === false)
        {
            return $this->redirect($this->Auth->redirectUrl('/articles'));
        }
    }

    public function hightlighted($id = null, $keyword)
    {
        $article = $this->Articles->get($id, [
            'contain' => ['Users', 'Tags', 'Commentaires']
        ]);


        $users = $this->Articles->Users->find('all', ['limit' => 200, 'fields' => ['id', 'username']]);
        $this->set('id', $id);
        $this->set('article', $article);
        $this->set('users',$users);
        $this->set(compact('keyword'));
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            $article->user_id = $this->Auth->user('id');
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $users = $this->Articles->Users->find('list', ['limit' => 200]);
        $tags = $this->Articles->Tags->find('list', ['limit' => 200]);
        $this->set(compact('article', 'users', 'tags'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $articleList = $this->Articles->find('list', ['conditions' => 'id = ' . $id]);
        $check = false;
        $articleList = $this->Articles->find('list', ['conditions' => 'id = ' . $id]);
        foreach($articleList as $content)
        {
            if(is_string($content))
            {
                $check = true;
                $article = $this->Articles->get($id, [
                    'contain' => ['Tags']
                ]);
                if ($this->request->is(['patch', 'post', 'put'])) {
                    $article = $this->Articles->patchEntity($article, $this->request->getData());
                    if ($this->Articles->save($article)) {
                        $this->Flash->success(__('The article has been saved.'));

                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->error(__('The article could not be saved. Please, try again.'));
                }
                $users = $this->Articles->Users->find('list', ['limit' => 200]);
                $tags = $this->Articles->Tags->find('list', ['limit' => 200]);
                $this->set(compact('article', 'users', 'tags'));
            }
        }
        if($check === false)
        {
            return $this->redirect($this->Auth->redirectUrl('/articles'));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user) {

        // Tous les users inscrits peuvent ajouter les posts
        $action = $this->request->getParam('action');
        if (in_array($action, ['add'])) {
            if($user['role'] == 'Blogueur')
            {
                return true;
            }
        }

        // Le propriétaire du post peut l'éditer et le supprimer
        if (in_array($action, array('edit', 'delete'))) {
            $postId = (int) $this->request->params['pass'][0];
            $articleList = $this->Articles->find('list', ['conditions' => 'id = ' . $postId]);
            foreach($articleList as $content)
            {
                if(is_string($content))
                {
                    $article = $this->Articles->get($postId);
                    if ($article->user_id == $user['id']) {
                        return true;
                    }
                }
            }
        }

        return parent::isAuthorized($user);
    }

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['index']);
    }

}
