<?php

namespace Pcplus\LaraPermissionPakg\models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class permission extends Model {

    protected $table = 'permissions';

    protected $fillable = [
        'name'
    ];

    public function roles() : BelongsToMany
    {
        return $this->belongsToMany(role::class, 'permission_has_role', 'permisson_id', 'role_id');
    }

    public function users() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_has_permission', 'permission_id', 'user_id');
    }

    public static function findByName($permissionName)
    {
        return self::query()->where('name', $permissionName)->first();
    }

    public function getRoles()
    {
        return $this->roles()->get()->pluck('name');
    }

}
