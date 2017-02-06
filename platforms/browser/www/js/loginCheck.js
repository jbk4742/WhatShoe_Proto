/**
 * Created by byeongkwan on 2017-01-09.
 */
$("#button_login").click(function () {
    var check_id = document.getElementById("login_id").value;
    var check_pwd = document.getElementById("login_pw").value;
    var check_count=0;
    if(!check_id){
        alert("아이디가 입력되지 않았습니다");
        return false;
    } else{
        if(!/^[a-zA-Z0-9]{6,12}$/.test(check_id)){
            alert("숫자와 영문 혼합 4~10자리 사용해야함");
            return false;
        }
        else{
            check_count++;
        }
    }//아이디 유효성 검사
    if(!check_pwd ){
        alert("비밀번호가 입력되지 않았습니다")
        return false;
    } else{
        if(!/^[a-zA-Z0-9]{6,12}$/.test(check_pwd)){
            alert("숫자와 영문 혼합 6~12자리 사용해야함");
            return false;
        }
        else{
            var check = 0;
            if (check_pwd.search(/[0-9]/g) != -1) check++;
            if (check_pwd.search(/[a-z]/ig) != -1) check++;
            if (check_pwd.search(/[!@#$%^&*()?_~]/g) != -1) check--;
            if(check<2){
                alert("비밀번호는 특수문자를 제외한 영문, 숫자 혼용이어야 합니다"    );
                return false;
            } else{
                check_count++;
            }
        }
    }//비밀번호 유효성 검사
    if(check_count==2){
        window.localStorage.setItem("loginCheck",1); //1 : 오리지널, 2 : 페이스북, 3 : 카카오톡 로그인
        window.localStorage._id = document.getElementById('login_id').value;

        document.getElementById('login_form').submit();
    } else{
        alert("로그인 실패!");
    }
});

