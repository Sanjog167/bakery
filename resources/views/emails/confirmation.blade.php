<html>
<head>
	<title>
		Register Email
	</title>
	</head>
	<body>
		<table>
			<tr>
				<td>
				Dear {{$name}}!</td>
				</td>
			</tr>
			<tr>
				<td>
					&nbsp;
				</td>
			</tr>
			<tr>
				<td>
					Please click on below link to active your account: </br>
					
				</td>
			</tr>
			<tr>
				<td>
					&nbsp;
				</td>
			</tr>
			<tr>
				<td>
					<a href="{{url('/confirm/'.$code) }}">Please Confirm Your Account</a>
				</td>
			</tr>
			<tr>
				<td>
					&nbsp;
				</td>
			</tr>
			<tr>
				<td>
					Thanks & Regards, ROSA. Happy Shopping. 
				</td>
			</tr>
		</table>
	</body>
</html>