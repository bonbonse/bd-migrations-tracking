<?php

namespace Core;

class Query
{
    protected string $table;
    private array $where;
    private array $select;
    private array $orderBy;

    public static function query()
    {
        return new self();
    }

    public function from(string $table): void
    {
        $this->table = $table;
    }

    public function select(array $select): void
    {
        $this->select = $select;
    }

    public function where(string $column, string $operator, $value): void
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

        $isAvailableOperator = in_array('operator', $availableOperators);

        if ($isAvailableValueType && $isAvailableOperator) {
            $this->where[] = [
                'column' => $column,
                'operator' => $operator,
                'value' => $value
            ];
        }
    }

    public function orderBy(string $column, string $direction = 'ASC'): void
    {
        $this->orderBy[] = [
            'column' => $column,
            'direction' => strtoupper($direction) === 'ASC' ? 'ASC' : 'DESC'
        ];
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