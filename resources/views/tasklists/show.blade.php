@extends('layouts.app')

@section('content')

    <h1>id = {{ $tasklist->id }} のタスク詳細ページ</h1>
    
    <p>{{ $tasklist->content }}</p>
    
    {!! link_to_route('tasklists.edit', 'このタスク編集', ['id' => $tasklist->id]) !!}

@endsection