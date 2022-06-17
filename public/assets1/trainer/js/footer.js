/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/trainer/_include/_common.js":
/*!**************************************************!*\
  !*** ./resources/js/trainer/_include/_common.js ***!
  \**************************************************/
/***/ (() => {

eval("/**find current page link and add .active class on navbar link**/\njQuery(function () {\n  var url = window.location;\n  jQuery('.main-sidebar .sidebar a[href=\"' + url + '\"]').addClass('active');\n  jQuery('.main-sidebar .sidebar a').filter(function () {\n    return this.href == url;\n  }).addClass('active');\n});\n/**./find current page link and add .active class on navbar link**/\n\n/*addClass if URL is Root url (is Home page)*/\n\njQuery('body').toggleClass('is_index home index-page', /\\/$/.test(location.pathname));\n/**URL added on body tag as a Class**/\n\njQuery(function () {\n  var locReal = window.location.pathname; // returns the full URL\n\n  var loc = locReal.replace(\".\", \"/\");\n  var split_loc = loc.split('/');\n  active_locLastParent2 = split_loc[split_loc.length - 3];\n  active_locLastParent = split_loc[split_loc.length - 2];\n  active_locLast = split_loc[split_loc.length - 1];\n  jQuery('body').addClass(active_locLastParent2 + \"-page\");\n  jQuery('body').addClass(active_locLastParent + \"-page\");\n  jQuery('body').addClass(active_locLast + \"-page\");\n  var urlParameters = window.location.search; // returns the URL Parameters\n\n  var split_urlParameters = urlParameters.split(/[ .=:;?!~,`\"&|()<>{}\\[\\]\\r\\n/\\\\]+/);\n  urlParametersLast = split_urlParameters[split_urlParameters.length - 1];\n  urlParametersLast2 = split_urlParameters[split_urlParameters.length - 2];\n  jQuery('body').addClass(\"parameter--\" + urlParametersLast);\n  jQuery('body').addClass(\"parameter--\" + urlParametersLast2);\n  var urlHash = window.location.hash;\n  var urlHashSplit = urlHash.split(\"#\");\n  var urlHashAfterSplit = \"-no-hash\";\n\n  if (urlHashSplit[1] != null) {\n    urlHashAfterSplit = urlHashSplit[1];\n  }\n\n  jQuery('body').addClass(\"hashtag--\" + urlHashAfterSplit);\n});\n/**./URL added on body tag as a Class**///# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvdHJhaW5lci9faW5jbHVkZS9fY29tbW9uLmpzPzU4ZmYiXSwibmFtZXMiOlsialF1ZXJ5IiwidXJsIiwid2luZG93IiwibG9jYXRpb24iLCJhZGRDbGFzcyIsImZpbHRlciIsImhyZWYiLCJ0b2dnbGVDbGFzcyIsInRlc3QiLCJwYXRobmFtZSIsImxvY1JlYWwiLCJsb2MiLCJyZXBsYWNlIiwic3BsaXRfbG9jIiwic3BsaXQiLCJhY3RpdmVfbG9jTGFzdFBhcmVudDIiLCJsZW5ndGgiLCJhY3RpdmVfbG9jTGFzdFBhcmVudCIsImFjdGl2ZV9sb2NMYXN0IiwidXJsUGFyYW1ldGVycyIsInNlYXJjaCIsInNwbGl0X3VybFBhcmFtZXRlcnMiLCJ1cmxQYXJhbWV0ZXJzTGFzdCIsInVybFBhcmFtZXRlcnNMYXN0MiIsInVybEhhc2giLCJoYXNoIiwidXJsSGFzaFNwbGl0IiwidXJsSGFzaEFmdGVyU3BsaXQiXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0FBLE1BQU0sQ0FBQyxZQUFZO0FBQ2YsTUFBSUMsR0FBRyxHQUFHQyxNQUFNLENBQUNDLFFBQWpCO0FBQ0FILEVBQUFBLE1BQU0sQ0FBQyxvQ0FBb0NDLEdBQXBDLEdBQTBDLElBQTNDLENBQU4sQ0FBdURHLFFBQXZELENBQWdFLFFBQWhFO0FBQ0FKLEVBQUFBLE1BQU0sQ0FBQywwQkFBRCxDQUFOLENBQW1DSyxNQUFuQyxDQUEwQyxZQUFZO0FBQ2xELFdBQU8sS0FBS0MsSUFBTCxJQUFhTCxHQUFwQjtBQUNILEdBRkQsRUFFR0csUUFGSCxDQUVZLFFBRlo7QUFHSCxDQU5LLENBQU47QUFPQTs7QUFDQTs7QUFDQUosTUFBTSxDQUFDLE1BQUQsQ0FBTixDQUFlTyxXQUFmLENBQTJCLDBCQUEzQixFQUF1RCxNQUFNQyxJQUFOLENBQVdMLFFBQVEsQ0FBQ00sUUFBcEIsQ0FBdkQ7QUFFQTs7QUFDQVQsTUFBTSxDQUFDLFlBQVk7QUFDZixNQUFJVSxPQUFPLEdBQUdSLE1BQU0sQ0FBQ0MsUUFBUCxDQUFnQk0sUUFBOUIsQ0FEZSxDQUN5Qjs7QUFDeEMsTUFBSUUsR0FBRyxHQUFHRCxPQUFPLENBQUNFLE9BQVIsQ0FBZ0IsR0FBaEIsRUFBcUIsR0FBckIsQ0FBVjtBQUNBLE1BQUlDLFNBQVMsR0FBR0YsR0FBRyxDQUFDRyxLQUFKLENBQVUsR0FBVixDQUFoQjtBQUNBQyxFQUFBQSxxQkFBcUIsR0FBR0YsU0FBUyxDQUFDQSxTQUFTLENBQUNHLE1BQVYsR0FBbUIsQ0FBcEIsQ0FBakM7QUFDQUMsRUFBQUEsb0JBQW9CLEdBQUdKLFNBQVMsQ0FBQ0EsU0FBUyxDQUFDRyxNQUFWLEdBQW1CLENBQXBCLENBQWhDO0FBQ0FFLEVBQUFBLGNBQWMsR0FBR0wsU0FBUyxDQUFDQSxTQUFTLENBQUNHLE1BQVYsR0FBbUIsQ0FBcEIsQ0FBMUI7QUFHQWhCLEVBQUFBLE1BQU0sQ0FBQyxNQUFELENBQU4sQ0FBZUksUUFBZixDQUF3QlcscUJBQXFCLEdBQUcsT0FBaEQ7QUFDQWYsRUFBQUEsTUFBTSxDQUFDLE1BQUQsQ0FBTixDQUFlSSxRQUFmLENBQXdCYSxvQkFBb0IsR0FBRyxPQUEvQztBQUNBakIsRUFBQUEsTUFBTSxDQUFDLE1BQUQsQ0FBTixDQUFlSSxRQUFmLENBQXdCYyxjQUFjLEdBQUcsT0FBekM7QUFFQSxNQUFJQyxhQUFhLEdBQUdqQixNQUFNLENBQUNDLFFBQVAsQ0FBZ0JpQixNQUFwQyxDQWJlLENBYTZCOztBQUM1QyxNQUFJQyxtQkFBbUIsR0FBR0YsYUFBYSxDQUFDTCxLQUFkLENBQW9CLG1DQUFwQixDQUExQjtBQUNBUSxFQUFBQSxpQkFBaUIsR0FBR0QsbUJBQW1CLENBQUNBLG1CQUFtQixDQUFDTCxNQUFwQixHQUE2QixDQUE5QixDQUF2QztBQUNBTyxFQUFBQSxrQkFBa0IsR0FBR0YsbUJBQW1CLENBQUNBLG1CQUFtQixDQUFDTCxNQUFwQixHQUE2QixDQUE5QixDQUF4QztBQUNBaEIsRUFBQUEsTUFBTSxDQUFDLE1BQUQsQ0FBTixDQUFlSSxRQUFmLENBQXdCLGdCQUFnQmtCLGlCQUF4QztBQUNBdEIsRUFBQUEsTUFBTSxDQUFDLE1BQUQsQ0FBTixDQUFlSSxRQUFmLENBQXdCLGdCQUFnQm1CLGtCQUF4QztBQUVBLE1BQUlDLE9BQU8sR0FBR3RCLE1BQU0sQ0FBQ0MsUUFBUCxDQUFnQnNCLElBQTlCO0FBQ0EsTUFBSUMsWUFBWSxHQUFHRixPQUFPLENBQUNWLEtBQVIsQ0FBYyxHQUFkLENBQW5CO0FBQ0EsTUFBSWEsaUJBQWlCLEdBQUcsVUFBeEI7O0FBQ0EsTUFBSUQsWUFBWSxDQUFDLENBQUQsQ0FBWixJQUFtQixJQUF2QixFQUE2QjtBQUN6QkMsSUFBQUEsaUJBQWlCLEdBQUdELFlBQVksQ0FBQyxDQUFELENBQWhDO0FBQ0g7O0FBQ0QxQixFQUFBQSxNQUFNLENBQUMsTUFBRCxDQUFOLENBQWVJLFFBQWYsQ0FBd0IsY0FBY3VCLGlCQUF0QztBQUdILENBN0JLLENBQU47QUE4QkEiLCJzb3VyY2VzQ29udGVudCI6WyIvKipmaW5kIGN1cnJlbnQgcGFnZSBsaW5rIGFuZCBhZGQgLmFjdGl2ZSBjbGFzcyBvbiBuYXZiYXIgbGluayoqL1xualF1ZXJ5KGZ1bmN0aW9uICgpIHtcbiAgICB2YXIgdXJsID0gd2luZG93LmxvY2F0aW9uO1xuICAgIGpRdWVyeSgnLm1haW4tc2lkZWJhciAuc2lkZWJhciBhW2hyZWY9XCInICsgdXJsICsgJ1wiXScpLmFkZENsYXNzKCdhY3RpdmUnKTtcbiAgICBqUXVlcnkoJy5tYWluLXNpZGViYXIgLnNpZGViYXIgYScpLmZpbHRlcihmdW5jdGlvbiAoKSB7XG4gICAgICAgIHJldHVybiB0aGlzLmhyZWYgPT0gdXJsO1xuICAgIH0pLmFkZENsYXNzKCdhY3RpdmUnKTtcbn0pO1xuLyoqLi9maW5kIGN1cnJlbnQgcGFnZSBsaW5rIGFuZCBhZGQgLmFjdGl2ZSBjbGFzcyBvbiBuYXZiYXIgbGluayoqL1xuLyphZGRDbGFzcyBpZiBVUkwgaXMgUm9vdCB1cmwgKGlzIEhvbWUgcGFnZSkqL1xualF1ZXJ5KCdib2R5JykudG9nZ2xlQ2xhc3MoJ2lzX2luZGV4IGhvbWUgaW5kZXgtcGFnZScsIC9cXC8kLy50ZXN0KGxvY2F0aW9uLnBhdGhuYW1lKSk7XG5cbi8qKlVSTCBhZGRlZCBvbiBib2R5IHRhZyBhcyBhIENsYXNzKiovXG5qUXVlcnkoZnVuY3Rpb24gKCkge1xuICAgIHZhciBsb2NSZWFsID0gd2luZG93LmxvY2F0aW9uLnBhdGhuYW1lOyAvLyByZXR1cm5zIHRoZSBmdWxsIFVSTFxuICAgIHZhciBsb2MgPSBsb2NSZWFsLnJlcGxhY2UoXCIuXCIsIFwiL1wiKTtcbiAgICB2YXIgc3BsaXRfbG9jID0gbG9jLnNwbGl0KCcvJyk7XG4gICAgYWN0aXZlX2xvY0xhc3RQYXJlbnQyID0gc3BsaXRfbG9jW3NwbGl0X2xvYy5sZW5ndGggLSAzXTtcbiAgICBhY3RpdmVfbG9jTGFzdFBhcmVudCA9IHNwbGl0X2xvY1tzcGxpdF9sb2MubGVuZ3RoIC0gMl07XG4gICAgYWN0aXZlX2xvY0xhc3QgPSBzcGxpdF9sb2Nbc3BsaXRfbG9jLmxlbmd0aCAtIDFdO1xuXG5cbiAgICBqUXVlcnkoJ2JvZHknKS5hZGRDbGFzcyhhY3RpdmVfbG9jTGFzdFBhcmVudDIgKyBcIi1wYWdlXCIpO1xuICAgIGpRdWVyeSgnYm9keScpLmFkZENsYXNzKGFjdGl2ZV9sb2NMYXN0UGFyZW50ICsgXCItcGFnZVwiKTtcbiAgICBqUXVlcnkoJ2JvZHknKS5hZGRDbGFzcyhhY3RpdmVfbG9jTGFzdCArIFwiLXBhZ2VcIik7XG5cbiAgICB2YXIgdXJsUGFyYW1ldGVycyA9IHdpbmRvdy5sb2NhdGlvbi5zZWFyY2g7IC8vIHJldHVybnMgdGhlIFVSTCBQYXJhbWV0ZXJzXG4gICAgdmFyIHNwbGl0X3VybFBhcmFtZXRlcnMgPSB1cmxQYXJhbWV0ZXJzLnNwbGl0KC9bIC49Ojs/IX4sYFwiJnwoKTw+e31cXFtcXF1cXHJcXG4vXFxcXF0rLyk7XG4gICAgdXJsUGFyYW1ldGVyc0xhc3QgPSBzcGxpdF91cmxQYXJhbWV0ZXJzW3NwbGl0X3VybFBhcmFtZXRlcnMubGVuZ3RoIC0gMV07XG4gICAgdXJsUGFyYW1ldGVyc0xhc3QyID0gc3BsaXRfdXJsUGFyYW1ldGVyc1tzcGxpdF91cmxQYXJhbWV0ZXJzLmxlbmd0aCAtIDJdO1xuICAgIGpRdWVyeSgnYm9keScpLmFkZENsYXNzKFwicGFyYW1ldGVyLS1cIiArIHVybFBhcmFtZXRlcnNMYXN0KTtcbiAgICBqUXVlcnkoJ2JvZHknKS5hZGRDbGFzcyhcInBhcmFtZXRlci0tXCIgKyB1cmxQYXJhbWV0ZXJzTGFzdDIpO1xuXG4gICAgdmFyIHVybEhhc2ggPSB3aW5kb3cubG9jYXRpb24uaGFzaDtcbiAgICB2YXIgdXJsSGFzaFNwbGl0ID0gdXJsSGFzaC5zcGxpdChcIiNcIik7XG4gICAgdmFyIHVybEhhc2hBZnRlclNwbGl0ID0gXCItbm8taGFzaFwiO1xuICAgIGlmICh1cmxIYXNoU3BsaXRbMV0gIT0gbnVsbCkge1xuICAgICAgICB1cmxIYXNoQWZ0ZXJTcGxpdCA9IHVybEhhc2hTcGxpdFsxXTtcbiAgICB9XG4gICAgalF1ZXJ5KCdib2R5JykuYWRkQ2xhc3MoXCJoYXNodGFnLS1cIiArIHVybEhhc2hBZnRlclNwbGl0KTtcblxuXG59KTtcbi8qKi4vVVJMIGFkZGVkIG9uIGJvZHkgdGFnIGFzIGEgQ2xhc3MqKi8iXSwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL3RyYWluZXIvX2luY2x1ZGUvX2NvbW1vbi5qcy5qcyIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/trainer/_include/_common.js\n");

/***/ }),

