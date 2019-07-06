<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Plan extends Model
{
    /**
     * The attributes to be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'teams' => 'boolean',
    ];

    /**
     * Scope by team plans.
     *
     * @param Builder $builder
     * @return void
     */
    public function scopeTeams(Builder $builder)
    {
        return $builder->where('teams', true);
    }
}
