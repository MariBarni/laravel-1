<!doctype html>
<html lang="de">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>
 
 * {
  box-sizing: border-box;
}

@page { margin: 0px; margin-right:40px;}
body { margin: 0px; }

html {
    font-size: 12px;
}

body, p {
    margin: 0;
    padding: 0;
}

.main {
    max-width: 1000px;
    width: 100%;
    margin: 0 auto;
    background-color: lightgray;
    font-family: 'Roboto', sans-serif;
}

.left {
    width: 29%;
    float: left;
    min-height: 100vh;
    height:100%;
    background-color: #5C94B2;
    color: #fff;
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
    border-bottom: 3px solid #003856;
    display: inline-block;
    line-height: 1.5;
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
    font-family: 'Roboto Slab', serif;
    font-weight: bold;
}

h1 {
    font-size: 45px;
    color: #003856;
    margin-bottom: 0;
    line-height: 0.7;
}

h2 {
    margin: 0;
    margin-bottom: 40px;
    color: #5C94B2;
    font-size: 30px;
}

.right h3 {
    color: #003856;
    border-bottom: 3px solid #5C94B2;
    margin-bottom:0;
}

.subblock-title {
    font-weight: bold;
    margin-top: 30px;
}

.subblock-date {
    color: #5C94B2;
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

.headimg {
    width:100%;
}


</style>

</head>
<body>

    <div class="main">
        <div class="left">
            <img  class="headimg" src="{{ asset('storage/'.$profile->profileimg) }}" >
            <div class="left-item">
                <h3>Persönliches</h3>
                <ul>
                    <li><img class="icon" src="{{ asset('storage/icons/envelope-fill.png') }}" >{{$profile->email}}</li>
                     @if ($profile->telefonnummer == null)
                     @else
                    <li><img class="icon" src="{{ asset('storage/icons/phone-fill.png') }}" >{{$profile->telefonnummer}}</li>
                    @endif
                    <li><img class="icon" src="{{ asset('storage/icons/geo-alt-fill.png') }}" >{{$profile->straße}}, {{$profile->plz}} {{$profile->ort}}</li>
                    @if ($profile->geburtstag == null)
                    @else
                    <li><img class="icon" src="{{ asset('storage/icons/cake2-fill.png') }}" ></i>{{$profile->geburtstag}}</li>
                     @endif
                  
                </ul>
            </div>
            @if (count($profile->tags) > 0)
            <div class="left-item">
                <h3>Fähigkeiten</h3>
                <ul>
                    @foreach($profile->tags as $e)
                    <li>{{$e}}</li>
                    @endforeach  
                </ul>
            </div>
             @else
            @endif

            <div class="left-item">
                <h3>Sprachen</h3>
                <ul>
                     @foreach($languages as $lan)
                    <li>{{$lan->language}} - {{$lan->level}}</li>
                    @endforeach 
                </ul>
            </div>
        </div>
        <div class="right">
            <div class="header">
                <h1>{{$profile->vorname}}  {{$profile->name}}</h1>
                @if ($profile->identifikation == null)
                @else
                <h2>{{$profile->identifikation}}</h2>
                @endif
            </div>

            
    @if (count($experiences) > 0)
            <div class="block">
                <h3>Berufserfahrung</h3>
                 @foreach ($experiences as $exp)
                <div class="subblock">
                    <p class="subblock-title">{{$exp->jname}}</p>
                    <p class="subblock-date">{{$exp->cnname}} // {{$exp->started_at->format('d.m.Y')}} - @if ($exp->finished_at == null) heute @else {{ $exp->finished_at?->format('d.m.Y') }}  @endif</p>
                    <p class="subblock-text">{{$exp->description}}</p>
                </div>
                  @endforeach                     
            </div>
            @else
            @endif

            <div class="block block-school">
                <h3>Bildungsweg</h3>
                @foreach ($educations as $edu)
                <div class="subblock">
                    <p class="subblock-title">{{$edu->abschluss}}</p>
                    <p class="subblock-date">{{$edu->bildungseinrichtung}} // {{$edu->started_at->format('d.m.Y')}} - @if ($edu->finished_at == null) heute @else {{ $edu->finished_at?->format('d.m.Y') }} @endif</p>
                    <p class="subblock-text">{{$edu->fachrichtung}}</p>
                    <p class="subblock-text">{{$edu->orth}}</p>
                </div>
                @endforeach    
            </div>

            <div class="signature">
                <p>Heilbronn, {{$datum}}</p>
            </div>
        </div>
    </div>

</body>
</html>

