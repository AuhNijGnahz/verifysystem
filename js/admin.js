/// <reference path="jquery-3.1.1.min.js" />
$(function(){
    $('body').on('click','#loginV',function(){
        var username = $('#username').val();
        var password = $('#password').val();
        if(username == "" || password == ""){
            alert("用户名或密码为空");
        }
        else{
            $.post({
                url:'admindo.php',
                data:{'username':username,'password':password,'action':'login'},
                success:function(data){
                    var data = eval('('+data+')');
                    switch(data.status){
                        case "success":
                            location.href = data.redirect;
                            break;
                        case "invalid":
                            alert("用户名或密码错误");
                            break;
                        case "locked":
                            alert("该用户被禁止");
                            break;
                        default:
                            alert('未知错误');
                            break;                            
                    }
                }
            })
        }
    })
})