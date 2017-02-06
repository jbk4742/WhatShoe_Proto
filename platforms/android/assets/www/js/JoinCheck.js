/**
 * Created by byeongkwan on 2017-01-06.
 */

$('#button_join').click(function () {

    var check_id = document.getElementById("input_id").value;
    var check_pwd = document.getElementById("input_pwd").value;
    var check_confirm = document.getElementById("input_confirm").value;
    var check_email = document.getElementById('input_email').value;
    var check_name = document.getElementById('input_name').value;
    var check_phone = document.getElementById('input_phone').value;
    var check_addr = document.getElementById('input_addr').value;
    var check_count = 0;

    if(!check_email){
        alert("이메일이 입력되지 않았습니다");
        return false;
    } else{
        if(!/^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/.test(check_email)){
            alert("이메일 형식이 올바르지 않습니다");
            return false;
        } else{
            check_count++;
        }
    }
    if(!check_name){
        alert("이름이 입력되지 않았습니다.");
        return false;
    } else{
            check_count++;
    }
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
    if(!check_pwd && !check_confirm){
        alert("비밀번호가 입력되지 않았습니다")
        return false;
    } else if(check_pwd != check_confirm){
        alert("비밀번호 확인이 일치하지 않습니다");
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
            alert("비밀번호는 특수문자를 제외한 영문, 숫자 혼용이어야 합니다",3000,'rounded');
            return false;
          } else{
            check_count++;
          }
        }
    }//비밀번호 유효성 검사
    if(!check_phone){
        alert("전화번호가 입력되지 않았습니다.");
        return false;
    } else{
        if(!/^[0-9]{10,15}$/.test(check_phone)){
            alert("전화번호 형식이 올바르지 않습니다.");
            return false;
        } else{
            check_count++;
        }
    }
    if(!check_addr){
        alert("주소가 입력되지 않았습니다.");
        return false;
    } else{
        check_count++;
    }
    if(check_count == 6){
        document.getElementById('join_form').submit();
    } else{
        check_count = 0;
    }
});

