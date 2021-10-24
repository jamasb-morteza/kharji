<?php

namespace App\Traits;

use Morilog\Jalali\Jalalian;

trait HasJalaliDates
{
    public function initializeHasJalaliDates()
    {
        foreach (array_unique($this->jalali_dates) as $column) {
            $this->append('jalali_' . $column);
        }
    }

    public function __get($name)
    {
        foreach (array_unique($this->jalali_dates) as $column) {
            if ($name === "jalali_{$column}") {
                if (!empty($this->$column)) {
                    return Jalalian::fromDateTime($this->$column);
                }
                return null;
            }
        }
        return parent::__get($name);
    }
}
