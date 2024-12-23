<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model 
{
    use HasUuids, HasFactory;

    protected $table = 'plans';

    protected $keyType = 'string';

    protected $primaryKey = 'uuid';

    public $timestamps = true;

    protected $fillable = [
        'uuid',
        'name',
        'description',
        'price',
        'duration',
        'type',
        'status',
    ];

    protected $casts = [
        'uuid' => 'string',
        'name' => 'string',
        'description' => 'string',
        'price' => 'float',
        'duration' => 'integer',
        'type' => 'string',
        'status' => 'string',
    ];  

    public function users() {
        return $this->hasMany(User::class);
    }

    //public function subscriptions() {
      //  return $this->hasMany(Subscription::class);
    //}


}
