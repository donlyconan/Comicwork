@php
    /**@var \Illuminate\Database\Eloquent\Collection $comics;*/
    $pages = $comics->links();
    $curPage = $pages->paginator->currentPage();
    $links = $pages->elements[0];
@endphp

<div class="bottom">
    <nav class="pagination is-centered is-rounded" role="navigation" aria-label="pagination">
        <ul class="pagination-list">
            @foreach($links as $link)
                <li>
                    <a class="pagination-link {{($loop->index+1) == $curPage ? 'is-current' : '' }}"
                       href="{{($loop->index+1) == $curPage ? 'javascript:void(0)' : $link}}">
                        {{$loop->index+1}}</a>
                </li>
            @endforeach
        </ul>
    </nav>
</div>
