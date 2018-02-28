<?php
/**
 * Created by PhpStorm.
 * User: Yann
 * Date: 28/02/2018
 * Time: 09:29
 */

namespace App\Services\semantic;


use Ajax\php\symfony\JquerySemantic;

abstract class Gui extends JquerySemantic
{
    public function showMessage($content, $type='info',$icon='info'){

    }

    public function showConfMessage($content,$type,$url,$responseElement){

    }

    public abstract function getForm($instance);

    public abstract function getTable($arrayInstance);

}