<?php
use App\Http\Controller\ProductController;
$total = 0;
if(Session::has('user'))
{
    $total = ProductController::cartItem();
}
?>
<h3>Add stuff here</h3>