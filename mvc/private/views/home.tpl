<section class="sec1">
    <video autoplay muted loop id="myVideo">
        <source src="video/intro.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>
    <div id="logoBanner">
        <img src="video/strand_homenew.svg">
    </div>
</section>
<section class="sec2 project">
    <div id="sec">
        <br>
        <h2>ARTISTS</h2>
        <div id="grid">
            <div id="saturday">
                <h1>Friday</h1>
                <div class="artists">
                    <div class="artistInfo" onclick="document.getElementById('vengaboys').style.display='table'">
                        <a class="artist1" id="venga">
                            <img src="images/Vengaboys.jpg" alt="Vengaboys">
                            <h3>Vengaboys</h3>
                        </a>
                    </div>
                    <div class="artistInfo" onclick="document.getElementById('2unlimited1').style.display='table'">
                        <a class="artist1" id="2unlimited">
                            <img src="images/2unlimited.jpg" alt="2 Unlimited">
                            <h3>2 Unlimited</h3>
                        </a>
                    </div>
                    <div class="artistInfo" onclick="document.getElementById('paul1').style.display='table'">
                        <a class="artist1" id="paul">
                            <img src="images/Paul-Elstak.jpg" alt="Paul Elstak">
                            <h3>Paul Elstak</h3>
                        </a>
                    </div>
                    <div class="artistInfo" onclick="document.getElementById('spoon1').style.display='table'">
                        <a  class="artist1" id="spoon">
                            <img src="images/T-Spoon.jpg" alt="T-Spoon">
                            <h3>T-Spoon</h3>
                        </a>
                    </div>
                </div>
            </div>
            <div id="sunday">
                <h1>Saturday</h1>
                <div class="artists">
                    <div class="artistInfo" onclick="document.getElementById('guus1').style.display='table'">
                        <a  class="artist1" id="guus">
                            <img src="images/guus.jpeg" alt="Guus Meeuwis">
                            <h3>Guus Meeuwis</h3>
                        </a>
                    </div>
                    <div class="artistInfo" onclick="document.getElementById('miss').style.display='table'">
                        <a class="artist1" id="montreal">
                            <img src="images/sanne.png" alt="Miss Montreal">
                            <h3>Miss Montreal</h3>
                        </a>
                    </div>
                    <div class="artistInfo" onclick="document.getElementById('direct1').style.display='table'">
                        <a class="artist1" id="direct">
                            <img src="images/Di-rect.jpg" alt="Di-Rect">
                            <h3>Di-rect</h3>
                        </a>
                    </div>
                    <div class="artistInfo" onclick="document.getElementById('wulf1').style.display='table'">
                        <a class="artist1" id="wulf">
                            <img src="images/Wulf.jpg" alt="Wulf">
                            <h3>Wulf</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <h1>...And many more!</h1>

    </div>
</section>
<section class="sec3 project">
        <br>
        <h2>LATESTS NEWS</h2>
        <div id="newsHome">
            {counter assign=index print=0}
            {foreach from=$articles item=article}
                {counter}
                {if $index <= 2}
                    <div class="newsArticle">
                        <img src="{$article[4]}" class="imageNews" alt="{$article[1]}">
                        <h2>{$article[1]}</h2>
                        <h5>{$article[2]}</h5>
                        <br>
                        <a href="index.php?page=news_article&article_id={$article[0]}">Lees meer</a>
                        <br>
                    </div>
                {/if}
                {if $index >= 3 && $index <= 7}
                    <div class="newsArticle 1">
                        <img src="{$article[4]}" class="imageNews" alt="{$article[1]}">
                        <h2>{$article[1]}</h2>
                        <h5>{$article[2]}</h5>
                        <br>
                        <a href="index.php?page=news_article&article_id={$article[0]}">Lees meer</a>
                        <br>
                    </div>

                {/if}
            {/foreach}
            <div id="lmao">
                <a href="index.php?page=news">See More!</a>
            </div>
        </div>
        </div>

</section>
<section class="sec4 project">
    <br>
    <h2>Sponsors</h2>
    <div id="logoBanner1">
        <img src="img/logos.svg">
    </div>
