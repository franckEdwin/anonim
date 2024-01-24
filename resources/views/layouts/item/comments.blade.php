{{-- <div class="card shadow mb-4">
    
    <div class="card-body">
        <h2 class="form-label">{{ __('main.card_comments_header', ['count' => $item->comments()->count()]) }}</h2>
        <form method="POST" action="{{ route('store') }}" role="form" id="post-comment">
            @csrf
            <div class="row">
                <div class="col">
                    <textarea type="text" class="form-control form-control-flush @error('comment_text') is-invalid @enderror" rows="2" name="comment_text" placeholder="{{ __('main.card_add_public_comment') }}">{{ old('comment_text') }}</textarea>

                    @error('comment_text')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="col-auto">
                    <input type="hidden" id="recipient_id" name="recipient_id" value="{{ $item->user_id }}">
                    <input type="hidden" id="item_id" name="item_id" value="{{ $item->id }}">
                    <button class="btn w-100">
                        {{ __('main.btn_send') }}
                    </button>
                </div>
            </div>
        </form>
    </div>


    @forelse($item->comments() as $comment)
    <div class="p-4 rounded-2 bg-light mb-3">
        <div class="d-flex align-items-center gap-3">
            @if(!empty($comment->user()->avatar))
                <img src="{{ asset('storage/app/public/images/avatar/'.$comment->user()->avatar) }}" alt="" class="rounded-circle" width="40" height="40">
            @else
                <span class="avatar rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="33" height="33" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <circle cx="12" cy="7" r="4" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    </svg>
                </span>
            @endif
            <h6 class="fw-semibold mb-0 fs-4">
                <a href="{{ url('profile/@'.$comment->user()->name) }}">
                    {{ $comment->user()->name }}
                </a>
                @if($item->user_id == $comment->user_id)
                    <span class="badge badge-pill bg-red">{{ __('OP')}}</span>
                @endif
            </h6>
            <span class="fs-2">{{ Carbon::parse($comment->created_at)->diffForHumans() }}</span>
        </div>
        

        <p class="my-3">
            {{ $comment->comment_text }}
        </p>

    </div>
@empty
    <div class="empty">
        <div class="empty-img">
            <img src="{{ asset('resources/views/assets/img/comments.svg') }}" alt="">
        </div>
        <p class="empty-title">{{ __('main.card_there_are_no_comments') }}</p>
    </div>
@endforelse
</div> --}}


<div class="card">

    <div class="card-body">
        {{-- <div>
            <img src="{{ asset('storage/app/public/images/avatar/'. auth()->user()->avatar) }}" alt="" class="rounded-circle" width="33" height="33">
        </div> --}}
        
        <h4 class="mb-4 fw-semibold">Post Comments</h4>
        <form method="POST" action="{{ route('store') }}" role="form" id="post-comment" class="flex-grow-1">
            @csrf
            <input type="hidden" id="recipient_id" name="recipient_id" value="{{ $item->user_id }}">
            <input type="hidden" id="item_id" name="item_id" value="{{ $item->id }}">
            <textarea type="text" class="form-control col-md-3 py-3  @error('comment_text') is-invalid @enderror" name="comment_text" placeholder="Comment"></textarea>
            @error('comment_text')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <br>
            <div>
                <button type="submit" class="btn btn-primary">Commenter</button>
            </div>
        </form>
      </div>
    <div class="card-body border-bottom">
        @forelse($item->comments() as $comment)
        <div class="p-4 rounded-2 bg-light mb-3">
            <div class="d-flex align-items-center gap-3">
                @if(!empty($comment->user()->avatar))
                    <img src="{{ asset('storage/app/public/images/avatar/'.$comment->user()->avatar) }}" alt="" class="rounded-circle" width="40" height="40">
                @else
                    <span class="avatar rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="33" height="33" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <circle cx="12" cy="7" r="4" />
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                        </svg>
                    </span>
                @endif
                <h6 class="fw-semibold mb-0 fs-4">
                    <a href="{{ url('profile/@'.$comment->user()->name) }}">
                        {{ $comment->user()->name }}
                    </a>
                    {{-- @if($item->user_id == $comment->user_id)
                        <span class="badge badge-pill bg-red">{{ __('OP')}}</span>
                    @endif --}}
                </h6>
                <span class="fs-2">{{ Carbon::parse($comment->created_at)->diffForHumans() }}</span>
            </div>
            
    
            <p class="my-3">
                {{ $comment->comment_text }}
            </p>
            <!-- Reste du code inchangé -->
        </div>
    @empty
        <div class="empty">
            {{-- <div class="empty-img">
                <img src="{{ asset('resources/views/assets/img/comments.svg') }}" alt="">
            </div>
            <p class="empty-title">{{ __('main.card_there_are_no_comments') }}</p> --}}
        </div>
    @endforelse
    </div>
    
    {{-- <div class="d-flex align-items-center gap-3 p-3">
        <img src="{{ asset('storage/app/public/images/avatar/'. auth()->user()->avatar) }}" alt="" class="rounded-circle" width="33" height="33">
        <form method="POST" action="{{ route('store') }}" role="form" id="post-comment" class="flex-grow-1">
            @csrf
            <input type="hidden" id="recipient_id" name="recipient_id" value="{{ $item->user_id }}">
            <input type="hidden" id="item_id" name="item_id" value="{{ $item->id }}">
            <textarea type="text" class="form-control col-md-3 py-3  @error('comment_text') is-invalid @enderror" name="comment_text" placeholder="Comment"></textarea>
            @error('comment_text')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <button type="submit" class="btn btn-primary">Commenter</button>
        </form>
    </div> --}}

    
</div>

   
    


    