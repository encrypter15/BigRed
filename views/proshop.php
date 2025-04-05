<!DOCTYPE html>
<html><head><title>BigRed - Pro Shop</title><link rel="stylesheet" href="css/style.css">
<script src="https://js.stripe.com/v3/"></script></head>
<body><h1>Pro Shop</h1>
<form method="POST" action="index.php?action=payment" id="payment-form">
    <input type="text" name="item" placeholder="Item Name" required>
    <input type="number" name="quantity" placeholder="Quantity" required>
    <input type="number" name="amount" placeholder="Amount" required>
    <div id="card-element"></div>
    <button type="submit">Pay</button>
</form>
<script>
var stripe = Stripe("your_stripe_publishable_key");
var elements = stripe.elements();
var card = elements.create("card");
card.mount("#card-element");
document.getElementById("payment-form").addEventListener("submit", function(event) {
    event.preventDefault();
    stripe.createToken(card).then(function(result) {
        if (result.error) {
            console.log(result.error.message);
        } else {
            var form = document.getElementById("payment-form");
            var hiddenInput = document.createElement("input");
            hiddenInput.setAttribute("type", "hidden");
            hiddenInput.setAttribute("name", "stripeToken");
            hiddenInput.setAttribute("value", result.token.id);
            form.appendChild(hiddenInput);
            form.submit();
        }
    });
});
</script></body></html>

