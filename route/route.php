<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

//后台
Route::get('/login', 'login/login');
Route::post('/dologin', 'login/dologin');
Route::get('/logout', 'login/logout');
Route::get('/nice', 'nice/xiongdienice');
Route::get('/caselist', 'admin/caselist');
Route::get('/caseadd', 'admin/caseadd');

Route::post('caseadd', 'admin/caseadd');
Route::post('caseedit', 'admin/caseedit');
Route::get('/casedel', 'admin/casedel');

return [

];
