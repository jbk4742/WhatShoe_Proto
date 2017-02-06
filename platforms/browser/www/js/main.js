/**
 * Created by byeongkwan on 2017-01-16.
 */
var loginCheck = window.localStorage.getItem("loginCheck");
if(loginCheck == 1){
    document.getElementById('main_id').value = window.localStorage._id;
} else if(loginCheck == 2){
    document.getElementById('main_id').value = window.localStorage.fb_id;
} else if(loginCheck == 3) {
    document.getElementById('main_id').value = window.localStorage.kakao_id;
}
$('#logout_btn').click(function() {
    if(loginCheck == 1){
        alert("로그아웃 되었습니다!");
        window.localStorage.loginCheck = 0;
        location.href="login.html";
    } else if(loginCheck == 2){

        FB.logout(function(data){
            alert("페이스북로그아웃?");
            if(data){
                window.localStorage.loginCheck = 0;
                location.href="login.html";
            }
        });

    } else if(loginCheck == 3){

                Kakao.Auth.logout(function(data){
                    alert("카카오로그아웃?");
                    if(data){
                        window.localStorage.loginCheck = 0;
                        location.href="login.html";
                    }
                });

    }else if(loginCheck === null){
        alert("Error!! again login");
        window.localStorage.loginCheck == 0;
        location.href="login.html";
    }
});
$('#dialog').dialog({
    title:'Dialog',
    autoOpen:false,
    width:600,
    modal:true,
    backgroundColor: '#252525',
    buttons:[
        {
            text: "Register",
            click: function() {
                document.getElementById('test_form').submit();
            }
        }, {
            text: "Close",
            click: function () {
                $(this).dialog("close");
            }
        }

    ]

});
$('#main_bag').click(function() {
    $("#dialog").dialog("open");
});
$('#main_etc').click(function() {

});
$('#main_Mshoe').click(function() {

});
$('#main_Sshoe').click(function() {

});
function check() {
    var form = document.main_form;
    var chkBox = form.checkbox;
    for(var i=0; i<chkBox.length;i++){
        if(chkBox[i].checked){
            window.localStorage.setItem("item"+i,i+1);
        } else{
            window.localStorage.setItem("item"+i,0);
        }
    }
}