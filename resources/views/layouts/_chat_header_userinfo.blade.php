{{-- 聊天窗口 头部 用户信息 --}}

<div class="chat-header border-bottom py-xl-4 py-md-3 py-2">
    <div class="container-xxl">
        <div class="row align-items-center">

            <div class="col-6 col-xl-4">
                <div class="media">
                    <div class="avatar me-3">
                        <div class="avatar rounded-circle no-image bg-primary text-light">
                            <span><i class="fa fa-commenting-o" aria-hidden="true"></i></span>
                        </div>
                    </div>
                    <div class="media-body overflow-hidden">
                        <div class="d-flex align-items-center mb-1">
                            <h6 class="text-truncate mb-0 me-auto">{{ $user->name }}</h6>
                        </div>
                        <div class="text-truncate">

                            <i class="fa fa-circle" aria-hidden="true" style="color:{{ $user->isonlie ? '#198754' : ' '}} !important;"></i> {{ $user->isonlie ? '在线' : '离线' }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-xl-8 text-end">
            </div>
        </div>
    </div>
</div>
