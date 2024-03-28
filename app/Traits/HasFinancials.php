<?php

namespace App\Traits;

use App\Models\Advance;
use App\Models\Budget;
use App\Models\Expense;

trait HasFinancials
{
    public function budgets()
    {
        return $this->morphMany(Budget::class, 'model');
    }

    public function expenses()
    {
        return $this->morphMany(Expense::class, 'model');
    }

    public function advances()
    {
        return $this->morphMany(Advance::class, 'model');
    }
}
