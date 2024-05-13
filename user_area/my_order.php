<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Order table</title>
	<!-- bootstrap css link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<h3 class="text-success text-center mb-5">All my Order</h3>
	<table class="table table-bordered text-center" class="bg-info">
		<!-- <thead class="bg-info">
			<tr>
				<th>Sl No</th>
				<th>Amount Due</th>
				<th>Total Product</th>
				<th>Invoice Number</th>
				<th>Date</th>
				<th>Complete/Incomplete</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody class="bg-secondary text-light"> -->
			<?php 
				$username = $_SESSION['username'];
				$select_user = "SELECT * FROM user WHERE username = '$username'";
				$select_query = mysqli_query($conn,$select_user);
				$select_result = mysqli_fetch_assoc($select_query);

				$user_id = $select_result['user_id'];

				$sql = "SELECT * FROM order_table WHERE user_id = $user_id";
				$query = mysqli_query($conn,$sql);
				$result = mysqli_num_rows($query);
				 $si = 0;
				if($result > 0){
					echo "<thead class='bg-info'>
							<tr>
								<th>Sl No</th>
								<th>Amount Due</th>
								<th>Total Product</th>
								<th>Invoice Number</th>
								<th>Date</th>
								<th>Complete/Incomplete</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody class='bg-secondary text-light'>";
					while ($row = mysqli_fetch_assoc($query)) {
					    $amount_due = $row['amount_due'];
					    $order_id = $row['order_id'];
					    $total_product = $row['total_product'];
					    $invoice = $row['invoies_number'];
					    $date = $row['order_date'];
					    $order_status = $row['order_status'];
					    if($order_status=='pending'){
					    	$order_status = "Incomplete";
					    }else {
					    	$order_status = "complete";
					    }
					    $si++;
					    echo "<tr>
									<td>$si</td>
									<td>$amount_due</td>
									<td>$total_product</td>
									<td>$invoice</td>
									<td>$date</td>
									<td>$order_status</td>
									";
									if($order_status=="complete"){
										echo "<td>Paid</td>";
									}else{
										echo "<td><a href='confirm_payment.php?order_id=$order_id'>Confirm</a></td>
							</tr>";
									}
					}
					
				}else{
					echo "<p class='text-center f-5 f-bold text-info'>Your Have No Item Ordered</p>";
				}

			?>
			
		</tbody>
	</table>
</body>
</html>