<?php

function dump($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

function print_arr($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function dd($data)
{
    dump($data);
    die;
}

function abort($code = 404, $title = '404 - Not found')
{
    http_response_code($code);
    require VIEWS . "/errors/{$code}.tpl.php";
    die;
}

function load($fillable = [], $post = true)
{
    $load_data = $post ? $_POST : $_GET;
    $data = [];
    foreach ($fillable as $name) {
        if (isset($load_data[$name])) {
            if (!is_array($load_data[$name])) {
                $data[$name] = trim($load_data[$name]);
            } else {
                $data[$name] = $load_data[$name];
            }
        } else {
            $data[$name] = '';
        }
    }
    return $data;
}

function old($fieldname)
{
    return isset($_POST[$fieldname]) ? h($_POST[$fieldname]) : '';
}

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

function redirect($url = '')
{
    if ($url) {
        $redirect = $url;
    } else {
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    }
    header("Location: {$redirect}");
    die;
}

function get_alerts()
{
    if (!empty($_SESSION['success'])) {
        require_once VIEWS . '/incs/alert_success.php';
        unset($_SESSION['success']);
    }
    if (!empty($_SESSION['error'])) {
        require_once VIEWS . '/incs/alert_error.php';
        unset($_SESSION['error']);
    }
}

function db(): \myfrm\Db
{
    return \myfrm\App::get(\myfrm\Db::class);
}

function check_auth()
{
    return isset($_SESSION['user']);
}

function get_file_ext($file_name)
{
    $file_ext = explode('.', $file_name);
    return end($file_ext);
}
