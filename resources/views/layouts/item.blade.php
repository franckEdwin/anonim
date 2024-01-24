<div class="col-lg-4">
    @if(!empty($item->image))
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center">
                      @if(Auth::check())
                      <div class="d-flex align-items-center">
                        @if(!empty($item->user->avatar))
                            <img src="{{ asset('storage/app/public/images/avatar/'.$item->user->avatar) }}" alt="" class="rounded-pill img-fluid" width="50">
                        @else
                            <!-- Si l'auteur du post n'a pas d'avatar, affichez une version par défaut -->
                            <img src="{{ asset('storage/app/public/images/avatar/user-2.jpg') }}" alt="" class="rounded-pill img-fluid" width="50">
                        @endif
                        <div class="ms-3">
                            @if(!empty($item->user->name))
                                <h4 class="card-title">{{ $item->user->name }}</h4>
                            @endif
                            <p class="card-subtitle mb-0">
                                {{ $item->created_at->formatLocalized('%a, %b %d, %Y') }}
                            </p>
                        </div>
                    </div>
                  @else
                      <!-- Si l'utilisateur n'est pas connecté, affichez une version par défaut -->
                      <img src="{{ asset('storage/app/public/images/avatar/user-2.jpg') }}" alt="" class="rounded-pill img-fluid" width="50">
                      <div class="ms-3">
                          <h4 class="card-title">An😎nim </h4>
                          <p class="card-subtitle mb-0">
                              {{ $item->created_at->formatLocalized('%a, %b %d, %Y') }}
                          </p>
                      </div>
                  @endif
                    </div>
                </div>

                @if(!empty($item->image))
                    @if(Auth::check())
                        <a href="{{ route('show', ['id'=>$item->id, 'slug'=>$item->slug]) }}">
                    @endif
                        <img src="{{ url('storage/app/public/'.$item->image) }}" alt="Image" style="height:auto; width:auto; " class="img-fluid rounded-1 mt-4">
                    @if(Auth::check())
                        </a>
                    @endif
                @endif


                @if(Auth::check())
                <a href="{{ route('show', ['id'=>$item->id, 'slug'=>$item->slug]) }}">
            @endif
                <!-- ... Autres balises et éléments HTML ... -->
                <p class="fs-5 my-4 fw-semibold text-black d-block lh-sm">{{ $item->title }}</p>
            @if(Auth::check())
                </a>
            @endif

            <div class="mt-4">
                @if(Auth::check())
                    <a href="{{ route('show', ['id'=>$item->id, 'slug'=>$item->slug]) }}" style="color: rgb(151, 151, 151); text-decoration: none;">
                @endif
                    <!-- ... Autres balises et éléments HTML ... -->
                    <p class="fs-4">{{ Str::limit($item->story, $story_preview_chars) }}</p>
                @if(Auth::check())
                    </a>
                @endif
            </div>
            
                <div class="d-flex align-items-center gap-4">
                    {{-- <div class="d-flex align-items-center gap-2">
                        <div class="col">
                            <a href="javascript:void(0);" onclick="likePost({{ $item->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" id="like-icon-{{ $item->id }}" class="icon @if(Auth::check() && Auth::user()->hasLiked($item)) icon-filled text-danger @else text-muted @endif" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                            </a>
                            <i class="ti ti-thumb-up-{{ $item->id }}"></i>
                            <span id="like-{{ $item->id }}">@json($item->likers()->count())</span>
                        </div>
                    </div> --}}

                    <div class="d-flex align-items-center gap-2">
                        <a href="javascript:void(0);" onclick="toggleLike({{ $item->id }})" class="d-flex">
                            <i id="heart-icon-{{ $item->id }}" class="ti ti-heart-filled text-dark fs-6"></i>
                            <span class="ms-1 text-dark" id="like-{{ $item->id }}">@json($item->likers()->count())</span>
                        </a>
                    </div>
                    
                    <style>
                        .liked {
                            animation: heartBeat 0.5s;
                        }
                    
                        @keyframes heartBeat {
                            0%, 100% {
                                transform: scale(1);
                            }
                    
                            50% {
                                transform: scale(1.2);
                            }
                        }
                    </style>

                    <div class="d-flex align-items-center gap-2">
                        <i class="ti ti-eye text-dark fs-6"></i>{{ $item->itemView() }}
                    </div>
                    
                    <div class="d-flex align-items-center gap-2">
                        <i class="ti ti-message-2 text-dark fs-6"></i>
                        {{ __('main.card_comments', ['count' => $item->comments()->count()]) }}
                    </div>

                    {{-- <div class="d-flex align-items-center gap-2">
                        <a class="text-white d-flex align-items-center justify-content-center bg-primary p-2 fs-4 rounded-circle" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Like">
                          <i class="ti ti-eye fs-5"></i>
                        </a>
                        <span class="text-dark fw-semibold">{{ $item->itemView() }}</span>
                      </div> --}}
                    

                    {{-- <div class="ms-auto">
                        @if(Auth::check())
                            <a href="{{ route('show', ['id'=>$item->id, 'slug'=>$item->slug]) }}" class="link text-muted">
                                <i class="ti ti-message-circle me-1 fs-5"></i>{{ __('main.card_comments', ['count' => $item->comments()->count()]) }}
                            </a>
                        @endif
                    </div> --}}
                    
                    

                    <div class="d-flex align-items-center fs-2 ms-auto">
                        {{-- <i class="ti ti-point text-dark"></i>Tue, Jan 10 --}}
                        @if(Auth::check())
                            <a href="javascript:void(0);" onclick="savePost({{ $item->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" id="save-icon-{{ $item->id }}" class="icon @if(Auth::check() && Auth::user()->hasFavorited($item)) icon-filled @else text-muted @endif" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2" /></svg>
                            </a>
                        @endif
                    </div>
                    
                </div>
            </div>
        </div>
    @else
        <!-- Code pour un post sans image -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    @if(Auth::check())
                    <div class="d-flex align-items-center">
                        @if(!empty($item->user->avatar))
                            <img src="{{ asset('storage/app/public/images/avatar/'.$item->user->avatar) }}" alt="" class="rounded-pill img-fluid" width="50">
                        @else
                            <!-- Si l'auteur du post n'a pas d'avatar, affichez une version par défaut -->
                            <img src="{{ asset('storage/app/public/images/avatar/user-2.jpg') }}" alt="" class="rounded-pill img-fluid" width="50">
                        @endif
                        <div class="ms-3">
                            @if(!empty($item->user->name))
                                <h4 class="card-title">{{ $item->user->name }}</h4>
                            @endif
                            <p class="card-subtitle mb-0">
                                {{ $item->created_at->formatLocalized('%a, %b %d, %Y') }}
                            </p>
                        </div>
                    </div>
                    @else
                        <!-- Si l'utilisateur n'est pas connecté, affichez une version par défaut -->
                        <img src="{{ asset('storage/app/public/images/avatar/user-3.jpg') }}" alt="" class="rounded-pill img-fluid" width="50">
                        <div class="ms-3">
                            <h4 class="card-title">An😎nim</h4>
                            <p class="card-subtitle mb-0">
                                {{ $item->created_at->formatLocalized('%a, %b %d, %Y') }}
                            </p>
                        </div>
                    @endif
                </div>

                @if(Auth::check())
                <a href="{{ route('show', ['id'=>$item->id, 'slug'=>$item->slug]) }}">
            @endif
                <!-- ... Autres balises et éléments HTML ... -->
                <p class="fs-5 my-4 fw-semibold text-black d-block lh-sm">{{ $item->title }}</p>
            @if(Auth::check())
                </a>
            @endif

            <div class="mt-4">
                @if(Auth::check())
                    <a href="{{ route('show', ['id'=>$item->id, 'slug'=>$item->slug]) }}" style="color: rgb(151, 151, 151); text-decoration: none;">
                @endif
                    <!-- ... Autres balises et éléments HTML ... -->
                    <p class="fs-4">{{ Str::limit($item->story, $story_preview_chars) }}</p>
                @if(Auth::check())
                    </a>
                @endif
            </div>

                <div class="d-flex align-items-center gap-4">
                    
                    <div class="d-flex align-items-center gap-2">
                        <a href="javascript:void(0);" onclick="toggleLike({{ $item->id }})" class="d-flex">
                            <i id="heart-icon-{{ $item->id }}" class="ti ti-heart-filled text-dark fs-6"></i>
                            <span class="ms-1 text-dark" id="like-{{ $item->id }}">@json($item->likers()->count())</span>
                        </a>
                    </div>
                    
                    <style>
                        .liked {
                            animation: heartBeat 0.5s;
                        }
                    
                        @keyframes heartBeat {
                            0%, 100% {
                                transform: scale(1);
                            }
                    
                            50% {
                                transform: scale(1.2);
                            }
                        }
                    </style>
                    
                    
                    
                    
                    <div class="d-flex align-items-center gap-2">
                        <i class="ti ti-eye text-dark fs-6"></i>{{ $item->itemView() }}
                    </div>
                    
                    <div class="d-flex align-items-center gap-2">
                        <i class="ti ti-message-2 text-dark fs-6"></i>
                        {{ __('main.card_comments', ['count' => $item->comments()->count()]) }}
                    </div>

                    {{-- <div class="d-flex align-items-center gap-2">
                        <a class="text-white d-flex align-items-center justify-content-center bg-primary p-2 fs-4 rounded-circle" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Like">
                          <i class="ti ti-eye fs-5"></i>
                        </a>
                        <span class="text-dark fw-semibold">{{ $item->itemView() }}</span>
                      </div> --}}
                    

                    {{-- <div class="ms-auto">
                        @if(Auth::check())
                            <a href="{{ route('show', ['id'=>$item->id, 'slug'=>$item->slug]) }}" class="link text-muted">
                                <i class="ti ti-message-circle me-1 fs-5"></i>{{ __('main.card_comments', ['count' => $item->comments()->count()]) }}
                            </a>
                        @endif
                    </div> --}}
                    
                    

                    <div class="d-flex align-items-center fs-2 ms-auto">
                        {{-- <i class="ti ti-point text-dark"></i>Tue, Jan 10 --}}
                        @if(Auth::check())
                            <a href="javascript:void(0);" onclick="savePost({{ $item->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" id="save-icon-{{ $item->id }}" class="icon @if(Auth::check() && Auth::user()->hasFavorited($item)) icon-filled @else text-muted @endif" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2" /></svg>
                            </a>
                        @endif
                    </div>
                    
                    
                </div>
            </div>
        </div>
    @endif
</div>

<script>
    function toggleLike(postId) {
        var heartIcon = document.getElementById('heart-icon-' + postId);
        var likeCount = document.getElementById('like-' + postId);

        if (heartIcon.classList.contains('text-danger')) {
            // L'utilisateur a déjà aimé, alors dislike
            heartIcon.classList.remove('text-danger', 'liked');
            heartIcon.classList.add('text-dark');
            likeCount.textContent = parseInt(likeCount.textContent) - 1;
        } else {
            // L'utilisateur n'a pas aimé, alors like
            heartIcon.classList.remove('text-dark');
            heartIcon.classList.add('text-danger', 'liked');
            likeCount.textContent = parseInt(likeCount.textContent) + 1;
        }
    }
</script>