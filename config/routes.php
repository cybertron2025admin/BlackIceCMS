<?php
return [
    '/' => ['App\\Controllers\\AuthController', 'loginPage'],
    '/login' => ['App\\Controllers\\AuthController', 'login'],
    '/logout' => ['App\\Controllers\\AuthController', 'logout'],
    '/dashboard' => ['App\\Controllers\\DashboardController', 'index'],
    '/weapons' => ['App\\Controllers\\WeaponController', 'index'],
    '/weapons/add' => ['App\\Controllers\\WeaponController', 'add'],
    '/weapons/store' => ['App\\Controllers\\WeaponController', 'store'],
    '/weapons/download' => ['App\\Controllers\\WeaponController', 'download'],
    '/weapons/clear' => ['App\\Controllers\\WeaponController', 'clear'],
    '/mail/logs' => ['App\\Controllers\\MailController', 'index'],
    '/password/reset' => ['App\\Controllers\\AuthController', 'resetPage'],
    '/password/reset/submit' => ['App\\Controllers\\AuthController', 'reset'],
    '/password/reset/change' => ['App\\Controllers\\AuthController', 'changePassword'],
    '/password/reset/confirm' => ['App\\Controllers\\AuthController', 'showResetForm'],

    


];