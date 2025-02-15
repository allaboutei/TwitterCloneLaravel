<div>
@auth



    @if (Auth::user()->likesIdea($idea))
        <form action="{{ route('ideas.unlike', $idea->id) }}" method="post">
            @csrf
            <button type="submit" href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                </span> {{ $idea->likes_count }} </button>
        </form>
    @else
        <form action="{{ route('ideas.like', $idea->id) }}" method="post">
            @csrf
            <button type="submit" href="#" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
                </span> {{ $idea->likes_count }} </button>
        </form>
    @endif
    @endauth
    @guest
    <a href="{{route('login')}}" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
    </span> {{ $idea->likes_count }} </a>
    @endguest
</div>
