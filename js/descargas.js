const openAccord=(event)=>{
    const id=event.target.getAttribute('idaccordion');
    event.target.classList.toggle('rotate');
    jQuery(`#${id}`).toggleClass('show');
}

const openAccordFile=(event)=>{
  event.preventDefault();
  const id=event.target.getAttribute('idfiles');
  jQuery(`#${id}`).toggleClass('show');
}

const openAccordFileIcon=(event)=>{
  const id=event.target.parentNode.getAttribute('idfiles');
  jQuery(`#${id}`).toggleClass('show');
}

const openAccordFileImage=(event)=>{
  const id=event.target.parentNode.getAttribute('idfiles');
  jQuery(`#${id}`).toggleClass('show');
}