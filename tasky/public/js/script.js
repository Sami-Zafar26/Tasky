const navitems = document.querySelectorAll('.navitem');
const navlinks = document.querySelectorAll('.navlink');
const windowpathname= window.location.pathname;
// console.log(navlinks);

navlinks.forEach( navlink=> {
    // console.log(navlink.href);
//    console.log(window.location.href);
   if (navlink.href.includes(windowpathname)) {
    
    // console.log(navlink.parentNode.classList.add('active'));
    navlink.parentNode.classList.add('active');
    // navitems.classList.add('active');
   } 
});
