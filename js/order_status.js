// -------------------------------------------------------------------------------

// STAFF CLICKS ON 'DELIVER', SET STATUS TO 'DELIVERED'

const deliverOrder = document.querySelectorAll(".deliver_btn");

deliverOrder.forEach((deliverButton) => {
  deliverButton.addEventListener("click", function () {

    // Fetch the Order ID associated with it
    const orderRow = this.closest(".order_row");
    const order = orderRow.querySelector("h3").textContent;
    console.log(order);

    const orderJSON = JSON.stringify(order);
    console.log(orderJSON)

    // Use AJAX or any industry-standard practice to send/fetch order data (⚠️LATER IMPLEMENTATION)
    window.location.href = "../php/deliver_order.php?order=" + encodeURIComponent(orderJSON);

    console.log("Updating Status to 'Delivered'");

  });
});

// -------------------------------------------------------------------------------

// STAFF CLICKS ON 'CANCEL', SET STATUS TO 'CANCELLED'

const cancelOrder = document.querySelectorAll(".cancel_btn");

cancelOrder.forEach((cancelButton) => {
  cancelButton.addEventListener("click", function () {

    // Fetch the Order ID associated with it
    const orderRow = this.closest(".order_row");
    const order = orderRow.querySelector("h3").textContent;
    console.log(order);

    const orderJSON = JSON.stringify(order);
    console.log(orderJSON)

    // Use AJAX or any industry-standard practice to send/fetch order data (⚠️LATER IMPLEMENTATION)
    window.location.href = "../php/cancel_order.php?order=" + encodeURIComponent(orderJSON);

    console.log("Updating Status to 'Cancelled'");

  });
});

// -------------------------------------------------------------------------------