</section>

<div class="modal" id="paul1">
    <div class="modal__dialog">
        <section class="modal__content">
            <header class="modal__header">
                <h2 class="modal__title">Paul Elstak</h2>
                <span class="modal__close" onclick="document.getElementById('paul1').style.display='none'">&times;</span>
            </header>
                <div class="modal__body">
                        <img src="images/Paul-Elstak.jpg" alt="modal image" class="modal__image" width="400px"  height="400px">
                </div>
            </div>
        </section>
    </div>
</div>

<div class="modal" id="vengaboys">
    <div class="modal__dialog">
        <section class="modal__content">
            <header class="modal__header">
                <h2 class="modal__title">Vengaboys</h2>
                <span class="modal__close" onclick="document.getElementById('vengaboys').style.display='none'">&times;</span>
            </header>
            <div class="modal__body">
                <img src="images/Vengaboys.jpg" alt="modal image" class="modal__image" width="400px"  height="400px">
            </div>
    </div>
    </section>
</div>
</div>

<div class="modal" id="2unlimited1">
    <div class="modal__dialog">
        <section class="modal__content">
            <header class="modal__header">
                <h2 class="modal__title">2 Unlimited</h2>
                <span class="modal__close" onclick="document.getElementById('2unlimited1').style.display='none'">&times;</span>
            </header>
            <div class="modal__body">
                <img src="images/2unlimited.jpg" alt="modal image" class="modal__image" width="400px"  height="400px">
            </div>
    </div>
    </section>
</div>
</div>

<div class="modal" id="guus1">
    <div class="modal__dialog">
        <section class="modal__content">
            <header class="modal__header">
                <h2 class="modal__title">Guus Meeuwis</h2>
                <span class="modal__close" onclick="document.getElementById('guus1').style.display='none'">&times;</span>
            </header>
            <div class="modal__body">
                <img src="images/guus.jpeg" alt="modal image" class="modal__image" width="400px"  height="400px">
            </div>
    </div>
    </section>
</div>
</div>

<div class="modal" id="miss">
    <div class="modal__dialog">
        <section class="modal__content">
            <header class="modal__header">
                <h2 class="modal__title">Miss Montreal</h2>
                <span class="modal__close" onclick="document.getElementById('miss').style.display='none'">&times;</span>
            </header>
            <div class="modal__body">
                <img src="images/sanne.png" alt="modal image" class="modal__image" width="400px"  height="400px">
            </div>
    </div>
    </section>
</div>
</div>

<div class="modal" id="direct1">
    <div class="modal__dialog">
        <section class="modal__content">
            <header class="modal__header">
                <h2 class="modal__title">Di-rect</h2>
                <span class="modal__close" onclick="document.getElementById('direct1').style.display='none'">&times;</span>
            </header>
            <div class="modal__body">
                <img src="images/Di-rect.jpg" alt="modal image" class="modal__image" width="400px"  height="400px">
            </div>
    </div>
    </section>
</div>
</div>

<div class="modal" id="wulf1">
    <div class="modal__dialog">
        <section class="modal__content">
            <header class="modal__header">
                <h2 class="modal__title">Wulf</h2>
                <span class="modal__close" onclick="document.getElementById('wulf1').style.display='none'">&times;</span>
            </header>
            <div class="modal__body">
                <img src="images/Wulf.jpg" alt="modal image" class="modal__image" width="400px"  height="400px">
            </div>
    </div>
    </section>
</div>
</div>

<div class="modal" id="spoon1">
    <div class="modal__dialog">
        <section class="modal__content">
            <header class="modal__header">
                <h2 class="modal__title">T-Spoon</h2>
                <span class="modal__close" onclick="document.getElementById('spoon1').style.display='none'">&times;</span>
            </header>
            <div class="modal__body">
                <img src="images/T-Spoon.jpg" alt="modal image" class="modal__image" width="400px"  height="400px">
            </div>
    </div>
    </section>
</div>
</div>
<script src="scripts/music.js"></script>