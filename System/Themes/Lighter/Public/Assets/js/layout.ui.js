
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