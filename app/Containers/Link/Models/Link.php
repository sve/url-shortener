<?php

namespace App\Containers\Link\Models;

use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Containers\Link\Models\Link
 *
 * @mixin \Eloquent
 * @property-read \App\Containers\User\Models\User $user
 * @property int $id
 * @property string $url
 * @property string $uid
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Link\Models\Link whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Link\Models\Link whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Link\Models\Link whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Link\Models\Link whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Link\Models\Link whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Link\Models\Link whereUrl($value)
 */
class Link extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'links';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid',
        'url',
    ];

    /**
     * @var array
     */
    protected $casts = [
    ];

    /**
     * The dates attributes.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne|User[]
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
