// To Refactor the code - using functions etc (⚠️LATER IMPLEMENTATION)

// -------------------------------------------------------------------------------

let pID = "";

// SELECT AN ITEM FROM THE 'PRODUCT GRID'
const products = document.querySelectorAll(".product_grid .product_cards");

// Item appears in the 'CURRENTLY SELECTING' Panel
products.forEach((product) => {
  product.addEventListener("click", function() {
    // Accessing the ID of the Product to SELECT
    pID = this.dataset.productId;

    const name = this.querySelector(".product_name").textContent;
    document.getElementById("selected_name").textContent = name;

    const img = this.querySelector(".product_img").innerHTML;
    document.getElementById("selected_img").innerHTML = img;

    const price = this.querySelector(".product_price").textContent;
    document.getElementById("selected_price").textContent = price;
  });
});

// -------------------------------------------------------------------------------

// ADJUST ITEM QUANTITY
const qtyDisplay = document.getElementById("item_qty");
let itemQty = Number(qtyDisplay.textContent);

// Decrement Item Count
document.getElementById("decrease_btn").addEventListener("click", function () {
  if (itemQty > 0) {
    itemQty--;
  }
  else {
    alert("Quantity cannot be negative");
  }

  qtyDisplay.textContent = itemQty;
});

//Increment Item Count
document.getElementById("increase_btn").addEventListener("click", function () {
  itemQty++;
  qtyDisplay.textContent = itemQty;
});

// -------------------------------------------------------------------------------

// STAFF CLICKS ON 'ADD TO ORDER'

// Get Item Size & Add-Ons
const itemSizes = document.querySelectorAll(".item_size");
const addOns = document.querySelectorAll(".add_on");

// Array of Item Objects
const orderItems = [];

// Create 'Current Item' Object
document.getElementById("add_order").addEventListener("click", () => {
  // To merge duplicate orders (⚠️LATER IMPLEMENTATION)

  let selectedSize = "";
  itemSizes.forEach((itemSize) => {
    if (itemSize.checked) {
      selectedSize = itemSize.value;
    }
  });

  let selectedAddOns = [];
  addOns.forEach((addOn) => {
    if(addOn.checked) {
      selectedAddOns.push(addOn.value);
    }
  });

  // Store Item data in an Array (JSON)
  const currentItem = {
    // Item image may need to be added (⚠️LATER IMPLEMENTATION)
    productID: pID,
    name: document.getElementById("selected_name").textContent,
    price: document.getElementById("selected_price").textContent,
    quantity: document.getElementById("item_qty").textContent,
    size: selectedSize,
    addOns: selectedAddOns,
    removed: false
  };

  // Validations for 'Add to Order' //
  if (currentItem.name == "") {
    alert("You have NOT selected an Item to Add");
    return;
  }

  if (Number(currentItem.quantity) <= 0) {
    alert("Please choose a Valid Amount");
    return;
  }
  
  if (currentItem.size == "") {
    alert("You should choose a Size");
    return;
  } 

  if (currentItem.addOns == "") {
    currentItem.addOns = "None";
  }

  // SUMMARY PANEL CRUD OPERATIONS

  // Supply Current Selected Items to 'Summary Panel' (CREATE)
  const summaryPanel = document.getElementById("summary");

  const orderItem = document.createElement("div");
  orderItem.className = "summary_items";

  const summaryName = document.createElement("h3");
  summaryName.textContent  = currentItem.name;

  const summaryItemData = document.createElement("p")
  summaryItemData.textContent = `Quantity: ${currentItem.quantity} | Size: ${currentItem.size} | Extras: ${currentItem.addOns}`;

  const summaryPrice = document.createElement("h4");
  summaryPrice.textContent  = currentItem.price;

  const summaryRemove = document.createElement("button");
  summaryRemove.textContent = "REMOVE";
  summaryRemove.className = "remove_btn";

  const summaryTotalCost = document.getElementById("total_cost");

  orderItem.appendChild(summaryName);
  orderItem.appendChild(summaryItemData);
  orderItem.appendChild(summaryPrice);
  orderItem.appendChild(summaryRemove);

  summaryPanel.appendChild(orderItem);
  summaryPanel.appendChild(summaryTotalCost);
  console.log(summaryPanel)

  // Access/Edit Items that were added to Summary Panel (READ/UPDATE)
  orderItem.addEventListener("click", function () {
    const summaryItemSplit = summaryItemData.textContent.split("|");

    const summaryQuantity = summaryItemSplit[0].slice(10, summaryItemSplit.indexOf(" "));
    const summarySize = summaryItemSplit[1].slice(7, summaryItemSplit.indexOf(" "));
    const summaryExtras = summaryItemSplit[2].slice(9).split(",");

    // To fetch image file path (⚠️LATER IMPLEMENTATION)
    document.getElementById("selected_name").textContent = summaryName.textContent;
    document.getElementById("selected_price").textContent = summaryPrice.textContent;
    document.getElementById("item_qty").textContent = Number(summaryQuantity);

    document.querySelectorAll(".item_size").forEach((size) => {
      if (size.value === summarySize) {
        size.checked = true;
      }
      else {
        size.checked = false;
      }
    });

    document.querySelectorAll(".add_on").forEach((addOns) => {
      summaryExtras.forEach((extraAddOn) => {
        if (addOns.value === extraAddOn) {
          addOns.checked = true;
        }
        else {
          addOns.checked = false;
        }
      });
    });

    // Replace Order (in the Summary Panel), after editing the Items 
    document.getElementById("add_order").addEventListener("click", () => {
      // TODO: Refactor edit-order workflow to avoid nested event listeners
      currentItem.removed = true;
      orderItem.remove();
      calculateTotal();
    });

  });

  // Populating the Array of Item Objects
  orderItems.push(currentItem);
  calculateTotal();

  function calculateTotal() {
    let totalCost = 0;

    orderItems.forEach(item => {
      if (item.removed == false) {
        totalCost += Number(item.price.slice(3)) * Number(item.quantity);
      }
    });

    document.getElementById("total_cost").textContent = (`Total: Rs ${totalCost}`);
  }

  summaryRemove.addEventListener("click", function() {
    // REMOVE Item from Summary Panel (DELETE)
    currentItem.removed = true;
    orderItem.remove();
    calculateTotal();
  });

});

// -------------------------------------------------------------------------------

// STAFF CLICKS ON 'CONFIRM ORDER'

document.getElementById("confirm_order").addEventListener("click", () => {
  // DO NOT consider Items that have been REMOVED 
  const activeItems = [];

  orderItems.forEach((order) => {
    if (order.removed === false) {
      activeItems.push(order);
    }
  });

  const confirmedOrder = {
    items: activeItems
  };
  console.log(confirmedOrder);

  const orderJSON = JSON.stringify(confirmedOrder);
  console.log(orderJSON);

  // Use AJAX or any industry-standard practice to send/fetch order data (⚠️LATER IMPLEMENTATION)
  window.location.href = "../php/confirm_order.php?order=" + encodeURIComponent(orderJSON);

  /*
  ORDER ITEMS STRUCTURE

  {
    "items":
    [
      {"name":"Chicken Burger",
      "price":"Rs 225.00",
      "quantity":"1",
      "size":"Medium",
      "addOns":"None",
      "removed":false}
    ]
  }

  */
});

// -------------------------------------------------------------------------------