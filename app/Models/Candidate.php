<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Candidate extends Model
{
    /** @use HasFactory<\Database\Factories\CandidateFactory> */
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'zip',
        'elected_position',
        'election_district',
        'election_cycle',
        'source',
        'note',
        'picture',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'string',
        'verified_by' => 'string',
        'updated_by' => 'string',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array<string>
     */
    protected $hidden = [
        'verified_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    /**
     * Set name on
     */
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->name = $model->first_name.' '.$model->last_name;
            $model->slug = Str::slug($model->name);
        });
    }
}
