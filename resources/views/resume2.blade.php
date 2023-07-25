<!doctype html>
<html lang="de">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  h1, h2, h3, h4, h5, h6 {
    font-weight: 400;
    margin: 10px 0;
}
h1 {
    font-size: 36px
}

h2 {
    font-size: 30px
}

h3 {
    font-size: 24px
}

h4 {
    font-size: 20px
}

h5 {
    font-size: 18px
}

h6 {
    font-size: 16px
}
b, strong {
    font-weight: bolder;
}
     img {
        border-style: none;
        max-width: 100%;
        height: auto;
        
        overflow: hidden;
    }
    p {
    
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
}
footer {
   
    position: absolute;
  left: 0;
  bottom: 0;
  width: 100%;

}
.w3-light-grey, .w3-hover-light-grey:hover, .w3-light-gray, .w3-hover-light-gray:hover {
    color: #000!important;
    background-color: #f1f1f1!important;
}
.w3-card-4, .w3-hover-shadow:hover {
    box-shadow: 0 4px 10px 0 rgba(0,0,0,0.2), 0 4px 20px 0 rgba(0,0,0,0.19);
}
*, *:before, *:after {
    box-sizing: inherit;
}
body {
    margin: 0;
    display: block;
}
.w3-margin-top {
    margin-top: 16px!important;
}
.w3-content, .w3-auto {
    margin-left: auto;
    margin-right: auto;
    display: block;
}

.w3-row-padding, .w3-row-padding>.w3-half, .w3-row-padding>.w3-third, .w3-row-padding>.w3-twothird, .w3-row-padding>.w3-threequarter, .w3-row-padding>.w3-quarter, .w3-row-padding>.w3-col {
    padding: 0 6px;  
}

.w3-col.m4, .w3-third {
    width: 35%;
}

.w3-col.m8, .w3-twothird {
    width: 60%;
}
.w3-col, .w3-half, .w3-third, .w3-twothird, .w3-threequarter, .w3-quarter {
    float: left;    
}
.w3-large {
    font-size: 18px!important;
}
.w3-tooltip, .w3-display-container {
    position: relative;
    box-sizing: inherit;
}

.w3-text-black, .w3-hover-text-black:hover {
    color: #000!important;
}

