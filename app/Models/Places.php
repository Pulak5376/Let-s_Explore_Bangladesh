<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Places extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'image_path',
        'description',
        'price',
        'day',
        'person',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
