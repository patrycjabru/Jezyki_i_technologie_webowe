 <!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" >
	<title>PHP Projekt</title>
</head>
<body>
	<h1>Formularz do tworzenia wpisu</h1>
	<form method='post' action="wpis.php" enctype="multipart/form-data">
	Podaj nazwę użytkownika:
	<br/>
	<input type="text" name="username" />
	<br/>
	Podaj hasło:
	<br/>
	<input type="password" name="password" />
	<br/>
	Wpis:
	<br/>
	<textarea type="text" rows="10" cols="100" name="content"> </textarea>
	<br/>
	<input type="text" name="date" id="date" onchange="checkDate()"/>
	<input type="text" name="time" id="time" onchange="checkTime()"/>
	<br/><br/>
	Załączniki:
	<br/>
        <div id="filesUpload">
<!--	<input type="file" name="file1"/><br/>-->
            <button type="button" onclick="addNewFile()">"Dodaj plik" </button><br/>
        </div>

		<input type="submit" value="Dodaj" />
		<input type="reset" value="Wyczyść"/>
		<br/><a href="menu.php">Wróc do menu głównego</a>
	</form>
</body>
</html>
 <script>
     setActualDate();
     setActualTime();
     function setActualDate() {
         var d = new Date();
         var day = d.getDate();
         var month = d.getMonth()+1;
         var year = d.getFullYear();
         if (day<10) day="0".concat(day);
         if (month<10) month="0".concat(month);
         var actualDate=year+"-"+month+"-"+day;
         document.getElementById("date").value=actualDate;
     }
     function setActualTime() {
         var d = new Date();
         var hour = d.getHours();
         var minutes = d.getMinutes();
         if (hour<10) hour="0".concat(hour);
         if (minutes<10) minutes="0".concat(minutes);
         var actualTime=hour+":"+minutes;
         document.getElementById("time").value=actualTime;
     }
     function checkDate() {
        var inputtedData=document.getElementById("date").value;
        if (inputtedData.length!==10) {
            setActualDate();
            return 1;
        }
        if (isNaN(inputtedData[0]) || isNaN(inputtedData[1]) || isNaN(inputtedData[2]) || isNaN(inputtedData[3]) || isNaN(inputtedData[5]) || isNaN(inputtedData[6]) || isNaN(inputtedData[8]) || isNaN(inputtedData[9]) || inputtedData[4]!=="-" || inputtedData[7]!=="-") {
            setActualDate();
            return 2;
        }
        var year=inputtedData[0].concat(inputtedData[1],inputtedData[2],inputtedData[3]);
        var month=inputtedData[5].concat(inputtedData[6]);
        var day=inputtedData[8].concat(inputtedData[9]);
        if (year<0 || year>3000) {
            setActualDate();
            return 3;
        }
        if (month<0 || month>12) {
            setActualDate();
            return 4;
        }
        if (day<0) {
            setActualDate();
            return 5;
        }
        if (month==="01" || month==="03" || month==="05" || month==="07" || month==="08" || month==="10" || month==="12") {
            if (day > 31) {
                setActualDate();
                return 6;
            }
        }
        if (month==="02") {
            if (day>29) {
                setActualDate();
                return 7
            }
        }
        if (month==="04" || month==="06" || month==="09" || month==="11") {
            if (day>30) {
                setActualDate();
                return 8;
            }
        }
     }
     function checkTime() {
        var inputtedTime=document.getElementById("time").value;
        if (inputtedTime.length!==5) {
            setActualTime();
            return 1;
        }
        if (isNaN(inputtedTime[0]) || isNaN(inputtedTime[1]) || isNaN(inputtedTime[3]) || isNaN(inputtedTime[4]) || inputtedTime[2]!==":") {
            setActualTime();
            return 2;
        }
        var hour=inputtedTime[0].concat(inputtedTime[1]);
        var minutes=inputtedTime[3].concat(inputtedTime[4]);
        if (hour<0 ||hour>23) {
            setActualTime();
            return 3;
        }
        if (minutes<0 || minutes>59) {
            setActualTime();
            return 4;
        }
     }
     function addNewFile() {
         // var theDiv = document.getElementById("filesUpload");
         // var content = document.createTextNode("<input type=\"file\" name=\"file1\"/><br/><button onclick=\"addNewFile()\">\"Dodaj plik\" </button><br/>");
         // theDiv.appendChild(content);
        // document.getElementById("filesUpload").innerHTML= document.getElementById("filesUpload").innerHTML+'<input type="file" name="file1"/><br/><button onclick="addNewFile()">"Dodaj plik" </button><br/>'
             var INPUT = document.createElement("input");
             INPUT.type="file";
             document.getElementById("filesUpload").appendChild(INPUT);
         }
 </script>