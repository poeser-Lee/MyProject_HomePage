function slide_func() {
    let slideshow =document.querySelector("div.slideshow");
    let slideShowSlides =document.querySelector("div.slideshow_sildes");
    let slides =document.querySelectorAll("div.slideshow_sildes a");
    let prev =document.querySelector(".prev");
    let next =document.querySelector(".next");
    let slideCount = slides.length;
    let currentIndex = 0;
    let timer; 

    for(let i =0 ;i<slideCount; i++) {
        let newLeft = i*100 +'%';
        slides[i].style.left = newLeft;
    }
    
    function gotoSlide(index){
        currentIndex = index;
        let newLeft = -(currentIndex * 100) + '%';
        slideShowSlides.style.left = newLeft;
        slideShowSlides.classList.add('animated');

        (currentIndex===0)? prev.classList.add('disabled'):prev.classList.remove('disabled') ;
        (currentIndex===3)? next.classList.add('disabled'):next.classList.remove('disabled') ;
    }

    gotoSlide(0);

    prev.addEventListener('click',function(e){
        e.preventDefault();
        let index = currentIndex;
        index = (index === 0 ) ? slideCount-1 : index-1; 
        gotoSlide(index);
    });

    next.addEventListener('click',function(e){
        e.preventDefault();
        let index = currentIndex;
        index = (index === (slideCount-1) ) ? 0 : index+1; 
        gotoSlide(index);
    });

    function startTimer(){
        timer = setInterval(function(){
            let index = (currentIndex+1)%slideCount;
    
            gotoSlide(index);
        },3000 );
    }
    startTimer();

    slideShowSlides.addEventListener('mouseenter',function(){
        clearInterval(timer);
    });
 
    slideShowSlides.addEventListener('mouseleave',function(){
        startTimer();
    });

    console.log( slideShowSlides);



}
