<?php

namespace Pcplus\LaraPermissionPakg\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model {

    private $table = 'permissions';

    private $fillable = [
        'name'
    ];

    public function roles() : BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'permission_has_role', 'permisson_id', 'role_id');
    }

    public function users() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_has_permission', 'permission_id', 'user_id');
    }

    public static function findByName($permissionName)
    {
        return self::query()->where('name', $permissionName)->first();
    }

}
