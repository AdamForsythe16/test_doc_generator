<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name'];
    protected $table = 'projects';

    public function tests() {

        return $this->hasMany('App\Models\Test');
    }

    public function createProject($data) {

        return self::insertGetId($data);

    }
}
