const filter=(event)=>{
  const category=jQuery('#category-slug').val();
  const gol=event.target.getAttribute('filter');
  const page=event.target.getAttribute('page');

  if(!page){
    jQuery('.secondary-filter-button').removeClass('active-secondary ');
    event.target.classList.add('active-secondary');
  }
  
  jQuery.ajax({
      type : "post",
      url : ajax.url,
      data : { action: 'filter', dataSend : {
        category:category,
        gol:gol,
        page:page
      },
          },
          beforeSend: function() {
            if(!page){
              jQuery('.entry-content').html(jQuery('.loading-container').html());
            }else {
              jQuery('.filter-pagination-container .filter-pagination').append(jQuery('.loading-container').html());
            }
        },
          success: function(response){		
            jQuery(document).trigger('yith_wcwl_init');  
            jQuery('.entry-content').html(response);     
            updateShare();    
            updateWayDisplay();
            if(page)
            if(window.screen.width < 600){
            jQuery('html, body').animate({
              scrollTop: jQuery(".subcategories-title-wrapper").offset().top
            },1000);
            }else
            jQuery('html, body').animate({
              scrollTop: jQuery(".filter-wrapper").offset().top
          },1000);
      }								        
    });
  }

if(jQuery('#ordenar-filter'))
  jQuery('#ordenar-filter').css('display','flex');

const ordenar_filter=(event)=>{
  jQuery('.secondary-filter').css('display','none');
  jQuery('.main-filter').removeClass('active');
  event.target.classList.add('active');
  jQuery('#ordenar-filter').css('display','flex');
}
const rango_filter=(event)=>{
  jQuery('.secondary-filter').css('display','none');
  jQuery('#rango-filter').css('display','flex');
  jQuery('.main-filter').removeClass('active');
  event.target.classList.add('active');
}
const origen_filter=(event)=>{
  jQuery('.secondary-filter').css('display','none');
  jQuery('#origen-filter').css('display','flex');
  jQuery('.main-filter').removeClass('active');
  event.target.classList.add('active');
}

jQuery(document).ready(function(){
  updateShare();
 });

const updateShare=()=>{
  if(jQuery('.share-product-button')){
    for(let i=0;i<jQuery('.share-product-button').length;i++){
      jQuery('.share-product-button img')[i].setAttribute('refpopup',i);
      jQuery('.share-links')[i].classList.add(i);
    }
  }
}

const updateWayDisplay=()=>{
  const columns=jQuery('#filter-views').val();
  switch (columns) {
    case '0':{
      jQuery('.entry-content .woocommerce .products').toggleClass('products-one-columns');
      jQuery('.entry-content .woocommerce .products').removeClass('products-list-columns');
      break;
    }
    case '2':
      jQuery('.entry-content .woocommerce .products').toggleClass('products-list-columns');
      break;
    default:
      jQuery('.entry-content .woocommerce .products').removeClass('products-one-columns');
      jQuery('.entry-content .woocommerce .products').removeClass('products-list-columns');
      break;
  }
}

const showSharePopup=(event)=>{
  const classRef=event.target.getAttribute('refpopup');
  jQuery(`.${classRef}`).toggleClass("active-share");
}

if(document.getElementById('filter-views')){
  document.getElementById('filter-views').addEventListener('input',(event)=>{
    const columns=event.target.value;
    switch (columns) {
      case '0':{
        jQuery('.entry-content .woocommerce .products').toggleClass('products-one-columns');
        jQuery('.entry-content .woocommerce .products').removeClass('products-list-columns');
        break;
      }
      case '2':
        jQuery('.entry-content .woocommerce .products').toggleClass('products-list-columns');
        break;
      default:
        jQuery('.entry-content .woocommerce .products').removeClass('products-one-columns');
        jQuery('.entry-content .woocommerce .products').removeClass('products-list-columns');
        break;
    }
  })
  }

if(jQuery('.category-highlights-slider')){
  jQuery('.category-highlights-slider .products').flickity({
      contain:true,
      prevNextButtons: false,
      pageDots: true
  })
}


if(jQuery('.single-product .related .products')){
  jQuery('.single-product .related .products').flickity({
      contain:true,
      prevNextButtons: false,
      pageDots: false
  })
}

const filterAttribute=(event)=>{
  const terms=event.target.getAttribute('slug');
  const category=jQuery('#category-slug').val();
  const page=event.target.getAttribute('page');

  if(!page){
    jQuery('.secondary-filter-button').removeClass('active-secondary ');
    event.target.classList.add('active-secondary');
  }
  
  jQuery.ajax({
      type : "post",
      url : ajax.url,
      data : { action: 'filterAttribute', dataSend : {
        terms:terms,
        category:category,
        page:page
      },
          },
          beforeSend: function() {
            if(!page)
            jQuery('.entry-content').html(jQuery('.loading-container').html());
        },
          success: function(response){		
            jQuery(document).trigger('yith_wcwl_init');  
            jQuery('.entry-content').html(response);
            updateShare();
            updateWayDisplay();
            if(page)
            if(window.screen.width < 600){
              jQuery('html, body').animate({
                scrollTop: jQuery(".subcategories-title-wrapper").offset().top
              },1000);
              }else
              jQuery('html, body').animate({
                scrollTop: jQuery(".filter-wrapper").offset().top
            },1000);
      }								        
    });
}

