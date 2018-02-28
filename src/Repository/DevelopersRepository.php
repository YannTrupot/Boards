<?php
/**
 * Created by PhpStorm.
 * User: Yann
 * Date: 28/02/2018
 * Time: 09:37
 */

namespace App\Repository;


use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use App\Entity\Developer;
use Symfony\Bridge\Doctrine\RegistryInterface;

class DevelopersRepository extends ServiceEntityRepository implements IModelManager
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Developer::class);
    }

    public function getAll()
    {
        return $this->findAll();
    }

    public function insert($object)
    {
        $this->_em->persist($object);
        $this->_em->flush();
    }

    public function update($dev)
    {
        $this->_em->persist($dev);
        $this->_em->flush();
    }

    public function delete($index)
    {
        $obj = $this->_em->find(Developer::class,$index);
        $this->_em->remove($obj);
    }

    public function get($index)
    {
        return $this->_em->find(Developer::class, $index);
    }

    public function filterBy($keyAndValues)
    {
        // TODO: Implement filterBy() method.
    }



}