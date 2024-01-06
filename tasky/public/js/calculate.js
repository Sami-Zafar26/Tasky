const amount = document.getElementById('amount');
const quantity = document.getElementById('quantity');
const calculate = document.getElementById('calculate');
const expense = document.getElementById('expense');


calculate.addEventListener('click',function (e) {
    amountValue=amount.value;
    quantityValue=quantity.value;

    calbtn=e.target.id
    total=amountValue*quantityValue;
    if (total>=100.00) {
        expense.innerHTML="Total Expense: "+total+" <b>$</b>";
    }else{
        expense.innerHTML="Total Expense: "+total+" <b>&#162;</b>";
    }

    expensehidden.value=total;

});