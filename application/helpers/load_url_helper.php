<?php

function asset_url($path=false){
    $ci         =&  get_instance();
    $basePath   =   $ci->config->item('assetPath');
    if($path==false){
        return $basePath;
    }else{
        return $basePath.$path;
    }
}
function api_url($path = false){
    $ci         =&  get_instance();
    $basePath   =   $ci->config->item('apiPath');
    if($path==false){
        return $basePath;
    }else{
        return $basePath.$path;
    }
}


