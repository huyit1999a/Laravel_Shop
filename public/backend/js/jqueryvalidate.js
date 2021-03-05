$().ready(function() {
	$("#frm_category").validate({
		onfocusout: false,
		onkeyup: false,
		onclick: false,
		rules: {
			"category_name": {
				required: true,
			}
		},
		messages: {
			"category_name": {
				required: "Vui lòng nhập tên danh mục",
			}
		}
    });
    
    $("#frm_brand").validate({
		onfocusout: false,
		onkeyup: false,
		onclick: false,
		rules: {
			"brand_name": {
				required: true,
			}
		},
		messages: {
			"brand_name": {
				required: "Vui lòng nhập tên danh mục",
			}
		}
    });

    $("#frm_product").validate({
		onfocusout: false,
		onkeyup: false,
        onclick: false,
        ignore: [],
        debug: false,
		rules: {
			"product_name": {
				required: true,
            },
            "product_price": {
				required: true,
            },
            "product_image": {
				required: true,
            },
		},
		messages: {
			"product_name": {
				required: "Vui lòng nhập tên sản phẩm",
            },
            "product_price": {
				required: "Vui lòng nhập giá sản phẩm",
            },
            "product_image": {
				required: "Vui lòng thêm hình ảnh sản phẩm",
            },
		}
    });

    $("#frm_slider").validate({
		onfocusout: false,
		onkeyup: false,
        onclick: false,
		rules: {
			"slider_name": {
				required: true,
            },
            "slider_image": {
				required: true,
            },
		},
		messages: {
			"slider_name": {
				required: "Vui lòng nhập tên slider",
            },

            "slider_image": {
				required: "Vui lòng thêm hình ảnh slider",
            },
		}
    });


});

