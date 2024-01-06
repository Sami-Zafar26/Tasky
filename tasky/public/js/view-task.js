
if (window.location.pathname.includes('/payment-method')) {

    const cardEdit = document.getElementsByClassName('cardEdit');
    Array.from(cardEdit).forEach(function (element) {
      element.addEventListener("click", function (e) {
        cover = e.target.parentNode.parentNode.parentNode;
        bankname = cover.querySelector('#bankname').innerText;
        accountname = cover.querySelector("#accountname").innerText;
        accountnumber = cover.querySelector("#accountnumber").innerText;
        editednumber = accountnumber.split('-');
        reEditednumber = editednumber.toString();
        now = reEditednumber.replace(/,/g,'');
    
        bank_name.value = bankname;
        account_name.value = accountname;
        account_number.value = now;
        id.value = e.target.id;
    
        $('#card-edit').modal('toggle');
      });
    });
}else{
    const viewTask = document.getElementById('done-btn');
viewTask.addEventListener('click',function () {
    $('#taskdone').modal('toggle'); 
});
}