/***/ "./resources/js/trainer/adminlte.js":
/*!******************************************!*\
  !*** ./resources/js/trainer/adminlte.js ***!
  \******************************************/
/***/ (function(module, exports) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/*!
 * AdminLTE v3.0.1 (https://adminlte.io)
 * Copyright 2014-2019 Colorlib <http://colorlib.com>
 * Licensed under MIT (https://github.com/ColorlibHQ/AdminLTE/blob/master/LICENSE)
 */
(function (global, factory) {
  ( false ? 0 : _typeof(exports)) === 'object' && "object" !== 'undefined' ? factory(exports) :  true ? !(__WEBPACK_AMD_DEFINE_ARRAY__ = [exports], __WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
		__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
		(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : (0);
})(this, function (exports) {
  'use strict';
  /**
   * --------------------------------------------
   * AdminLTE ControlSidebar.js
   * License MIT
   * --------------------------------------------
   */

  var ControlSidebar = function ($) {
    /**
     * Constants
     * ====================================================
     */
    var NAME = 'ControlSidebar';
    var DATA_KEY = 'lte.controlsidebar';
    var EVENT_KEY = "." + DATA_KEY;
    var JQUERY_NO_CONFLICT = $.fn[NAME];
    var Event = {
      COLLAPSED: "collapsed" + EVENT_KEY,
      EXPANDED: "expanded" + EVENT_KEY
    };
    var Selector = {
      CONTROL_SIDEBAR: '.control-sidebar',
      CONTROL_SIDEBAR_CONTENT: '.control-sidebar-content',
      DATA_TOGGLE: '[data-widget="control-sidebar"]',
      CONTENT: '.content-wrapper',
      HEADER: '.main-header',
      FOOTER: '.main-footer'
    };
    var ClassName = {
      CONTROL_SIDEBAR_ANIMATE: 'control-sidebar-animate',
      CONTROL_SIDEBAR_OPEN: 'control-sidebar-open',
      CONTROL_SIDEBAR_SLIDE: 'control-sidebar-slide-open',
      LAYOUT_FIXED: 'layout-fixed',
      NAVBAR_FIXED: 'layout-navbar-fixed',
      NAVBAR_SM_FIXED: 'layout-sm-navbar-fixed',
      NAVBAR_MD_FIXED: 'layout-md-navbar-fixed',
      NAVBAR_LG_FIXED: 'layout-lg-navbar-fixed',
      NAVBAR_XL_FIXED: 'layout-xl-navbar-fixed',
      FOOTER_FIXED: 'layout-footer-fixed',
      FOOTER_SM_FIXED: 'layout-sm-footer-fixed',
      FOOTER_MD_FIXED: 'layout-md-footer-fixed',
      FOOTER_LG_FIXED: 'layout-lg-footer-fixed',
      FOOTER_XL_FIXED: 'layout-xl-footer-fixed'
    };
    var Default = {
      controlsidebarSlide: true,
      scrollbarTheme: 'os-theme-light',
      scrollbarAutoHide: 'l'
    };
    /**
     * Class Definition
     * ====================================================
     */

    var ControlSidebar = /*#__PURE__*/function () {
      function ControlSidebar(element, config) {
        this._element = element;
        this._config = config;

        this._init();
      } // Public


      var _proto = ControlSidebar.prototype;

      _proto.show = function show() {
        // Show the control sidebar
        if (this._config.controlsidebarSlide) {
          $('html').addClass(ClassName.CONTROL_SIDEBAR_ANIMATE);
          $('body').removeClass(ClassName.CONTROL_SIDEBAR_SLIDE).delay(300).queue(function () {
            $(Selector.CONTROL_SIDEBAR).hide();
            $('html').removeClass(ClassName.CONTROL_SIDEBAR_ANIMATE);
            $(this).dequeue();
          });
        } else {
          $('body').removeClass(ClassName.CONTROL_SIDEBAR_OPEN);
        }

        var expandedEvent = $.Event(Event.EXPANDED);
        $(this._element).trigger(expandedEvent);
      };

      _proto.collapse = function collapse() {
        // Collapse the control sidebar
        if (this._config.controlsidebarSlide) {
          $('html').addClass(ClassName.CONTROL_SIDEBAR_ANIMATE);
          $(Selector.CONTROL_SIDEBAR).show().delay(10).queue(function () {
            $('body').addClass(ClassName.CONTROL_SIDEBAR_SLIDE).delay(300).queue(function () {
              $('html').removeClass(ClassName.CONTROL_SIDEBAR_ANIMATE);
              $(this).dequeue();
            });
            $(this).dequeue();
          });
        } else {
          $('body').addClass(ClassName.CONTROL_SIDEBAR_OPEN);
        }

        var collapsedEvent = $.Event(Event.COLLAPSED);
        $(this._element).trigger(collapsedEvent);
      };

      _proto.toggle = function toggle() {
        var shouldOpen = $('body').hasClass(ClassName.CONTROL_SIDEBAR_OPEN) || $('body').hasClass(ClassName.CONTROL_SIDEBAR_SLIDE);

        if (shouldOpen) {
          // Open the control sidebar
          this.show();
        } else {
          // Close the control sidebar
          this.collapse();
        }
      } // Private
      ;

      _proto._init = function _init() {
        var _this = this;

        this._fixHeight();

        this._fixScrollHeight();

        $(window).resize(function () {
          _this._fixHeight();

          _this._fixScrollHeight();
        });
        $(window).scroll(function () {
          if ($('body').hasClass(ClassName.CONTROL_SIDEBAR_OPEN) || $('body').hasClass(ClassName.CONTROL_SIDEBAR_SLIDE)) {
            _this._fixScrollHeight();
          }
        });
      };

      _proto._fixScrollHeight = function _fixScrollHeight() {
        var heights = {
          scroll: $(document).height(),
          window: $(window).height(),
          header: $(Selector.HEADER).outerHeight(),
          footer: $(Selector.FOOTER).outerHeight()
        };
        var positions = {
          bottom: Math.abs(heights.window + $(window).scrollTop() - heights.scroll),
          top: $(window).scrollTop()
        };
        var navbarFixed = false;
        var footerFixed = false;

        if ($('body').hasClass(ClassName.LAYOUT_FIXED)) {
          if ($('body').hasClass(ClassName.NAVBAR_FIXED) || $('body').hasClass(ClassName.NAVBAR_SM_FIXED) || $('body').hasClass(ClassName.NAVBAR_MD_FIXED) || $('body').hasClass(ClassName.NAVBAR_LG_FIXED) || $('body').hasClass(ClassName.NAVBAR_XL_FIXED)) {
            if ($(Selector.HEADER).css("position") === "fixed") {
              navbarFixed = true;
            }
          }

          if ($('body').hasClass(ClassName.FOOTER_FIXED) || $('body').hasClass(ClassName.FOOTER_SM_FIXED) || $('body').hasClass(ClassName.FOOTER_MD_FIXED) || $('body').hasClass(ClassName.FOOTER_LG_FIXED) || $('body').hasClass(ClassName.FOOTER_XL_FIXED)) {
            if ($(Selector.FOOTER).css("position") === "fixed") {
              footerFixed = true;
            }
          }

          if (positions.top === 0 && positions.bottom === 0) {
            $(Selector.CONTROL_SIDEBAR).css('bottom', heights.footer);
            $(Selector.CONTROL_SIDEBAR).css('top', heights.header);
            $(Selector.CONTROL_SIDEBAR + ', ' + Selector.CONTROL_SIDEBAR + ' ' + Selector.CONTROL_SIDEBAR_CONTENT).css('height', heights.window - (heights.header + heights.footer));
          } else if (positions.bottom <= heights.footer) {
            if (footerFixed === false) {
              $(Selector.CONTROL_SIDEBAR).css('bottom', heights.footer - positions.bottom);
              $(Selector.CONTROL_SIDEBAR + ', ' + Selector.CONTROL_SIDEBAR + ' ' + Selector.CONTROL_SIDEBAR_CONTENT).css('height', heights.window - (heights.footer - positions.bottom));
            } else {
              $(Selector.CONTROL_SIDEBAR).css('bottom', heights.footer);
            }
          } else if (positions.top <= heights.header) {
            if (navbarFixed === false) {
              $(Selector.CONTROL_SIDEBAR).css('top', heights.header - positions.top);
              $(Selector.CONTROL_SIDEBAR + ', ' + Selector.CONTROL_SIDEBAR + ' ' + Selector.CONTROL_SIDEBAR_CONTENT).css('height', heights.window - (heights.header - positions.top));
            } else {
              $(Selector.CONTROL_SIDEBAR).css('top', heights.header);
            }
          } else {
            if (navbarFixed === false) {
              $(Selector.CONTROL_SIDEBAR).css('top', 0);
              $(Selector.CONTROL_SIDEBAR + ', ' + Selector.CONTROL_SIDEBAR + ' ' + Selector.CONTROL_SIDEBAR_CONTENT).css('height', heights.window);
            } else {
              $(Selector.CONTROL_SIDEBAR).css('top', heights.header);
            }
          }
        }
      };

      _proto._fixHeight = function _fixHeight() {
        var heights = {
          window: $(window).height(),
          header: $(Selector.HEADER).outerHeight(),
          footer: $(Selector.FOOTER).outerHeight()
        };

        if ($('body').hasClass(ClassName.LAYOUT_FIXED)) {
          var sidebarHeight = heights.window - heights.header;

          if ($('body').hasClass(ClassName.FOOTER_FIXED) || $('body').hasClass(ClassName.FOOTER_SM_FIXED) || $('body').hasClass(ClassName.FOOTER_MD_FIXED) || $('body').hasClass(ClassName.FOOTER_LG_FIXED) || $('body').hasClass(ClassName.FOOTER_XL_FIXED)) {
            if ($(Selector.FOOTER).css("position") === "fixed") {
              sidebarHeight = heights.window - heights.header - heights.footer;
            }
          }

          $(Selector.CONTROL_SIDEBAR + ' ' + Selector.CONTROL_SIDEBAR_CONTENT).css('height', sidebarHeight);

          if (typeof $.fn.overlayScrollbars !== 'undefined') {
            $(Selector.CONTROL_SIDEBAR + ' ' + Selector.CONTROL_SIDEBAR_CONTENT).overlayScrollbars({
              className: this._config.scrollbarTheme,
              sizeAutoCapable: true,
              scrollbars: {
                autoHide: this._config.scrollbarAutoHide,
                clickScrolling: true
              }
            });
          }
        }
      } // Static
      ;

      ControlSidebar._jQueryInterface = function _jQueryInterface(operation) {
        return this.each(function () {
          var data = $(this).data(DATA_KEY);

          var _options = $.extend({}, Default, $(this).data());

          if (!data) {
            data = new ControlSidebar(this, _options);
            $(this).data(DATA_KEY, data);
          }

          if (data[operation] === 'undefined') {
            throw new Error(operation + " is not a function");
          }

          data[operation]();
        });
      };

      return ControlSidebar;
    }();
    /**
     *
     * Data Api implementation
     * ====================================================
     */


    $(document).on('click', Selector.DATA_TOGGLE, function (event) {
      event.preventDefault();

      ControlSidebar._jQueryInterface.call($(this), 'toggle');
    });
    /**
     * jQuery API
     * ====================================================
     */

    $.fn[NAME] = ControlSidebar._jQueryInterface;
    $.fn[NAME].Constructor = ControlSidebar;

    $.fn[NAME].noConflict = function () {
      $.fn[NAME] = JQUERY_NO_CONFLICT;
      return ControlSidebar._jQueryInterface;
    };

    return ControlSidebar;
  }(jQuery);
  /**
   * --------------------------------------------
   * AdminLTE Layout.js
   * License MIT
   * --------------------------------------------
   */


  var Layout = function ($) {
    /**
     * Constants
     * ====================================================
     */
    var NAME = 'Layout';
    var DATA_KEY = 'lte.layout';
    var JQUERY_NO_CONFLICT = $.fn[NAME];
    var Selector = {
      HEADER: '.main-header',
      MAIN_SIDEBAR: '.main-sidebar',
      SIDEBAR: '.main-sidebar .sidebar',
      CONTENT: '.content-wrapper',
      BRAND: '.brand-link',
      CONTENT_HEADER: '.content-header',
      WRAPPER: '.wrapper',
      CONTROL_SIDEBAR: '.control-sidebar',
      LAYOUT_FIXED: '.layout-fixed',
      FOOTER: '.main-footer',
      PUSHMENU_BTN: '[data-widget="pushmenu"]',
      LOGIN_BOX: '.login-box',
      REGISTER_BOX: '.register-box'
    };
    var ClassName = {
      HOLD: 'hold-transition',
      SIDEBAR: 'main-sidebar',
      CONTENT_FIXED: 'content-fixed',
      SIDEBAR_FOCUSED: 'sidebar-focused',
      LAYOUT_FIXED: 'layout-fixed',
      NAVBAR_FIXED: 'layout-navbar-fixed',
      FOOTER_FIXED: 'layout-footer-fixed',
      LOGIN_PAGE: 'login-page',
      REGISTER_PAGE: 'register-page'
    };
    var Default = {
      scrollbarTheme: 'os-theme-light',
      scrollbarAutoHide: 'l'
    };
    /**
     * Class Definition
     * ====================================================
     */

    var Layout = /*#__PURE__*/function () {
      function Layout(element, config) {
        this._config = config;
        this._element = element;

        this._init();
      } // Public


      var _proto = Layout.prototype;

      _proto.fixLayoutHeight = function fixLayoutHeight() {
        var heights = {
          window: $(window).height(),
          header: $(Selector.HEADER).length !== 0 ? $(Selector.HEADER).outerHeight() : 0,
          footer: $(Selector.FOOTER).length !== 0 ? $(Selector.FOOTER).outerHeight() : 0,
          sidebar: $(Selector.SIDEBAR).length !== 0 ? $(Selector.SIDEBAR).height() : 0
        };

        var max = this._max(heights);

        if (max == heights.window) {
          $(Selector.CONTENT).css('min-height', max - heights.header - heights.footer);
        } else {
          $(Selector.CONTENT).css('min-height', max - heights.header);
        }

        if ($('body').hasClass(ClassName.LAYOUT_FIXED)) {
          $(Selector.CONTENT).css('min-height', max - heights.header - heights.footer);

          if (typeof $.fn.overlayScrollbars !== 'undefined') {
            $(Selector.SIDEBAR).overlayScrollbars({
              className: this._config.scrollbarTheme,
              sizeAutoCapable: true,
              scrollbars: {
                autoHide: this._config.scrollbarAutoHide,
                clickScrolling: true
              }
            });
          }
        }
      } // Private
      ;

      _proto._init = function _init() {
        var _this = this; // Activate layout height watcher


        this.fixLayoutHeight();
        $(Selector.SIDEBAR).on('collapsed.lte.treeview expanded.lte.treeview', function () {
          _this.fixLayoutHeight();
        });
        $(Selector.PUSHMENU_BTN).on('collapsed.lte.pushmenu shown.lte.pushmenu', function () {
          _this.fixLayoutHeight();
        });
        $(window).resize(function () {
          _this.fixLayoutHeight();
        });

        if (!$('body').hasClass(ClassName.LOGIN_PAGE) && !$('body').hasClass(ClassName.REGISTER_PAGE)) {
          $('body, html').css('height', 'auto');
        } else if ($('body').hasClass(ClassName.LOGIN_PAGE) || $('body').hasClass(ClassName.REGISTER_PAGE)) {
          var box_height = $(Selector.LOGIN_BOX + ', ' + Selector.REGISTER_BOX).height();
          $('body').css('min-height', box_height);
        }

        $('body.hold-transition').removeClass('hold-transition');
      };

      _proto._max = function _max(numbers) {
        // Calculate the maximum number in a list
        var max = 0;
        Object.keys(numbers).forEach(function (key) {
          if (numbers[key] > max) {
            max = numbers[key];
          }
        });
        return max;
      } // Static
      ;

      Layout._jQueryInterface = function _jQueryInterface(config) {
        return this.each(function () {
          var data = $(this).data(DATA_KEY);

          var _options = $.extend({}, Default, $(this).data());

          if (!data) {
            data = new Layout($(this), _options);
            $(this).data(DATA_KEY, data);
          }

          if (config === 'init') {
            data[config]();
          }
        });
      };

      return Layout;
    }();
    /**
     * Data API
     * ====================================================
     */


    $(window).on('load', function () {
      Layout._jQueryInterface.call($('body'));
    });
    $(Selector.SIDEBAR + ' a').on('focusin', function () {
      $(Selector.MAIN_SIDEBAR).addClass(ClassName.SIDEBAR_FOCUSED);
    });
    $(Selector.SIDEBAR + ' a').on('focusout', function () {
      $(Selector.MAIN_SIDEBAR).removeClass(ClassName.SIDEBAR_FOCUSED);
    });
    /**
     * jQuery API
     * ====================================================
     */

    $.fn[NAME] = Layout._jQueryInterface;
    $.fn[NAME].Constructor = Layout;

    $.fn[NAME].noConflict = function () {
      $.fn[NAME] = JQUERY_NO_CONFLICT;
      return Layout._jQueryInterface;
    };

    return Layout;
  }(jQuery);
  /**
   * --------------------------------------------
   * AdminLTE PushMenu.js
   * License MIT
   * --------------------------------------------
   */


  var PushMenu = function ($) {
    /**
     * Constants
     * ====================================================
     */
    var NAME = 'PushMenu';
    var DATA_KEY = 'lte.pushmenu';
    var EVENT_KEY = "." + DATA_KEY;
    var JQUERY_NO_CONFLICT = $.fn[NAME];
    var Event = {
      COLLAPSED: "collapsed" + EVENT_KEY,
      SHOWN: "shown" + EVENT_KEY
    };
    var Default = {
      autoCollapseSize: 992,
      enableRemember: false,
      noTransitionAfterReload: true
    };
    var Selector = {
      TOGGLE_BUTTON: '[data-widget="pushmenu"]',
      SIDEBAR_MINI: '.sidebar-mini',
      SIDEBAR_COLLAPSED: '.sidebar-collapse',
      BODY: 'body',
      OVERLAY: '#sidebar-overlay',
      WRAPPER: '.wrapper'
    };
    var ClassName = {
      SIDEBAR_OPEN: 'sidebar-open',
      COLLAPSED: 'sidebar-collapse',
      OPEN: 'sidebar-open'
    };
    /**
     * Class Definition
     * ====================================================
     */

    var PushMenu = /*#__PURE__*/function () {
      function PushMenu(element, options) {
        this._element = element;
        this._options = $.extend({}, Default, options);

        if (!$(Selector.OVERLAY).length) {
          this._addOverlay();
        }

        this._init();
      } // Public


      var _proto = PushMenu.prototype;

      _proto.expand = function expand() {
        if (this._options.autoCollapseSize) {
          if ($(window).width() <= this._options.autoCollapseSize) {
            $(Selector.BODY).addClass(ClassName.OPEN);
          }
        }

        $(Selector.BODY).removeClass(ClassName.COLLAPSED);

        if (this._options.enableRemember) {
          localStorage.setItem("remember" + EVENT_KEY, ClassName.OPEN);
        }

        var shownEvent = $.Event(Event.SHOWN);
        $(this._element).trigger(shownEvent);
      };

      _proto.collapse = function collapse() {
        if (this._options.autoCollapseSize) {
          if ($(window).width() <= this._options.autoCollapseSize) {
            $(Selector.BODY).removeClass(ClassName.OPEN);
          }
        }

        $(Selector.BODY).addClass(ClassName.COLLAPSED);

        if (this._options.enableRemember) {
          localStorage.setItem("remember" + EVENT_KEY, ClassName.COLLAPSED);
        }

        var collapsedEvent = $.Event(Event.COLLAPSED);
        $(this._element).trigger(collapsedEvent);
      };

      _proto.toggle = function toggle() {
        if (!$(Selector.BODY).hasClass(ClassName.COLLAPSED)) {
          this.collapse();
        } else {
          this.expand();
        }
      };

      _proto.autoCollapse = function autoCollapse(resize) {
        if (resize === void 0) {
          resize = false;
        }

        if (this._options.autoCollapseSize) {
          if ($(window).width() <= this._options.autoCollapseSize) {
            if (!$(Selector.BODY).hasClass(ClassName.OPEN)) {
              this.collapse();
            }
          } else if (resize == true) {
            if ($(Selector.BODY).hasClass(ClassName.OPEN)) {
              $(Selector.BODY).removeClass(ClassName.OPEN);
            }
          }
        }
      };

      _proto.remember = function remember() {
        if (this._options.enableRemember) {
          var toggleState = localStorage.getItem("remember" + EVENT_KEY);

          if (toggleState == ClassName.COLLAPSED) {
            if (this._options.noTransitionAfterReload) {
              $("body").addClass('hold-transition').addClass(ClassName.COLLAPSED).delay(50).queue(function () {
                $(this).removeClass('hold-transition');
                $(this).dequeue();
              });
            } else {
              $("body").addClass(ClassName.COLLAPSED);
            }
          } else {
            if (this._options.noTransitionAfterReload) {
              $("body").addClass('hold-transition').removeClass(ClassName.COLLAPSED).delay(50).queue(function () {
                $(this).removeClass('hold-transition');
                $(this).dequeue();
              });
            } else {
              $("body").removeClass(ClassName.COLLAPSED);
            }
          }
        }
      } // Private
      ;

      _proto._init = function _init() {
        var _this = this;

        this.remember();
        this.autoCollapse();
        $(window).resize(function () {
          _this.autoCollapse(true);
        });
      };

      _proto._addOverlay = function _addOverlay() {
        var _this2 = this;

        var overlay = $('<div />', {
          id: 'sidebar-overlay'
        });
        overlay.on('click', function () {
          _this2.collapse();
        });
        $(Selector.WRAPPER).append(overlay);
      } // Static
      ;

      PushMenu._jQueryInterface = function _jQueryInterface(operation) {
        return this.each(function () {
          var data = $(this).data(DATA_KEY);

          var _options = $.extend({}, Default, $(this).data());

          if (!data) {
            data = new PushMenu(this, _options);
            $(this).data(DATA_KEY, data);
          }

          if (typeof operation === 'string' && operation.match(/collapse|expand|toggle/)) {
            data[operation]();
          }
        });
      };

      return PushMenu;
    }();
    /**
     * Data API
     * ====================================================
     */


    $(document).on('click', Selector.TOGGLE_BUTTON, function (event) {
      event.preventDefault();
      var button = event.currentTarget;

      if ($(button).data('widget') !== 'pushmenu') {
        button = $(button).closest(Selector.TOGGLE_BUTTON);
      }

      PushMenu._jQueryInterface.call($(button), 'toggle');
    });
    $(window).on('load', function () {
      PushMenu._jQueryInterface.call($(Selector.TOGGLE_BUTTON));
    });
    /**
     * jQuery API
     * ====================================================
     */

    $.fn[NAME] = PushMenu._jQueryInterface;
    $.fn[NAME].Constructor = PushMenu;

    $.fn[NAME].noConflict = function () {
      $.fn[NAME] = JQUERY_NO_CONFLICT;
      return PushMenu._jQueryInterface;
    };

    return PushMenu;
  }(jQuery);
  /**
   * --------------------------------------------
   * AdminLTE Treeview.js
   * License MIT
   * --------------------------------------------
   */


  var Treeview = function ($) {
    /**
     * Constants
     * ====================================================
     */
    var NAME = 'Treeview';
    var DATA_KEY = 'lte.treeview';
    var EVENT_KEY = "." + DATA_KEY;
    var JQUERY_NO_CONFLICT = $.fn[NAME];
    var Event = {
      SELECTED: "selected" + EVENT_KEY,
      EXPANDED: "expanded" + EVENT_KEY,
      COLLAPSED: "collapsed" + EVENT_KEY,
      LOAD_DATA_API: "load" + EVENT_KEY
    };
    var Selector = {
      LI: '.nav-item',
      LINK: '.nav-link',
      TREEVIEW_MENU: '.nav-treeview',
      OPEN: '.menu-open',
      DATA_WIDGET: '[data-widget="treeview"]'
    };
    var ClassName = {
      LI: 'nav-item',
      LINK: 'nav-link',
      TREEVIEW_MENU: 'nav-treeview',
      OPEN: 'menu-open',
      SIDEBAR_COLLAPSED: 'sidebar-collapse'
    };
    var Default = {
      trigger: Selector.DATA_WIDGET + " " + Selector.LINK,
      animationSpeed: 300,
      accordion: true,
      expandSidebar: false,
      sidebarButtonSelector: '[data-widget="pushmenu"]'
    };
    /**
     * Class Definition
     * ====================================================
     */

    var Treeview = /*#__PURE__*/function () {
      function Treeview(element, config) {
        this._config = config;
        this._element = element;
      } // Public


      var _proto = Treeview.prototype;

      _proto.init = function init() {
        this._setupListeners();
      };

      _proto.expand = function expand(treeviewMenu, parentLi) {
        var _this = this;

        var expandedEvent = $.Event(Event.EXPANDED);

        if (this._config.accordion) {
          var openMenuLi = parentLi.siblings(Selector.OPEN).first();
          var openTreeview = openMenuLi.find(Selector.TREEVIEW_MENU).first();
          this.collapse(openTreeview, openMenuLi);
        }

        treeviewMenu.stop().slideDown(this._config.animationSpeed, function () {
          parentLi.addClass(ClassName.OPEN);
          $(_this._element).trigger(expandedEvent);
        });

        if (this._config.expandSidebar) {
          this._expandSidebar();
        }
      };

      _proto.collapse = function collapse(treeviewMenu, parentLi) {
        var _this2 = this;

        var collapsedEvent = $.Event(Event.COLLAPSED);
        treeviewMenu.stop().slideUp(this._config.animationSpeed, function () {
          parentLi.removeClass(ClassName.OPEN);
          $(_this2._element).trigger(collapsedEvent);
          treeviewMenu.find(Selector.OPEN + " > " + Selector.TREEVIEW_MENU).slideUp();
          treeviewMenu.find(Selector.OPEN).removeClass(ClassName.OPEN);
        });
      };

      _proto.toggle = function toggle(event) {
        var $relativeTarget = $(event.currentTarget);
        var $parent = $relativeTarget.parent();
        var treeviewMenu = $parent.find('> ' + Selector.TREEVIEW_MENU);

        if (!treeviewMenu.is(Selector.TREEVIEW_MENU)) {
          if (!$parent.is(Selector.LI)) {
            treeviewMenu = $parent.parent().find('> ' + Selector.TREEVIEW_MENU);
          }

          if (!treeviewMenu.is(Selector.TREEVIEW_MENU)) {
            return;
          }
        }

        event.preventDefault();
        var parentLi = $relativeTarget.parents(Selector.LI).first();
        var isOpen = parentLi.hasClass(ClassName.OPEN);

        if (isOpen) {
          this.collapse($(treeviewMenu), parentLi);
        } else {
          this.expand($(treeviewMenu), parentLi);
        }
      } // Private
      ;

      _proto._setupListeners = function _setupListeners() {
        var _this3 = this;

        $(document).on('click', this._config.trigger, function (event) {
          _this3.toggle(event);
        });
      };

      _proto._expandSidebar = function _expandSidebar() {
        if ($('body').hasClass(ClassName.SIDEBAR_COLLAPSED)) {
          $(this._config.sidebarButtonSelector).PushMenu('expand');
        }
      } // Static
      ;

      Treeview._jQueryInterface = function _jQueryInterface(config) {
        return this.each(function () {
          var data = $(this).data(DATA_KEY);

          var _options = $.extend({}, Default, $(this).data());

          if (!data) {
            data = new Treeview($(this), _options);
            $(this).data(DATA_KEY, data);
          }

          if (config === 'init') {
            data[config]();
          }
        });
      };

      return Treeview;
    }();
    /**
     * Data API
     * ====================================================
     */


    $(window).on(Event.LOAD_DATA_API, function () {
      $(Selector.DATA_WIDGET).each(function () {
        Treeview._jQueryInterface.call($(this), 'init');
      });
    });
    /**
     * jQuery API
     * ====================================================
     */

    $.fn[NAME] = Treeview._jQueryInterface;
    $.fn[NAME].Constructor = Treeview;

    $.fn[NAME].noConflict = function () {
      $.fn[NAME] = JQUERY_NO_CONFLICT;
      return Treeview._jQueryInterface;
    };

    return Treeview;
  }(jQuery);
  /**
   * --------------------------------------------
   * AdminLTE DirectChat.js
   * License MIT
   * --------------------------------------------
   */


  var DirectChat = function ($) {
    /**
     * Constants
     * ====================================================
     */
    var NAME = 'DirectChat';
    var DATA_KEY = 'lte.directchat';
    var JQUERY_NO_CONFLICT = $.fn[NAME];
    var Event = {
      TOGGLED: "toggled{EVENT_KEY}"
    };
    var Selector = {
      DATA_TOGGLE: '[data-widget="chat-pane-toggle"]',
      DIRECT_CHAT: '.direct-chat'
    };
    var ClassName = {
      DIRECT_CHAT_OPEN: 'direct-chat-contacts-open'
    };
    /**
     * Class Definition
     * ====================================================
     */

    var DirectChat = /*#__PURE__*/function () {
      function DirectChat(element, config) {
        this._element = element;
      }

      var _proto = DirectChat.prototype;

      _proto.toggle = function toggle() {
        $(this._element).parents(Selector.DIRECT_CHAT).first().toggleClass(ClassName.DIRECT_CHAT_OPEN);
        var toggledEvent = $.Event(Event.TOGGLED);
        $(this._element).trigger(toggledEvent);
      } // Static
      ;

      DirectChat._jQueryInterface = function _jQueryInterface(config) {
        return this.each(function () {
          var data = $(this).data(DATA_KEY);

          if (!data) {
            data = new DirectChat($(this));
            $(this).data(DATA_KEY, data);
          }

          data[config]();
        });
      };

      return DirectChat;
    }();
    /**
     *
     * Data Api implementation
     * ====================================================
     */


    $(document).on('click', Selector.DATA_TOGGLE, function (event) {
      if (event) event.preventDefault();

      DirectChat._jQueryInterface.call($(this), 'toggle');
    });
    /**
     * jQuery API
     * ====================================================
     */

    $.fn[NAME] = DirectChat._jQueryInterface;
    $.fn[NAME].Constructor = DirectChat;

    $.fn[NAME].noConflict = function () {
      $.fn[NAME] = JQUERY_NO_CONFLICT;
      return DirectChat._jQueryInterface;
    };

    return DirectChat;
  }(jQuery);
  /**
   * --------------------------------------------
   * AdminLTE TodoList.js
   * License MIT
   * --------------------------------------------
   */


  var TodoList = function ($) {
    /**
     * Constants
     * ====================================================
     */
    var NAME = 'TodoList';
    var DATA_KEY = 'lte.todolist';
    var JQUERY_NO_CONFLICT = $.fn[NAME];
    var Selector = {
      DATA_TOGGLE: '[data-widget="todo-list"]'
    };
    var ClassName = {
      TODO_LIST_DONE: 'done'
    };
    var Default = {
      onCheck: function onCheck(item) {
        return item;
      },
      onUnCheck: function onUnCheck(item) {
        return item;
      }
    };
    /**
     * Class Definition
     * ====================================================
     */

    var TodoList = /*#__PURE__*/function () {
      function TodoList(element, config) {
        this._config = config;
        this._element = element;

        this._init();
      } // Public


      var _proto = TodoList.prototype;

      _proto.toggle = function toggle(item) {
        item.parents('li').toggleClass(ClassName.TODO_LIST_DONE);

        if (!$(item).prop('checked')) {
          this.unCheck($(item));
          return;
        }

        this.check(item);
      };

      _proto.check = function check(item) {
        this._config.onCheck.call(item);
      };

/***/ }),

/***/ "./resources/js/trainer/custom.js":
/*!****************************************!*\
  !*** ./resources/js/trainer/custom.js ***!
  \****************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

eval("__webpack_require__(/*! ./_include/_common.js */ \"./resources/js/trainer/_include/_common.js\");//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvdHJhaW5lci9jdXN0b20uanMuanMiLCJtYXBwaW5ncyI6IkFBQUFBLG1CQUFPLENBQUUseUVBQUYsQ0FBUCIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9qcy90cmFpbmVyL2N1c3RvbS5qcz8zZjFmIl0sInNvdXJjZXNDb250ZW50IjpbInJlcXVpcmUgKCcuL19pbmNsdWRlL19jb21tb24uanMnKTsiXSwibmFtZXMiOlsicmVxdWlyZSJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/trainer/custom.js\n");

/***/ }),

/***/ "./resources/js/trainer/footer.js":
/*!****************************************!*\
  !*** ./resources/js/trainer/footer.js ***!
  \****************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

eval("//Adminlte\n__webpack_require__(/*! ./adminlte.js */ \"./resources/js/trainer/adminlte.js\"); //myCustomjs\n\n\n__webpack_require__(/*! ./custom.js */ \"./resources/js/trainer/custom.js\");//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvdHJhaW5lci9mb290ZXIuanMuanMiLCJtYXBwaW5ncyI6IkFBQUE7QUFDQUEsbUJBQU8sQ0FBRSx5REFBRixDQUFQLEMsQ0FFQTs7O0FBQ0FBLG1CQUFPLENBQUUscURBQUYsQ0FBUCIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9qcy90cmFpbmVyL2Zvb3Rlci5qcz9lNGE5Il0sInNvdXJjZXNDb250ZW50IjpbIi8vQWRtaW5sdGVcbnJlcXVpcmUgKCcuL2FkbWlubHRlLmpzJyk7XG5cbi8vbXlDdXN0b21qc1xucmVxdWlyZSAoJy4vY3VzdG9tLmpzJyk7XG5cblxuIl0sIm5hbWVzIjpbInJlcXVpcmUiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/trainer/footer.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./resources/js/trainer/footer.js");
/******/ 	
/******/ })()
;