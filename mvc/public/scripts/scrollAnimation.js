$(document).ready(function() {
    var controller = new ScrollMagic.Controller();

    $('.project').each(function () {
        console.log(this);
        var scene = new ScrollMagic.Scene({
            triggerElement: this,
            triggerHook: .9,
            reverse: false
        })
            .setClassToggle(this, 'show')
            .addIndicators({
                name: 'fade scene',
                colorTrigger: 'black',
                colorStart: '#76C695',
                colorEnd: 'pink'
            })
            .addTo(controller);
    });
});