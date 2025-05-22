<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vacancy extends Model
{
    protected $casts = [ 'last_day'=>'date'];

    protected $fillable = [
        'salary_id',
        'category_id',
        'title',
        'company',
        'last_day',
        'description',
        'image',
        'published',
        'user_id'
    ];

    public function salary(){
        return $this->belongsTo(Salary::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function candidates(): HasMany
    {
        return $this->hasMany(Candidate::class)->orderBy('created_at', 'desc');
    }

    public function reclutiers(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
