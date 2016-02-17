<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <style>
        .a1{
            color: red;
        }

        .a2{
            color: royalblue;
        }

        .a3{
            color: green;
        }
    </style>
</head>
<body>

<script>

    var newWindow;

    var myVar = setInterval(function()
    {myclock()}, 1000);

    function myclock()
    {
        var d = new Date();
        var time = d.toLocaleString();
        document.getElementById("clock").innerHTML = time;
    }

    var msgCount = 1;
    setInterval(function() {
        newMessage()
    },2000);

    function newMessage()
    {
        var myMsg;
        var c = "a" + msgCount;
        switch (msgCount)
        {
            case 1:
                myMsg = "Welcome to My Site";
                break;
            case 2:
                myMsg = "Please don't leave";
                break;
            case 3:
                myMsg = "It's a great day to surf the web";
                break;
        }

        document.getElementById("newMsg").innerHTML = myMsg;
        document.getElementById("newMsg").className = c;
        msgCount++;

        if(msgCount > 3)
        {
            msgCount = 1;
        }
    }

    var beObnoxious = setInterval(function()
    {
        obnoxious();
    },10);

    var newsize = -5;
    var incr = 1;
    var obcount = 0;

    function obnoxious() {
        var xx;
        newsize = newsize + incr;
        xx = newsize + "px";
        document.getElementById("obnox").style.fontSize = xx;

        if (newsize === 144) {
            incr = -1;
            document.getElementById("obnox").style.color = "blue";
            document.getElementById("obnox").style.background = "yellow";
            obcount++;
        }

        if (newsize === 0) {
            incr = 1;
            document.getElementById("obnox").setAttribute("style", "color: yellow; background-color:blue;");
        }

        if (obcount === 4) {
            stopObnoxious()
        }

    }

    function stopObnoxious()
    {
        clearInterval(beObnoxious);
    }

    function getWindowInfo()
    {
        var windowWidth = window.innerWidth
            || document.documentElement.clientWidth
            || document.body.clientWidth;
        var windowHeight = window.innerHeight ||
            document.documentElement.clientHeight
            || document.body.clientHeight;
        document.getElementById("WinSize").innerHTML =
            "Width = " + windowWidth +
            " Height = " + windowHeight;
    }

    function openMyPage()
    {
        //Notice that myWebsite has to be one of your
        //own pages and not an external site.
        newWindow = window.open("mypage.html",
            "_blank", "toolbar=true, width=200, height=300");
    }

    //resise to get bigger by 50 pixels every click
    function getBigger()
    {
        newWindow.resizeBy(50, 50);
        newWindow.focus();
    }
    //close your own window
    function closeMyPage()
    {
        newWindow.close();
    }
    //resize to a specific height and width
    function setSize()
    {
        newWindow.resizeTo(1000, 100);
        newWindow.focus();
    }
    //go back to previous page as listed in browser's history
    function goBack()
    {

        window.history.back();
    }
    //go forward to previous page as listed in browser's history
    function goForward()
    {

        window.history.forward();
    }

    //Get browser information
    //See article in D2L on why everything is listed as Mozzila
    function browser()
    {
        txt = "Browser CodeName: " + navigator.appCodeName.toString() + "</p>";
        txt += "<p>Browser Name: " + navigator.appName + "</p>";
        txt += "<p>Browser Version: " + navigator.appVersion + "</p>";
        txt += "<p>Cookies Enabled: " + navigator.cookieEnabled + "</p>";
        txt += "<p>Platform: " + navigator.platform + "</p>";
        txt += "<p>User-agent header: " + navigator.userAgent + "</p>";
        txt += "<p>User-agent language: " + navigator.systemLanguage + "</p>";
        txt += "<p>-- " + navigator.product + " " + navigator.vendor;

        document.getElementById("brows").innerHTML = txt;
    }





</script>

<!--clock-->

<p id="clock"></p>

<!--Rotating Message-->

<p id="newMsg"></p>

<p id="obnox">obnoxious</p>

<h2>Window Size</h2>
<p onclick="getWindowInfo()">Click Me</p>
<p id="WinSize"></p>

<!-- Rotating message -->
<h2>Open Window </h2>
<p onclick="openMyPage()">open my page</p>
<p></p>

<!-- Increase on click -->
<h2>Window Size Up</h2>
<p onclick="getBigger()">Get Bigger</p>
<p ></p>

<!-- Set to specific size -->
<h2>Window Size </h2>
<p onclick="setSize()">size</p>
<p ></p>

<!-- Close window -->
<h2>close Window </h2>
<p onclick="closeMyPage()">close my page</p>
<p ></p>

<!-- Create a back button -->
<h2>Go Back </h2>
<p onclick="goBack()">go back one page</p>
<p ></p>

<!-- Create a forward button -->
<h2>Go Forward </h2>
<p onclick="goForward()">go forward one page</p>
<p ></p>
<button onclick="goForward()">-></button>

<!-- Browser info - see article why everything name mozilla -->
<h2>Browser Info </h2>
<p onclick="browser()">browser</p>
<p id="brows"></p>

</body>
</html>