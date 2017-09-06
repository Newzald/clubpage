"use strict";
$('document').ready(function() {
    var popOverSettings = {
        placement: 'top',
        selector: '.icon',
        trigger: "hover",
		html:true,
        content: function(){return '<img class="popimg" src="'+$(this).data('img') + '" />';}
    };
$(this).popover(popOverSettings);
});