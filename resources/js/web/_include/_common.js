/*addClass if URL is Root url (is Home page)*/
jQuery('body').toggleClass('is_index home index-page', /\/$/.test(location.pathname));

/**URL added on body tag as a Class**/
jQuery(function () {
    var locReal = window.location.pathname; // returns the full URL
    var loc = locReal.replace(".", "/");
    var split_loc = loc.split('/');
    active_locLastParent2 = split_loc[split_loc.length - 3];
    active_locLastParent = split_loc[split_loc.length - 2];
    active_locLast = split_loc[split_loc.length - 1];


    jQuery('body').addClass(active_locLastParent2 + "-page");
    jQuery('body').addClass(active_locLastParent + "-page");
    jQuery('body').addClass(active_locLast + "-page");


    /*[.nav--activized] added*/
    /*
    	Find domain.com/LastURLname in body and addClass .LastURLname.is-active
    */
    window.setTimeout(function () {
        jQuery('.nav--activized').find("." + active_locLast).addClass("is-active");
        if (!$(".nav--activized nav *").hasClass(active_locLast)) {
            console.log(".nav--activized -> class not found same as Last URL string ");
        }
        jQuery(".nav--activized").find(".active").parent().parent(".dropdown").addClass("open");
    }, 200);
    /*./[.nav--activized] added*/

    //jQuery('body nav').addClass(active_locLast + "-nav");

    var urlParameters = window.location.search; // returns the URL Parameters
    var split_urlParameters = urlParameters.split(/[ .=:;?!~,`"&|()<>{}\[\]\r\n/\\]+/);
    urlParametersLast = split_urlParameters[split_urlParameters.length - 1];
    urlParametersLast2 = split_urlParameters[split_urlParameters.length - 2];
    jQuery('body').addClass("parameter--" + urlParametersLast);
    jQuery('body').addClass("parameter--" + urlParametersLast2);

    var urlHash = window.location.hash;
    var urlHashSplit = urlHash.split("#");
    var urlHashAfterSplit = "-no-hash";
    if (urlHashSplit[1] != null) {
        urlHashAfterSplit = urlHashSplit[1];
    }
    jQuery('body').addClass("hashtag--" + urlHashAfterSplit);


});
/**./URL added on body tag as a Class**/

// /**find current page link and add .active class on navbar link**/
jQuery(function () {
    var url = window.location;
    jQuery('.check-nav a[href="' + url + '"]').addClass('active');
    jQuery('.check-nav a').filter(function () {
        return this.href == url;
    }).addClass('active');
});
// /**./find current page link and add .active class on navbar link**/


jQuery(function () {
    jQuery(".scroller").on("click", function () {
        $(".scroller").removeClass("active");
        $(this).addClass("active");
        // console.log("devops");
        var getHrefVal = $(this).attr('href');
        getHrefVal = getHrefVal.substring(getHrefVal.indexOf("#") + 1);
        getHrefVal = '#' + getHrefVal;
        console.log('getHrefVal-----------' + getHrefVal);

        if(!$("body").hasClass('home')){
            // Store
            localStorage.setItem("hrefVal", getHrefVal);
            location.replace(window.location.origin);
        } else {
            $('html, body').animate({
                scrollTop: $(getHrefVal).offset().top
            }, 500);
        }

    });

    // Retrieve
    var storeHrefVal = localStorage.getItem("hrefVal");
    console.log(storeHrefVal + "-----storeHrefVal");
    if(storeHrefVal !== null && $("body").hasClass('home')) {
        $('html, body').animate({
            scrollTop: $(storeHrefVal).offset().top
        }, 500, function(){
            localStorage.clear();
        });
        
    }
});
