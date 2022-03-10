<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome 5 CSS -->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.2/css/all.css'>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="{{ asset('client') }}/css/profile.css">
    @include('layout_client.style')
</head>
<body>
    @include('layout_client.header')
    <div class="wrapper">
        <div class="outer">
        <div class="content animated fadeInLeft">
        <span class="bg animated fadeInDown">EXCLUSIVE</span>
        <h1>Afro<br/> baseball hair</h1>
        <p>Shadow your real allegiance to New York's Pirate radio with this cool cap featuring the Graphic Know Wave logo.</p>
        
        <div class="button">
        <a href="#">$115</a><a class="cart-btn" href="#"><i class="cart-icon ion-bag"></i>ADD TO CART</a>
        </div>
        
        </div>
        <img src="https://bit.ly/2kOzUTm" width="300px" class="animated fadeInRight">
        </div>
        <p class="footer">Based on the Silk UI Kit - DesignModo Market</p>
        </div>
    @include('layout_client.footer')
    @include('layout_client.script')


    
</body>
</html>