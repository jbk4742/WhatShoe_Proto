/**
 * Created by byeongkwan on 2017-01-10.
 */
var kakao_id = window.localStorage.kakao_id;
var kakao_name = window.localStorage.kakao_name;

document.getElementById('input_id').value = kakao_id;
document.getElementById('input_name').value = kakao_name;


$("#button_join_Kakao").click(function () {
    var check_email = document.getElementById('input_email').value;
    var check_phone = document.getElementById('input_phone').value;
    var check_addr = document.getElementById('input_addr').value;
    var check_count=0;

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
    if(check_count == 3){
        document.getElementById('join_form_FB').submit();
    } else{
        check_count = 0;
    }
});