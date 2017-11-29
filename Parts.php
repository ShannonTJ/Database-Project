<?php
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "cpsc471db") or ('Unable to connect to the Database');

?>



<!DOCTYPE HTML>
<html>
	<head>
		<title>
			Parts and Repair order
		</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso=8859-1">
	</head>

	<body>
		<center>
			<form name = "InsertParts" action="" method="post">
				<table>
					<tr>
						<td>
							<font size = "5">
								<b>
									Insert Parts
								</b>
							</font>
						</td>
					</tr>

					<tr>
						<td>Enter Part Order Number</td>
						<td><input type = "number" name = "Part_PO_Num" placeholder = "PO Number" maxlength = "10" max = "9999999999" required = "required"></td>
					</tr>

					<tr>
						<td>Enter Repair Order Number</td>
						<td><input type = "number" name = "Part_RO_Num" placeholder = "123456789" maxlength = "9" required = "required"></td>
					</tr>

					<tr>
						<td>Enter Part Number</td>
						<td><input type = "number" name = "Part_Part_Num" placeholder = "123456789" maxlength = "9""></td>
					</tr>

					<tr>
						<td>Enter Type</td>
						<td><input type = "text" name = "Part_Type" placeholder = "Ex. (Tire)" maxlength = "25"></td>
					</tr>

					<tr>
						<td>Enter Status of Part</td>
						<td><input type = "text" name = "Part_Status" placeholder = "Arrived/On it's way" maxlength = "25"></td>
					</tr>

					<tr>
						<td>Enter Description</td>
						<td><input type = "text" name = "Part_Desc" placeholder = "Description" maxlength = "300"></td>
					</tr>

					<tr>
						<td>Enter Order Date</td>
						<td><input type = "date" name = "Part_Order_Date"></td>
					</tr>

					<tr>
						<td>Enter Arrival Date</td>
						<td><input type = "date" name = "Part_Arrival_Date"></td>
					</tr>

					<tr>
						<td>Enter Invoice Number</td>
						<td><input type = "text" name = "Part_Invoice_Num" placeholder="Invoice Number for part" maxlength="20" ></td>
					</tr>

					<tr>
						<td>Enter Returned?</td>
						<td><input type = "text" name = "Part_Returned" placeholder = "Yes/No" maxlength = "3"></td>
					</tr>

						<tr>
						<td>Enter Cost of Part</td>
						<td><input type = "Number" name = "Part_Cost" placeholder="Ex. ($20)" maxlength="9"></td>
					</tr>

					<tr>
						<td colspan = "2" align = "center"><input type = "submit" name = "insertPartSubmit" value = "insert"> </td>
					</tr>

				</table>
			</form>


			<form name = "ModifyParts" action="" method="post">
				<table>
					<tr>
						<td>
							<font size = "5">
								<b>
									Update Parts
								</b>
							</font>
						</td>
					</tr>

					<tr>
						<td>Enter Orignal Part Order Number</td>
						<td><input type = "number" name = "Old_PO_Num" placeholder = "PO Number" maxlength = "10" max = "9999999999" required = "required"></td>
					</tr>

					<tr>
						<td>Enter Updated Repair Order Number</td>
						<td><input type = "number" name = "New_RO_Num" placeholder = "123456789" maxlength = "9"></td>
					</tr>

					<tr>
						<td>Enter Updated Part Number</td>
						<td><input type = "number" name = "New_Part_Num" placeholder = "123456789" maxlength = "9""></td>
					</tr>

					<tr>
						<td>Enter Updated Type</td>
						<td><input type = "text" name = "New_Type" placeholder = "Ex. (Tire)" maxlength = "25"></td>
					</tr>

					<tr>
						<td>Enter Updated Status of Part</td>
						<td><input type = "text" name = "New_Status" placeholder = "Arrived/On it's way" maxlength = "25"></td>
					</tr>

					<tr>
						<td>Enter Updated Description</td>
						<td><input type = "text" name = "New_Desc" placeholder = "Description" maxlength = "300"></td>
					</tr>

					<tr>
						<td>Enter Updated Order Date</td>
						<td><input type = "date" name = "New_Order_Date"></td>
					</tr>

					<tr>
						<td>Enter Updated Arrival Date</td>
						<td><input type = "date" name = "New_Arrival_Date"></td>
					</tr>

					<tr>
						<td>Enter Updated Invoice Number</td>
						<td><input type = "text" name = "New_Invoice_Num" placeholder="Invoice Number for part" maxlength="20" ></td>
					</tr>

					<tr>
						<td>Enter if Returned</td>
						<td><input type = "text" name = "New_Returned" placeholder = "Yes/No" maxlength = "3"></td>
					</tr>

						<tr>
						<td>Enter Updated Cost</td>
						<td><input type = "Number" name = "New_Cost" placeholder="Ex. ($20)" maxlength="9"></td>
					</tr>

					<tr>
						<td colspan = "2" align = "center"><input type = "submit" name = "ModifyPartSubmit" value = "Update"> </td>
					</tr>

				</table>
			</form>
			

			<form name = "PartDeleteForm" action="" method="post">
				<table>
					<tr>
						<td>
							<br>
							<font size = "5">
								<b>
									Delete Part
								</b>
							</font>
						</td>
					</tr>


					<tr>
						<td>Enter Part Order Number</td>
						<td><input type = "number" name = "Del_PO_Num" placeholder = "ID" maxlength = "10" max = "9999999999" required = "required"></td>
					</tr>

					<tr>
						<td colspan = "2" align = "center"><input type = "submit" name = "deletePartSubmit" value = "delete"> </td>
					</tr>
				</table>
			</form>

			<?php

			$query = "SELECT * FROM Parts";
			$result = mysqli_query($link, $query);

			if(isset($_POST["insertPartSubmit"])) {
				mysqli_query($link, "INSERT into parts VALUES ('$_POST[Part_PO_Num]', '$_POST[Part_RO_Num]', '$_POST[Part_Part_Num]', '$_POST[Part_Type]', '$_POST[Part_Status]', '$_POST[Part_Desc]', '$_POST[Part_Order_Date]', '$_POST[Part_Arrival_Date]', '$_POST[Part_Invoice_Num]', '$_POST[Part_Returned]', '$_POST[Part_Cost]')");
			}

			if(isset($_POST["deletePartSubmit"])) {
				mysqli_query($link, "DELETE FROM parts WHERE parts.PO_Num = '$_POST[Del_PO_Num]'");
			}

			if(isset($_POST["ModifyPartSubmit"])) {
				$flag = True;
				while($part = mysqli_fetch_assoc($result)) {
					if($part['PO_Num'] == $_POST['Old_PO_Num']) {
						$flag = False;
						if($_POST["New_RO_Num"] != "") {
							mysqli_query($link, "UPDATE parts SET RO_Num = '$_POST[New_RO_Num]' WHERE PO_Num ='$_POST[Old_PO_Num]'" );
						}
						if($_POST["New_Part_Num"] != "") {
							mysqli_query($link, "UPDATE parts SET PartNum = '$_POST[New_Part_Num]' WHERE PO_Num ='$_POST[Old_PO_Num]'" );
						}
						if($_POST["New_Type"] != "") {
							mysqli_query($link, "UPDATE parts SET Type = '$_POST[New_Type]' WHERE PO_Num ='$_POST[Old_PO_Num]'" );
						}
						if($_POST["New_Status"] != "") {
							mysqli_query($link, "UPDATE parts SET Status = '$_POST[New_Status]' WHERE PO_Num ='$_POST[Old_PO_Num]'" );
						}
						if($_POST["New_Desc"] != "") {
							mysqli_query($link, "UPDATE parts SET Description = '$_POST[New_Desc]' WHERE PO_Num ='$_POST[Old_PO_Num]'" );
						}
						if($_POST["New_Order_Date"] != "") {
							mysqli_query($link, "UPDATE parts SET Order_Date = '$_POST[New_Order_Date]' WHERE PO_Num ='$_POST[Old_PO_Num]'" );
						}
						if($_POST["New_Arrival_Date"] != "") {
							mysqli_query($link, "UPDATE parts SET Arrival_Date = '$_POST[New_Arrival_Date]' WHERE PO_Num ='$_POST[Old_PO_Num]'" );
						}
						if($_POST["New_Invoice_Num"] != "") {
							mysqli_query($link, "UPDATE parts SET Invoice_Num = '$_POST[New_Invoice_Num]' WHERE PO_Num ='$_POST[Old_PO_Num]'" );
						}
						if($_POST["New_Returned"] != "") {
							mysqli_query($link, "UPDATE parts SET Returned = '$_POST[New_Cost]' WHERE PO_Num ='$_POST[Old_PO_Num]'" );
						}
						if($_POST["New_Cost"] != "") {
							mysqli_query($link, "UPDATE parts SET Cost = '$_POST[New_Cost]' WHERE PO_Num ='$_POST[Old_PO_Num]'" );
						}
					}
				}
				if($flag == True) {
          			echo "TAKE TO INCCORECT PO_Num page that try agains back to this page :)";
          		}
			}
			?>
		</center>
	</body>
</html>
