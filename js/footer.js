const updateCountry=(event)=>{
    jQuery('#country-active-value').html(event.target.innerHTML);
    jQuery('.dropdown-content').toggleClass('open');
}

const toggledropdown =()=>{
    jQuery('.dropdown-content').toggleClass('open');
}