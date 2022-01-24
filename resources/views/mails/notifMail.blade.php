<!DOCTYPE html>
<html>
<head>
    <title>New Order</title>
    <!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->

	<!--begin::Page Vendor Stylesheets(used by this page)-->
	<link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Page Vendor Stylesheets-->

	<!--begin::Global Stylesheets Bundle(used by all pages)-->
	<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
	<!--end::Global Stylesheets Bundle-->

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            color: black;
        }

        .container {
            width: 90vh;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            border-radius: 20px;
            padding: 30px;
        }

        h1{
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .mail ul {
            list-style-type: none;
        }

        .button{
            display: flex;
            align-items: center;
            justify-content: center;
        }

        a{ 
            padding: 20px;
            background-color: #009EF7;
            color: white;
            width:200px;
            border-radius: 20px;
            text-decoration:none;
            }

        a:hover {
            background-color: #000EFF;
        }	

    </style>
    
</head>
<body>
    <div class="container">
        <h1>Pesanan Baru Diterima</h1>
        <div class="mail">
            <div class="data-konsumen">
                <h2>Data Konsumen</h2>
                <ul>
                    <li>Order ID 	    : 1</li>	
                    <li>Nama 	        : {{ $details['client'] }}</li>
                    <li>No HP 	        : {{ $details['client_number'] }}</li>
                    <li>Tanggal Order   : 22-01-2022</li>
                </ul>
            </div>
            <div class="data-product">
                <h2>Produk</h2>
                <ul>
                    <li>Produk	        : {{ $details['product'] }}</li>
                </ul>
            </div>
        </div>
        <div class="button">
            <a href="https://api.whatsapp.com/send/?phone={{$details['client_number']}}&text={{ rawurlencode(str_replace(array('[cname]', '[cphone]', '[oname]', '[product]'), array($details['client'], $details['client_number'], $details['operator'], $details['product']), $details['FU_text'])) }}" class="btn">Follow up via Whatsapp</a>
        </div>
    </div>
</body>
</html>