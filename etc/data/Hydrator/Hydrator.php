<?php
/**
 * Created by PhpStorm.
 * User: rassamakhin
 * Date: 28.11.2017
 * Time: 22:46
 */

namespace etc\data\Hydrator;


use GeneratedHydrator\Configuration;

class Hydrator
{
    private $hydrator;

    /** @var string */
    private $classname = "Src\Entity\\";

    /**
     * Hydrator constructor.
     *
     * @param string $entityName
     */
    public function __construct(string $entityName)
    {
        $this->classname = $this->classname.$entityName;
        $this->hydrator  = (new Configuration($this->classname))->createFactory()->getHydratorClass();
        $this->hydrator  = new $this->hydrator;
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function hydrate(array $data = null)
    {
        $result = null;

        if($data) {
            if (isset($data[0]) && \is_array($data[0])) {
                foreach ($data as $array) {
                    $result[] = $this->hydrator->hydrate($array, new $this->classname);
                }
            } else {
                $result = $this->hydrator->hydrate($data, new $this->classname);
            }
        }

        return $result;
    }

    /**
     * @param object $entity
     *
     * @return array
     */
    public function extract($entity) : array
    {
        return $this->hydrator->extract($entity);
    }
}