<?php

declare(strict_types=1);
/**
 * This file is part of gcode.
 *
 * @author   phpsarc
 * @link     https://github.com/PHP2C/gcode
 * @email    phpsarc@gmail.com
 */
namespace App\Kernel\Model;

use Closure;

class GMdoel extends \App\Model\Model
{
    public function createOne(array $data)
    {
        return $this->insert($data);
    }

    public function getOneByWhere(array $where, array $columns, array $options)
    {
        return $this->contributeWhere($where)->contributeOption($options)->first($columns);
    }

    public function getAllByWhere(array $where, array $columns, array $options)
    {
        return $this->contributeWhere($where)->contributeOption($options)->get($columns);
    }

    public function updateByWhere(array $where, array $data)
    {
        return $this->contributeWhere($where)->update($data);
    }

    public function deleteByWhere(array $where)
    {
        return $this->contributeWhere($where)->delete();
    }

    private function contributeWhere(array $where)
    {
        $condition = ['=', '!=', '<', '<=', '>', '>=', 'LIKE', 'NOT LIKE', '<>'];
        $model = new static();
        if (empty($where)) {
            return $model;
        }
        foreach ($where as $v) {
            if ($v[0] instanceof Closure) {
                $model = $model->where($v);
            }

            $model = match ($v[1]) {
                in_array($v[1], $condition) => $model->where($v[0], $v[1], $v[2]),
                'IN' => $model->whereIn($v[0], $v[2]),
                'NOT IN' => $model->whereNotIn($v[0], $v[2]),
                'RAW' => $model->whereRaw($v[0], $v[2]),
                'BETWEEN' => $model->whereBetween($v[0], $v[2]),
                'NULL' => $model->whereNull($v[0], $v[2]),
                'NOT NULL' => $model->whereNotNull($v[0], $v[2])
            };
        }
        return $model;
    }

    private function contributeOption(array $option)
    {
        $model = new static();
        if (empty($option)) {
            return $model;
        }
        foreach ($option as $k => $v) {
            $model = match ($k) {
                'orderByRaw' => $model->orderByRaw($v),
                'selectRaw' => $model->selectRaw($v),
                'with' => $model->with($v),
                'limit' => $model->limit($v),
                'perLimit' => $model->paginate($v),
            };
        }
        return $model;
    }
}
