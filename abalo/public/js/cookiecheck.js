addEventListener('load',function(){
    console.log("Site loaded Listen now");
    console.log(getCookie('dsgvo'));

    if (getCookie('dsgvo') == null || parseInt(getCookie('dsgvo')) === 0){
        //user Abfrage
        console.log("no dsgvo cookie active");
        $('#cookieModal').modal({backdrop:'static',keyboard:false},'show');
    }
})

function getCookie(name){
    let v= document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)')
    console.log(v);
    return v? v[2]:null;
}

function cookieConsent(){
    document.cookie = "dsgvo="+1;
}
