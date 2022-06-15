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
    // ---------------For Load Category and SubCategory----------------
    function loadData(type, categoryId) {
        $.ajax({
            url: "includes/load-catsub.php",
            type: "POST",
            data: {
                type: type,
                id: categoryId,
            },
            success: function (data) {
                if (type == "subcatData") {
                    $("#post-subCategory").html(data);
                } else {
                    $("#post-category").append(data);
                }
            },
        });
    }
    loadData();
    $("#post-category").on("change", function () {
        var category = $("#post-category").val();
        if (category != "") {
            loadData("subcatData", category);
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
    // $(document).on("click", "#addpost", function (e) {
    //   e.preventDefault();
    //   $("#load-category").hide();
    //   $("#load-user").hide();
    //   $("#load-post").hide();
    //   $("#add-post-form").show();
    // });
    //--------------For add new post button-------------
    // $(document).on("click", "#add-new-post", function (e) {
    //     e.preventDefault();
    // });
    //--------------***For Manage Posts***-------------
    //--------------For Showing Posts-------------
    // $("#managepost").on("click", function (e) {
    //   e.preventDefault();
    //   $("#load-category").hide();
    //   $("#load-subcategory").hide();
    //   $("#load-user").hide();
    //   $("#add-post-form").hide();
    //   $("#load-post").show();
    //   $.ajax({
    //     url: "managepost.php",
    //     type: "POST",
    //     success: function (data) {
    //       $("#load-post").html(data);
    //     },
    //   });
    // });
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
                success: function (res) {
                    if (res.success === true) {
                        $(category).closest("tr").fadeOut("slow");
                        showmessage(res.message);
                    } else {
                        showmessage(res.message);
                    }
                },
            });
        }
    });
    //--------------For Add to home category button-------------
    $(document).on("click", ".cat-status-btn", function () {
        var Category = this;
        var catId = $(Category).data("id");
        var catStatus = $(Category).data("status");
        $.ajax({
            url: "includes/change-cat-status.php",
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
    let d = new Date();
    document.getElementById("copyright-year").innerHTML = d.getFullYear();
    //--------------For Error & Success Message--------------
});

// ------------***For Comments***--------------

//--------------For Comment approved button-------------
$(document).on("click", ".comment-status-btn", function () {
    var Comment = this;
    var commentId = $(Comment).data("id");
    var commentStatus = $(Comment).data("status");
    $.ajax({
        url: "includes/change-comment-status.php",
        type: "POST",
        data: {
            id: commentId,
            status: commentStatus,
        },
        success: function (data) {
            if (data == 1) {
                location.reload();
            } else {
                location.reload();
            }
        },
    });
});
// -------Add- Comments ----------
$("#comment-form").on("submit", function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: "includes/add-comment.php",
        type: "POST",
        data: formData,
        mimeType: "multipart/form-data",
        contentType: false,
        processData: false,
        success: function (data) {
            if (data == 1) {
                $(this).trigger("reset");
                showmessage("Thanks for comment");
            } else alert(data);
        },
    });
});

//--------------For Delete comment-------------
$(document).on("click", ".delete-comment", function () {
    if (confirm("Do you realy want to delete this comment ?")) {
        var comment = this;
        var commentId = $(comment).data("cid");
        var postId = $(comment).data("postid");
        $.ajax({
            url: "includes/delete-comment.php",
            type: "POST",
            data: {
                id: commentId,
                postId: postId,
            },
            success: function (data) {
                if (data == 1) {
                    $(comment).closest("tr").fadeOut("slow");
                    showmessage("Comment Deleted Succussfully");
                    // loadCategory();
                } else {
                    alert(data);
                }
            },
        });
    }
});
// Download Counts
