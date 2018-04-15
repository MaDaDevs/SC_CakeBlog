<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class SearchController extends AppController
{
    public function index($keyword = null)
    {
        if($keyword != null)
        {
            $keyword = htmlspecialchars($keyword);
        }
        $articlesController = new ArticlesController();
        //$articles = $articlesController->Articles->find('all', ['conditions' => ['Articles.title LIKE' => '%'. $keyword .'%']]);
        $allArticles = $articlesController->Articles->find('all');
        $articles = array();
        foreach($allArticles as $article)
        {
            if(strpos($article->body, $keyword) == true)
            {
                $articles[] = $article;
            }
        }

        $articleTagsController = new ArticlesTagsController();
        $tagsController = new TagsController();
        $tags = $tagsController->Tags->find('all');
        $relations = array();
        foreach($tags as $tag)
        {
            if(levenshtein($tag->title, $keyword) <= 2)
            {
                $AllLinks = $articleTagsController->ArticlesTags->find('all', ['conditions' => ['ArticlesTags.tag_id = ' . $tag->id]]);
                foreach($AllLinks as $link)
                {
                    $relations[] = $link->article_id;
                }
            }
        }

        $articlesWithTags = array();
        foreach($relations as $id)
        {
            foreach($allArticles as $article)
            {
                if($article->id == $id)
                {
                    $articlesWithTags[] = $article;
                }
            }
        }
        $this->set(compact('articles','articlesWithTags','keyword'));
    }

    public function tri()
    {
        if(isset($_POST['search']))
        {
            return $this->redirect($this->Auth->redirectUrl("/search//" . $_POST['search']));
        }
        else
        {
            return $this->redirect($this->Auth->redirectUrl("/"));
        }
    }
}
