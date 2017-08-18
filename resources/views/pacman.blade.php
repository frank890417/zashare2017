<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>2017雜學校 !!??</title>
    
    <link rel="stylesheet" href="pacmangame/style.css">

</head>

<body>
  <section class="sectionIntro">
    <div class="left">
      <div id="pacman"></div>
    </div>
    <div class="right">
      <h2>
        
      <img class="man"  src="pacmangame/img/man.png"></img>
      <br><br>
      歡迎來到中華民國 の 教育迷宮，我是銅銅 man，負責引導你安全進入迷宮。現在，請你往左走進入迷宮。</h2>
    </div>
  </section>
  <section class="sectionGrave">
    <div class="sideway">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <h1>迷宮在上面，這邊只有一片荒蕪</h1>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <h1>真的啦 <span class="highlight">什麼都沒有</span></h1>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <h1>你確定真的要繼續往下走嗎？</h1>
      <h2>在你之前...大家都..</h2>
      
      <img class="grave" src="pacmangame/img/grave.svg" alt="">
      <img class="grave" src="pacmangame/img/grave.svg" alt="">
      <img class="grave" src="pacmangame/img/grave.svg" alt="">
      <img class="grave" src="pacmangame/img/grave.svg" alt="">
      <img class="grave" src="pacmangame/img/grave.svg" alt="">
      <img class="grave" src="pacmangame/img/grave.svg" alt="">
      <img class="grave" src="pacmangame/img/grave.svg" alt="">
      <img class="pacmanDead" src="pacmangame/img/pacmanDead.svg" alt="">
      <img class="pacmanDead" src="pacmangame/img/pacmanDead.svg" alt="">
      <img class="pacmanDead" src="pacmangame/img/pacmanDead.svg" alt="">
      <img class="pacmanDead" src="pacmangame/img/pacmanDead.svg" alt="">
      <img class="pacmanDead" src="pacmangame/img/pacmanDead.svg" alt="">
      <img class="pacmanDead" src="pacmangame/img/pacmanDead.svg" alt="">
      <img class="pacmanDead" src="pacmangame/img/pacmanDead.svg" alt="">
      <img src="pacmangame/img/pacman.svg" alt="" class="pacman">   
      <br>
      <br> 
      <h2>拿了高分，就可以過好生活，找到好工作！</h2>   
      <br>
      <br> 
      <h1>就有前途光明的人生耶（笑</h1>    
      <img class="pacmanDead" src="pacmangame/img/pacmanDead.svg" alt="">
      <h1>大家都在走迷宮，<span class="highlight">走出迷宮，是活不下去的喇！！</span></h1>
      <img class="pacmanDead" src="pacmangame/img/pacmanDead.svg" alt="">
      <h2>為什麼不跟大家一樣呢？</h2>
      <br>
      <br> 
      <br>
      <br> 
      <br>
      <br> 
      <br>
      <br> 
    </div>
  </section>
  <section class="sectionDoor">
    
  </section>
  <script src="pacmangame/pacman.js"></script>
  <script src="pacmangame/modernizr-1.5.min.js"></script>

  <script>

    var el = document.getElementById("pacman");

    window.setTimeout(function () { PACMAN.init(el, "./"); }, 0);

    // if (Modernizr.canvas && Modernizr.localstorage && 
    //     Modernizr.audio && (Modernizr.audio.ogg || Modernizr.audio.mp3)) {
    //   window.setTimeout(function () { PACMAN.init(el, "./"); }, 0);
    // } else { 
    //   el.innerHTML = "Sorry, needs a decent browser<br /><small>" + 
    //     "(firefox 3.6+, Chrome 4+, Opera 10+ and Safari 4+)</small>";
    // }
  </script>

</body>
</html>
