<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 24.11.2017
 * Time: 16:19
 */

namespace etc\data\Repositories\Adapter;

use etc\data\Entity\EntityInterface;

/**
 * Interface RepositoriesInterface
 *
 * @package etc\data\Repositories
 */
interface AdapterInterface
{
    public function setEntityName(string $entityName);

    public function getAll();

    public function getById(int $id);

    public function find(array $criteria, string $operator = null);

    public function insert(EntityInterface $entity);

    public function update(EntityInterface $entity);

    public function delete(EntityInterface $entity);

    public function getRawConnection();

    public function entityToArray(EntityInterface $entity);
}