<html>
<head></head>
<body>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-NTSVHV"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NTSVHV');</script>
<!-- End Google Tag Manager -->
<script>
	dataLayer.push({
		'event':'impressionEvent',
		  			'ecommerce': {
    	'currencyCode':'SEK',
      'impressions': [{                        
        'name': 'Supercute dress',
        'id': '12345',
        'list':'dresses',
        'price': '15.25',
        'brand': 'Google',
        'category': 'Apparel',
        'variant': 'Gray',
        'quantity': 1,
        'position':1,
       },
       {
       	'name': 'Lovely Knitted Piece',
        'id': '12346',
        'price': '12.50',
        'list': 'dresses',
        'brand': 'Google',
        'category': 'Apparel',
        'variant': 'Blue',
        'quantity': 2,
        'position':2,
       }]
       }
	});
</script>


<?php

session_start();
$_SESSION['count'] += 1;
echo "count: " . $_SESSION['count'] . "<br/>";

$products = array (
	1 => array (
	'name' => 'Dress',
	'price' => 23.50,
	'category' => 'clothes',
	'description' => 'Beautiful blue dress'
	),

2 => array (
	'name' => 'Sneakers',
	'price' => 12.50,
	'category' => 'shoes',
	'description' => 'Cool shoes'
	)
);

if(!isset($_SESSION['shopping-cart'])) {
	$_SESSION['shopping-cart'] = array();
}

if($_GET['empty_cart']) {	
}

if (isset($_POST['add_to_cart'])) {
	$product_id = $_POST['product_id'];
	
	if(isset($_SESSION['shopping_cart']['$product_id'])) {
		echo "Item already in cart!";
	}

else {
 echo "You product has been added to cart!";

 
 $_SESSION['shopping-cart'][$product_id]['product_id'] = $_POST['product_id'];
 $_SESSION['shopping-cart'][$product_id]['quantity'] = $_POST['quantity'];
}
}

echo "<h1 style='text align:center'> Isabelles Store</h1>
<h2>Our products</h2>
<p><a href='index.php?view_cart=1'>View cart</a></p>";

if (isset($_GET['view_product'])) {
	$product_id = $_GET['view_product'];

	echo "View product:". $product_id ."<br/>"; 

	echo "<p>" . $products[$product_id]['name'] . "<br />" . $products[$product_id]['price'] . "<br />" . $products[$product_id]['category'] ."</p>"; 
	echo "<p>
	<form action='index.php?view_product=$product_id' method='POST'>
	<select name='quantity'>
		<option value='1'>1</option>
		<option value='2'>2</option>
		<option value='3'>3</option>
	</select>
	<input type='submit' name='add_to_cart' value='Add to cart'/>
	<input type='hidden' name='product_id' value='$product_id'/>
	</form>";
	echo "<a href='index.php'>Continue shopping</a>";

}
else if (isset($_GET['view_cart'])) {
	echo "<p> Your Cart </p>";
	if(empty($_SESSION['shopping-cart'])) {
		echo "You have no products in your shopping cart<br/>";
		echo "<a href='index.php'>Back</a>";
	}
	else {
		foreach($_SESSION['shopping-cart'] as $id => $product)
 {
 	echo "cart[$id] = Product: " . $product['product_id'] . "Quantity: " . $product['quantity'] . "<br />";
 }	}

}
	else {


foreach ($products as $id => $product) {
	echo "<p><a href='index.php?view_product=$id'>" . $product['name'] . "</a><br /> Price: $" . $product['price'] . "<br />
	Category: " . $product['category'] . "<br />"
	. $product['description'] . "<br/></p>";
}
}

?>

<script>
     dataLayer.push({
     	'event':'addToCart',
  'ecommerce': {
    'currencyCode': 'SEK',
    'add': {                                // 'add' actionFieldObject measures.
      'products': [{                        //  adding a product to a shopping cart.
        'name': '<?php echo $products[$product_id]['name'];?>',
        'price': '<?php echo $products[$product_id]['price'];?>',
        'category': '<?php echo $products[$product_id]['category'];?>',
        'quantity': 1,
        'position':1
       }]
    }
  }
});
</script>

</body>
</html>