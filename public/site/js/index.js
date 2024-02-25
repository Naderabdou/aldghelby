const scroller = new LocomotiveScroll({
  el: document.querySelector("[data-scroll-container]"),
  smooth: true,
});

gsap.registerPlugin(ScrollTrigger);

scroller.on("scroll", ScrollTrigger.update);

ScrollTrigger.scrollerProxy(".main-scroll-page", {
  scrollTop(value) {
    return arguments.length
      ? scroller.scrollTo(value, 0, 0)
      : scroller.scroll.instance.scroll.y;
  },
  getBoundingClientRect() {
    return {
      left: 0,
      top: 0,
      width: window.innerWidth,
      height: window.innerHeight,
    };
  },
});

ScrollTrigger.create({
  trigger: ".image-mask",
  scroller: ".main-scroll-page", // Use the reference to the scroll container element
  start: "top+=0% 30%",
  end: "bottom-=30% 50%",
  animation: gsap.to(".image-mask", { backgroundPosition: "100%" }),
  scrub: 2,
  // markers: true
});

ScrollTrigger.create({
  trigger: ".trademark1",
  scroller: ".main-scroll-page", // Use the reference to the scroll container element
  start: "top+=30% 50%",
  end: "bottom-=50% 30%",
  animation: gsap.to(".trademark1", { width: "30%" }),
  scrub: 2,
  // markers: true,
});
ScrollTrigger.create({
  trigger: ".trademark2",
  scroller: ".main-scroll-page", // Use the reference to the scroll container element
  start: "top+=60% 50%",
  end: "bottom-=50% 30%",
  animation: gsap.to(".trademark2", { width: "30%" }),
  scrub: 2,
  // markers: true,
});

console.log(ScrollTrigger);

ScrollTrigger.addEventListener("refresh", () => scroller.update());

ScrollTrigger.refresh();

if ($(".counter").length) {
  var a = 0;

  scroller.on("scroll", (args) => {
    if (a === 0) {
      const oTop = $(".counter-box").offset().top - window.innerHeight;

      if (args.scroll.y > oTop) {
        $(".counter").each(function () {
          var $this = $(this),
            countTo = $this.attr("data-number");

          $({
            countNum: $this.text(),
          }).animate(
            {
              countNum: countTo,
            },
            {
              duration: 2550,
              easing: "swing",
              step: function () {
                $this.text(Math.ceil(this.countNum).toLocaleString("en"));
              },
              complete: function () {
                $this.text(Math.ceil(this.countNum).toLocaleString("en"));
              },
            }
          );
        });

        a = 1;
        setTimeout(function () {
          $(".counter").parents(".counter-box").addClass("active");
        }, 2550);
      }
    }
  });

  const animationDuration = 4000;
  const frameDuration = 1000 / 60;
  const totalFrames = Math.round(animationDuration / frameDuration);
  const easeOutQuad = (t) => t * (2 - t);

  const animateCountUp = (el) => {
    let frame = 0;
    const countTo = parseInt(el.innerHTML, 10);

    const counter = setInterval(() => {
      frame++;

      const progress = easeOutQuad(frame / totalFrames);
      const currentCount = Math.round(countTo * progress);

      if (parseInt(el.innerHTML, 10) !== currentCount) {
        el.innerHTML = currentCount;
      }

      if (frame === totalFrames) {
        clearInterval(counter);
      }
    }, frameDuration);
  };

  const countupEls = document.querySelectorAll(".timer");
  countupEls.forEach(animateCountUp);

  $(".animated-progress span").each(function () {
    $(this).animate(
      {
        width: $(this).attr("data-progress") + "%",
      },
      2100
    );
    $(this).text($(this).attr("data-progress") + "%");
  });
}
