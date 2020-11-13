<?php

namespace Crowley\Repository;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * Interface BaseRepositoryInterface
 *
 * @package App\Repositories
 */
interface RepositoryInterface
{

    /**
     * Find all existing record
     *
     * @return Model
     */
    public function all();

    /**
     * Find a specific record by its ID
     *
     * @param int $id
     *
     * @return Model
     */
    public function findById(int $id);

    /**
     * Find all records that match a given conditions
     *
     * @param array $conditions
     *
     * @return Model
     */
    public function find(array $conditions = []);

    /**
     * Find a specific record that matches a given conditions
     *
     * @param array $conditions
     *
     * @return Model
     */
    public function findOne(array $conditions);

    /**
     * Find amount record that matches a given conditions
     *
     * @param  array $conditions
     *
     * @return void
     *
     * @throws Exception
     */
    public function findCount(array $conditions);

    /**
     * Find  record by list of id
     *
     * @param  array $ids
     *
     * @return Model
     */
    public function findByIds(array $ids);

    /**
     * Create a record
     *
     * @param array $attributes
     *
     * @return Model
     */
    public function create(array $attributes);

    /**
     * Update a record
     *
     * @param int $id
     * @param array $attributes
     *
     * @return bool
     */
    public function update(int $id, array $attributes = []);

    /**
     * Delete array record from the database.
     *
     * @param array|int $ids
     *
     * @return bool
     *
     * @throws Exception
     */
    public function destroy($ids);

    /**
     * create new record or update existing record
     *
     * @param  array $attributes
     *
     * @return void
     *
     * @throws Exception
     */
    public function updateOrCreate(array $attributes, array $values);

    /**
     * get latest by column
     *
     * @param  string $attributes
     *
     * @return void
     *
     * @throws Exception
     */
    public function getLatest($column);
}
