<?php

namespace Crowley\Repository;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Crowley\Repository\RepositoryInterface;
use Illuminate\Database\Query\Builder;

/**
 * Class AbstractRepository
 *
 * @package Crowley\Repository
 */
abstract class AbstractRepository implements RepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * AbstractRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all($columns = ['*'])
    {
        return $this->model->all($columns);
    }

    public function findById(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function find(array $conditions = [])
    {
        return $this->model->where($conditions)->get();
    }

    public function findOne(array $conditions)
    {
        return $this->model->where($conditions)->first();
    }

    public function findCount(array $conditions)
    {
        return $this->model->where($conditions)->count();
    }

    public function findByIds(array $ids, $columns = ['*'])
    {
        return $this->model->whereIn('id', $ids)->get($columns);
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update(int $id, array $attributes = [])
    {
        return $this->model::find($id)->update($attributes);
    }

    public function destroy($ids)
    {
        return $this->model->destroy($ids);
    }

    public function updateOrCreate(array $attributes, array $values)
    {
        return $this->model->updateOrCreate($attributes, $values);
    }

    public function getPaginate($paginate)
    {
        $model = $this->model::paginate($paginate);

        return empty($model) ? [] : $model;
    }
}
