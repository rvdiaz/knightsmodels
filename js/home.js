const closeNotification=()=>{
    setTimeout(() => {
        jQuery('.message-notification-container').removeClass('open-notification');
    }, 3000);
}