<?php

// Check if vertx cookie is present
/**
 * @return void
 */
function checkLogin()
{
    if (isset($_COOKIE['vertx-web_session'])) {
        // request data from api
        $ch = curl_init();
        $url = 'http://localhost:8080/user';
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_COOKIE, 'vertx-web.session=' . $_COOKIE['vertx-web_session']);

        // get response
        $response = curl_exec($ch);
        curl_close($ch);
        $response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($response_code != 200) {
            header('Location: /login.html');
        }
    } else {
        header('Location: /login.html');
    }
}
