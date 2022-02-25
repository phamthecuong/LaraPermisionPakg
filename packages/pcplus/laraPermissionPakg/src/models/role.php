<?php

namespace Pcplus\LaraPermissionPakg\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model {

    private $table = 'roles';

    private $fillable = [
        'name'
    ];

    public function permissions() : BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'role_has_permission', 'role_id', 'permission_id');
    }

    public function users() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_has_role', 'role_id', 'user_id');
    }

    public static function findByName($permissionName)
    {
        return self::query()->where('name', $permissionName)->first();
    }
}
