// -------------------------------------------------------------------------------

// KITCHEN STAFF CLICKS ON 'COOK' Button

const cookOrder = document.querySelectorAll(".cook_btn");

// Update the Status of the Order to 'Cooking', when 'COOK' Button is clicked
cookOrder.forEach((order) => {
  order.addEventListener("click", function () {   

    // Fetch the Order ID associated with it
    const rows = this.closest(".order_card");
    const order = rows.querySelector("h3").textContent;
    console.log(order);

    const orderJSON = JSON.stringify(order);
    console.log(orderJSON)

    // Use AJAX or any industry-standard practice to send/fetch order data (⚠️LATER IMPLEMENTATION)
    window.location.href = "../php/cook_order.php?order=" + encodeURIComponent(orderJSON);

    console.log("Moved to Cooking");

  });
});

// -------------------------------------------------------------------------------

// KITCHEN STAFF CLICKS ON 'READY' Button

const readyOrder = document.querySelectorAll(".ready_btn");

// Update the Status of the Order to 'Ready', when 'READY' Button is clicked
readyOrder.forEach((order) => {
  order.addEventListener("click", function () {   

    // Fetch the Order ID associated with it
    const rows = this.closest(".order_card");
    const order = rows.querySelector("h3").textContent;
    console.log(order);

    const orderJSON = JSON.stringify(order);
    console.log(orderJSON)

    // Use AJAX or any industry-standard practice to send/fetch order data (⚠️LATER IMPLEMENTATION)
    window.location.href = "../php/ready_order.php?order=" + encodeURIComponent(orderJSON);

    console.log("Moved to Ready");

  });
});

// -------------------------------------------------------------------------------

// KITCHEN STAFF CLICKS ON 'CLEAR' Button

const clearOrder = document.querySelectorAll(".clear_btn");

// Check if the Status of the Order is set to 'Delivered'/'Canclled', when 'CLEAR' Button is clicked
clearOrder.forEach((order) => {
  order.addEventListener("click", function () {   

    // Fetch the Order ID associated with it
    const rows = this.closest(".order_card");
    const order = rows.querySelector("h3").textContent;
    console.log(order);

    const orderJSON = JSON.stringify(order);
    console.log(orderJSON)

    // Use AJAX or any industry-standard practice to send/fetch order data (⚠️LATER IMPLEMENTATION)
    window.location.href = "../php/clear_order.php?order=" + encodeURIComponent(orderJSON);

    console.log("Clearing the Order from Screen");

  });
});

// -------------------------------------------------------------------------------