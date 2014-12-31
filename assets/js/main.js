$(document).ready(function() {
    $('.post_read_more').readmore({
        maxHeight: 100
    });

    // Initiate pagination:
    $("div.holder").jPages({
    	containerID : "pagination",
    	perPage: 10
    });
});
