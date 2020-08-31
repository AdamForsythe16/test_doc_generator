<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestData extends Model
{
    protected $table = 'test_data';
    protected $fillable = ['test', 'expected_result', 'result', 'notes'];

    public function test() {

        return $this->belongsTo('App\Models\Test', 'test_id');
    }

    public function getItems($id) {

        $data = $this->whereTestId($id)->get();

        return $data;
    }

    public function storeTestData($request) {

        $testData = self::whereTestId($request->test)->get();

        foreach($testData as $data) {

            $data->delete();
        }

        dd($request->tests);

        foreach ($request->tests as $key => $value) {

            $data = new self;

            $data->test = $value['test_name'];
            $data->expected_result = $value['expected_result'];
            $data->result = $value['result'];
            if($value['notes']) {
                $data->notes = $value['notes'];
            }
            $data->row = $key;
            $data->test_id = $request->test;

            $data->save();
        }
    }
}
