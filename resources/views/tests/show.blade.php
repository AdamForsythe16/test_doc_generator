@extends('layout.main')
@section('content')
<h1>{{$data['test']->name}}</h1>

{!! Form::open(['method' => $data['method'] ?? '', 'url' => $data['url'] ?? '']) !!}
{!! Form::label('test', 'Test') !!}
<div id="testData">
    @if($data['test_data']->isNotEmpty())
        @foreach($data['test_data'] as $testData)
            <div class="rows">
                {!! Form::text('tests['.$testData->row.'][test_name]', $testData->test) !!}
                {!! Form::label('expected_result', 'Expected Result') !!}
                {!! Form::text('tests['.$testData->row.'][expected_result]', $testData->expected_result) !!}
                {!! Form::label('result', 'Result') !!}
                {!! Form::text('tests['.$testData->row.'][result]', $testData->result) !!}
                {!! Form::label('notes', 'Notes') !!}
                {!! Form::text('tests['.$testData->row.'][notes]', isset($testData->notes) ? $testData->notes : '') !!}
            </div>
        @endforeach
    @endif
</div>
{!! Form::submit('Submit') !!}
{!! Form::close() !!}
<button role="button" id="addRow" href="#">+</button>
@endsection
@section('scripts')
    <script>

        $(document).ready(function() {

            let row = {!! isset($data['test_data']) ? $data['test_data']->max('row') + 1 : 0 !!};

            $('#addRow').on('click', function() {

                let inserted = `<div class="rows"><input name="tests[`+row+`][test_name]" type="text">
                            <label for="expected_result">Expected Result</label>
                            <input name="tests[`+row+`][expected_result]" type="text">
                            <label for="result">Result</label>
                            <input name="tests[`+row+`][result]" type="text">
                            <label for="notes">Notes</label>
                            <input name="tests[`+row+`][notes]" type="text"></div>`;

                $('#testData').append(inserted);

                row++;
            })
        });
    </script>
@endsection
