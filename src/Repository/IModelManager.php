<?php
/**
 * Created by PhpStorm.
 * User: Yann
 * Date: 28/02/2018
 * Time: 09:34
 */

namespace App\Repository;


interface IModelManager
{
    public function getAll();

    public function insert($object);

    public function update($object);

    public function delete($index);

    public function get($index);

    public function filterBy($keyAndValues);

    //public function count();
}