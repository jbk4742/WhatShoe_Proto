/**
 * Created by byeongkwan on 2017-01-10.
 */

    $(document).ready(function(){
        Kakao.init("1354531609e350fbd024b14f61d98d54");
        function getKakaotalkUserProfile(){
            Kakao.API.request({
                url: '/v1/user/me',
                success: function(res) {
                    $("#kakao_name").append(res.properties.nickname);
                    $("#kakao_id").append(res.id);
                    window.localStorage.kakao_id = res.id;
                    window.localStorage.kakao_name = res.properties.nickname;
                    window.localStorage.loginCheck = 3; //1 : 오리지널, 2 : 페이스북, 3 : 카카오톡 로그인\
                    location.href='http://byeongkwan.dothome.co.kr/kakaoCheck.html';
                },
                fail: function(error) {
                    console.log(error);
                }
            });
        }
    function createKakaotalkLogin() {
        $('#button_signup_kakao').click(function(){
            Kakao.Auth.login({
                persistAccessToken: true,
                persistRefreshToken: true,
                success: function(authObj) {
                    getKakaotalkUserProfile();
                    createKakaotalkLogout();
                },
                fail: function(err) {
                    console.log(err);
                }
            });
        });
        //$("#kakao-logged-group").prepend($('#button_signup_kakao'));
    }
    if(Kakao.Auth.getRefreshToken()!=undefined&&Kakao.Auth.getRefreshToken().replace(/ /gi,"")!=""){
        createKakaotalkLogout();
        getKakaotalkUserProfile();
    }else{
        createKakaotalkLogin();
    }
});