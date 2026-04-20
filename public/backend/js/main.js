// ajaxSetup() là phương thức set giá trị mặc định cho tất cả các request ajax tiếp theo
// Để gửi được request ajax chúng ta cũng cần xác thực csrf giống như Form
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

/* Xóa một row - category */
function destroyCategory(id) {
    var result = confirm("Bạn có chắc chắn muốn xóa Danh mục ?");
    if (result) {
        // neu nhấn == ok , sẽ send request ajax
        $.ajax({
            url: "http://127.0.0.1:8000/admin/category/" + id, // base_url được khai báo ở đầu page == http://webshop.local
            type: "DELETE",
            data: {}, // dữ liệu truyền sang nếu có
            dataType: "json", // kiểu dữ liệu trả về
            success: function (response) {
                // success : kết quả trả về sau khi gửi request ajax
                // dữ liệu trả về là một object nên để gọi đến status chúng ta sẽ gọi như bên dưới
                if (response.status != "undefined" && response.status == true) {
                    // xóa dòng vừa được click delete
                    $(".item-" + id)
                        .closest("tr")
                        .remove(); // class .item- ở trong class của thẻ td đã khai báo trong file index
                }
            },
            error: function (e) {
                // lỗi nếu có
                console.log(e.message);
            },
        });
    }
}

/* Xóa một row - banner */
function destroyBanner(id) {
    var result = confirm("Bạn có chắc chắn muốn xóa Banner ?");
    if (result) {
        // neu nhấn == ok , sẽ send request ajax
        $.ajax({
            url: "http://127.0.0.1:8000/admin/banner/" + id, // base_url được khai báo ở đầu page == http://webshop.local
            type: "DELETE",
            data: {}, // dữ liệu truyền sang nếu có
            dataType: "json", // kiểu dữ liệu nhận về
            success: function (response) {
                // success : kết quả trả về sau khi gửi request ajax
                // dữ liệu trả về là một object nên để gọi đến status chúng ta sẽ gọi như bên dưới
                if (response.status != "undefined" && response.status == true) {
                    // xóa dòng vừa được click delete
                    $(".item-" + id)
                        .closest("tr")
                        .remove(); // class .item- ở trong class của thẻ td đã khai báo trong file index
                }
            },
            error: function (e) {
                // lỗi nếu có
                console.log(e.message);
            },
        });
    }
}

/* Xóa một row - Vendor */
function destroyVendor(id) {
    var result = confirm("Bạn có chắc chắn muốn xóa Vendor ?");
    if (result) {
        // neu nhấn == ok , sẽ send request ajax
        $.ajax({
            url: "http://127.0.0.1:8000/admin/vendor/" + id, // base_url được khai báo ở đầu page == http://webshop.local
            type: "DELETE",
            data: {}, // dữ liệu truyền sang nếu có
            dataType: "json", // kiểu dữ liệu nhận về
            success: function (response) {
                // success : kết quả trả về sau khi gửi request ajax
                // dữ liệu trả về là một object nên để gọi đến status chúng ta sẽ gọi như bên dưới
                if (response.status != "undefined" && response.status == true) {
                    // xóa dòng vừa được click delete
                    $(".item-" + id)
                        .closest("tr")
                        .remove(); // class .item- ở trong class của thẻ td đã khai báo trong file index
                }
            },
            error: function (e) {
                // lỗi nếu có
                console.log(e.message);
            },
        });
    }
}

/* Xóa một row - brand */
function destroyBrand(id) {
    var result = confirm("Bạn có chắc chắn muốn xóa Brand ?");
    if (result) {
        // neu nhấn == ok , sẽ send request ajax
        $.ajax({
            url: "http://127.0.0.1:8000/admin/brand/" + id, // base_url được khai báo ở đầu page == http://webshop.local
            type: "DELETE",
            data: {}, // dữ liệu truyền sang nếu có
            dataType: "json", // kiểu dữ liệu nhận về
            success: function (response) {
                // success : kết quả trả về sau khi gửi request ajax
                // dữ liệu trả về là một object nên để gọi đến status chúng ta sẽ gọi như bên dưới
                if (response.status != "undefined" && response.status == true) {
                    // xóa dòng vừa được click delete
                    $(".item-" + id)
                        .closest("tr")
                        .remove(); // class .item- ở trong class của thẻ td đã khai báo trong file index
                }
            },
            error: function (e) {
                // lỗi nếu có
                console.log(e.message);
            },
        });
    }
}

/* Xóa một row - product */
function destroyProduct(id) {
    var result = confirm("Bạn có chắc chắn muốn xóa Sản phẩm ?");
    if (result) {
        // neu nhấn == ok , sẽ send request ajax
        $.ajax({
            url: "http://127.0.0.1:8000/admin/product/" + id, // base_url được khai báo ở đầu page == http://webshop.local
            type: "DELETE",
            data: {}, // dữ liệu truyền sang nếu có
            dataType: "json", // kiểu dữ liệu trả về
            success: function (response) {
                // success : kết quả trả về sau khi gửi request ajax
                // dữ liệu trả về là một object nên để gọi đến status chúng ta sẽ gọi như bên dưới
                if (response.status != "undefined" && response.status == true) {
                    // xóa dòng vừa được click delete
                    $(".item-" + id)
                        .closest("tr")
                        .remove(); // class .item- ở trong class của thẻ td đã khai báo trong file index
                }
            },
            error: function (e) {
                // lỗi nếu có
                console.log(e.message);
            },
        });
    }
}

/* Xóa một row - user */
function destroyUser(id) {
    var result = confirm("Bạn có chắc chắn muốn xóa người dùng ?");
    if (result) {
        // neu nhấn == ok , sẽ send request ajax
        $.ajax({
            url: "http://127.0.0.1:8000/admin/user/" + id, // base_url được khai báo ở đầu page == http://webshop.local
            type: "DELETE",
            data: {}, // dữ liệu truyền sang nếu có
            dataType: "json", // kiểu dữ liệu trả về
            success: function (response) {
                // success : kết quả trả về sau khi gửi request ajax
                // dữ liệu trả về là một object nên để gọi đến status chúng ta sẽ gọi như bên dưới
                if (response.status != "undefined" && response.status == true) {
                    // xóa dòng vừa được click delete
                    $(".item-" + id)
                        .closest("tr")
                        .remove(); // class .item- ở trong class của thẻ td đã khai báo trong file index
                }
            },
            error: function (e) {
                // lỗi nếu có
                console.log(e.message);
            },
        });
    }
}

/* Xóa một row - user */
function destroyModel(model, id) {
    var result = confirm("Bạn có chắc chắn muốn xóa ?");
    if (result) {
        // neu nhấn == ok , sẽ send request ajax
        $.ajax({
            url: "http://127.0.0.1:8000/admin/" + model + "/" + id, // base_url được khai báo ở đầu page == http://webshop.local
            type: "DELETE",
            data: {}, // dữ liệu truyền sang nếu có
            dataType: "json", // kiểu dữ liệu trả về
            success: function (response) {
                // success : kết quả trả về sau khi gửi request ajax
                // dữ liệu trả về là một object nên để gọi đến status chúng ta sẽ gọi như bên dưới
                if (response.status != "undefined" && response.status == true) {
                    // xóa dòng vừa được click delete
                    $(".item-" + id)
                        .closest("tr")
                        .remove(); // class .item- ở trong class của thẻ td đã khai báo trong file index
                }
            },
            error: function (e) {
                // lỗi nếu có
                console.log(e.message);
            },
        });
    }
}
