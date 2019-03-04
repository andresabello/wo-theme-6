// Avoid `console` errors in browsers that lack a console.
/*Chat Script for the chat box*/
var Comm100API = Comm100API || new Object;
Comm100API.chat_buttons = Comm100API.chat_buttons || [];
var comm100_chatButton = new Object;
comm100_chatButton.code_plan = 1225;
comm100_chatButton.div_id = 'comm100-button-1225';
Comm100API.chat_buttons.push(comm100_chatButton);
Comm100API.site_id = 70799;
Comm100API.main_code_plan = 1225;
var comm100_lc = document.createElement('script');
comm100_lc.type = 'text/javascript';
comm100_lc.async = true;
comm100_lc.src = 'https://chatserver.comm100.com/livechat.ashx?siteId=' + Comm100API.site_id;
var comm100_s = document.getElementsByTagName('script')[0];
comm100_s.parentNode.insertBefore(comm100_lc, comm100_s);

(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});
    while (length--) {
        method = methods[length];
        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());
jQuery(document).ready(function($){
    $('.primary-cta').click(function(){
        $('html, body').animate({
            scrollTop: $( $(this).attr('href') ).offset().top
        }, 1000);
        return false;
    });
});
// Place any jQuery/helper plugins in here.