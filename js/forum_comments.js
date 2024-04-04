jQuery(document).ready(function($){ 
	showComments();
	$('#commentForm').on('submit', function(event){
		console.log("Post");
		event.preventDefault();
		var formData = $(this).serialize();
		$.ajax({
			url: "forum_comments.php",
			method: "POST",
			data: formData,
			dataType: "JSON",
			success:function(response) {
				if(!response.error) {
					$('#commentForm')[0].reset();
					$('#commentId').val('0');
					$('#message').html(response.message);
					showComments();
				} else if(response.error){
					$('#message').html(response.message);
				}
			}
		})
	});	
	jQuery(document).on('click', '.reply', function(){
		var commentId = $(this).attr("id");
		$('#commentId').val(commentId);
		$('#name').focus();
	});
	jQuery(document).on('click', '.delete', function(){
		var commentId = $(this).attr("id");
		if(confirm("Are you sure you want to delete this comment?")) {
			$.ajax({
				url: "forum_delete_comments.php",
				method: "POST",
				data: {commentId: commentId},
				dataType: "JSON",
				success:function(response) {
					if(!response.error) {
						showComments();
					} else if(response.error) {
						$('message').html(response.message);
					}
				}
			})
		}
	});
	$('#deleteForm').on('submit', function(){
		if(confirm("Are you sure you want to delete all the comments?")) {
			$.ajax({
				url: "forum_delete_all.php",
				method: "POST",
				success:function(response) {
					if(!response.error) {
						$('#commentForm')[0].reset();
						$('#commentId').val('0');
						$('#message').html(response.message);
						showComments();
					} else if(response.error){
						$('#message').html(response.message);
					}
				} 
			})
		}
	})
});
// function to show comments
function showComments()	{
	$.ajax({
		url:"forum_show_comments.php",
		method:"POST",
		success:function(response) {
			$('#showComments').html(response);
		}
	})
}