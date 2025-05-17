<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
  protected $fillable = [
    'salary'
  ];

  public function vacancies()
  {
    return $this->hasMany(Vacancy::class);
  }
}
