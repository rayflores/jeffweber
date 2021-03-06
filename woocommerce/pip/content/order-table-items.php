<?php
/**
 * WooCommerce Print Invoices/Packing Lists
 *
 * This source file is subject to the GNU General Public License v3.0
 * that is bundled with this package in the file license.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.html
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@skyverge.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade WooCommerce Print
 * Invoices/Packing Lists to newer versions in the future. If you wish to
 * customize WooCommerce Print Invoices/Packing Lists for your needs please refer
 * to http://docs.woocommerce.com/document/woocommerce-print-invoice-packing-list/
 *
 * @package   WC-Print-Invoices-Packing-Lists/Templates
 * @author    SkyVerge
 * @copyright Copyright (c) 2011-2017, SkyVerge, Inc.
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License v3.0
 */

defined( 'ABSPATH' ) or exit;

/**
 * PIP Template Body before content
 *
 * @type \WC_Order $order Order object
 * @type int $order_id Order ID
 * @type \WC_PIP_Document Document object
 * @type string $type Document type
 * @type string $action Current document action
 *
 * @version 3.2.0
 * @since 3.0.0
 */
foreach ($order->get_items() as $item_id => $item ){
	
	$product_id = $item['product_id'];
	$term_list = wp_get_post_terms($product_id, 'product_cat', array('fields' => 'names'));
	$designer_notes = wc_get_order_item_meta($item_id, 'REQUEST FOR DESIGNER', true );
	
	$occasion_array = array( 'Thank you', 'Birthday', 'Anniversary', 'Sympathy', 'Funeral', 'Valentines Day',
'Mothers Day', 'Thanksgiving', 'Holiday', 'Miscellaneous', 'Gift Card' );
}
$item_code = '';
$item_code_name = '';
	if ( in_array('Fresh Flowers', $term_list) ){
		$item_code = 'FA';
		$item_code_name = 'Fresh Flowers';
	}
	// if ( in_array('Fresh Flowers', $term_list) ){
		// $item_code = 'FA';
	// }		
	// if ( in_array('Fresh Flowers', $term_list) ){
		// $item_code = 'FA';
	// }	

					?>
					<tbody class="order-table-body">
						<tr class="logo">
							<td rowspan="3" style="width: 35%;text-align:center;">
								<img src="<?php echo plugins_url( "imgs/RW-Paint-Logo3.png", __FILE__ ); ?>"/>
							</td>
							<td style="width: 23%;">
								DELIVERY LOG:
							</td>
							<td style="width:4%">
								&nbsp;
							</td>
							<td style="width: 40%;text-align:center;" rowspan="3">
								<img src="<?php echo plugins_url( "imgs/RW-Paint-Logo3.png", __FILE__ ); ?>"/>
							</td>
						</tr>
						<tr class="leave">
							<?php 
							$okay_to_leave = get_post_meta( $order_id, '_shipping_wcj_checkout_field_7', true );
							if ( $okay_to_leave === 'yes'){
								$yes_mark = '&#9635;';
								$no_mark = '&#9633;';
							} else {
								$yes_mark = '&#9633;';
								$no_mark = '&#9635;';
							}
							?>
							<td>
								Okay To Leave: <span class="right">Y&nbsp;<?php echo $yes_mark; ?>&nbsp;&nbsp;&nbsp;N&nbsp;<?php echo $no_mark; ?></span>
							</td>
						</tr>
						<tr>
							<td></td>
							
						</tr>
						<tr class="recipient">
							<td>
								<?php echo $order->get_formatted_shipping_address(); ?></br>
								<?php echo get_post_meta( $order_id, '_shipping_wcj_checkout_field_4', true ); ?>
							</td>
							<td rowspan="4">
								DATE/TIME _______________
								<br/>
								Personally Received <span class="right">Y&nbsp;&#9633;&nbsp;&nbsp;&nbsp;N&nbsp;&#9633;</span>
								<br/>
								Left For Customer <span class="right">Y&nbsp;&#9633;&nbsp;&nbsp;&nbsp;N&nbsp;&#9633;</span>
								<br/>
								<br/>
								<hr/>
								<br/>
								<hr/>
								<br/>
								<hr/>
							</td>
							<td style="width:4%">
								&nbsp;
							</td>
							<td rowspan="4" class="message" style="text-align:center;">
								<p>
									<span class="printed"><?php echo $order->shipping_first_name; ?>,<br/>
									<?php echo get_post_meta( $order_id, '_billing_wcj_checkout_field_1', true); ?></span>
								</p>	
							</td>
						</tr>
						<tr class="deliverydate bold">
							<td>
								<strong>DELIVERY DATE: <?php echo date('m-d-Y - l', strtotime(get_post_meta($order_id, 'jckwds_date', true))); ?></strong>
							</td>
						</tr>
						<tr class="orderno">
							<td>
								ORDER NO: <?php echo $order_id; ?>
							</td>
						</tr>
						<tr class="deliveryinstructions">
							<td>
								DELIVERY INSTRUCTIONS: <?php echo strtoupper(get_post_meta( $order_id, '_shipping_wcj_checkout_field_5', true )); ?>
								<br/>
								<?php echo get_post_meta( $order_id, '_shipping_wcj_checkout_field_8', true ); ?>
							</td>
						</tr>
						<tr class="email-phone">
							<td style="text-align:center;" class="green">
								<small>robinwoodflowers.com 513-531-5590</small>
							</td>
							<td>
								Driver&#39;s Initials ________
							</td>
							<td style="width:4%">
								&nbsp;
							</td>
							<td style="text-align:center;" class="green">
								<small>robinwoodflowers.com 513-531-5590</small>
							</td>
						</tr>
						<tr>
							<td colspan="4">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="4">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="4">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="4">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="4">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="4">&nbsp;</td>
						</tr>


						<tr class="orderdetails">
							<td colspan="2"></td>
							<td style="width:4%">
								&nbsp;
							</td>
							<?php 
							$sold_by = '';
							$internal_use = get_post_meta($order_id, '_billing_wcj_checkout_field_10', true);
							$web = get_post_meta($order_id, '_sold_by', true);
							if ( null != $internal_use ){
								$sold_by = $internal_use;
							} else {
								$sold_by = $web;
							}
							
							?>
							<td>
								ORD. NO: <?php echo $order_id; ?>&nbsp;&nbsp;Taken: <?php echo date('m-d-y h:i:s A', strtotime($order->order_date)); ?>&nbsp;&nbsp;Sold By: <?php echo $sold_by; ?>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<span style="width:75%">ORD. NO: <?php echo $order_id; ?>&nbsp;&nbsp;Taken: <?php echo date('m-d-y h:i:s A', strtotime($order->order_date)); ?>&nbsp;&nbsp;Sold By: <?php echo $sold_by; ?></span><span class="sigbox" style="width:25%;border:1px solid;padding: 1% 21% 5%;margin-left:3%;"></span>
							</td>
							<td style="width:4%">
								&nbsp;
							</td>
							<td>
								Printed: <?php echo date( 'Y-m-d H:i:s A', current_time( 'timestamp' ) ); ?>
							</td>
						</tr>
						<tr>
							<td colspan="2">
				<?php 

					$shipping_method = $order->get_shipping_method();
					if ($shipping_method === 'Local Delivery') { ?>
								<strong>DELIVERY DATE: <?php echo date('m-d-Y - l', strtotime(get_post_meta( $order_id, 'jckwds_date', true ))); ?></strong>
							</td>
							<td style="width:4%">
								&nbsp;
							</td>
							<td>
								ITEM: <?php echo $item_code . ' ' . strtoupper($item_code_name); ?>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								PICK UP DATE: 
							</td>
				<?php } elseif ($shipping_method === 'Local pickup') { ?>
								DELIVERY DATE: 
											</td>
											<td style="width:4%">
								&nbsp;
							</td>
										<td>
											ITEM: <?php echo $item_code . ' ' . strtoupper($item_code_name) . '    OCCASION: ' . wc_get_order_item_meta($item_id, 'Occasion', true ); ?>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<strong>PICK UP DATE: <?php echo date('m-d-Y - l', strtotime(get_post_meta( $order_id, 'jckwds_date', true ))) .' <br/> TIME SLOT:' . get_post_meta( $order_id, 'jckwds_timeslot', true ); ?></strong>
										</td>
					
			<?php	}
			?>
							
								
							<td style="width:4%">
								&nbsp;
							</td>
							<td> <?php 
							if ($shipping_method === 'Local Delivery') { ?>
								<strong>DELIVERY DATE: <?php echo date('m-d-Y - l', strtotime(get_post_meta( $order_id, 'jckwds_date', true ))); ?></strong>
							</td>
							
				<?php } elseif ($shipping_method === 'Local pickup') { ?>
								<strong>PICK UP DATE: <?php echo date('m-d-Y - l', strtotime(get_post_meta( $order_id, 'jckwds_date', true ))) .' <br/> TIME SLOT:' . get_post_meta( $order_id, 'jckwds_timeslot', true ); ?></strong>
										</td>
					
			<?php	}  ?>

						</tr>
						<tr>
							<td colspan="2" style="border-bottom:1px solid">
								&nbsp;
							</td>
							<td style="width:4%">
								&nbsp;
							</td>
							<td rowspan="2">
								<strong>Recipient:</strong><br/> <?php echo $order->get_formatted_shipping_address(); ?>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								Recipient: <?php echo $order->shipping_first_name . ' ' . $order->shipping_last_name; ?>
							</td>
							
						</tr>
						<tr>
							<td colspan="2">
							<?php 
							$occasion = wc_get_order_item_meta($item_id, 'Occasion', true );
							?>							
								ITEM: <strong><?php echo $item_code . '</strong> OCCASION:' . '<span style="color:#777;font-style:italic;">';
								$bold = '';
								// if (in_array($occasion, $occasion_array)){
									// $bold = 'occ-bold';
								// }
								foreach ( $occasion_array as $occ ){
									if ($occ === $occasion){
									$bold = 'occ-bold';
								} 	else {
									$bold = '';
								}
									echo '<span class="' . $bold . '">' . $occ . ' </span>';
								}
								
								
								
								?></span>
							</td>							
						</tr>
						<tr>
							<td colspan="2"></td>
						</tr>
						<tr>
							<td colspan="2">
								<table style="margin:0">
									<tbody>
										<tr style="border-bottom:1px solid">
											<th>QTY</th>
											<th>DESCRIPTION</th>
											<th>COLORS</th>
											<th>UNIT PRICE</th>
											<th>TOTAL</th>
										</tr>
										<?php 
										$cnt = 1;
										foreach ( $order->get_items() as $item_key => $item ) :
										$product = $order->get_product_from_item($item);
										?>
										<tr>
											<td class="bold">
												<?php echo $cnt; ?>
											</td>
											<td class="bold">
												<?php echo $item_code . ' - ' . $item['name']; ?>
											</td>
											<td class="bold">
												Vibrant
											</td>
											<td class="bold">
												<?php echo wc_price($product->get_price()); ?>
											</td>
											<td class="bold">
												<?php echo wc_price($order->get_total()); ?>
											</td>
											
										</tr>
										<?php 
										$cnt++;
										endforeach;
										?>
									</tbody>
								</table>
							</td>
							<td style="width:4%">
								&nbsp;
							</td>
							<td rowspan="2">
								<strong>Sold To:</strong><br/> <?php echo $order->get_formatted_billing_address(); ?><br/>
								<?php echo $order->billing_phone; ?>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<strong>Designer Requests:</strong> <?php echo $designer_notes; ?> 
							</td>
						</tr>
						<tr>
							<td colspan="2">
							</td>
						</tr>
						<tr>
							<td colspan="2">
								Designer&rsquo;s Initials_____________   Date Made:______________
							</td>
							<?php 
							$driver_val = get_post_meta( $order_id, '_shipping_wcj_checkout_field_8', true ); 
							$business = strtoupper(get_post_meta( $order_id, '_shipping_wcj_checkout_field_5', true ));
							$driver = substr($driver_val, 0, strpos($driver_val, "M. "));
							?>
							<td style="width:4%">
								&nbsp;
							</td>
							<td>
								<strong>Driver:</strong>  <?php echo $business . ' ' . $driver_val . 'M.'; ?>
							</td>
						</tr>
					</tbody>
					<style>
					.printed { font-family: 'Great Vibes', cursive;font-size: 22px;line-height: 23px; }
					td.bold { padding: 0.8em 1.2em; font-weight:bold; }
					.container main { max-width: 4200px; } 
					.occ-bold { font-weight:bold;color:#000;}
					img { width:100px;margin-top:-40px;}
					table { margin: 1em 0 2em }
					table td {padding:0!important;}
					table, table tr, table td, table th {border:none;}
					.green { color:#a4b479; }
					</style>
					<?php
