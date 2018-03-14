window.onload=function() {
    var style=document.cookie.replace(/(?:(?:^|.*;\s*)style\s*\=\s*([^;]*).*$)|^.*$/, "$1");
    if (style.length>0) {
        swapStyleSheet(style);
    }
    console.log('aaaaaaaaaaa');
}

function swapStyleSheet(sheet) {
    // if (sheet == null) {
    //     console.log("null style");
    //     return 1;
    // }
    document.getElementById('pagestyle').setAttribute('href', sheet);
    document.cookie = "style=" + sheet;
}
function makeUL(){
    var a = '<ul>',
        b = '</ul>',
        m = [];
    var options = ["zadanie1.css","zadanie2.css"];
    for (i=0;i<options.length;i++) {
        m[i]='<li  onClick=swapStyleSheet('+'"'+options[i]+'"'+')>' + options[i] + '</li>';
    }
	var list="Lista:<br>" + a + m + b;
    document.getElementById('buttons').innerHTML = list;
}