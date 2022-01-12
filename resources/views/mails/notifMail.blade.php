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
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <p>Halo,</p>
    <p>Ada order baru nih, silahkan di follow up ya:</p>
    {{--  <p>{{ $details['body'] }}</p>  --}}
    <div style="background-color: gray">
        <div class="data-konsumen">
            <h2>Data Konsumen</h2>
            <ul>
                <li>Nama : {{ $details['client'] }}</li>
                <li>No HP : {{ $details['client_number'] }}</li>
            </ul>
        </div>
        <div class="data-product">
            <h2>Produk</h2>
            <ul>
                <li>Produk: {{ $details['product'] }}</li>
            </ul>
        </div>
    </div>
    <a href="https://api.whatsapp.com/send/?phone={{$details['client_number']}}&text={{ str_replace(array('[cname]', '[cphone]', '[oname]', '[product]'), array($details['client'], $details['client_number'], $details['operator'], $details['product']), $details['FU_text']) }}" class="btn">Follow up</a>

   
    <p>Semoga closing ya.. :*</p>
</body>
</html>