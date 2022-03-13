<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
  public $timestamp = false;

  protected $fillable = [
    "name",
    "user_id"
  ];

  public function Logs()
  {
      return $this->hasMany(Log::class);
  }
}