<?php
/**
 * Created by PhpStorm.
 * User: rassamakhin
 * Date: 28.11.2017
 * Time: 22:46
 */

namespace etc\data\Hydrator;


use GeneratedHydrator\Configuration;
use GeneratedHydrator\Factory\HydratorFactory;

class Hydrator
{
    /** @var string */
    private $hydrator;

    /** @var string */
    private $classname = "Src\Entity\\";
    /**
     * Hydrator constructor.
     * @param string $entityName
     */
    public function __construct(string $entityName)
    {
        $this->classname = $this->classname.$entityName;
        $this->hydrator = (new Configuration($this->classname))->createFactory()->getHydratorClass();
        $this->hydrator = new $this->hydrator;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function hydrate(array $data)
    {
        return $this->hydrator->hydrate($data, new $this->classname);
    }

    /**
     * @param object $entity
     * @return array
     */
    public function extract($entity):array
    {
        return $this->hydrator->extract($entity);
    }
}