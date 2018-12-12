function getComments(comment, recipe) {
    $.getJSON('/member/getUsername', function(data) {
        for (var key in comment) {
            var text = comment[key].comment_text;
            var user = "<p style='color:#F26F29'>" + comment[key].username + "</p>";
            document.getElementById("comments").innerHTML += user + text ;
            if (data.value === comment[key].username) {
                var btn = document.createElement("BUTTON");
                btn.className = "deleteButton";
                btn.id = comment[key].id;
                btn.setAttribute("name", recipe);
                btn.setAttribute("class", "deleteButton");
                var t = document.createTextNode("Delete");
                btn.appendChild(t);
                document.getElementById("comments").appendChild(btn);

                $('button.deleteButton').click(function (event) {
                    event.preventDefault();
                    var id = $(this).attr('id');
                    var recipeName = $(this).attr('name');
                    var data = "id=" + id + "&page=" + recipeName;
                    $.ajax({
                        url: "/recipe/deleteComment",
                        data: data,
                        type: "POST",
                        success: function () {
                            //alert("Comment removed");
                            window.location = "/recipe/view/"+recipeName;
                        },
                    });
                    return false;
                });
            }
        }
    });
}

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
                //alert("Comment added");
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