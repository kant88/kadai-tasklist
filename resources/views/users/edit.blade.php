@extends('layouts.app')

@section('content')
    <?php $user = $tasklist->user; ?>
    <h1>{{ $user->name }} のタスク編集ページ</h1>
    <div class="row">
        <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
            {!! Form::model($tasklist, ['route' => ['users.update', $tasklist->id], 'method' => 'put']) !!}
            
                <div class="form-group">
                    {!! Form::label('status', 'ステータス:') !!}
                    {!! Form::text('status', null, ['class' => 'form-control']) !!}
                </div>
                    
                <div class="form-group">
                    {!! Form::label('content', '内容:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
        </div>
    </div>

    {!! Form::submit('更新', ['class' => 'btn btn-default']) !!}

    {!! Form::close() !!}
@endsection