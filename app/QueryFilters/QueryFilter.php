<?php

namespace App\QueryFilters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

/**
 * Class QueryFilter
 *
 * @package App\QueryFilters
 * @author Borislav Glaskov <glaskow.b@gmail.com>
 */
abstract class QueryFilter
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Builder
     */
    protected $builder;

    /**
     * @var array
     */
    protected $forbiddenFilters = [
        '__construct',
        'apply',
        'filters',
    ];

    /**
     * QueryFilter constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Apply all query filters
     *
     * @param Builder $builder
     * @return Builder
     */
    public function apply(Builder $builder)
    {
        $this->builder = $builder;

        foreach ($this->filters() as $name => $value) {
            if (!method_exists($this, camel_case($name))) {
                continue;
            }

            if (!is_array($value)) {
                $value = [$value];
            }

            $values = array_filter($value, function ($value) {
                return strlen($value);
            });

            if ($values) {
                call_user_func_array([$this, camel_case($name)], [$values]);
            }
        }

        return $this->builder;
    }

    /**
     * Get all filter methods from request
     *
     * @return array
     */
    public function filters()
    {
        return array_diff_key(
            $this->request->all(),
            array_flip($this->forbiddenFilters)
        );
    }
}
