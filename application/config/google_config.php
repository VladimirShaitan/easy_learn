<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Facebook App details
| -------------------------------------------------------------------
|
| To get an facebook app details you have to be a registered developer
| at http://developer.facebook.com and create an app for your project.
|
|  facebook_app_id               string   Your facebook app ID.
|  facebook_app_secret           string   Your facebook app secret.
|  facebook_login_type           string   Set login type. (web, js, canvas)
|  facebook_login_redirect_url   string   URL tor redirect back to after login. Do not include domain.
|  facebook_logout_redirect_url  string   URL tor redirect back to after login. Do not include domain.
|  facebook_permissions          array    The permissions you need.
|  facebook_graph_version        string   Set Facebook Graph version to be used. Eg v2.6
|  facebook_auth_on_load         boolean  Set to TRUE to have the library to check for valid access token on every page load.
*/

            // Fill CLIENT ID, CLIENT SECRET ID, REDIRECT URI from Google Developer Console
        $config['client_id'] = '516591428790-hff1u2937imqpn21vauv0p7r4e5k15q6.apps.googleusercontent.com';
        $config['client_secret'] = 'Kfln0G6IRwRvUo0fDrIosa2w';
        $config['redirect_uri']= base_url('glogin/gcallback');