<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupportingMaterial extends Model
{
    protected $guarded = [];

    public function getFullNameAttribute()
    {
    	return $this->name.' ('.strtoupper(pathinfo($this->file_path)['extension']).')';
    }
}