.w3-container, .w3-panel {
    padding: 0.01em 14px;
}
.w3-margin-bottom {
    margin-bottom: 16px!important;
}
.w3-margin-right {
    margin-right: 16px!important;
}
.w3-margin-top {
    margin-top: 16px!important
}
.w3-display-bottomleft {
    position: absolute;
    left: 0;
    bottom: 0;
}
.w3-text-grey, .w3-hover-text-grey:hover, .w3-text-gray, .w3-hover-text-gray:hover {
    color: #757575!important;
}
.w3-text-teal, .w3-hover-text-teal:hover {
    color: #009688!important;
}
.w3-opacity, .w3-hover-opacity:hover {
    opacity: 0.60;
}
.w3-xxlarge {
    font-size: 36px!important;
}
.w3-padding-16 {
    padding-top: 16px!important;
    padding-bottom: 16px!important;
}
.w3-text-black, .w3-hover-text-black:hover {
    color: #000!important;
}
.w3-white, .w3-hover-white:hover {
    color: #000!important;
    background-color: #fff!important;
}
.w3-blue,.w3-hover-blue:hover{
    color:#000!important;
    background-color:#2196F3!important
}
.w3-blue-grey,.w3-hover-blue-grey:hover,.w3-blue-gray,.w3-hover-blue-gray:hover{
    color:#000!important;
    background-color:#607d8b!important
}
hr {
    border: 0;
    border-top: 1px solid #eee;
    margin: 20px 0;
    box-sizing: content-box;
    height: 0;
    overflow: visible;
}
.w3-teal, .w3-hover-teal:hover {
    color: #fff!important;
    background-color: #009688!important;
}
.w3-text-blue,.w3-hover-text-blue:hover{color:#2196F3!important}
.w3-center {
    text-align: center!important;
}
.fa {
    display: inline-block;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    width: 1.28571429em;
    text-align: center;
}
.fa-envelope-o:before {
    content: "\f003"
}
.fa-star:before {
    content: "\f005"
}
.fa-star-o:before {
    content: "\f006"
}
.fa-home:before {
    content: "\f015"
}
.fa-tag:before {
    content: "\f02b"
}
.fa-calendar:before {
    content: "\f073"
}
.fa-birthday-cake:before {
    content: "\f1fd"
}

.fa-globe:before {
    content: "\f0ac"
}
.fa-graduation-cap:before {
    content: "\f19d"
}
</style>
</head>
<body class="w3-light-grey">

<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1200px; min-height: 80%;">

  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->
    <div class="w3-third">
    
      <div class="w3-blue w3-text-grey w3-card-4">
            <div class="w3-display-container">
            <img src="{{ asset('storage/'.$profile->profileimg) }}" >
            
               
                <div class="w3-container w3-text-black">
          

                    <h2>{{$profile->vorname}}  {{$profile->name}}</h2>
                </div>
            </div>
            <div class="w3-container">
            @if ($profile->wunschposition == null)
            @else
                <p><i class="fa fa-briefcase w3-margin-right w3-large w3-text-black"></i>{{$profile->wunschposition}}</p>
                @endif
                
                <p><i class=" fa fa-home w3-margin-right w3-large w3-text-black"></i> {{$profile->straße}}, {{$profile->plz}} {{$profile->ort}}</p>
                <p><i class=" fa fa-envelope-o w3-margin-right w3-large w3-text-black"></i> {{$profile->email}}</p>
                @if ($profile->handynummer == null)
            @else
                <p><i class="fa fa-phone w3-margin-right w3-large w3-text-black"></i>{{$profile->handynummer}}</p>
                @endif
                @if ($profile->geburtstag == null)
            @else
                <p><i class=" fa fa-birthday-cake w3-margin-right w3-large w3-text-black"></i>{{$profile->geburtstag}}</p>
                @endif
                <hr>

                <p class="w3-large"><b><i class="fa fa-star-o  w3-margin-right w3-text-black"></i>Fähigkeiten</b></p>
                @foreach($profile->tags as $e)
                <p> {{$e}} </p>
                @endforeach                   
                <br>
                <hr>
                <p class="w3-large "><b><i class="fa fa-globe w3-margin-right w3-text-black"></i>Sprachen</b></p>
                @foreach($profile->languages as $lan)                        
                <p>{{$lan->language}}  {{$lan->level}} </p>
                @endforeach         
                <br>
            </div>
      </div>
     

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">
    <!-- Beruferfahrungen .- kann leer Sein -->
    @if (count($profile->experiences) > 0)
      <div class="w3-container w3-card w3-white w3-margin-bottom">
            <h2 class="w3-text-grey "><i class="fa fa-suitcase w3-margin-right w3-xxlarge w3-text-blue">
</i>Beruferfahrungen</h2>
            @foreach ($profile->experiences as $exp)
            <div class="w3-container">
                <h5 class="w3-opacity"><b>{{$exp->jname}} / {{$exp->cnname}}</b></h5>
                <h6 class="w3-text-blue"><i class="fa fa-calendar  w3-margin-right"></i>{{$exp->started_at->format('d/m/Y')}} - @if ($exp->finished_at == null) heute @else {{ $exp->finished_at?->format('d/m/Y') }}  @endif</h6>
                <p>{{$exp->description}}</p>
                <hr>
            </div>
            @endforeach  
           
      </div>
    @else
    @endif
     <!-- End of Beruferfahrungen --> 
    <!-- Bildungsweg  -->   
      <div class="w3-container w3-card w3-white">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-graduation-cap w3-margin-right w3-xxlarge w3-text-blue"></i>Bildungsweg</h2>
        @foreach ($profile->educations as $edu)
        <div class="w3-container">
          <h5 class="w3-opacity"><b>{{$edu->abschluss}} / {{$edu->bildungseinrichtung}} </b></h5>
          <h6 class="w3-text-blue"><i class="fa fa-calendar  w3-margin-right"></i>{{$edu->started_at->format('d/m/Y')}} - @if ($edu->finished_at == null) heute @else {{ $edu->finished_at?->format('d/m/Y') }} @endif</h6>
          <p>{{$edu->fachrichtung}}</br>{{$edu->orth}}</p>
          <hr>
        </div>
        @endforeach 
        
      </div>

    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  <!-- End Page Container -->
</div>

</body>
</html>

