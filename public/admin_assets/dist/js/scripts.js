const HOSTNAME = "http://127.0.0.1:8000";

$(document).ready(function () {
    var id;
    var counter = 5;
    function showmessage(msg) {
        $("#Success-Msg").html(
            `<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> ${msg}`
        );
        $("#Success-Msg").fadeIn("slow");
        id = setInterval(function () {
            counter--;
            if (counter < 0) {
                $("#Success-Msg").fadeOut("slow");
                clearInterval(id);
            }
        }, 1000);
    }
    //--------------For Preview Image-------------
    $("#thumbnail").on("change", function () {
        //Get count of selected files
        var countFiles = $(this)[0].files.length;
        var imgPath = $(this)[0].value;
        var extn = imgPath
            .substring(imgPath.lastIndexOf(".") + 1)
            .toLowerCase();
        var image_preview = $("#image-preview");
        image_preview.empty();
        if (typeof FileReader != "undefined") {
            //loop for each file selected for uploaded.
            for (var i = 0; i < countFiles; i++) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("<img />", {
                        src: e.target.result,
                        class: "thumb-image img-fluid img-rounded",
                    }).appendTo(image_preview);
                };
                image_preview.show();
                reader.readAsDataURL($(this)[0].files[i]);
            }
        } else {
            alert("This browser does not support FileReader.");
        }
    });

    //--------------For Adding Posts-------------
    $("#post-form").on("submit", function (e) {
        e.preventDefault();
        var pForm = this;
        var formData = new FormData(pForm);
        $.ajax({
            url: "includes/add-post.php",
            type: "POST",
            data: formData,
            mimeType: "multipart/form-data",
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == 1) {
                    $(pForm).trigger("reset");
                    $("#image-preview").html(" ");
                    showmessage("Post Successfully Added");
                } else alert(data);
            },
        });
    });

    //--------------For Delete Posts-------------
    $(document).on("click", ".delete-post", function () {
        if (confirm("Do you realy want to delete this post ?")) {
            var post = this;
            var id = $(post).data("postid");
            $.ajax({
                url: `${HOSTNAME}/api/superadmin/post/delete`,
                type: "GET",
                data: {
                    id,
                },
                success: function (res) {
                    console.log(res);
                    if (res.success === true) {
                        $(post).closest("tr").fadeOut("slow");
                        showmessage(res.message);
                    } else {
                        showmessage(res.message);
                    }
                },
            });
        }
    });

    //--------------For Delete category-------------
    $(document).on("click", ".delete-category", function () {
        if (confirm("Do you realy want to delete this category ?")) {
            var category = this;
            var id = $(category).data("catid");
            $.ajax({
                url: `${HOSTNAME}/api/superadmin/category/delete`,
                type: "GET",
                data: {
                    id,
                },
                dataType: "json",
                success: function (res) {
                    console.log("res.success");
                    console.log(res);
                    $(category).closest("tr").fadeOut("slow");
                    showmessage(res);
                    // if (res.success === true) {
                    // } else {
                    //     showmessage(res.message);
                    // }
                },
                error: function (res) {
                    console.log("res.fail");
                    console.log(res);
                },
            });
            // .done(function (res) {
            //     console.log("res done");
            //     console.log(res);
            //     console.log(res.data);
            // })
            // .fail(function (res) {
            //     console.log("res fail");
            //     console.log(res);
            //     console.log(res.data);
            // });
        }
    });

    $(document).on("keyup", "#category", function () {
        const search = $("#category").val();
        if (search === "") {
            $("#CategoryList").hide();
            $("#addCategoryBtn").attr("disabled", true);
        } else {
            $.ajax({
                url: `${HOSTNAME}/api/superadmin/category/list`,
                type: "GET",
                data: {
                    search,
                },
                success: function (data) {
                    if (data == 0) {
                        $("#CategoryList").hide();
                        $("#addCategoryBtn").attr("disabled", false);
                    } else {
                        $("#CategoryList").html(data);
                        $("#CategoryList").show();
                    }
                },
            });
        }
    });

    $(document).on("click", "#addCategoryBtn", function () {
        const category = $("#category").val();

        $.ajax({
            url: `${HOSTNAME}/api/superadmin/category/add`,
            type: "GET",
            data: {
                category,
            },
            success: function (data) {
                var post_category = $("#post_category").val();
                if (post_category === "") {
                    post_category = category;
                } else {
                    post_category = $("#post_category").val() + "," + category;
                }
                $("#post_category").val(post_category);
                $("#category").val("");
                $("#addCategoryBtn").attr("disabled", true);
            },
        });
    });

    $(document).on("click", "#CategoryList .CategoryItem", function () {
        $("#category").val($(this).text());
        $("#CategoryList").css("display", "none");
        $("#addCategoryBtn").attr("disabled", false);
    });

    function addCategory() {
        const category = $("#category").val();
        $.ajax({
            url: "{{ url('/') }}/api/superadmin/category/add",
            type: "GET",
            data: {
                category,
            },
            success: function (data) {
                var post_category = $("#post_category").val();
                if (post_category === "") {
                    post_category = category;
                } else {
                    post_category = $("#post_category").val() + "," + category;
                }
                $("#post_category").val(post_category);
                $("#category").val("");
                $("#addCategoryBtn").attr("disabled", true);
            },
        });
    }

    //--------------For Add to home category button-------------
    $(document).on("click", ".cat-status-btn", function () {
        var Category = this;
        var catId = $(Category).data("id");
        var catStatus = $(Category).data("status");
        $.ajax({
            url: `${HOSTNAME}/api/superadmin/category/update`,
            type: "GET",
            data: {
                id: catId,
                status: catStatus,
            },
            success: function (data) {
                console.log(data);
                console.log(data.success);
                if (data.success === true) {
                    // location.reload();
                    showmessage(data.message);
                } else {
                    // location.reload();
                    showmessage(data.message);
                }
            },
        });
    });
    //--------------For Footer category status button-------------
    $(document).on("click", ".cat-footer-status-btn", function () {
        var Category = this;
        var catId = $(Category).data("id");
        var catStatus = $(Category).data("footer");
        $.ajax({
            url: "includes/change-footer-status.php",
            type: "POST",
            data: {
                id: catId,
                status: catStatus,
            },
            success: function (data) {
                if (data == 1) {
                    location.reload();
                    // loadCategory();
                } else {
                    location.reload();
                    // loadCategory();
                }
            },
        });
    });

    //--------------***For Manage Users***-------------

    //--------------For Update user-------------
    $("#profile-form").on("submit", function (e) {
        e.preventDefault();
        var pForm = this;
        var formData = new FormData(pForm);
        $.ajax({
            url: "includes/edit-profile.php",
            type: "POST",
            data: formData,
            mimeType: "multipart/form-data",
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == 1) {
                    // $(pForm).trigger("reset");
                    // $("#image-preview").html(" ");
                    showmessage("Profile Updated Successfully");
                } else alert(data);
            },
        });
    });
    //--------------For Delete user-------------
    $(document).on("click", ".delete-user", function () {
        if (confirm("Do you realy want to delete this User ?")) {
            var user = this;
            var userId = $(user).data("id");
            $.ajax({
                url: "includes/delete-user.php",
                type: "POST",
                data: {
                    id: userId,
                },
                success: function (data) {
                    if (data == 1) {
                        $(user).closest("tr").fadeOut();
                        showmessage("User deleted Successfully");
                    } else {
                        alert("Not Deleted");
                    }
                },
            });
        }
    });

    // ------For Dynamic Copyright Year---------
    // let d = new Date();
    // document.getElementById("copyright-year").innerHTML = d.getFullYear();
    //--------------For Error & Success Message--------------
});

// Download Counts
