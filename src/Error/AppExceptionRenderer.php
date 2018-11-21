<?php
/**
 * Created by PhpStorm.
 * User: Inspiron7559 User
 * Date: 2018/9/10
 * Time: 17:57
 */

namespace App\Error;


use Cake\Error\ExceptionRenderer;
class AppExceptionRenderer extends ExceptionRenderer
{
    public function notFound($error){
        $this->controller->redirect(array('controller' => 'error', 'action' => 'error400'));
    }

}