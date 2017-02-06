/**
 * Created by byeongkwan on 2017-01-16.
 */
KakaoTalk.login(
    function (result) {
        console.log('success');
        console.log('result');
    },
    function (message) {
        console.log('error');
        console.log(message);
    }
);
KakaoTalk.logout(
    function() {
        console.log('Successful logout!');
    }, function() {
        console.log('Error logging out');
    }
);
KakaoTalk.share({
        text : 'Share Message',
        image : {
            src : 'https://developers.kakao.com/assets/img/link_sample.jpg',
            width : 138,
            height : 90,
        },
        weblink :{
            url : 'YOUR-WEBSITE URL',
            text : 'web사이트로 이동'
        },
        applink :{
            url : 'YOUR-WEBSITE URL',
            text : '앱으로 이동',
        },
        params :{
            paramKey1 : 'paramVal',
            param1 : 'param1Value',
            cardId : '27',
            keyStr : 'hey'
        }
    },
    function (success) {
        console.log('kakao share success');
    },
    function (error) {
        console.log('kakao share error');
    });