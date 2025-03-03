
<?php

require_once 'classes/Item.php';

use FakeBusiness\Classes\Item;

$item = new Item("Laptop", 999.99, "A high-performance laptop for professionals.");
echo $item->getItemDetails();
