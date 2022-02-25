<?php

namespace Pcplus\LaraPermissionPakg;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model {


    public function hasPermissions()
    {
        return $this->belongsToMany('role_has_permission', Permission::class)
    }

    public function user()
    {

    }
}
