<!DOCTYPE html>
		<html lang="en">
			<head>
				<meta charset="UTF-8">
				<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
				<meta http-equiv="X-UA-Compatible" content="ie=edge">
				<title>Paypal Payment</title>
				<!-- Latest compiled and minified CSS -->
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

				<!-- jQuery library -->
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

				<!-- Latest compiled JavaScript -->
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
			</head>

			<body>
                <section class="pt-5 pb-5">
                    <div class="container">
                        <div class="row w-100">
                            <div class="col-lg-12 col-md-12 col-12" id="output">
                                <div class="float-right text-right">

                                    <h4>Subtotal:</h4>
                                    <h1>$<span id="total"></span></h1>
                                    <input type="text" value=1 id="total_value" hidden>
                                    <div id="array1">

                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
				</section>

				<div id="paypal-payment-button">

				</div>

			<script src="https://www.paypal.com/sdk/js?client-id=ATZKBUfrjxQCsY9zvAEqt70hBOd5OPgy7xVgWWK21sjnsfqY433imCvsx0i5rT58VXQhq2ga273BXZNw&disable-funding=credit,card">

			</script>
			<script>
				paypal.Buttons({
					style : {
						color: 'blue',
						shape: 'pill'
					},
					createOrder: function (data, actions) {
                        var subtotal = document.getElementById('total_value').value;
						return actions.order.create({
							purchase_units : [{
								amount: {
									value: subtotal
								}
							}]
						});
					},
					onApprove: function (data, actions) {
						return actions.order.capture().then(function (details) {
							console.log(details)
						    window.location.replace("http://192.168.1.2:8000/success")
						})
					},
					onCancel: function (data) {
						    window.location.replace("http://192.168.1.2:8000/cancel")
					}
				}).render('#paypal-payment-button');
		
			</script>

		</body>
	</html>
