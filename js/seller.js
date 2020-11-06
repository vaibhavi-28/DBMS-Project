$(document).ready(function () {
	opt();
	function opt() {
		$.ajax({
			url: "option.php",
			success: function (data) {
				$("#get_option").html(data);

			}
		})
	}
})