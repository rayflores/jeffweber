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
							<td rowspan="3" style="width: 35%;">
								Logohere
							</td>
							<td style="width: 25%;">
								DELIVERY LOG:
							</td>
							<td style="width: 40%;" rowspan="3">
								Roundlogohere
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
								<br/>
								<hr/>
								<br/>
								<br/>
								<hr/>
							</td>
							<td rowspan="4" class="message">
								<p>
									Thank you for your dedication to the JDF event. Your great<br/>
									ideas, tireless energy and amazing organizational skills were<br/>
									a huge part of making this our most successful year yet! You</br/>
									have your own fan club at Marsteller.<br/>
									<span>From Sarah, Dianne,<br/>
									and all of the JDF 2017 Gala Committee Members</span></p>
							</td>
						</tr>
						<tr class="deliverydate bold">
							<td>
								DELIVERY DATE: <?php echo date('m-d-Y', get_post_meta($order_id, 'jckwds_date', true)); ?>
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
							<td>
								<small>robinwoodflowers.com 513-531-5590</small>
							</td>
							<td>
								Driver&#39;s Initials ________
							</td>
							<td>
								<small>robinwoodflowers.com 513-531-5590</small>
							</td>
						</tr>
						<tr class="orderdetails">
							<td colspan="2"></td>
							<td>
								ORD. NO: <?php echo $order_id; ?>&nbsp;&nbsp;Taken: <?php echo date('m-d-y h:i:s A', strtotime($order->order_date)); ?>&nbsp;&nbsp;Sold By: LS
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<span style="width:75%">ORD. NO: <?php echo $order_id; ?>&nbsp;&nbsp;Taken: <?php echo date('m-d-y h:i:s A', strtotime($order->order_date)); ?>&nbsp;&nbsp;Sold By: LS</span><span class="sigbox" style="width:25%;border:1px solid;padding: 1% 13% 5%;margin: 0 3%;"></span>
							</td>
							<td>
								Printed: <?php echo date( 'Y-m-d H:i:s', current_time( 'timestamp' ) ); ?>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<strong>DELIVERY DATE: <?php echo date('m-d-Y - l', strtotime(get_post_meta( $order_id, 'jckwds_date', true ))); ?></strong>
							</td>
							<td>
								ITEM: <?php echo $item_code . ' ' . strtoupper($item_code_name); ?>
							</td>
						</tr>
					</tbody>
					<?php