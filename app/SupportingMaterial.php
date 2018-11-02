<?php

namespace App;

class SupportingMaterial extends Anandamayi
{
    protected $guarded = [];

    public function getFullNameAttribute()
    {
    	return $this->name.' ('.strtoupper(pathinfo($this->file_path)['extension']).')';
    }
}
