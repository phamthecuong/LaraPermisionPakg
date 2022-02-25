<?php

namespace Pcplus\LaraPermissionPakg\models;

use Illuminate\Database\Eloquent\model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class role extends Model {

    protected $table = 'roles';

    protected $fillable = [
        'name'
    ];

    public function permissions() : BelongsToMany
    {
        return $this->belongsToMany(permission::class, 'role_has_permission', 'role_id', 'permission_id');
    }

    public function users() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_has_role', 'role_id', 'user_id');
    }

    public static function findByName($permissionName)
    {
        return self::query()->where('name', $permissionName)->first();
    }

    public function getPermissions()
    {
        return $this->permissions()->get()->pluck('name');
    }
}
