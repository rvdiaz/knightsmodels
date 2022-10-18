const add_to_cart_wc=(event)=>{
    const id_product=event.target.getAttribute("id_product");
    jQuery.ajax({
        type : "post",
        url : ajax.url,
        data : { action: 'add_to_cart_wc', 
        id_product:id_product
        } ,
        success: function(response){								  
          jQuery('#message-notification').html(response);
          jQuery('.message-notification-container').addClass('open-notification');
          closeNotification();
        }								        
      });
}

const closeNotification=()=>{
    setTimeout(() => {
        jQuery('.message-notification-container').removeClass('open-notification');
    }, 3000);
}