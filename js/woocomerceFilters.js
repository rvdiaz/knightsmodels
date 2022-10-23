const filter_price=()=>{
jQuery.ajax({
    type : "post",
    url : ajax.url,
    data : { action: 'filter_by_price', dataSend : {
    send:1,
        } },
        success: function(response){								  
        jQuery('.products').html(response);
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