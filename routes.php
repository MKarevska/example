<?php
return array('admin/keramika'=>'adminKeramika/index',
    'admin/delete/([0-9]+)'=>'adminKeramika/delete/$1',
    'admin/update/([0-9]+)'=>'adminKeramika/update/$1',
    'admin/create'=>'adminKeramika/create',
    'keramika/([0-9]+)'=>'keramika/index/$1',
    'keramika/([a-zA-Z]+)'=>'keramika/katlist/$1',
    'keramika'=>'keramika/list',
    'user/register'=>'user/register',
    'user/login'=>'user/login',
    'dashboard'=>'dashboard/index',
    'user/logout'=>'user/logout',
    'contact'=>'keramika/kontakti',
    ''=>'keramika/home',
    '/'=>'keramika/home',
    
);
