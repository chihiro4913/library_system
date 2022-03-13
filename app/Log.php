<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
  public $timestamps = false;
  protected $fillable = [
    "user_id",
    "library_id",
    "rent_date",
    "return_due_date",
    "return_date"
  ];

  public function Libraries()
    {
        return $this->belongsTo(Library::class);
    }
}