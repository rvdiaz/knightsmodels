jQuery('.close-promotion').click(()=>{
    jQuery('.header-top-promotion ').css('display','none');
    var now = new Date();
    now.setTime(now.getTime() + 24 * 3600 * 1000);
    document.cookie = `showPromo=true; expires=${now.toGMTString()}; Secure`;
    if(window.screen.width < 1024){
        jQuery('.hamberguer-menu-desktop').height('100vh');
        jQuery('.hamberguer-menu-desktop').height( jQuery('.hamberguer-menu-desktop').height()-36);
    } 
})

document.querySelector('.hamburger .open-menu-hamberguer').addEventListener('click', function() {
    document.querySelector('.hamberguer-menu-desktop').classList.toggle('active');
    jQuery('.modal-container').removeClass('show');
    jQuery('.modal-container-overflow').toggleClass('show');
    jQuery('.hamburger .close-hamberguer').toggleClass('show');
    jQuery('.hamburger .open-menu-hamberguer').toggleClass('hide');
   
    if(window.screen.width < 1024){ 
        jQuery('.main-menu').toggleClass('main-menu-mobile-dark');
        if(jQuery('.category-highlights-slider')){
        jQuery('.category-highlights-slider').toggleClass('hide');
        jQuery('.filter-general-container').toggleClass('hide');
    
        if(jQuery('.header-top-promotion').css('display')=='block'){
            jQuery('.hamberguer-menu-desktop').height(jQuery('.hamberguer-menu-desktop').height() - 120);
        }
        jQuery('body').addClass('remove-scroll');
    } 
    }
  });

  document.querySelector('.hamburger .close-hamberguer').addEventListener('click', function() {
    document.querySelector('.hamberguer-menu-desktop').classList.toggle('active');
    jQuery('.modal-container').removeClass('show');
    jQuery('.modal-container-overflow').removeClass('show');
    jQuery('.hamburger .close-hamberguer').toggleClass('show');
    jQuery('.hamburger .open-menu-hamberguer').toggleClass('hide');
   
    if(window.screen.width < 1024){
        jQuery('.main-menu').toggleClass('main-menu-mobile-dark');
        if(jQuery('.category-highlights-slider')){
        jQuery('.category-highlights-slider').toggleClass('hide');
        jQuery('.filter-general-container').toggleClass('hide');
        jQuery('.hamberguer-menu-desktop').height('100vh');
        jQuery('.hamberguer-menu-desktop').height( jQuery('.hamberguer-menu-desktop').height()-36);
        jQuery('body').removeClass('remove-scroll');
    } 
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
    if(jQuery('.tc_video_slide').html()){
        const video = document.createElement("div");
        video.classList.add('gallery-single-mobile-slide');
        video.innerHTML= jQuery('.tc_video_slide').html();
        jQuery('.gallery-single-mobile').append(video);
    }
    if(jQuery('.gallery-single-mobile')){
    jQuery('.gallery-single-mobile').flickity({
        freeScroll: false,
        contain:true,
        prevNextButtons: false,
        pageDots: true
    })
    }

    if(jQuery('.stock_alert_email')){
        jQuery('.stock_alert_email').val('');
    }
})

jQuery('.search-button-action').click(()=>{
    jQuery('.category-highlights-slider').toggleClass('hide');
    jQuery('.modal-container').toggleClass('show');
    jQuery('.modal-container-overflow').toggleClass('show');
    jQuery('.modal-container-overflow').height(jQuery(document).height());
    jQuery('body').addClass('remove-scroll');
})

jQuery(document.body ).on( 'added_to_cart', function(){
    jQuery('.cart-items-total').html(parseInt(jQuery('.cart-items-total').html())+1);
});

jQuery('.product-remove').on('click',()=>{
    jQuery('.cart-items-total').html(parseInt(jQuery('.cart-items-total').html())-1);
})
