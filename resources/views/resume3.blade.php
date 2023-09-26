<!doctype html>
<html lang="de">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&display=swap" rel="stylesheet">



<style>
 
 * {
  box-sizing: border-box;
}

@page { margin: 0px; margin-right:40px;}
body { margin: 0px; }

html {
    font-size: 10px;
    color: #949494;
}

body, p {
    margin: 0;
    padding: 0;
}

.main {
    max-width: 1200px;
    width: 100%;
    margin: 0 auto;
    background-color: lightgray;
   font-family: 'Libre Baskerville', serif;
}

.left {
    width: 29%;
    float: left;
    min-height: 100vh;
    height:100%;
    background-color: #E5E5E5;
    font-weight: bold;
}

.left-item {
    padding: 5px 25px;
}

.left-item ul {
    padding: 0;
    margin: 0;
}

.left-item li {
    list-style-type: none;
    margin: 0;
    padding: 0;
    line-height: 1;
    margin-bottom: 6px;
}

.left li i {
    color: #003856;
    margin-right: 8px;
}

h3 {
    color: #605C56;
    display: inline-block;
    line-height: 1.5;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.right {
    float: left;
    width: 71%;
    padding: 0 40px;
    padding-right: 0;
}

img {
    max-width: 100%;
}

h1, h2 {
   font-family: 'Libre Baskerville', serif;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 4px;
}

h1 {
    font-size: 16px;
    color: #656565;
    margin-bottom: 0;
    line-height: 1.2;
    text-align: center;
    margin-top: 50px;
    hyphens: auto;
    word-wrap: break-word;
}

h2 {
    margin: 0;
    margin-bottom: 40px;
    color: #949494;
    font-size: 30px;
}

.header h2 {
    text-align: center;
    font-size: 12px;
    hyphens: auto;
    word-wrap: break-word;
}

.right h3 {
    margin-bottom:0;
}

.header {
    padding: 0px 10px;
}


.subblock-title {
    font-weight: bold;
    margin-top: 30px;
    color: #605C56;
}

.subblock-date {
    color: #8B8986;
    margin-bottom: 20px;
}

.block {
    margin-bottom: 30px;
    margin-right: 40px;
}

.block-school .subblock-date, .block-school .subblock-text {
    margin: 0;
}

.icon {
    width:15px;
    margin-right:5px;
}

.line {
    width: 140px;
    height: 1px;
    background-color: #bebebe;
    margin: 20px auto;
}

.line-left {
    margin: 20px 25px;
}

.signature {
    text-align: right;
    margin-bottom: 160px;
    margin-top: 20px;
    margin-right: 25px;
}

.greeting {
    margin-top: 50px;
}

</style>

</head>
<body>

    <div class="main">

        <div class="left">

            <div class="header">
                <h1>Anja Mustermann</h1>
                <div class="line"></div>
                <h2>Projektmanagerin</h2>
            </div>

            <img src="{{ asset('storage/'.$profile->profileimg) }}" >
            <div class="left-item">
                <h3>Persönliches</h3>
                <ul>
                    <li><img class="icon" src="{{ asset('storage/icons/envelope-fill-3.png') }}" >anja.mustermann@mail.de</li>
                    <li><img class="icon" src="{{ asset('storage/icons/phone-fill-3.png') }}" >07131 61561</li>
                    <li><img class="icon" src="{{ asset('storage/icons/geo-alt-fill-3.png') }}" >Allee 2, 74072 Heilbronn</li>
                    <li><img class="icon" src="{{ asset('storage/icons/cake2-fill-3.png') }}" ></i>22.11.1983</li>
                </ul>
            </div>
            <div class="line line-left"></div>
            <div class="left-item">
                <h3>Fähigkeiten</h3>
                <ul>
                    <li>Marketingplanung</li>
                    <li>Gesamtprojektplanung</li>
                </ul>
            </div>
            <div class="line line-left"></div>
            <div class="left-item">
                <h3>Sprachen</h3>
                <ul>
                    <li>Deutsch - Muttersprache</li>
                    <li>Englisch - Gute Kenntnisse</li>
                </ul>
            </div>
        </div>
        <div class="right">
            <div class="signature">
                <p>Heilbronn, 26.09.2020</p>
            </div>
            <div class="block">
                <h3>Berufserfahrung</h3>
                <div class="subblock">
                    <p class="subblock-title">Projektmanagerin</p>
                    <p class="subblock-date">Mustermann & Co. KG // Januar 2019 - heute</p>
                    <p class="subblock-text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
                </div>
                <div class="subblock">
                    <p class="subblock-title">Projektmanagerin</p>
                    <p class="subblock-date">Mustermann & Co. KG // Januar 2019 - heute</p>
                    <p class="subblock-text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
                </div>
                <div class="subblock">
                    <p class="subblock-title">Projektmanagerin</p>
                    <p class="subblock-date">Mustermann & Co. KG // Januar 2019 - heute</p>
                    <p class="subblock-text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
                </div>
            </div>

            <div class="block block-school">
                <h3>Bildungsweg</h3>
                <div class="subblock">
                    <p class="subblock-title">Master</p>
                    <p class="subblock-date">Freie Universität Berlin // 2001</p>
                    <p class="subblock-text">Sozialwissenschaften</p>
                </div>
                <div class="subblock">
                    <p class="subblock-title">Bachelor</p>
                    <p class="subblock-date">Freie Universität Berlin // 2001</p>
                    <p class="subblock-text">Sozialwissenschaften</p>
                </div>
            </div>

            
            <div class="greeting">Mit freundlichen Grüßen,</div>


        </div>
    </div>

</body>
</html>

