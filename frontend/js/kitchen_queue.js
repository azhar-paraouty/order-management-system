// -------------------------------------------------------------------------------

// Integrate PHP (⚠️LATER IMPLEMENTATION) to Create 'Pending Order' Card from 'Order Dashboard' Page data.

// The code is NOT actaully moving the cards from one state to another.
// But is actually creating NEW card.
// This needs to be investigated.

// -------------------------------------------------------------------------------

createPendingOrderCard();

// CREATE PENDING ORDER CARD (will require PHP?)

function createPendingOrderCard() {
  const orderRows = document.querySelectorAll(".order_row");
  const pendingRow = orderRows[0];

  const orderCard = document.createElement("div");
  orderCard.className = "order_card";

  const orderNumber = document.createElement("h3");
  orderNumber.textContent = "TEST ORDER"; // WORK IN PROGRESS

  const orderCreated = document.createElement("p");
  orderCreated.textContent = `Created: ${new Date().toLocaleTimeString()}`; // Get Time from 'Order Dashboard' Page

  const orderItems = document.createElement("p");
  orderItems.textContent = "Test Items"; // WORK IN PROGRESS

  const cookButton = document.createElement("button");
  cookButton.className = "cook_btn";
  cookButton.textContent = "COOK";

  // Add Elements to the Order Card of 'Pending Orders' Section
  orderCard.prepend(cookButton);

  orderCard.prepend(orderItems);
  orderCard.prepend(orderCreated);
  orderCard.prepend(orderNumber);

  pendingRow.prepend(orderCard);

  console.log(pendingRow);
};

// -------------------------------------------------------------------------------

// STAFF CLICKS ON 'COOK'

const cookOrder = document.querySelectorAll(".cook_btn");

cookOrder.forEach((order) => {
  order.addEventListener("click", function () {

    const orderRows = document.querySelectorAll(".order_row");
    const cookingRow = orderRows[1];

    const orderCard = createCookCard();

    const orderNumber = document.createElement("h3");
    orderNumber.textContent = "TEST ORDER"; // WORK IN PROGRESS

    const orderStart = document.createElement("p");
    orderStart.textContent = `Started Cooking: ${new Date().toLocaleTimeString()}`;

    const orderItems = document.createElement("p");
    orderItems.textContent = "Test Items"; // WORK IN PROGRESS

    // Add Elements to the Order Card of 'Cooking' Section
    orderCard.prepend(orderItems);
    orderCard.prepend(orderStart);
    orderCard.prepend(orderNumber);

    cookingRow.prepend(orderCard);

    console.log("Moved to Cooking");
    console.log(cookingRow)

  });
});

// -------------------------------------------------------------------------------

// CREATE COOK CARD

function createCookCard() {

  const orderCard = document.createElement("div");
  orderCard.className = "order_card";

  // Create 'READY' Button for 'Cooking' Section
  const readyButton = document.createElement("button");
  readyButton.className = "ready_btn";
  readyButton.textContent = "READY";

  orderCard.appendChild(readyButton);

  readyButton.addEventListener("click", function () {

    const orderRows = document.querySelectorAll(".order_row");
    const readyRow = orderRows[2];

    const readyCard = createClearCard();

    const orderNumber = document.createElement("h3");
    orderNumber.textContent = "TEST ORDER"; // WORK IN PROGRESS

    const orderFinish = document.createElement("p");
    orderFinish.textContent = `Ready: ${new Date().toLocaleTimeString()}`;

    const orderItems = document.createElement("p");
    orderItems.textContent = "Test Items"; // WORK IN PROGRESS

    // Add Elements to the Order Card of 'Ready' Section
    readyCard.prepend(orderItems);
    readyCard.prepend(orderFinish);
    readyCard.prepend(orderNumber);

    readyRow.prepend(readyCard);

    console.log("Moved to Ready");
    console.log(readyRow)

  });

  return orderCard;
}

// -------------------------------------------------------------------------------

// CREATE CLEAR CARD

function createClearCard() {

  const readyCard = document.createElement("div");
  readyCard.className = "order_card";

  // Create 'CLEAR' Button for 'Ready' Section
  const clearButton = document.createElement("button");
  clearButton.className = "clear_btn";
  clearButton.textContent = "CLEAR";

  readyCard.appendChild(clearButton);

  clearButton.addEventListener("click", function () {

    readyCard.remove();

    console.log("Order Cleared");

  });

  return readyCard;
}

// -------------------------------------------------------------------------------