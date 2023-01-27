<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/


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