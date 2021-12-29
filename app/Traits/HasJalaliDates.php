<?php

namespace App\Traits;

use Morilog\Jalali\Jalalian;

trait HasJalaliDates
{
    public $jalali_accessors = [];

    public function initializeHasJalaliDates()
    {
        foreach (array_unique($this->jalali_dates) as $column) {
            $append = 'jalali_' . $column;
            $this->append($append);
            $this->jalali_accessors[\Str::camel("get_{$append}_attribute")] = $column;

        }
    }


    public function __call($method, $args)
    {
        if (array_key_exists($method, $this->jalali_accessors)) {
            $base_attribute = $this->jalali_accessors[$method];
            if (!empty($this->$base_attribute)) {
                return Jalalian::fromDateTime($this->$base_attribute);
            }
            return null;

        }
        return parent::__call($method, $args);
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
