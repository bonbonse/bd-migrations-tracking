<?php

namespace Core;

use DB\DB;

class Query
{
    protected string $table;
    private array $where;
    private array $select;
    private array $orderBy;
    private array $insert;

    public static function query()
    {
        return new self();
    }

    public function from(string $table): Query
    {
        $this->table = $table;
        return $this;
    }

    public function select(array $select): Query
    {
        $this->select = $select;
        return $this;
    }
    public function insert($table, array $values): Query
    {
        $db = new DB();

        //$this->insert = $table;

        $sql = 'insert into ' . $table . ' values (';
        $sql .= '0, "' . $values[1]['Field'] . '", "' . $values[2]['Field'] . '");';
        var_dump($sql);

        $db->query($sql);
        return $this;
    }

    public function where(string $column, string $operator, $value): Query
    {
        $isAvailableValueType = is_string($value)
            || is_numeric($value)
            || is_bool($value);

        $availableOperators = [
            '=',
            '<>',
            '<=',
            '>=',
            '<',
            '>',
            '!='
        ];

        $isAvailableOperator = in_array($operator, $availableOperators);

        if ($isAvailableValueType && $isAvailableOperator) {
            $this->where[] = [
                'column' => $column,
                'operator' => $operator,
                'value' => $value
            ];
        }
        return $this;
    }

    public function orderBy(string $column, string $direction = 'ASC'): Query
    {
        $this->orderBy[] = [
            'column' => $column,
            'direction' => strtoupper($direction) === 'ASC' ? 'ASC' : 'DESC'
        ];
        return $this;
    }

    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * @throws Exception
     */
    public function get()
    {
        $sql = $this->getSql();

        $db = new \DB\DB();

        return $db->query($sql);
    }

    private function getSql(): string
    {
        $select = empty($this->select)
            ? '*'
            : $this->select;

        if (is_array($this->select)) {
            $select = implode(', ', $select);
        }

        return $this->getSelectSql()
            . ' FROM ' . $this->table
            . $this->getWhereSql()
            . $this->getOrderBySql();
    }

    private function getSelectSql()
    {
        $select = empty($this->select)
            ? '*'
            : $this->select;

        if (is_array($select)) {
            $select = implode(', ', $select);
        }

        return 'SELECT ' . $select;
    }

    /**
     * @return string
     */
    private function getWhereSql(): string
    {
        if (!empty($this->where)) {
            $sql = '';

            foreach ($this->where as $index => $condition) {
                $sql .= $index === 0 ? 'WHERE ' : ' AND ';

                $column = $condition['column'];
                $operator = $condition['operator'];

                if (is_string($condition['value'])) {
                    $value = "'".$condition['value']."'";
                } elseif (is_numeric($condition['value'])) {
                    $value = $condition['value'];
                } elseif (is_bool($condition['value'])) {
                    $value = $condition['value'] ? '1' : '0';
                }

                if (!empty($value)) {
                    $sql .= $column . ' ' . $operator . ' ' . $value;
                }
            }

            return $sql;
        }

        return '';
    }

    private function getOrderBySql(): string
    {
        return empty($this->orderBy) ? '' : ' ORDER BY ' . implode(', ', $this->orderBy);
    }
}