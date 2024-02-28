<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permissions extends Model
{
    use HasFactory;
    protected $table='permissions';
    protected $fillable = [
        'permission_name',
        'permission_id',
        'role_id'
    ];
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }
    public function Permission_assigned(){
        return $this->hasOne(Permission_assigned::class);
    }
}
