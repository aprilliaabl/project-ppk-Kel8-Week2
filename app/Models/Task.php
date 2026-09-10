<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'list_id',
        'title',
        'description',
        'priority',
        'due_date',
        'is_completed',
    ];

    protected $casts = [
        'is_completed' => 'boolean', // SRS-05: agar otomatis jadi true/false
        'due_date'     => 'date',    // SRS-04: agar otomatis jadi Carbon date
    ];

    /**
     * SRS-03: Relasi ke list/project tempat tugas ini berada.
     */
    public function list()
    {
        return $this->belongsTo(TodoList::class, 'list_id');
    }
}
