jQuery('.close-promotion').click(()=>{
    jQuery('.header-top-promotion ').css('display','none');
    var now = new Date();
    now.setTime(now.getTime() + 24 * 3600 * 1000);
    document.cookie = `showPromo=true; expires=${now.toGMTString()}; Secure`;
})

document.querySelector('.hamburger').addEventListener('click', function() {
    document.querySelector('.hamberguer-menu-desktop').classList.toggle('active');
    if(window.screen.width < 1024){
        jQuery('.category-highlights-slider').toggleClass('hide');
        jQuery('.main-menu')[0].classList.toggle('background-black');
    }
  });

jQuery(document).ready(function(){
    if(jQuery('.home-category-logo-container')[0]){
    jQuery('.home-category-logo-container')[0].style.height='auto';
    jQuery('.home-category-logo-container')[0].style.top='50%';
    }
    if(jQuery('.menu-main-bottom-items')){
        const menuButtons=jQuery('.menu-main-bottom-items');
        for(let i=0;i<menuButtons.length;i++){
            jQuery(`.menu-button-${i}`).hover(()=>{
                jQuery('.menu-main-bottom-items').css('opacity','0.6');
                jQuery(`.menu-button-${i}`).css('opacity','1');
            })
            jQuery(`.menu-bottom-items-container-${i}`).mouseleave(()=>{
                jQuery(`.menu-main-bottom-items`).css('opacity','1');
            })
        }
    }
})






