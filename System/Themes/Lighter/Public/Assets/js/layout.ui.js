
jQuery(".alert.alert-slow").slideToggle("slow");
jQuery("form .error.error-slow").slideToggle("slow");

/*
* LAYOUT */
jQuery(".lighter-navbar .brand .nav-toggle").bind("click", function(e){
	e.preventDefault();
	
	jQuery("[role=lighter]").toggleClass("nav-toggle");
});

jQuery(".lighter-navbar .nav-toggle .nav-link").bind("click", function(e){
	e.preventDefault();
	
	jQuery("[role=lighter]").toggleClass("aside-toggle");
});
jQuery(".lighter-aside .lighter-aside-toggle a").bind("click", function(e){
	e.preventDefault();
	
	jQuery("[role=lighter]").toggleClass("aside-toggle");
});

/*
* HELPER */
function str_to_slug (str) {
    str = str.replace(/^\s+|\s+$/g, ''); // trim
    str = str.toLowerCase();
  
    // remove accents, swap ñ for n, etc
    var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
    var to   = "aaaaeeeeiiiioooouuuunc------";
    for (var i=0, l=from.length ; i<l ; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }

    str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
        .replace(/\s+/g, '-') // collapse whitespace and replace by -
        .replace(/-+/g, '-'); // collapse dashes

    return str;
}