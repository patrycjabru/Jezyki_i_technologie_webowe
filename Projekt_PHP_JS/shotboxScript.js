window.setTimeout('getData()',100);
// var textarea = document.getElementById('area');
// textarea.scrollTop = textarea.scrollHeight;
function toggleShoutbox() {
    document.getElementById("name").disabled = !document.getElementById("name").disabled;
    document.getElementById("message").disabled = !document.getElementById("message").disabled;
    document.getElementById("submit").disabled = !document.getElementById("submit").disabled;
    document.getElementById("area").disabled= !document.getElementById("area").disabled;
}
function sendMessage() {
    var name=document.getElementById("name").value;
    var message=document.getElementById("message").value;
    console.log(name);
    console.log(message);
    $.post('shoutboxSaveData.php', {name: name, message: message});
    // document.getElementById("area").innerHTML=document.getElementById("area").innerHTML+name+": "+message;
    // var textarea = document.getElementById('area');
    // textarea.scrollTop = textarea.scrollHeight;
}

// (function poll(){
//     setTimeout(function(){
//         $.ajax({ url: "http://student.agh.edu.pl/~bruzdzin/PROJEKT/shoutbox", success: function(data){
//                 //Update your dashboard gauge
//                 document.getElementById("area").innerHTML=data;
//                 //Setup the next poll recursively
//                 poll();
//             }, dataType: "json"});
//     }, 10000);
// })();

// setInterval(function(){
//     $.ajax({ url: "http://student.agh.edu.pl/~bruzdzin/PROJEKT/shoutbox", success: function(data){
//             //Update your dashboard gauge
//             document.getElementById("area").innerHTML=data;
//         }, dataType: "json"});
// }, 10000);
function getData() {
    if (!document.getElementById("checkbox").checked) {
        window.setTimeout('getData()',1000);
        return 1;
    }
    var xhr;
    if (window.XMLHttpRequest)
        xhr = new XMLHttpRequest();
    else if (window.ActiveXObject)
        xhr = new ActiveXObject("Msxml2.XMLHTTP");
    else
        throw new Error("Ajax is not supported by your browser");
    // 1. Instantiate XHR - End

    // 2. Handle Response from Server - Start
    xhr.onreadystatechange = function () {
        if (xhr.readyState < 4)
            ;
        // document.getElementById('area').innerHTML = "Loading...";
        else if (xhr.readyState === 4) {
            if (xhr.status == 200 && xhr.status < 300)
                document.getElementById('area').innerHTML = xhr.responseText;
        }
    }
    // 2. Handle Response from Server - End

    // 3. Specify your action, location and Send to the server - Start
    xhr.open('POST', 'http://student.agh.edu.pl/~bruzdzin/PROJEKT/shoutbox');
    xhr.send(null);
    window.setTimeout('getData()',1000);
    var textarea = document.getElementById('area');
    textarea.scrollTop = textarea.scrollHeight;
    // 3. Specify your action, location and Send to the server - End
}