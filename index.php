<?php 
include ('header.php');
echo '

<html>
		<head>
		<link rel="stylesheet" type="text/css" href="nav.css">
		</head>
		<body>

		<style>
		body {
			background: url(truck2.jpg);
			background-size:cover;
			background-repeat: no-repeat;
			color: white;
		} 
		    .container{
				width: 100%;
				height: 85%;
				display: flex;
				flex-direction:column;
			}
			.sub{
				
				width: 100%;
				height: 100%;
				margin:5px;
				display: flex;
				flex-direction:row;
			}
			.div{
				position: relative;
				width: 100%;
				height: 100%;
				margin:15px;
				border-radius: 15px;
				background-color:rgba(0,0,0,0.6);
				transition: all 1s;
				
			}
			.div div{
				height: 100%;
				width:100%;
				position: absolute;
				font-family: "Lucida Sans Unicode", verdana, tahoma, sans-serif;
			}
			
			.div div h1{
				position: absolute;
				top: 45%;
				left: 50%;
				transform: translate(-50%,-50%);
				transition: all 1s;
			}
			
			.div:hover div h1{
				
				top: 10%;
				
				
			}
			.div:hover{
				box-shadow: 0px 0px 10px 10px rgba(0,0,0,0.4);
			}
			
			
			.titlw{
				height:10%;
				width: 100%;
			}
			.title{
				width: 100%;
				padding: 10px;
				font-size:2vw;
				position: absolute;
			}
			.title h1{
                top: 10%;
				left: 50%;
				position: absolute;
				font-family: "Lucida Sans Unicode", verdana, tahoma, sans-serif;
				transform: translate(-50%,-50%);
			}

			.end{
				position:relative;
			}
			
			.butt{
				position: absolute;
				width:100%;
				top: 60%;
				left: 50%;
				transform: translate(-50%,0%);
				display: flex;
				flex-direction: row;
				
			}
			
        	.butt div{
				
				position: absolute;
				text-align:center; 
				left: 50%;
				transform: translate(-50%,0%);
				height:25%;
				width:50%;
				border: 2px solid;
				border-radius: 50px;
                border-color: white;
				background-color:rgba(0,0,0,0.6);
				cursor: pointer;
				transform: scale(0,0);
				transition:all 1s;
			}
			.div:hover div .butt div{
				transform: scale(1,1);
				left: 50%;
				transform: translate(-50%,0%);
			}
			p{
				position: absolute;
				transform: scale(0,0);
				top: 60%;
				left: 50%;
				text-align: center;
				transform: translate(-50%,0%);
				transition: all 1s;
			}
			.div:hover div p{
				transform: scale(1,1);
				top: 25%;
				transform: translate(-50%,0%);
			}
			.butt div:hover{
				box-shadow: 0 0 6 1 rgba(255,255,255,0.1),
				            0 0 8 2.25 rgba(255,255,255,0.3),
				            0 0 10 3.5 rgba(255,255,255,0.5),
				            0 0 12 5 rgba(255,255,255,0.7);
			}
			
		</style>
<div class="titlw"><div class="title"><h1>Transport Management</h1></div></div>
<div class="container"> 
	<div class="sub">



		<div id="admin" class="div">
		<div class="ca">
		<div class="head"><h1>Admin</h1></div>
		<p>Here, Admin can log in to get all Access to Register new Employee, Customer and Party.</p>
		<div class="butt"><div href="admin/"><h2>Log In</h2></div></div>
		</div>
		</div>



		<div id="employee" class="div">
		<div class="ca">
		<div class="head"><h1>Employee</h1></div>
		<p>Here, Employee can log in to get Work.</p>
		<div class="butt"><div  href="employee/"><h2>Log In</h2></div></div>
		</div>
		</div>
	</div>

	<div class="sub">

		<div id="customer" class="div">
		<div class="ca">
		<div class="head"><h1>Customer</h1></div>
		<p>Here, Customer can log in and apply for work to be Done.</p>
		<div class="butt"><div  href="customer/"><h2>Log In</h2></div></div>
		</div>
		</div>

		<div id="party" class="div">
		<div class="ca">
		<div class="head"><h1>Party</h1></div>
		<p>Here, Party can log in to give vehical on Rent.</p>
		<div class="butt"><div  href="party/"><h2>Log In</h2></div></div>
		</div>
		</div>
	</div>
	
	
</div>
<div class="end"><p>TMS is offered as a module within enterprise resource planning (ERP) and SCM suites and helps organizations move inbound -- procurement -- and outbound -- shipment -- freight using tools such as route planning and optimization, load building, operations execution, freight audit and payment, yard management, order visibility, and carrier management. The ultimate goals of using a TMS are to improve shipment efficiency, reduce costs, gain real-time supply chain visibility and enhance customer service.
Typically, TMS serves both shippers and logistics service providers. Manufacturers, distributors, e-commerce organizations, wholesalers, retailers and third-party logistics (3PL) companies are some of the major users of TMS software.
TMS has gained traction over the past decade, as it has emerged as an enabler of seamless global trade and logistics management. By enabling information exchange across functional silos; amid geographically disparate operations; and in various languages, currencies, and business units, it has developed into an enterprise software that is finding growing appeal. Furthermore, its functionalities make it suitable for organizations that not only have complex logistics operations, but also those that may have basic transportation needs.
Given the factors above, a 2016 Gartner report predicted that the global TMS market will grow at a compound rate of 6.95% and reach $1.72 billion by 2019, up from $1.23 billion in 2014.</p></div>
</body>
</html>';?>