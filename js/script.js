// JS Implementations v1

/* 
NOTE: MOST OF THE IMPLEMENTATIONS ARE HARDCODED (for now)

Order Dashboard Page
- Select a Product from the 'Product Grid'.
- This Item should appear in the 'Currently Selecting' Panel.

- The Staff can now edit the product.
- The Quantity may be adjusted (-/+).
- 'Size' and 'Add On' should be in Radio Button format.

- When the Staff clicks on 'Add to Order',
  - Quantity, Size & Add-On are supplied as JSON/Array,
  - to the list of Items Summary Panel.

- In the Summary Panel, the Order can either be:
  - (i)  Cancelled, by Clicking on 'REMOVE' Button, OR 
  - (ii) Edited (again), by Clicking on the Item itself.

  - The Total Order Cost is also displayed in the Summary.
  - After Customer finalises their Order, Desk Staff can click on 'Confirm Order' button
    - This is when the Order is actually created (with TimeStamps etc).
  
---

Kitchen Queue Page
- Clicking on a Button (from each of the different states),
- Allows the Order to move to the Next Stage.
- Example: Press 'COOK' Button -> Move Order to 'Cooking' Section.
  - Note: Keep Track of the Order Timing through the Stages

---

Order Status Page
- Simulate Ordering with different Stages/Order Status

- Click on 'DELIVER' to Update Order Status to 'Delivered'
- Click on 'CANCEL' to Remove Order from Memory/Array
  - Use an 'Alert Window' to Confirm Staff actions.


-> Integrate with PHP/SQL for persistent data usage

*/