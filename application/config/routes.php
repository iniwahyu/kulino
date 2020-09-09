<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'auth/login';
$route['guru/login'] = 'auth/guruLogin';
$route['siswa/login'] = 'auth/siswaLogin';
$route['logout']    = 'auth/logout';

// Admin
$route['admin'] = 'admin/dashboard';

// Guru
$route['guru'] = 'guru/dashboard';

// Siswa
$route['siswa'] = 'siswa/dashboard';