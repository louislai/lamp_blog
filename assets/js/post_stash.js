$(document).ready(function() {

	$('#ap_title').keyup(function() {
		stash_post_title($('#ap_title').val());
	});
	$('#ap_content').keyup(function() {
		stash_post_content($('#ap_content').val());
	});
	$('#ap_submit').on("click", function() {
		stash_post_title("");
		stash_post_content("");
	});
});

function stash_post_title(form_title) {
	$.ajax({
		type: 'POST',
		url: 'models/post_stash.php',
		data: {
			title: form_title
		}
	});
}

function stash_post_content(form_content) {
	$.ajax({
		type: 'POST',
		url: 'models/post_stash.php',
		data: {
			content: form_content,
		}
	});
}