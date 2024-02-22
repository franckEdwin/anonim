<div class="modal modal-blur fade" id="notifications" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">{{ __('main.notifications') }}</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="dropdown">
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
                                                            alt="" class="rounded-pill img-fluid" width="40"
                                                            height="40">
                                                    @endif
                                                </span>
                                                <div class="w-75 d-inline-block v-middle">
                                                    <h6 class="mb-1 fw-semibold">
                                                        {{ App\Models\User::find($notifications->sender_id)->name }}
                                                    </h6>
                                                    {{ __('main.commented_on_your') }} {{ __('main.post') }}
                                                    <span class="d-block">
                                                        {{ Carbon::parse($notifications->created_at)->diffForHumans() }}</span>
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
                                                            alt="" class="rounded-pill img-fluid" width="40"
                                                            height="40">
                                                    @endif
                                                </span>
                                                <div class="w-75 d-inline-block v-middle">
                                                    <h6 class="mb-1 fw-semibold">
                                                        {{ App\Models\User::find($notifications->sender_id)->name }}
                                                    </h6>
                                                    {{ __('main.liked_your') }} {{ __('main.post') }}
                                                    <span class="d-block">
                                                        {{ Carbon::parse($notifications->created_at)->diffForHumans() }}</span>


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

                                <div class="col-auto">
                                    <a href="{{ url('view/' . $notifications->item_id . '/' . App\Models\Items::find($notifications->item_id)->slug) }}"
                                        class="btn btn-icon btn-link">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <polyline points="7 7 12 12 7 17" />
                                            <polyline points="13 7 18 12 13 17" />
                                        </svg>
                                    </a>
                                </div>

                            </div>
                        </div>
                    @empty
                        <div class="empty">
                            <div class="empty-img">
                                <img src="{{ asset('resources/views/assets/img/notifications.svg') }}" alt="">
                            </div>
                            <p class="empty-title">
                                {{ __('main.there_are_no_notifications') }}
                            </p>
                        </div>
                    @endforelse
                </div>
            </div>


            <div class="modal-footer">
                <a href="{{ url('notifications') }}" class="btn btn-secondary">
                    {{ __('main.see_all_notifications') }}
                </a>
            </div>
        </div>
    </div>
</div>
