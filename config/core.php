<?php
/**
 * Created by PhpStorm.
 * User: Inspiron7559 User
 * Date: 2018/9/10
 * Time: 15:15
 */
\Cake\Core\Configure::write('Exception', array(
    'handler' => 'ErrorHandler::handlerException',
    'renderer' => 'AppExceptionRenderer',
    'log' => true
));