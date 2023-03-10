<?php

namespace App\Models\Admin;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Stancl\Tenancy\Contracts\SyncMaster;
use Stancl\Tenancy\Database\Concerns\CentralConnection;
use Stancl\Tenancy\Database\Concerns\ResourceSyncing;
use Stancl\Tenancy\Database\Models\TenantPivot;

class CentralUser extends Authenticatable implements SyncMaster, MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, ResourceSyncing, CentralConnection;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'global_id',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function tenants(): BelongsToMany
    {
        return $this->belongsToMany(Tenant::class, 'tenant_user', 'global_user_id', 'tenant_id', 'global_id')
            ->using(TenantPivot::class);
    }
    public function getTenantAttribute()
    {
        return $this->tenants->first();
    }
    public function getTenantModelName(): string
    {
        return User::class;
    }
    public function getGlobalIdentifierKey()
    {
        return $this->getAttribute($this->getGlobalIdentifierKeyName());
    }
    public function getGlobalIdentifierKeyName(): string
    {
        return 'global_id';
    }
    public function getCentralModelName(): string
    {
        return static::class;
    }
    public function getSyncedAttributeNames(): array
    {
        return [
            'name',
            'password',
            'email',
            'phone',
            'global_id',
            'remember_token',
        ];
    }
}
