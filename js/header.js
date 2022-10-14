jQuery('.close-promotion').click(()=>{
    jQuery('.header-top-promotion ').css('display','none');
})

document.querySelector('.hamburger').addEventListener('click', function() {
    document.querySelector('.hamberguer-menu-desktop').classList.toggle('active');
  });

jQuery(document).ready(function(){
    if(jQuery('.home-category-logo-container')){
    jQuery('.home-category-logo-container')[0].style.height='auto';
    jQuery('.home-category-logo-container')[0].style.top='55%';
    }
})


