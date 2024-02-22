<div class="modal modal-blur fade" id="notifications" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">{{ __('main.notifications') }}</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="divide-y-4">
                    @forelse(Auth::user()->notifications() as $notifications)
                    <div>
                        <div class="row">
                            <div class="col-auto">
                                @if(!empty(App\Models\User::find($notifications->sender_id)->avatar))
                                <span class="avatar" style="background-image: url({{ asset('storage/app/public/images/avatar/'.App\Models\User::find($notifications->sender_id)->avatar) }})"></span>
                                @else
                                <span class="avatar">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="7" r="4" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                                </span>
                                @endif
                            </div>
                            <div class="col">
                                <div class="text-truncate">
                                    <strong>{{ App\Models\User::find($notifications->sender_id)->name }}</strong> 
                                    <!-- type = comment -->
                                    @if($notifications->notification_type == "comment") 
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 20l-3 -3h-2a3 3 0 0 1 -3 -3v-6a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-2l-3 3" /><line x1="8" y1="9" x2="16" y2="9" /><line x1="8" y1="13" x2="14" y2="13" /></svg> {{ __('main.commented_on_your') }} "<a href="{{ url('view/'.$notifications->item_id.'/'.App\Models\Items::find($notifications->item_id)->slug) }}"><strong>{{ App\Models\Items::find($notifications->item_id)->title }}</strong></a>" {{ __('main.post') }} 
                                    @else 
                                    <!-- type = like -->
                                    <svg xmlns="http://www.w3.org/2000/svg" id="like-icon-8" class="icon   icon-filled text-danger  " width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"></path></svg> {{ __('main.liked_your') }} "<a href="{{ url('view/'.$notifications->item_id.'/'.App\Models\Items::find($notifications->item_id)->slug) }}"><strong>{{ App\Models\Items::find($notifications->item_id)->title }}</strong></a>" {{ __('main.post') }} 
                                    @endif
                                </div>
                                <div class="text-muted">
                                    {{ Carbon::parse($notifications->created_at)->diffForHumans() }}
                                </div>
                            </div>
                            
                            @if($notifications->seen == 2)
                            <div class="col-auto align-self-center">
                                <div class="badge bg-red"></div>
                            </div>
                            @endif
                            
                            <div class="col-auto">
                                <a href="{{ url('view/'.$notifications->item_id.'/'.App\Models\Items::find($notifications->item_id)->slug) }}" class="btn btn-icon btn-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="7 7 12 12 7 17" /><polyline points="13 7 18 12 13 17" /></svg>
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

<div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up show" aria-labelledby="drop2" data-bs-popper="static">
    <div class="d-flex align-items-center justify-content-between py-3 px-7">
      <h5 class="mb-0 fs-5 fw-semibold">Notifications</h5>
      <span class="badge bg-primary rounded-4 px-3 py-1 lh-sm">5 new</span>
    </div>
    <div class="message-body" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;"><div class="simplebar-content" style="padding: 0px;">
      <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
        <span class="me-3">
          <img src="../../dist/images/profile/user-1.jpg" alt="user" class="rounded-circle" width="48" height="48">
        </span>
        <div class="w-75 d-inline-block v-middle">
          <h6 class="mb-1 fw-semibold">Roman Joined the Team!</h6>
          <span class="d-block">Congratulate him</span>
        </div>
      </a>
      <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
        <span class="me-3">
          <img src="../../dist/images/profile/user-2.jpg" alt="user" class="rounded-circle" width="48" height="48">
        </span>
        <div class="w-75 d-inline-block v-middle">
          <h6 class="mb-1 fw-semibold">New message</h6>
          <span class="d-block">Salma sent you new message</span>
        </div>
      </a>
      <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
        <span class="me-3">
          <img src="../../dist/images/profile/user-3.jpg" alt="user" class="rounded-circle" width="48" height="48">
        </span>
        <div class="w-75 d-inline-block v-middle">
          <h6 class="mb-1 fw-semibold">Bianca sent payment</h6>
          <span class="d-block">Check your earnings</span>
        </div>
      </a>
      <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
        <span class="me-3">
          <img src="../../dist/images/profile/user-4.jpg" alt="user" class="rounded-circle" width="48" height="48">
        </span>
        <div class="w-75 d-inline-block v-middle">
          <h6 class="mb-1 fw-semibold">Jolly completed tasks</h6>
          <span class="d-block">Assign her new tasks</span>
        </div>
      </a>
      <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
        <span class="me-3">
          <img src="../../dist/images/profile/user-5.jpg" alt="user" class="rounded-circle" width="48" height="48">
        </span>
        <div class="w-75 d-inline-block v-middle">
          <h6 class="mb-1 fw-semibold">John received payment</h6>
          <span class="d-block">$230 deducted from account</span>
        </div>
      </a>
      <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
        <span class="me-3">
          <img src="../../dist/images/profile/user-1.jpg" alt="user" class="rounded-circle" width="48" height="48">
        </span>
        <div class="w-75 d-inline-block v-middle">
          <h6 class="mb-1 fw-semibold">Roman Joined the Team!</h6>
          <span class="d-block">Congratulate him</span>
        </div>
      </a>
    </div></div></div></div><div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 0px; display: none; transform: translate3d(0px, 60px, 0px);"></div></div></div>
    <div class="py-6 px-7 mb-1">
      <button class="btn btn-outline-primary w-100"> See All Notifications </button>
    </div>
</div>