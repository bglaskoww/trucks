<?php

namespace App\QueryFilters;

/**
 * Class Filterable
 *
 * @package App\QueryFilters
 * @author Borislav Glaskov <glaskow.b@gmail.com>
 */
trait Filterable
{
    /**
     * Scope for applying model filters
     *
     * @param $query
     * @param QueryFilter $filters
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter($query, QueryFilter $filters)
    {
        return $filters->apply($query);
    }
}