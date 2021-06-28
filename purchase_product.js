function amountCalculator(){
  let quantity = document.querySelectorAll(".quantity");
  let cost = document.querySelectorAll(".cost");
  let amount = document.querySelectorAll(".amount");
  let total_amount = document.getElementById("total_amount");
  total_amount.value = "";

  let float_amount = 0;
  for (i = 0; i < quantity.length; i++) {
    if(quantity[i].value == ""){
      quantity[i].value = "1";
    }    
    amount[i].value = quantity[i].value * cost[i].innerHTML;
  }

  for (i = 0; i < amount.length; i++){
    float_amount += parseFloat(amount[i].value);
  }

  total_amount.value = float_amount.toString();
}

