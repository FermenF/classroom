<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'classroom_id',
        'name',
        'last_name',
        'age'
    ];

    public function getClassroom() {
        return $this->hasOne(Classroom::class, 'id', 'classroom_id');        
    }

    protected function name(): Attribute
    {
        return new Attribute(
            get: fn($value) => ucwords($value),
            set: fn($value) => strtolower($value)
        );
    }

    protected function lastName(): Attribute
    {
        return new Attribute(
            get: fn($value) => ucwords($value),
            set: fn($value) => strtolower($value)
        );
    }

    public function scopeName($query, $value) {
        if (!is_null($value))
        return $query->Where('name' , 'like', '%' . $value . '%')
                    ->orWhere('last_name' , 'like', '%' . $value . '%')
                    ->orWhere(DB::RAW("CONCAT(name,' ',last_name)"), 'like', '%' . $value . '%');
    }

    public function scopeAge($query, $value) {
        if (!is_null($value))
        return $query->Where('age', 'like', '%'. $value . '%');
    }

    public function scopeClassroom($query, $value) {
        if (!is_null($value))
        return $query->Where('classroom_id', 'like', '%'. $value . '%');
    }
    
}