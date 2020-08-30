<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{

    protected $fillable = ['name'];
    protected $table = 'tests';

    public function projects() {

        return $this->belongsTo('App\Models\Projects', 'project_id');

    }

    public function testData() {

        return $this->hasMany('App\Models\TestData');
    }

    public function createTest($data) {

        return self::insertGetId($data);

    }
}
