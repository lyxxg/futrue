@foreach(tree($answer->comments) as $comment)
    <li class="list-group-item">
        <div>{{$comment->user->info->nick}}：{{$comment->comment}}</div>
        <div>
            <a href="#" data-comment-id="{{$comment->id}}" data-answer-id="{{$answer->id}}" onclick="comment(this)" class="comment_btn btn btn-sm btn-primary">回复</a>
        </div>
        @if($comment['sub'])
            @foreach($comment['sub'] as $comment1)
                <ul class="list-group">
                    <li class="list-group-item">
                        <div>{{$comment1->user->info->nick}}：{{$comment1->comment}}</div>
                    </li>
                </ul>
            @endforeach
        @endif
    </li>
@endforeach