<?php
/**
 * Created by PhpStorm.
 * User: Hitesh
 * Date: 25-Dec-17
 * Time: 7:55 PM
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <title>Invoice</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div id="wrap"><div>
        <h1>Checkout</h1>
        <form method="post" action="create_reciept.php">
            <fieldset>
                <legend>User Details</legend>
                <div class="col">
                    <p>
                        <label for="name">Name</label>
                        <input type="text" name="name" value="" />
                    </p>
                    <p>
                        <label for="email">Email Address</label>
                        <input type="text" name="email" value="" />
                    </p>
                </div>
                <div class="col">
                    <p>
                        <label for="address">Phone Number</label>
                        <input type="text" name="address" value="" />
                    </p>
                    <p>
                        <label for="city">City</label>
                        <input type="text" name="city" value="" />
                    </p>
                    <p>
                        <label for="province">Province</label>
                        <input type="text" name="province" value="" />
                    </p>
                    <p>
                        <label for="postal_code">Postal Code</label>
                        <input type="text" name="postal_code" value="" />
                    </p>
                    <p>
                        <label for="country">Country</label><input type="text" name="country" value="Kenya" />
                    </p>
                </div>
            </fieldset>
            <fieldset>
                <legend>Your Cart</legend>
                <table>
                    <thead>
                    <tr><td>Product</td><td>Price</td></tr>
                    <thead>
                    <tbody>
                    <tr>
                        <td><input type='text' placeholder='Product 1' name='product[]' /></td>
                        <td>KES<input type='text' placeholder='amount' name='price[]' /></td>
                    </tr>
                    <tr>
                        <td><input type='text' placeholder='Product 2' name='product[]' /></td>
                        <td>KES<input type='text' placeholder='amount'' name='price[]' /></td>
                    </tr>
                    <tr>
                        <td><input type='text' placeholder='Product 3' name='product[]' /></td>
                        <td>KES<input type='text' placeholder='amount'' name='price[]' /></td>
                    </tr>
                    <tr>
                        <td><input type='text' placeholder='Product 4' name='product[]' /></td>
                        <td>KES<input type='text' placeholder='amount'' name='price[]' /></td>
                    </tr>
                    </tbody>
                </table>
            </fieldset>
            <button type="submit">Submit Order</button>
        </form>
    </div></div>
</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script>

</html>