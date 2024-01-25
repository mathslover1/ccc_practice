<?php
function getPostData(string $key)
{
    return $_POST[$key];
}
function getGetData(string $key)
{
    return $_GET[$key];
}
function getRequestData(string $key, $value)
{
    return $_REQUEST[$key];
}
?>