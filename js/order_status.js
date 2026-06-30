// -------------------------------------------------------------------------------

// Integrate PHP (⚠️LATER IMPLEMENTATION) SET STATUS TO 'PENDING', 'COOKING' OR 'READY' of 'Kitchen Queue' page

// The 'States' are not being physically being altered in memory,
// But, rather on Screen ONLY!
// Need to store the status in an array.

// -------------------------------------------------------------------------------

// CREATE ORDER CARD WHEN ORDER IS CREATED BY DESK STAFF

// Supplied with parameters (from other pages using PHP)
createOrder();

function createOrder() {
  // Main Selector
  const orders = document.querySelector(".orders");
  console.log(orders);

  // Creating Card Container
  const orderRow = document.createElement("div");
  orderRow.className = "order_row";

  const orderCard = document.createElement("div");
  orderCard.className = "order_card";

  const orderNumber = document.createElement("h3");
  orderNumber.textContent = "TEST ORDER"; // WORK IN PROGRESS

  const customerName = document.createElement("p");
  customerName.textContent = "Customer: Test"; // WORK IN PROGRESS

  const orderItems = document.createElement("p");
  orderItems.textContent = "Test Items"; // WORK IN PROGRESS
  
  const orderStatus = document.createElement("p");
  orderStatus.className = "order_status";
  orderStatus.textContent = "Status: Pending"; // WORK IN PROGRESS

  const orderOptions = document.createElement("div");
  orderOptions.className = "order_options";

  const deliverButton = document.createElement("button");
  deliverButton.className = "deliver_btn";
  deliverButton.textContent = "DELIVER";

  const cancelButton = document.createElement("button");
  cancelButton.className = "cancel_btn";
  cancelButton.textContent = "CANCEL";

  const horizontalLine = document.createElement("hr");
  horizontalLine.className = "horizontal_lines";

  // Appending Elements to the container and sub-containers
  orders.appendChild(orderRow);
    orderRow.appendChild(orderCard);
      orderCard.appendChild(orderNumber);
      orderCard.appendChild(customerName);
      orderCard.appendChild(orderItems);
      orderCard.appendChild(orderStatus);

    orderRow.appendChild(orderOptions);
      orderOptions.appendChild(deliverButton);
      orderOptions.appendChild(cancelButton);

  orders.appendChild(horizontalLine);
  
};


// -------------------------------------------------------------------------------

// STAFF CLICKS ON 'DELIVER', SET STATUS TO 'DELIVERED'

const deliverOrder = document.querySelectorAll(".deliver_btn");

deliverOrder.forEach((deliverButton) => {
  deliverButton.addEventListener("click", function () {
    const orderRow = this.closest(".order_row");

    const orderStatus = orderRow.querySelector(".order_status");
    orderStatus.textContent = "Status: Delivered";

  });
});

// -------------------------------------------------------------------------------

// STAFF CLICKS ON 'CANCEL', SET STATUS TO 'CANCELLED'

const cancelOrder = document.querySelectorAll(".cancel_btn");

cancelOrder.forEach((cancelButton) => {
  cancelButton.addEventListener("click", function () {
    const orderRow = this.closest(".order_row");

    const orderStatus = orderRow.querySelector(".order_status");
    orderStatus.textContent = "Status: Cancelled";

  });
});

// -------------------------------------------------------------------------------