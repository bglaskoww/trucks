<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Tractor
 *
 * @package App
 * @author Borislav Glaskov <glaskow.b@gmail.com>
 */
class Tractor extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function plots()
    {
        return $this->belongsToMany(Plot::class);
    }
}
