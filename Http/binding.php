<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

// Route::bind("token", function($token) {
//     return (new Delta\Model\UserReset)->where("token", $token)->first() ?? abort(404);
// });


Route::bind("dealer", function($dealer) {
    return (new Delta\Model\Group)->where("type", "dealer")->where("slug", $dealer)->first() ?? abort(404);
});

Route::bind("__usrID", function($ID){
    return (new \Delta\Model\User)->find($ID) ?? abort(404);
});

Route::bind("__WID", function($ID){
    return (new \Delta\Model\Customer)->find($ID) ?? abort(404);
});

if(__segment(3, "edit") OR __segment(3, "delete") ) {
    Route::bind("id", function($ID){ 
        return (new \Delta\Model\Group)->find($ID) ?? abort(404);
    });
}

Route::bind("__dm", function($ID){
    return (new \Delta\Model\Group)->find($ID) ?? abort(404);
});

Route::bind("__orgID", function($ID){
    if( is_numeric($ID) ) {
        return (new \Delta\Model\Group)->find($ID) ?? abort(404); 
    }
});


Route::bind("__slug", function($slug){
    if( is_string($slug) ) {
        return (new \Delta\Model\Group)->where("slug", $slug)->first() ?? abort(404); 
    }
});

Route::bind("idRol", function($ID){
    return (new \Delta\Model\Group)->find($ID) ?? abort(404);
});

Route::bind("__idAPP", function($ID){
    return (new \Delta\Model\App)->find($ID) ?? abort(404);
});
