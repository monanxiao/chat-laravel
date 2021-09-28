<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MoNan-Chat') }}</title>
    <link rel="icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="/web/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="/web/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="/web/css/style.min.css">
    <link rel="stylesheet" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

</head>


<body>


    <div id="layout" class="theme-cyan">

        @yield('content')

    </div>

    <script type="text/javascript" src="/web/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="/web/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="/web/js/bootstrap-datepicker.min.js"></script>
    <script src="/web/js/template.js"></script>
    <script>

        // 回车键事件
        $(this).keydown( function(e) {

            var key = window.event?e.keyCode:e.which;

            // 按下回车键，并且内容不为空的时候
            if(key.toString() == "13")
            {
                // 调用发送消息接口
                if($.trim($('#chat-message').val())){
                    // 发送消息
                    $.post("{{ route('chat.send') }}", $('#sendForm').serialize(), function (res) {
                            $('#chat-message').val("");
                            scrollBottom();
                    }, 'json');
                }

                return false;
            }
        });

        /**
         * 与GatewayWorker建立websocket连接，域名和端口改为你实际的域名端口，
         */
        ws = new WebSocket("ws://192.168.10.10:23461");

        // 服务端主动推送消息时会触发这里的onmessage
        ws.onmessage = function (e) {
            console.log(e)
            // json数据转换成js对象
            var data = JSON.parse(e.data),
                type = data.type || '';

            console.log(data)
            // console.log('类型：' + type)

            switch (type) {

                // init类型的消息，将client_id发给后台进行uid绑定
                case 'init':

                    var client_id = data.client_id,// 客户端clientId
                        uid = "{{ Auth::id() }}",// 登录用户Id
                        url = '/bind/' + uid + '/' + client_id;// url

                    // 利用jquery发起ajax请求，将client_id发给后端进行uid绑定
                    $.get(url, function (res,status) {

                        if(status == 'success') {

                            console.log('绑定成功！');
                        }

                    }, 'json');

                    break;

                case 'send':

                    // 发出内容
                    var $tpl = $('.chat-body>.tpl').clone().show();
                        $tpl.find('span').html(data.name + ' (' + data.cdate + ')');
                        $tpl.find('.me-2').remove() ;
                        $tpl.addClass('right');
                        $tpl.addClass('d-flex');
                        $tpl.find('.message-row').addClass('justify-content-end');
                        $tpl.find('.message-content').addClass('border');
                        $tpl.find('dd').html(data.content.replace(/\n/gim, '<br>'));
                        $('.chat-log').append($tpl);

                        scrollBottom();

                    break;

                case 'bind':

                    // console.log('欢迎回来');
                    console.log(data.message);

                    break;

                case 'msg':
                    var $tpl = $('.chat-body>.tpl').clone().show();
                    $tpl.addClass('d-flex');
                    $tpl.find('span').html(data.name + ' (' + data.cdate + ')');
                    $tpl.find('dd').html(data.content.replace(/\n/gim, '<br>'));
                    $('.chat-log').append($tpl);
                    scrollBottom();

                    break;
                // 当mvc框架调用GatewayClient发消息时直接alert出来
                default:
                    console.log('default', e.data);
            }
        };

        $('#form').submit(function (e) {
            return false;
        });

        var isScrollBottom = true;

        function scrollBottom(){

            if (isScrollBottom) {
                // 自动滚动到底部
                var topheight = $('.chat-log')[0].scrollHeight;
                $('.chat-body').scrollTop(topheight);// 移动滚动条
            }
        }

        // 发送消息
        $('#btn-send').click(function (e) {

            // 输入内容不为空的时候
            if ($.trim($('#chat-message').val())) {
                $.post("{{ route('chat.send') }}", $('#sendForm').serialize(), function (res) {
                    $('#chat-message').val("")
                    scrollBottom();
            }, 'json');
            }
        });

        $('.chat-log').scroll(function (e) {
            var outerHeight = $(this).outerHeight();
            var scrollTop = $(this).scrollTop();
            var scrollHeight = $(this)[0].scrollHeight;
            if (outerHeight + scrollTop >= scrollHeight - 15) {
                isScrollBottom = true;
            } else {
                isScrollBottom = false;
            }
        })

    </script>
</body>

</html>
