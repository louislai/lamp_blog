$(document).ready(function() {
    $('article').readmore({
        maxHeight: 100
    });

    // Initiate pagination:
    $("div.holder").jPages({
    	containerID : "pagination",
    	perPage: 10
    });
});
