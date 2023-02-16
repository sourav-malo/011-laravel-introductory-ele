<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlogCategory;

class BlogPost extends Model
{
  use HasFactory;
  protected $guarded = [];

  public function blogCategory() {
    return $this->belongsTo(BlogCategory::class);
  }
}
