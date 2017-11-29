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
    public function getAll();

    public function getById(int $id);

    public function find(array $critera);

    public function insert(EntityInterface $entity);

    public function update(EntityInterface $entity);

    public function delete(EntityInterface $entity);
}