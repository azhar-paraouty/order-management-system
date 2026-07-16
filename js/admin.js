// UPDATE Button 
const update_button = document.querySelectorAll(".update_product_details");

update_button.forEach((update) => {
  update.addEventListener("click", function() {
    // Accessing the ID of the Product to UPDATE
    const rows = this.closest("tr");
    const cells = rows.querySelectorAll("td");

    const productID = cells[0].textContent;

    window.location.href = "../pages/admin.php?update_product_id=" + productID;

  });
});

// -------------------------------------------------------------------------------

// REMOVE Button 
const remove_button = document.querySelectorAll(".remove_product");

remove_button.forEach((remove) => {
  remove.addEventListener("click", function () {
    // Accessing the ID of the Product to DELETE
    const rows = this.closest("tr");
    const cells = rows.querySelectorAll("td");

    const productID = cells[0].textContent;

    window.location.href = "../pages/admin.php?delete_product_id=" + productID;

  });
});

// -------------------------------------------------------------------------------