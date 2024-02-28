<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Role extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $role_table='roles';
    protected $fillable = [
       'role_id',
       'role_name'
    ];
    public function permissions(){
        return $this->hasMany(permissions::class, 'role_id', 'role_id');
    }
}
