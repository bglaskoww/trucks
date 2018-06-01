<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Plot
 *
 * @package App
 * @author Borislav Glaskov <glaskow.b@gmail.com>
 */
class Plot extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name', 'crop', 'area'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tractors()
    {
        return $this->belongsToMany(Tractor::class);
    }
}
