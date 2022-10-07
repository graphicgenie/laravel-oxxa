<?php

namespace GraphicGenie\LaravelOxxa\Models;

class Model
{
    protected array $attributes;
    protected array $fillable;

    public function __construct(array $attributes = [])
    {
        $this->fill($attributes);

        return $this;
    }

    public function __get($key)
    {
        if (isset($this->attributes[$key])) {
            return $this->attributes[$key];
        }

        return null;
    }

    public function __set($key, $value)
    {
        if (in_array($key, $this->fillable)) {
            $this->attributes[$key] = $value;
        }
    }

    public function all()
    {
        return $this->attributes;
    }

    /**
     * @param array $attributes
     * @return void
     */
    public function fill(array $attributes): void
    {
        foreach ($attributes as $key => $value) {
            if (in_array($key, $this->fillable)) {
                $this->attributes[$key] = $value;
            }
        }
    }
}
