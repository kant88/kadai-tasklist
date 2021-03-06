<ul class="media-list">
@foreach ($tasklists as $tasklist)
    <?php $user = $tasklist->user; ?>
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
                {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $tasklist->created_at }}</span>
            </div>
            <div>
                <p>{!! nl2br(e('status: '. $tasklist->status)) !!}</p>
                <p>{!! nl2br(e('content: '. $tasklist->content)) !!}</p>
            </div>
            <div>
                @if (Auth::user()->id == $tasklist->user_id)
                    {!! link_to_route('users.edit','編集', ['id' => $tasklist->id], ['class' => 'btn btn-success btn-xs']) !!}
                    {!! Form::open(['route' => ['tasklists.destroy', $tasklist->id], 'method' => 'delete']) !!}
                        {!! Form::submit('削除', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $tasklists->render() !!}