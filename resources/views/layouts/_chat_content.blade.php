{{-- 聊天记录 --}}

<div class="chat-content">
    <div class="container-xxl chat-body">
        <ul class="list-unstyled py-4 chat-log">

            @if(count($chat))
                @foreach($chat as $value)

                    @if($value->send_user_id != Auth::id())
                        <li class="message d-flex">

                            <div class="mr-lg-3 me-2">
                                <img class="avatar sm rounded-circle" src="/web/images/avatar1.jpg" alt="avatar">
                            </div>

                            <div class="message-body">

                                <span class="date-time text-muted">{{ $value->suser->name }}({{ $value->cdate }})</span>

                                <div class="message-row d-flex align-items-center">
                                    <div class="message-content p-3">
                                        <dd>{{ $value->chatinfos->content }}</dd>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @else
                        <li class="message right d-flex">

                            <div class="message-body">

                                <span class="date-time text-muted">{{ $value->suser->name }}({{ $value->cdate }})</span>

                                <div class="message-row d-flex align-items-center justify-content-end">
                                    <div class="message-content p-3 border">
                                        <dd>{{ $value->chatinfos->content }}</dd>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endif

                @endforeach
            @endif
            {{-- <li class="d-flex message tpl">

                <div class="mr-lg-3 me-2">
                    <img class="avatar sm rounded-circle" src="/web/images/avatar1.jpg" alt="avatar">
                </div>

                <div class="message-body">

                    <span class="date-time text-muted"></span>

                    <div class="message-row d-flex align-items-center">
                        <div class="message-content p-3">
                            <dd></dd>
                        </div>
                    </div>
                </div>
            </li> --}}

            {{-- <li class="d-flex message">

                <div class="mr-lg-3 me-2">
                    <div class="avatar sm rounded-circle bg-primary d-flex align-items-center justify-content-center">
                        <span>
                            <i class="fa fa-android" aria-hidden="true" style="color: #f8f9fa !important;"></i>
                        </span>
                    </div>
                </div>

                <div class="message-body">



                    <div class="message-row d-flex align-items-center">
                        <div class="message-content p-3">
                            🙌 Welcome back!<br>
                            How may I help you today? 🤖
                        </div>
                    </div>

                    <div class="message-row d-flex align-items-center">
                        <div class="message-content p-3">
                            👋 Hi​! I'm a Bot.<br> Let me know if you have any questions regarding our
                            tool!
                        </div>
                    </div>

                    <div class="message-row d-flex align-items-center">
                        <div class="message-content p-3">
                            Select the topic or write your question below.
                        </div>
                    </div>


                    <div class="message-row d-flex align-items-center">
                        <button type="button"
                            class="btn btn-outline-primary btn-rounded mb-1 me-1">Services</button>
                        <button type="button"
                            class="btn btn-outline-dark btn-rounded mb-1 me-1">Solutions</button>
                        <button type="button" class="btn btn-outline-warning btn-rounded mb-1 me-1">Book
                            a call</button>
                        <button type="button"
                            class="btn btn-outline-primary btn-rounded mb-1 me-1">Leave a
                            message</button>
                    </div>



                </div>
            </li> --}}

            {{-- <li class="d-flex message">

                <div class="mr-lg-3 me-2">
                    <div
                        class="avatar sm rounded-circle bg-primary d-flex align-items-center justify-content-center">
                        <span><i class="fa fa-android" aria-hidden="true" style="color: #f8f9fa !important;"></i></span>
                    </div>
                </div>

                <div class="message-body">

                    <div class="message-row d-flex align-items-center">
                        <div class="card rounded-3">
                            <div class="card-body">
                                <h5 class="card-title">Try it yourself!</h5>
                                <p class="card-text">Try ChatBot for free for 14 days before you buy it.
                                    No credit card required!</p>
                            </div>
                            <div class="card-body">
                                <a href="https://www.17sucai.com/preview/1097306/2021-02-02/postman/dist/signup.html"
                                    class="card-link">✨ Sign up now!</a>
                                <a href="https://www.17sucai.com/preview/1097306/2021-02-02/postman/dist/index.html"
                                    class="card-link">👈 Go to menu</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li> --}}

        </ul>
        <li class="message tpl" style="display:none;">

            <div class="mr-lg-3 me-2">
                <img class="avatar sm rounded-circle" src="/web/images/avatar1.jpg" alt="avatar">
            </div>

            <div class="message-body">

                <span class="date-time text-muted"></span>

                <div class="message-row d-flex align-items-center">
                    <div class="message-content p-3">
                        <dd></dd>
                    </div>
                </div>
            </div>
        </li>

    </div>
</div>
