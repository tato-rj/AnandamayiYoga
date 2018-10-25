<?php

namespace App\Traits;

trait RecordsLogin
{
    public function recordLogin()
    {
        $this->update([
            'last_login_at' => \Carbon\Carbon::now()
        ]);
    }
}