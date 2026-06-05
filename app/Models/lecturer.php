<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
#[Fillable(['name', 'department_id'])]
class lecturer extends Model
{
    /** @use HasFactory<\Database\Factories\LecturerFactory> */
    use HasFactory;
     protected $with = ['Department'];

     public function Department (): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    #[Scope]
    protected function filter(Builder $query ,array $filters): void
    {

    $query
    ->when($filters[ 'keyword'] ?? false,function ($query, $keyword) {
 return $query->where('name','like','%'.$keyword . '%');

    })

    ->when($filters[ 'department_id'] ?? false,function ($query, $department) {
 $query->where('department_id', $department);

    });
    
    }
}