const filterRange=(event)=>{
    const min=event.target.getAttribute('min');
    const max=event.target.getAttribute('max');
    const page=event.target.getAttribute('page');

    if(!page){
      jQuery('.secondary-filter-button').removeClass('active-secondary ');
      event.target.classList.add('active-secondary');
    }

    const category=jQuery('#category-slug').val();
    jQuery.ajax({
      type : "post",
      url : ajax.url,
      data : { action: 'filterRange', dataSend : {
        min:min,
        max:max,
        page:page,
        category:category
      },
          },
          beforeSend: function() {
            if(!page)
            jQuery('.entry-content').html(jQuery('.loading-container').html());
        },
          success: function(response){		
            jQuery(document).trigger('yith_wcwl_reload_fragments');
            jQuery('.entry-content').html(response);
            updateShare();  
            updateWayDisplay();
            if(page)
            if(window.screen.width < 600){
              jQuery('html, body').animate({
                scrollTop: jQuery(".subcategories-title-wrapper").offset().top
              },1000);
              }else
              jQuery('html, body').animate({
                scrollTop: jQuery(".filter-wrapper").offset().top
            },1000);
      }								        
    });
}

if(document.getElementsByClassName("blog-question")){
  if(window.screen.width < 1136){
  var acc = document.getElementsByClassName("blog-question");
  var i;
  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
      var panel = this.nextElementSibling;
      if (panel.style.display === "block") {
        panel.style.display = "none";
      } else {
        panel.style.display = "block";
      }
    });
  }
}}

const first_filters_all=(event)=>{
  jQuery('.first-level-category--filter-button').removeClass('first-select');
  event.target.classList.toggle('first-select');
  const category=jQuery('#first-category-slug').val();
  jQuery.ajax({
    type : "post",
    url : ajax.url,
    data : { action: 'firstFilterAll', dataSend : {
        category:category
     },
    },
      beforeSend: function() {
        jQuery('.first-level-category-products-container').html(jQuery('.loading-container').html());
      },
      success: function(response){		
        jQuery('.first-level-category-products-container').html(response);
        jQuery(document).trigger('yith_wcwl_reload_fragments');
        jQuery('.first-level-category-products-container .woocommerceq .productsq').flickity({
          contain:true,
          prevNextButtons: false,
          pageDots: false,
          selectedAttraction: 0.01,
          friction: 0.5,
          autoplay: 2000
      })
      }								        
    });
}

const first_filters_recent=(event)=>{
  jQuery('.first-level-category--filter-button').removeClass('first-select');
  event.target.classList.toggle('first-select');
  const category=jQuery('#first-category-slug').val();
  jQuery.ajax({
    type : "post",
    url : ajax.url,
    data : { action: 'firstFilterRecent', dataSend : {
        category:category
     },
    },
      beforeSend: function() {
        jQuery('.first-level-category-products-container').html(jQuery('.loading-container').html());
      },
      success: function(response){		
        jQuery('.first-level-category-products-container').html(response);
        jQuery(document).trigger('yith_wcwl_reload_fragments');
        jQuery('.first-level-category-products-container .woocommerceq .productsq').flickity({
          contain:true,
          prevNextButtons: false,
          pageDots: false,
          selectedAttraction: 0.01,
          friction: 0.5,
          autoplay: 2000
      })
      }								        
    });
}

const first_filters_sales=(event)=>{
  jQuery('.first-level-category--filter-button').removeClass('first-select');
  event.target.classList.toggle('first-select');
  const category=jQuery('#first-category-slug').val();
  jQuery.ajax({
    type : "post",
    url : ajax.url,
    data : { action: 'firstFilterSales', dataSend : {
        category:category
     },
    },
      beforeSend: function() {
        jQuery('.first-level-category-products-container').html(jQuery('.loading-container').html());
      },
      success: function(response){		
        jQuery('.first-level-category-products-container').html(response);
        jQuery(document).trigger('yith_wcwl_reload_fragments');
        jQuery('.first-level-category-products-container .woocommerceq .productsq').flickity({
          contain:true,
          prevNextButtons: false,
          pageDots: false,
          selectedAttraction: 0.01,
          friction: 0.5,
          autoplay: 2000
      })
      }								        
    });
}

jQuery('#submit-search').on('click',()=>{
  const name=jQuery('#search-input').val();
  if(name){
    jQuery.ajax({
    type : "post",
    url : ajax.url,
    data : { action: 'searchproduct', dataSend : {
        name:name
     },
    },
      beforeSend: function() {
        jQuery('.product-search-results-container').html(jQuery('.loading-container').html());
      },
      success: function(response){		
        jQuery('.product-search-results-container').html(response);
        jQuery(document).trigger('yith_wcwl_reload_fragments');
      }								        
    });
  }
});