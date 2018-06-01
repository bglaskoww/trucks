<?php

namespace App;

use App\QueryFilters\Filterable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PlotTractor
 *
 * @package App
 * @author Borislav Glaskov <glaskow.b@gmail.com>
 */
class PlotTractor extends Model
{
    use Filterable;

    /**
     * @var string
     */
    protected $table = 'plot_tractor';

    /**
     * @var array
     */
    protected $fillable = [
      'plot_id', 'tractor_id', 'area', 'plowing_date'
    ];

    /**
     * @param $date
     */
    public function setPlowingDateAttribute($date)
    {
        $date = Carbon::createFromFormat('m/d/Y', $date);

        $this->attributes['plowing_date'] = $date->format('Y-m-d');
    }

    /**
     * @param $date
     * @return string
     */
    public function getPlowingDateAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d', $date)->format('m/d/Y');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tractor()
    {
        return $this->belongsTo(Tractor::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plot()
    {
        return $this->belongsTo(Plot::class);
    }
}
