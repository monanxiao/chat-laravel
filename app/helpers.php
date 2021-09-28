<?php

// 获取完整 url
function route_uri($name)
{
    return app('router')->getRoutes()->getByName($name)->getUri();
}
