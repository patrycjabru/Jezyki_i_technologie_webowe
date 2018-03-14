<!DOCTYPE html>
<?php
echo "MENU:";
echo <<<HTML
            <br/>
HTML;
echo <<<HTML
            <a href="CreateNewBlog.html">Utwórz nowy blog</a><br/>
HTML;
echo <<<HTML
            <a href="blog.php">Lista blogów</a><br/><br/>
HTML;

?>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="shotboxScript.js"></script>
<form id="form1" method="post">
    <input type="checkbox" id="checkbox" checked onclick=toggleShoutbox()>
    <label>Aktywuj shoutboxa</label>
    <br/>
    <textarea id="area" cols=60 rows=8 readonly>Pobieranie zawartosci</textarea>
    <br/>
    Imie:
    <br/>
    <input type="text" id="name" name="name" >
    <br/>
    Wiadomosc:
    <br/>
    <input type="text" id="message" name="message">
    <br/>
    <input type="submit" id="submit" name="sumbit" value="wyslij" onclick=sendMessage()>
</form>

