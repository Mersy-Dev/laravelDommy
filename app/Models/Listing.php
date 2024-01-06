<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

//  protected $fillable = ['company','title', 'location', 'email', 'website', 'tags', 'description'];


    public function scopeFilter($query, array $filters)
    {
        if($filters['tag'] ?? false) {
           $query->where('tags', 'like', '%' . $filters['tag'] . '%');
        } 
        
        if($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . $filters['search'] . '%')
                ->orWhere('description', 'like', '%' . $filters['search'] . '%')
                ->orWhere('tags', 'like', '%' . $filters['search'] . '%');

        }

        
    }

    //relationship between listing and user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
   
}
  