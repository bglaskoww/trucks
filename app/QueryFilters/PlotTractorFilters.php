<?php

namespace App\QueryFilters;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class OrderFilters
 *
 * @package App\QueryFilters
 * @author Borislav Glaskov <glaskow.b@gmail.com>
 */
class PlotTractorFilters extends QueryFilter
{
    /**
     * @param array $plots
     * @return Builder
     */
    public function plot($plots = [])
    {
        return $this->builder->where(function ($query) use ($plots) {
            foreach ($plots as $plot) {
                $query->orWhereHas('plot', function ($query) use ($plot) {
                    $query->where('name', 'like', '%'.$plot.'%');
                });
            }
        });
    }

    /**
     * @param array $crops
     * @return Builder
     */
    public function crop($crops = [])
    {
        return $this->builder->where(function ($query) use ($crops) {
            foreach ($crops as $crop) {
                $query->orWhereHas('plot', function ($query) use ($crop) {
                    $query->where('crop', 'like', '%'.$crop.'%');
                });
            }
        });
    }

    /**
     * @param array $tractors
     * @return Builder
     */
    public function tractor($tractors = [])
    {
        return $this->builder->where(function ($query) use ($tractors) {
            foreach ($tractors as $tractor) {
                $query->orWhereHas('tractor', function ($query) use ($tractor) {
                    $query->where('name', 'like', '%'.$tractor.'%');
                });
            }
        });
    }

    /**
     * @param array $dates
     * @return Builder
     */
    public function fromDate($dates = [])
    {
        $date = array_shift($dates);
        $date = Carbon::createFromFormat('m/d/Y', $date)->format('Y-m-d');

        return $this->builder->where('plowing_date', '>=', $date);
    }

    /**
     * @param array $dates
     * @return Builder
     */
    public function toDate($dates = [])
    {
        $date = array_shift($dates);
        $date = Carbon::createFromFormat('m/d/Y', $date)->format('Y-m-d');

        return $this->builder->where('plowing_date', '<=', $date);
    }
}
