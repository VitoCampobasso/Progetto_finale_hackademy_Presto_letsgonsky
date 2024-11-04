let body = document.querySelector('body')


setTimeout(()=> {
    window.scrollTo({
        top:0,
        behavior:'instant'
    })
    body.style.overflow = 'auto';
}, 10)

let navbar= document.querySelector(".nav-custom")

window.addEventListener("scroll", () => {
    let scrollValue =window.scrollY;

    if(window.innerWidth>600){

        if(scrollValue>50){
            navbar.style.width= "100%"

            navbar.style.top = "0"
        }else{
            navbar.style.width= "80%"

            navbar.style.top = "40px"
        }

    }
})



let incraseNumberOne = document.querySelector('#incraseNumberOne');
let incraseNumberTwo = document.querySelector('#incraseNumberTwo');
let incraseNumberThree = document.querySelector('#incraseNumberThree');

function createInterval(number, incraseNumber, seconds){
    let counter = 0
    let interval = setInterval( ()=> {
        if (counter < number) {
            counter++
            incraseNumber.innerText = counter + '+'
            
        } else {
            clearInterval(interval)
        }
    
    },seconds)   
}

let check1 = true
let observer = new IntersectionObserver( (intersecting) => {
    intersecting.forEach( (el) => {
        if (el.isIntersecting && check1) {
            createInterval(354, incraseNumberOne, 13)           
            createInterval(293, incraseNumberTwo, 14)
            createInterval(1000, incraseNumberThree, 0.3)
            check1 = false
        } else {
            
        }
    })
})
if (incraseNumberOne) {
    observer.observe(incraseNumberOne)
}

var swiper = new Swiper(".mySwiper", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "4",
    loop: true,
    coverflowEffect: {
      rotate: 100,
      stretch: 0,
      depth: -150,
      modifier: 1,
      slideShadows: false,
    },
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
    pagination: {
      el: ".swiper-pagination",
    },
  });
