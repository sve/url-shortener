<?php

namespace App\Containers\User\Models;

use App\Containers\Authorization\Traits\AuthorizationTrait;
use App\Ship\Parents\Models\UserModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Containers\Link\Models\Link;

/**
 * Class User.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 * @property int $id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $password
 * @property bool $confirmed
 * @property string|null $gender
 * @property string|null $birth
 * @property string|null $device
 * @property string|null $platform
 * @property bool $is_client
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Containers\Link\Models\Link[] $links
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Containers\Authorization\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Containers\Authorization\Models\Role[] $roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ship\Parents\Models\UserModel permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ship\Parents\Models\UserModel role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereConfirmed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereDevice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereIsClient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends UserModel
{

    use AuthorizationTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'device',
        'platform',
        'gender',
        'birth',
        'social_provider',
        'social_token',
        'social_refresh_token',
        'social_expires_in',
        'social_token_secret',
        'social_id',
        'social_avatar',
        'social_avatar_original',
        'social_nickname',
        'confirmed',
        'is_client',
    ];

    protected $casts = [
        'is_client' => 'boolean',
        'confirmed' => 'boolean',
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
        'password',
        'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|Link[]
     */
    public function links(): HasMany
    {
        return $this->hasMany(Link::class);
    }
}
