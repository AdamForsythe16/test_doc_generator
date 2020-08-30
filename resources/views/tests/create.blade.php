<h1>{{$data['title']}}</h1>
{!! Form::open(['method' => $data['method'], 'url' => $data['url']]) !!}
{!! Form::label('name', 'Name') !!}
{!! Form::text('name') !!}
{!! Form::submit('Submit') !!}
{!! Form::close() !!}