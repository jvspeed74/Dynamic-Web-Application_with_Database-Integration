<?php
include("completed/header.design.php");
?>
    <!-- Page Specific Content Starts -->
  <section>
      <div class="container">
        <h2>Shopping Cart</h2>
        <div>
            <table>
                <tr>
                    <td>Title</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Subtotal</td>
                </tr>
                    <tr>
                        <td><a href="">Game Title</a></td>
                        <td>$29.99</td>
                        <td>3</td>
                        <td>$109.23</td>
                        <input type="button" class="checkout-button" value="Checkout"/>
                    </tr>
                <div>
                    <h2 class="total">Your Total is ____</h2>
                </div>
            </table>
        </div>
    </section>


    <!-- Page Specific Content Ends -->
<?php
include("completed/footer.design.php");
?>