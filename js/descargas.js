const openAccord=(event)=>{
    const id=event.target.getAttribute('idaccordion');
    jQuery(`#${id}`).toggleClass('show');
}

const openAccordFile=(event)=>{
  event.preventDefault();
  const id=event.target.getAttribute('idfiles');
  jQuery(`#${id}`).toggleClass('show');
}


