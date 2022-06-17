/**find current page link and add .active class on navbar link**/
jQuery(function () {
    var url = window.location;
    jQuery('.main-sidebar .sidebar a[href="' + url + '"]').addClass('active');
    jQuery('.main-sidebar .sidebar a').filter(function () {
        return this.href == url;
    }).addClass('active');
});
/**./find current page link and add .active class on navbar link**/
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