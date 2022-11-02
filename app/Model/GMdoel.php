<?php

declare(strict_types=1);
/**
 * This file is part of gcode.
 *
 * @author   phpsarc
 * @link     https://github.com/PHP2C/gcode
 * @email    phpsarc@gmail.com
 */
namespace App\Model;

class GMdoel extends Model
{
    public function createOne(array $data): bool
    {
        return $this->insert($data);
    }

    public function getByWhere(array $where, array $options = [], array $columns = ['*']): array
    {
        $data = $this->contributeWhere($where, $options)->get($columns);
        $data || $data = collect([]);
        return $data->toArray();
    }

    public function paginateByWhere(array $where, array $options = [], array $columns = ['*']): array
    {
        $model = $this->contributeWhere($where, $options);
        $perPage = isset($options['PER']) ? (int) $options['PER'] : 15;
        $pageName = $options['pageName'] ?? 'page';
        $page = isset($options['PAGE']) ? (int) $options['PAGE'] : null;

        $data = $model->paginate($perPage, $columns, $pageName, $page);
        $data || $data = collect([]);
        return $data->toArray();
    }

    public function updateByWhere(array $where, array $data)
    {
        return $this->contributeWhere($where)->update($data);
    }

    public function deleteByWhere(array $where)
    {
        return $this->contributeWhere($where)->delete();
    }

    private function contributeWhere(array $where = [], array $option = [])
    {
        $model = new static();
        if (! empty($where)) {
            foreach ($where as $v) {
                if ($v[0] instanceof \Closure) {
                    $model = $model->where($v);
                }

                $model = match (strtoupper($v[1])) {
                    '=', '!=', '<', '<=', '>', '>=', 'LIKE', 'NOT LIKE', '<>' => $model->where($v[0], $v[1], $v[2]),
                    'IN' => $model->whereIn($v[0], $v[2]),
                    'NOT IN' => $model->whereNotIn($v[0], $v[2]),
                    'RAW' => $model->whereRaw($v[0], $v[2]),
                    'BETWEEN' => $model->whereBetween($v[0], $v[2]),
                    'NULL' => $model->whereNull($v[0], $v[2]),
                    'NOT NULL' => $model->whereNotNull($v[0], $v[2]),
                    default => $model
                };
            }
        }

        if (! empty($option)) {
            foreach ($option as $k => $v) {
                $model = match (strtoupper($k)) {
                    'ORDERBY' => $model->orderByRaw($v),
                    'SELECTRAW' => $model->selectRaw($v),
                    'WITH' => $model->with($v),
                    'LIMIT' => $model->limit($v),
                    default => $model
                };
            }
        }

        return $model;
    }
}
