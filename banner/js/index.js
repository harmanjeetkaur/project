$(document).ready(function(){

  var duration = 5,
    currentindex = Math.round(Math.random()*(3-1)+1),
    totalitems = $('.info').length,
    timeline = new TimelineMax(),
    item,
    bar;

  function runslide() {

    item = $('[data-id='+ currentindex +']'),
    bar = item.find('.bar');

    item.addClass('active');

    timeline.play();
    timeline
      .to(bar, 0, {left: '-100%'})
      .to(bar, duration, {left: '0%', ease: Linear.easeNone, delay: .75, onComplete: function(){
        item.addClass('fadeout');
      }})
      .to(bar, duration/10, {left: '100%', ease: Power4.easeIn, delay: .25, onComplete: function(){
        if(currentindex == totalitems){
          currentindex = 1;
        } else {
          currentindex++;
        }
        item.removeClass('active fadeout');
        timeline.clear();
        runslide();
      }});
  }

  function clickslide(e) {

    currentindex = e;
    timeline.clear();
    TweenMax.to(bar, duration/10, {left: '0%', ease: Power4.easeOut});
    TweenMax.to(bar, duration/10, {left: '100%', ease: Power4.easeIn, delay: duration/10});

    $('.photo, .info').removeClass('active fadeout');
    runslide();

  }


  $('.banner')
    .on('click', '.info:not(.active, .fadeout)', function(){
      clickslide($(this).attr('data-id'));
      timeline.pause();
    })
    .on('click', '.info.active:not(.fadeout)', function(){
      window.alert('Hello world!');
    })
    .on('mouseover', '.info.active:not(.fadeout)', function(){
      timeline.pause();
    })
    .on('mouseout', '.info.active:not(.fadeout)', function(){
      timeline.play();
    });


  $('.photo').each(function(){
    $(this).css({'background-image': 'url('+ $(this).attr('data-image') +')'});
  });


  $(window).on('load', function(){
    runslide();
  });

});