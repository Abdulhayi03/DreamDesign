// const counters = document.querySelectorAll('.counter');
// const speed = 200;

// counters.forEach(counter => {
//     const updateCount = ()=> {
//         const target = +counter.getAttribute('data-target');
//         const count = +counter.innerText;

//         const inc = target / speed;

//         console.log(count);

//         if(count < target){
//             counter.innerText = Math.ceil(count + inc);
//             setTimeout(updateCount, 1);
//         }else{
//             count.innerText = target;
//         }
//     }

//     updateCount();
// });

var counted = 0;
$(window).scroll(function() {

  var oTop = $('#counter').offset().top - window.innerHeight;
  if (counted == 0 && $(window).scrollTop() > oTop) {
    $('.count').each(function() {
      var $this = $(this),
        countTo = $this.attr('data-count');
      $({
        countNum: $this.text()
      }).animate({
          countNum: countTo
        },

        {

          duration: 2000,
          easing: 'swing',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
            //alert('finished');
          }

        });
    });
    counted = 1;
  }

});