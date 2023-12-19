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
                    <a href="javascript:void(0)">
                        <img src="{{ url('storage/app/public/'.$item->image) }}" alt="Image" style="height:auto; width:auto; " class="img-fluid rounded-1 mt-4">
                    </a>
                @endif

                <p class="fs-5 my-4 fw-semibold text-black d-block lh-sm">{{ $item->title }}</p>

                <div class="mt-4">
                    <p class="fs-4">
                        {{ Str::limit($item->story, $story_preview_chars) }}
                    </p>
                </div>
                <div class="d-flex align-items-center gap-4">
                    <div class="d-flex align-items-center gap-2">
                        <div class="col">
                            <a href="javascript:void(0);" onclick="likePost({{ $item->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" id="like-icon-{{ $item->id }}" class="icon @if(Auth::check() && Auth::user()->hasLiked($item)) icon-filled text-danger @else text-muted @endif" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                            </a>
                            <i class="ti ti-thumb-up-{{ $item->id }}"></i><span id="like-{{ $item->id }}">@json($item->likers()->count())</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-2">
                        <i class="ti ti-eye text-dark fs-5"></i>{{ $item->itemView() }}
                    </div>

                    <div class="ms-auto">
                        <a href="{{ route('show', ['id'=>$item->id, 'slug'=>$item->slug]) }}" class="link text-muted">
                            <i class="ti ti-message-circle me-1 fs-5"></i>{{ __('main.card_comments', ['count' => $item->comments()->count()]) }}
                        </a>
                    </div>

                    <div class="col-auto">
                        <a href="javascript:void(0);" onclick="savePost({{ $item->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" id="save-icon-{{ $item->id }}" class="icon @if(Auth::check() && Auth::user()->hasFavorited($item)) icon-filled @else text-muted @endif" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2" /></svg>
                        </a>
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

                <p class="fs-5 my-4 fw-semibold text-black d-block lh-sm">{{ $item->title }}</p>

                <p class="text-muted fs-4 mt-4">
                    {{ Str::limit($item->story, $story_preview_chars) }}


                </p>

                <div class="d-flex align-items-center gap-4">
                    <div class="d-flex align-items-center gap-2">
                        <div class="col">
                            <a href="javascript:void(0);" onclick="likePost({{ $item->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" id="like-icon-{{ $item->id }}" class="icon @if(Auth::check() && Auth::user()->hasLiked($item)) icon-filled text-danger @else text-muted @endif" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                            </a>
                            <i class="ti ti-thumb-up-{{ $item->id }}"></i><span id="like-{{ $item->id }}">@json($item->likers()->count())</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-2">
                        <i class="ti ti-eye text-dark fs-5"></i>{{ $item->itemView() }}
                    </div>

                    <div class="ms-auto">
                        <a href="{{ route('show', ['id'=>$item->id, 'slug'=>$item->slug]) }}" class="link text-muted">
                            <i class="ti ti-message-circle me-1 fs-5"></i>{{ __('main.card_comments', ['count' => $item->comments()->count()]) }}
                        </a>
                    </div>

                    <div class="col-auto">
                        <a href="javascript:void(0);" onclick="savePost({{ $item->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" id="save-icon-{{ $item->id }}" class="icon @if(Auth::check() && Auth::user()->hasFavorited($item)) icon-filled @else text-muted @endif" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2" /></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>