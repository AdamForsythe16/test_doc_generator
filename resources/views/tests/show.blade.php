<h1>{{$data['test']->name}}</h1>

{!! Form::open(['method' => $data['method'] ?? '', 'url' => $data['url'] ?? '']) !!}
{!! Form::label('test', 'Test') !!}
@for($i = 1; $i<3; $i++)
<div class="rows">
    {!! Form::text('tests['.$i.'][test_name]') !!}
    {!! Form::label('expected_result', 'Expected Result') !!}
    {!! Form::text('tests['.$i.'][expected_result]') !!}
    {!! Form::label('result', 'Result') !!}
    {!! Form::text('tests['.$i.'][result]') !!}
    {!! Form::label('notes', 'Notes') !!}
    {!! Form::text('tests['.$i.'][notes]') !!}
</div>
@endfor
{!! Form::submit('Submit') !!}
{!! Form::close() !!}
