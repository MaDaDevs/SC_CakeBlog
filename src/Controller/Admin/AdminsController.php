<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 *
 * @method \App\Model\Entity\Article[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdminsController extends AppController
{
    public function index()
    {
        $controller = new ArticlesController();
        $users = $controller->Articles->Users->find('all')
                                            ->order(['id' => 'DESC'])
                                            ->limit(10);
        $commentaires = $controller->Articles->Commentaires->find('all')
                                            ->order(['id' => 'DESC'])
                                            ->limit(10);
        $articles = $controller->Articles->find('all')
                                            ->order(['id' => 'DESC'])
                                            ->limit(10);
        $this->set(compact('users','commentaires','articles'));
    }

    public function initialize()
    {
        parent::initialize();
    }
}
