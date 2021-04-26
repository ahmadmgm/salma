<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<p class="stock a <?php echo esc_attr( $class ); ?>">
	<?php 
 $stock = $product->get_stock_quantity();
	if ( ! $product->managing_stock() && ! $product->is_in_stock() ){ 
        $stock = 0;
		echo esc_html__('Availale','ailab').'<span> <strong>'.$stock.'</strong> </span>'.esc_html__('product in stock','ailab'); 
	}else{
		
		
		if($stock == 0){
			echo esc_html__('Availale','ailab').'<span> <strong>'.$stock.'</strong> </span>'.esc_html__('product in stock','ailab'); 
		}else{
			echo esc_html__('Availale','ailab').'<span> <strong>'.$stock.'</strong> </span>'.esc_html__('products in stock','ailab'); 
		}
	}
	?>
</p> 