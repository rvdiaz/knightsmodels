const filter=(event)=>{
  const category=jQuery('#category-slug').val();
  jQuery('.secondary-filter-button').removeClass('active-secondary ');
  event.target.classList.add('active-secondary');
  const gol=event.target.getAttribute('filter');
  jQuery.ajax({
      type : "post",
      url : ajax.url,
      data : { action: 'filter', dataSend : {
        category:category,
        gol:gol
      },
          },
          beforeSend: function() {
            jQuery('.entry-content').html(jQuery('.loading-container').html());
        },
          success: function(response){		
            jQuery(document).trigger('yith_wcwl_init');  
            jQuery('.entry-content').html(response);     
            updateShare();    
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

const showSharePopup=(event)=>{
  const classRef=event.target.getAttribute('refpopup');
  jQuery(`.${classRef}`).toggleClass("active-share");
}

if(document.getElementById('filter-views')){
  document.getElementById('filter-views').addEventListener('input',(event)=>{
    console.log("sdsd");
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

const filterAttribute=(event)=>{
  const terms=event.target.innerText;
  const category=jQuery('#category-slug').val();
  jQuery.ajax({
      type : "post",
      url : ajax.url,
      data : { action: 'filterAttribute', dataSend : {
        terms:terms,
        category:category
      },
          },
          beforeSend: function() {
            jQuery('.entry-content').html(jQuery('.loading-container').html());
        },
          success: function(response){		
            jQuery(document).trigger('yith_wcwl_init');  
            jQuery('.entry-content').html(response);
            updateShare();
      }								        
    });
}

const filterRange=(event)=>{
    const min=event.target.getAttribute('min');
    const max=event.target.getAttribute('max');
    const category=jQuery('#category-slug').val();
    jQuery.ajax({
      type : "post",
      url : ajax.url,
      data : { action: 'filterRange', dataSend : {
        min:min,
        max:max,
        category:category
      },
          },
          beforeSend: function() {
            jQuery('.entry-content').html(jQuery('.loading-container').html());
        },
          success: function(response){		
            jQuery(document).trigger('yith_wcwl_reload_fragments');
            jQuery('.entry-content').html(response);
            updateShare();  
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
          pageDots: false
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
          pageDots: false
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
          pageDots: false
      })
      }								        
    });
}
