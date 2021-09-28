{{-- 发送消息窗口 --}}

<div class="chat-footer border-top py-xl-4 py-lg-2 py-2">
    <div class="container-xxl">
        <div class="row">
            <div class="col-12">
                    <form id='sendForm' method="POST" class="input-group align-items-center">
                        @csrf

                        <input type="text" id='chat-message' name='message' value="" class="form-control border-0 pl-0" placeholder="输入您的消息并单击发送..." autocomplete="off">
                        <input type="hidden" name='to_uid' value="{{ $user->id }}">

                        <div class="input-group-append d-none d-sm-block">
                            <span class="input-group-text border-0">
                                <button class="btn btn-sm btn-link text-muted" data-toggle="tooltip" title="" type="button" data-original-title="Refresh">
                                    <i class="fa fa-refresh fa-lg" aria-hidden="true"></i>
                                </button>
                            </span>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text border-0">
                                <button class="btn btn-sm btn-link text-muted" data-toggle="tooltip" title="" type="button" data-original-title="Smaily">
                                    <i class="fa fa-smile-o fa-lg" aria-hidden="true"></i>
                                </button>
                            </span>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text border-0">
                                <button class="btn btn-sm btn-link text-muted" data-toggle="tooltip" title="" type="button" data-original-title="Attachment">
                                    <i class="fa fa-paperclip fa-lg" aria-hidden="true"></i>
                                </button>
                            </span>
                        </div>

                        <div class="input-group-append">
                            <span class="input-group-text border-0 pr-0">
                                <button type="button" id="btn-send" class="btn btn-primary">
                                    <span class="d-none d-md-inline-block">发送</span>
                                    <i class="fa fa-paper-plane-o fa-lg" aria-hidden="true"></i>
                                </button>
                            </span>
                        </div>

                    </form>

            </div>
        </div>
    </div>
</div>
