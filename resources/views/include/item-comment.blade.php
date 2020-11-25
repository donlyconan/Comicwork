@php
    /**@var \App\Model\Comment $comment*/
    $user = $comment->user()->first();
    $replyname = $comment->reply()->first() != null ? $comment->reply()->first()->full_name .' ' : '';
@endphp

<article
    class="info-comment child_{{$comment->id}} parent_{{$comment->id_parent}} {{$comment->isParent() ? 'comment-main-level' : 'reply-list'}}">
    <div class="outsite-comment comment-main-level">
        <figure class="avartar-comment">
            <img style="object-fit: cover;" src="{{$user->profile()}}" alt="{{$user->full_name}}">
        </figure>
        <div class="item-comment">
            <div class="outline-content-comment">
                <div>
                    <span class="time"><strong>{{$user->full_name}}</strong>
                        @if($comment->getUser()->isAdmin())
                            <span class="title-user-comment title-admin">Admin</span>
                        @else
                            <span class="title-user-comment title-member">Member</span>
                        @endif
                        {{$comment->getTimeAgo()}}
                    </span>
                </div>
                <div class="content-comment">
                    <strong>{{$replyname}}</strong> {{$comment->content}}
                </div>
            </div>

            <div class="action-comment">
                <span style="margin-left: 10px;" class="like-comment"
                      data-comic="{{$comment->id_comicwork}}"
                      data-id="{{$comment->id}}">
                    <i class="fas fa-thumbs-up"></i>
                    <span class="total-like-comment">0</span>
                </span>

                <span class="reply-comment" data-id="{{$comment->id}}">
                    <i class="far fa-comment"></i> Trả lời
                </span>

                @auth
                    @if($comment->id_user == Auth::id())
                        <span class="remove_comnent" data-id="{{$comment->id}}" title="Xoá">
                        <i class="fa fa-trash" aria-hidden="true"></i> Xoá</span>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</article>
