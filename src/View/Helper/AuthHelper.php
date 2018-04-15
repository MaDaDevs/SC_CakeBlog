<?php
/**
 * AuthHelper: Allow access to auth vars in view
 * @usage $this->Auth->get('Admin.id'), $this->Auth->get('User.email')
 */
namespace App\View\Helper;
use Cake\View\Helper;
use Cake\Controller\Component;
class AuthHelper extends Helper
{
    /**
     * The current user, used for stateless authentication when
     * sessions are not available.
     *
     * @var array
     */
    protected $_user = null;
    /**
     * Initialize current user from session data
     * before rendering view.
     *
     * @return void
     */
}
