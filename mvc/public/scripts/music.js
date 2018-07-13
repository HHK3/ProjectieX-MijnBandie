var mq = window.matchMedia( "(min-width: 1160px)" );
if (mq.matches) {
    var section = document.getElementById("guus");
    var muziek = new Audio('audio/Guus Meeuwis.wav');

    section.addEventListener("mouseover", playMusic, false);
    section.addEventListener("mouseout", stopMusic, false);

    function playMusic(){
        muziek.play();
        muziek.loop = true;
    }
    function stopMusic(){
        muziek.pause();
    }

    var section2 = document.getElementById("montreal");
    var muziek1 = new Audio('audio/Montreal.wav');

    section2.addEventListener("mouseover", play, false);
    section2.addEventListener("mouseout", stop, false);

    function play(){
        muziek1.play();
        muziek1.loop = true;
    }
    function stop(){
        muziek1.pause();
    }

    var section3 = document.getElementById("direct");
    var muziek2 = new Audio('audio/Di-Rect.wav');

    section3.addEventListener("mouseover", play1, false);
    section3.addEventListener("mouseout", stop1, false);

    function play1(){
        muziek2.play();
        muziek2.loop = true;
    }
    function stop1(){
        muziek2.pause();
    }

    var section4 = document.getElementById("wulf");
    var muziek3 = new Audio('audio/wulf.wav');

    section4.addEventListener("mouseover", play2, false);
    section4.addEventListener("mouseout", stop2, false);

    function play2(){
        muziek3.play();
        muziek3.loop = true;
    }
    function stop2(){
        muziek3.pause();
    }

    var section5 = document.getElementById("venga");
    var muziek4 = new Audio('audio/venga.wav');

    section5.addEventListener("mouseover", play3, false);
    section5.addEventListener("mouseout", stop3, false);

    function play3(){
        muziek4.play();
        muziek4.loop = true;
    }
    function stop3(){
        muziek4.pause();
    }

    var section6 = document.getElementById("2unlimited");
    var muziek5 = new Audio('audio/2-Unlimited.wav');

    section6.addEventListener("mouseover", play4, false);
    section6.addEventListener("mouseout", stop4, false);

    function play4(){
        muziek5.play();
        muziek5.loop = true;
    }
    function stop4(){
        muziek5.pause();
    }

    var section7 = document.getElementById("paul");
    var muziek6 = new Audio('audio/paul.wav');

    section7.addEventListener("mouseover", play5, false);
    section7.addEventListener("mouseout", stop5, false);

    function play5(){
        muziek6.play();
        muziek6.loop = true;
    }
    function stop5(){
        muziek6.pause();
    }


    var section8 = document.getElementById("spoon");
    var muziek7 = new Audio('audio/T-Spoon.wav');

    section8.addEventListener("mouseover", play6, false);
    section8.addEventListener("mouseout", stop6, false);

    function play6(){
        muziek7.play();
        muziek7.loop = true;
    }
    function stop6(){
        muziek7.pause();
    }
}




