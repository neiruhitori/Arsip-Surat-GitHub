<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsipsurat extends Model
{
    use HasFactory;
    protected $table ='arsipsurats';
    protected $primaryKey = 'id';
    protected $fillable = [];
    protected $guarded = [];

    public function kategoris()
    {
        return $this->belongsTo(Kategori::class);
    }
}
