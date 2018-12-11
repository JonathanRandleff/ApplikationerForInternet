$(document).ready(function() {
    $("#registerForm").submit(function (event) {
        event.preventDefault();
        var data = $("#registerForm").serialize();
        $.ajax({
            url: "/member/register",
            data: data,
            type: "POST",
            success: function () {
                alert("Registration Successful");
                window.location = "/member";
            },
        });
        return false;
    });
    $("#loginForm").submit(function (event) {
         event.preventDefault();
         var data = $("#loginForm").serialize();
         $.ajax({
             url: "/member/doLogin",
             data: data,
             type: "POST",
             success: function () {
                 window.location = "/member/view/member";
             },
             error: function() {
                 alert("Wrong username or password");
             },
         });
         return false;
    });
    $("#commentForm").submit(function (event) {
        event.preventDefault();
        var data = $("#commentForm").serialize();
        var recipeName = $(this).closest('form').attr('name');
        $.ajax({
            url: "/recipe/createComment",
            data: data,
            type: "POST",
            success: function () {
                alert("Comment added");
                window.location = "/recipe/view/"+recipeName;
            },
        });
        return false;
    });
    $(".deleteCommentForm").submit(function (event) {
        event.preventDefault();
        var id = $(this).closest('form').attr('id');
        var recipeName = $(this).closest('form').attr('name');
        var data = "id=" + id + "&page=" + recipeName;
        $.ajax({
            url: "/recipe/deleteComment",
            data: data,
            type: "POST",
            success: function (data) {
                alert("Comment removed");
                window.location = "/recipe/view/"+recipeName;
            },
        });
        return false;
    });
    $('#logout').click(function(){
        $.ajax({
            url: "/member/logout",
            success: function(data){
                window.location.href = data;
            }
        });
    });
});