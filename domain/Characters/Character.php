<?php

namespace Domain\Characters;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
  protected $fillable = [
      'character_id', 'score'
  ];


}
