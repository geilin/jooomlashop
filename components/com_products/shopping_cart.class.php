<?php

class Shopping_Cart {
	var $cart_name;       // The name of the cart/session variable
	var $items = array(); // The array for storing items in the cart
	
	function __construct($name) {
		$this->cart_name = $name;
		$this->items = $_SESSION[$this->cart_name];
		
	}
	
	function setItemQuantity($id, $quantity) {
		$this->items[$id]['count'] = $quantity;
	}

	function setItem($productid, $info) {
	
		if (isset($this->items[$productid])){
			$cart = $this->items[$productid];
		}
		if (isset($cart)){
			$preCount = $cart['count'];
			$preName = $cart['name'];
			$preThumbnail = $cart['thumbnail'];
			$prePrice = $cart['price'];
			$preCurrency = $cart['currency'];
			$this->items[$productid] = array(
					'id' => $productid,
					'name' => $preName,
					'thumbnail' => $preThumbnail,
					'price' => $prePrice,
					'currency' => $preCurrency,
					'count' => $preCount + 1
					);
		} else {
			$this->items[$productid] = array(
						'id' => $productid,
						'name' => $info->name,
						'thumbnail' => $info->thumbnail,
						'price' => $info->saleprice,
						'currency' => $info->currency,
						'count' => 1
						);
		}
	}
	
	
	
	
function setItemSon($productid, $info,$quantity) {
	
		if (isset($this->items[$productid])){
			$cart = $this->items[$productid];
		}
		if (isset($cart)){
			$preCount = $cart['count'];
			$preName = $cart['name'];
			$preThumbnail = $cart['thumbnail'];
			$prePrice = $cart['price'];
			$preCurrency = $cart['currency'];
			$this->items[$productid] = array(
					'id' => $productid,
					'name' => $preName,
					'thumbnail' => $preThumbnail,
					'price' => $prePrice,
					'currency' => $preCurrency,
					'count' => $preCount + $quantity
					);
		} else {
			$this->items[$productid] = array(
						'id' => $productid,
						'name' => $info->name,
						'thumbnail' => $info->thumbnail,
						'price' => $info->saleprice,
						'currency' => $info->currency,
						'count' => $quantity
						);
		}
	}
	
	
	

	

	function getItems() {
		return $this->items;
	}
	
	function hasItems() {
		return (bool) $this->items;
	}
	
	function getItemQuantity($id) {
		return (int) $this->items[$id]['count'];
	}
	
	function clean() {
		foreach ( $this->items as $id=>$cart ) {
			if ( $cart['count'] < 1 )
				unset($this->items[$id]);
		}
	}
	
	function save() {
		$this->clean();
		$_SESSION[$this->cart_name] = $this->items;
	}
}

?>