<?php

namespace App\Models\Admin;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Stancl\Tenancy\Database\Models\TenantPivot;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains, HasFactory;

    public function users()
	{
        return $this->belongsToMany(CentralUser::class, 'tenant_user', 'tenant_id', 'global_user_id', 'id', 'global_id')
            ->using(TenantPivot::class);
	}
}