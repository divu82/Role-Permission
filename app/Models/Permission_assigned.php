<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission_assigned extends Model
{
    use HasFactory;
    protected $table='permission_assigned';
    protected $fillable = [
        'permission_id',
        'role_id'
    ];
    public function permissions(){
        return $this->belongsTo(permissions::class,'permission_id');
    }
}
