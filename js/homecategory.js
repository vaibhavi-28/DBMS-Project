$(document).ready(function () {
	cat();
	cathome();
	producthome();
	product();
	//cat() is a funtion fetching category record from database whenever page is load
	function cat() {
		$.ajax({
			url: "category.php",
			method: "POST",
			data: { category: 1 },
			success: function (data) {
				$("#get_category").html(data);

			}
		})
	}
	
	function cathome() {
		$.ajax({
			url: "categoryhome.php",
			method: "POST",
			data: { categoryhome: 1 },
			success: function (data) {
				$("#get_category_home").html(data);

			}
		})
	}

	function producthome() {
		$.ajax({
			url: "producthome.php",
			method: "POST",
			data: { getProducthome: 1 },
			success: function (data) {
				$("#get_product_home").html(data);
			}
		})
	}

	function product() {
		$.ajax({
			url: "getproduct.php",
			method: "POST",
			data: { getProduct: 1 },
			success: function (data) {
				$("#get_product").html(data);
			}
		})
	}
	$("body").delegate("#page", "click", function () {
		var pn = $(this).attr("page");
		$.ajax({
			url: "getproduct.php",
			method: "POST",
			data: { getProduct: 1, setPage: 1, pageNumber: pn },
			success: function (data) {
				$("#get_product").html(data);
			}
		})
	})
	/*	when page is load successfully then there is a list of categories when user click on category we will get category id and 
		according to id we will show products
	*/
	$("body").delegate(".category", "click", function (event) {
		$("#get_product").html("<h3>Loading...</h3>");
		event.preventDefault();
		var cid = $(this).attr('cid');
		var isCategory = $(this).attr('iscategory');
		$.ajax({
			url: "seletedcategory.php",
			method: "POST",
			data: { get_seleted_Category: 1, cat_id: cid, is_category: isCategory },
			success: function (data) {
				$("#get_product").html(data);
				if ($("body").width() < 480) {
					$("body").scrollTop(683);
				}
			}
		})

	})


	$("body").delegate(".categoryhome", "click", function (event) {
		$("#get_product").html("<h3>Loading...</h3>");
		event.preventDefault();
		var cid = $(this).attr('cid');
		var iscategory = $(this).attr('iscategory');

		$.ajax({
			url: "seletedcategory.php",
			method: "POST",
			data: { get_seleted_Category: 1, cat_id: cid, is_category: iscategory },
			success: function (data) {
				$("#get_product").html(data);
				if ($("body").width() < 480) {
					$("body").scrollTop(683);
				}
			}
		})

	})

	
	/*
		Here #login is login form id and this form is available in index.php page
		from here input data is sent to login.php page
		if you get login_success string from login.php page means user is logged in successfully and window.location is 
		used to redirect user from home page to profile.php page
	*/
	$("#login").on("submit", function (event) {
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url: "login.php",
			method: "POST",
			data: $("#login").serialize(),
			success: function (data) {
				if (data == "login_success") {
					window.location.href = "index.php";
				} else if (data == "cart_login") {
					window.location.href = "cart.php";
				} else {
					$("#e_msg").html(data);
					$(".overlay").hide();
				}
			}
		})
	})
	//end

		$("#address").on("submit", function (event) {
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url: "saveAddress.php",
			method: "POST",
			data: $("#address").serialize(),
			success: function (data) {
				if (data == "success") {
					window.location.href = "index.php";
				} else {
					$("#add_e_msg").html(data);
					$(".overlay").hide();
				}
			}
		})
	})


	//Get User Information before checkout
	$("#signup_form").on("submit", function (event) {
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url: "register.php",
			method: "POST",
			data: $("#signup_form").serialize(),
			success: function (data) {
				$(".overlay").hide();
				if (data == "register_success") {
					window.location.href = "cart.php";
				} else {
					$("#signup_msg").html(data);
				}

			}
		})
	})
	//Add Product into Cart
	$("body").delegate("#product", "click", function (event) {
		var pid = $(this).attr("pid");
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url: "checkOutDetails.php",
			method: "POST",
			data: { addToCart: 1, proId: pid, },
			success: function (data) {
				count_item();
				getCartItem();
				$('#product_msg').html(data);
				$('.overlay').hide();
			}
		})
	})



	checkOutDetails();
	net_total();
	function checkOutDetails() {
		$('.overlay').show();
		$.ajax({
			url: "checkOutDetails.php",
			method: "POST",
			data: { Common: 1, checkOutDetails: 1 },
			success: function (data) {
				$('.overlay').hide();
				$("#cart_checkout").html(data);
				net_total();
			}
		})
	}

	function net_total() {
		var net_total = 0;
		$('.qty').each(function () {
			var row = $(this).parent().parent();
			var price = row.find('.price').val();
			var total = price * $(this).val() - 0;
			row.find('.total').val(total);
		})
		$('.total').each(function () {
			net_total += ($(this).val() - 0);
		})
		$('.net_total').html("Total : Rs " + net_total);
	}

	count_item();
	function count_item() {
		$.ajax({
			url: "checkOutDetails.php",
			method: "POST",
			data: { count_item: 1 },
			success: function (data) {
				$(".badge").html(data);
			}
		})
	}
	//Count user cart items funtion end

	//Fetch Cart item from Database to dropdown menu
	getCartItem();
	function getCartItem() {
		$.ajax({
			url: "checkOutDetails.php",
			method: "POST",
			data: { Common: 1, getCartItem: 1 },
			success: function (data) {
				$("#cart_product").html(data);
				net_total();

			}
		})
	}

	$("body").delegate(".update", "click", function (event) {
		var update = $(this).parent().parent().parent();
		var update_id = update.find(".update").attr("update_id");
		var qty = update.find(".qty").val();
		$.ajax({
			url: "checkOutDetails.php",
			method: "POST",
			data: { updateCartItem: 1, update_id: update_id, qty: qty },
			success: function (data) {
				$("#cart_msg").html(data);
				checkOutDetails();
			}
		})


	})

	$("body").delegate(".remove", "click", function (event) {
		var remove = $(this).parent().parent().parent();
		var remove_id = remove.find(".remove").attr("remove_id");
		$.ajax({
			url: "checkOutDetails.php",
			method: "POST",
			data: { removeItemFromCart: 1, rid: remove_id },
			success: function (data) {
				$("#cart_msg").html(data);
				checkOutDetails();
			}
		})
	})


	$("body").delegate(".qty", "keyup", function (event) {
		event.preventDefault();
		var row = $(this).parent().parent();
		var price = row.find('.price').val();
		var qty = row.find('.qty').val();
		if (isNaN(qty)) {
			qty = 1;
		};
		if (qty < 1) {
			qty = 1;
		};
		var total = price * qty;
		row.find('.total').val(total);
		var net_total = 0;
		$('.total').each(function () {
			net_total += ($(this).val() - 0);
		})
		$('.net_total').html("Total : Rs " + net_total);

	})


	page();
	function page() {
		$.ajax({
			url: "getproduct.php",
			method: "POST",
			data: { page: 1 },
			success: function (data) {
				$("#pageno").html(data);
			}
		})
	}

})






















