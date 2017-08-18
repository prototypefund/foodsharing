<?php


/*
 * routes to get old stuff run
 */
Route::any('/', function () {

    fs_route();

    fs_filepointer('/index.php');

});


Route::any('/xhrapp.php', function () {

    fs_route();

    fs_filepointer('/xhrapp.php');

});

Route::any('/xhr.php', function () {

    fs_route();

    fs_filepointer('/xhr.php');

});

Route::any('/partner',function() {

    fs_static_route([
        'page' => 'content',
        'sub' => 'partner'
    ]);

});

Route::any('/ueber-uns', function(){
    fs_static_route([
        'page' => 'content',
        'sub' => 'about'
    ]);
});

Route::any('/team', function(){
    fs_static_route([
        'page' => 'team'
    ]);
});

Route::any('/faq', function(){
    fs_static_route([
        'page' => 'content',
        'sub' => 'faq'
    ]);
});

Route::any('/fuer-unternehmen', function(){
    fs_static_route([
        'page' => 'content',
        'sub' => 'fuer_unternehmen'
    ]);
});

Route::any('/leeretonne', function(){
    fs_static_route([
        'page' => 'content',
        'sub' => 'leeretonne'
    ]);
});

Route::any('/fairteilerrettung', function(){
    fs_static_route([
        'page' => 'content',
        'sub' => 'fairteillerrettung'
    ]);
});

Route::any('/unterstuetzung', function(){
    fs_static_route([
        'page' => 'content',
        'sub' => 'unterstuetzung'
    ]);
});

Route::any('/impressum', function(){
    fs_static_route([
        'page' => 'content',
        'sub' => 'impressum'
    ]);
});

Route::any('/ratgeber', function(){
    fs_static_route([
        'page' => 'content',
        'sub' => 'ratgeber'
    ]);
});

Route::any('/recovery', function(){
    fs_static_route([
        'page' => 'login',
        'sub' => 'passwordReset'
    ]);
});

Route::any('/login', function(){
    fs_static_route([
        'page' => 'login'
    ]);
});

Route::any('/profile/{id}', function($id){
    fs_static_route([
        'page' => 'profile',
        'id' => $id
    ]);
})->where('id', '[0-9]+');

Route::any('/karte', function(){
    fs_static_route([
        'page' => 'map'
    ]);
});

Route::any('/news', function(){
    fs_static_route([
        'page' => 'blog'
    ]);
});

Route::any('/blog/{id}', function($id){
    fs_static_route([
        'page' => 'blog',
        'sub' => 'read',
        'id' => (int)$id
    ]);
});

Route::any('/mach-mit', function(){
    fs_static_route([
        'page' => 'join'
    ]);
});

Route::any('/fairteiler', function(){
    fs_static_route([
        'page' => 'fairteiler'
    ]);
});

Route::any('/essenskoerbe/{id}', function($id) {
    fs_dynamic_route([
        'page' => 'basket'
    ]);
});

Route::any('/statistik', function(){
    fs_static_route([
        'page' => 'statistics'
    ]);
});

Route::any('/event', function(){
    fs_static_route([
        'page' => 'register'
    ]);
});

Route::any('/event-en', function(){
    fs_static_route([
        'page' => 'register',
        'lang' => 'en'
    ]);
});

Route::any('/wuppdays', function(){
    return redirect('https://project.yunity.org');
});

Route::get('/empty.html', function() {
    return '';
});


function fs_static_route($get_params = []) {

    foreach ($get_params as $key => $value) {
        $_GET[$key] = $value;
    }

    fs_route();

    fs_filepointer('/index.php');
}

function fs_dynamic_route($get_params = []) {

    foreach ($get_params as $key => $value) {
        $_GET[$key] = $value;
    }

    $_GET['uri'] = urlencode($_SERVER['REQUEST_URI']);

    fs_route();

    fs_filepointer('/index.php');
}

function fs_filepointer($file) {

    /*
     * make global vars accessable
     */

    global $content_main;
    global $content_right;
    global $content_left;
    global $content_top;
    global $content_bottom;
    global $content_left_width;
    global $content_right_width;
    global $g_template;
    global $content_overtop;
    global $js;
    global $g_js_func;
    global $g_head;
    global $g_title;
    global $g_bread;
    global $g_data;
    global $g_form_valid;
    global $g_ids;
    global $g_script;
    global $g_css;
    global $g_add_css;
    global $hidden;
    global $g_meta;
    global $db;
    global $user;
    global $g_body_class;
    global $g_broadcast_message;
    global $quizinfo;

    /*
     * Load all the old Crap :)
     */
    try {
        require_once fs_get_platform_dir() . $file;
    }
    catch(Exception $e) {

        /*
         * later handle error with old app
         */
        //throw $e;

        header('Location: /');
        exit();
    }


}

function fs_route() {
    /*
     * make foodsharing dir as current directory
     */
    chdir(fs_get_platform_dir());

    /*
     * Hack the old autoloading
     */
    $files = glob(fs_get_platform_dir() . '/lib/flourish/*.php');

    /*
     * unset dublicate progressbar file
     */
    unset($files[2]);

    $load_before = [
        fs_get_platform_dir() . '/lib/flourish/fException.php',
        fs_get_platform_dir() . '/lib/flourish/fExpectedException.php',
        fs_get_platform_dir() . '/lib/flourish/fUnexpectedException.php'
    ];

    foreach ($load_before as $file) {
        require_once $file;
    }

    foreach ($files as $file) {

        require_once $file;

    }
    unset($file);
    unset($files);

}

function fs_get_platform_dir()
{
    return base_path('vendor/foodsharing/platform');
}
