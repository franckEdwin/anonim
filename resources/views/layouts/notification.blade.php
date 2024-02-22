<div class="message-body" data-simplebar>
    <div class="divide-y-4">
        @forelse(Auth::user()->notifications() as $notifications)
            <div>
                <div class="row">

                    <div class="col">
                        <div class="text-truncate">
                            <!-- type = comment -->
                            @if ($notifications->notification_type == 'comment')
                                <a href="{{ url('view/' . $notifications->item_id . '/' . App\Models\Items::find($notifications->item_id)->slug) }}"
                                    class="py-6 px-7 d-flex align-items-center dropdown-item">
                                    <span class="me-3">
                                        @if (!empty(App\Models\User::find($notifications->sender_id)->avatar))
                                            <span class="avatar"
                                                style="background-image: url({{ asset('storage/app/public/images/avatar/' . App\Models\User::find($notifications->sender_id)->avatar) }})"></span>
                                        @else
                                            <img src="{{ asset('storage/app/public/images/avatar/user-2.jpg') }}"
                                                alt="" class="rounded-pill img-fluid" width="48"
                                                height="48">
                                        @endif
                                    </span>
                                    <div class="w-75 d-inline-block v-middle">
                                        <h6 class="mb-1 fw-semibold">
                                            {{ App\Models\User::find($notifications->sender_id)->name }}
                                        </h6>
                                        {{ __('main.commented_on_your') }} {{ __('main.post') }}
                                        {{-- <span class="d-block"> {{ Carbon::parse($notifications->created_at)->diffForHumans() }}</span> --}}
                                    </div>
                                </a>
                            @else
                                <a href="{{ url('view/' . $notifications->item_id . '/' . App\Models\Items::find($notifications->item_id)->slug) }}"
                                    class="py-6 px-7 d-flex align-items-center dropdown-item">
                                    <span class="me-3">
                                        @if (!empty(App\Models\User::find($notifications->sender_id)->avatar))
                                            <span class="avatar"
                                                style="background-image: url({{ asset('storage/app/public/images/avatar/' . App\Models\User::find($notifications->sender_id)->avatar) }})"></span>
                                        @else
                                            <img src="{{ asset('storage/app/public/images/avatar/user-2.jpg') }}"
                                                alt="" class="rounded-pill img-fluid" width="48"
                                                height="48">
                                        @endif
                                    </span>
                                    <div class="w-75 d-inline-block v-middle">
                                        <h6 class="mb-1 fw-semibold">
                                            {{ App\Models\User::find($notifications->sender_id)->name }}
                                        </h6>
                                        {{ __('main.liked_your') }} {{ __('main.post') }}
                                        {{-- <span class="d-block">  {{ Carbon::parse($notifications->created_at)->diffForHumans() }}</span> --}}
                                    </div>
                                </a>
                            @endif
                        </div>

                    </div>

                    @if ($notifications->seen == 2)
                        <div class="col-auto align-self-center">
                            <div class="badge bg-red"></div>
                        </div>
                    @endif

                   

                </div>
            </div>
        @empty
            {{-- <div class="empty">
                <div class="empty-img">
                    <img src="{{ asset('resources/views/assets/img/notifications.svg') }}" alt="" class="rounded-pill img-fluid" width="50">
                </div>
                <p class="empty-title">
                    {{ __('main.there_are_no_notifications') }}
                </p>
            </div> --}}
            <div class="message-body" data-simplebar>
                <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                  <span class="me-3">
                    <img src="{{ asset('resources/views/assets/img/notifications.svg') }}" alt="user" class="rounded-circle" width="48" height="48" />
                  </span>
                  <div class="w-75 d-inline-block v-middle">
                    <h6 class="mb-1 fw-semibold">Pas de notifications</h6>
                    <span class="d-block">{{ __('main.there_are_no_notifications') }}</span>
                  </div>
                </a>
               
              </div>
        @endforelse
    </div>


                                

</div>


