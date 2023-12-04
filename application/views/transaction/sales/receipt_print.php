<html moznomarginboxes mozdisallowselectionprint>
<head>
	<title>Kasir - Print Struk</title>
	<style type="text/css">
		html { font-family: "Verdana, Arial"; }
		.content {
			width: 48mm;
			font-size: 12px;
			padding: 15px;
		}
		.title {
			text-align: center;
			font-size: 13px;
			padding-bottom: 5px;
			border-bottom: 1px dashed;
		}
		.head {
			margin-top: 2px;
			margin-bottom: 10px;
			padding-bottom: 10px;
			border-bottom: 1px solid;
		}
		table {
			width: 100%;
			font-size: 10px; 
		}
		.thanks {
			margin-top: 10px;
			padding-top: 10px;
			text-align: center;
			border-top:1px dashed; 
		}
		@media print {
			@page{
				width: 43mm;
				margin: 0mm;
			}
		}
	</style>
</head>
<script>
	function printReceipt() {
		var style = document.createElement('style');
		style.innerHTML = '@media print { body { display: none; } }';
		document.head.appendChild(style);

            // Print the receipt
            window.print();

            // Remove the print styles
            document.head.removeChild(style);

            // Close the window after printing (Note: This might not work in all browsers)
            window.onafterprint = function () {
            	window.close();
            };
        }

        // Call the function when the page loads
        window.onload = function() {
        	printReceipt();
        };
    </script>
    <body onload="printReceipt()">
    	<div class="content">
    		<div class="title">
    			<b>Kasir</b>
    			<br>
    			Alamat
    		</div>

    		<div class="head">
    			<table cellspacing="0" cellpadding="0">
    				<tr>
    					<td>
    						<?php 
    						echo Date("d/m/Y", strtotime($sales->date))." ". Date("H:i", strtotime($sales->sales_created));
    						?>
    					</td>
    					<td>
    						<?=$sales->invoice?>
    					</td>
    				</tr>
    				<tr>
    					<td style="padding-top: 3px">Kasir <a style="margin-left: 22px; margin-right: 10px;">:</a><?=ucfirst($sales->user_name)?></td>
    				</tr>
    				<tr>
    					<td>Customer <a style="margin-left: 5px; margin-right: 10px">:</a><?=$sales->customer_id == null ? "Umum" : $sales->customer_name?></td>
    				</tr>
    			</table>
    		</div>

    		<div class="transaction">
    			<table class="transaction-table" cellspacing="5" cellpadding="0">
    				<?php
    				$arr_discount = array();
    				foreach ($sales_detail as $key => $value) { ?>
    					<tr>
    						
    						<td style="width: 200px; font-size: 9px; padding-right: 8px"><?=$value->name?></td>
    						<td style="font-size: 9px"><?=$value->qty?></td>
    						<td style="text-align: right; width: 650px; font-size: 8px"><?=indo_currency2($value->price)?></td>
    						<td style="text-align: right; width: 900px; font-size: 8px">
    							<?=indo_currency2(($value->price - $value->discount_item) * $value->qty)?>
    						</td>
    					</tr>

    					<?php
    					if ($value->discount_item > 0) {
    						$arr_discount[] = $value->discount_item;
    					} 
    				}

    				foreach ($arr_discount as $key => $value) { ?>
    					<tr>
    						<td></td>
    						<td colspan="2" style="text-align: right; padding-right: 5px;">Disc. <?=($key+1)?></td>
    						<td style="text-align: right; width: 500px; font-size: 8px;"><?=indo_currency2($value)?></td>
    					</tr>
    					<?php  
    				} ?>

    				<tr>
    					<td colspan="4" style="border-bottom:1px dashed; padding-top:5px"></td>
    				</tr>
    				<tr>
    					<td colspan="2"></td>
    					<td style="text-align: right; padding-top: 5px;">Sub Total</td>
    					<td style="text-align: right; padding-top: 5px;  width: 800px; font-size: 9px;">
    						<?=indo_currency2($sales->total_price)?>
    					</td>
    				</tr>
    				<?php if($sales->discount > 0) { ?>
    					<tr>
    						<td colspan="2"></td>
    						<td style="text-align: right; padding-top: 5px;">Disc. Sales</td>
    						<td style="text-align: right; padding-top: 5px; width: 800px; font-size: 9px;"><?=indo_currency2($sales->discount)?></td>
    					</tr>
    					<?php 
    				} ?>
    				<tr>
    					<td colspan="2"></td>
    					<td style="border-top: 1px dashed; text-align: right; padding: 5px 0;">Grand Total</td>
    					<td style="border-top: 1px dashed; text-align: right; padding: 5px 0; font-size: 9px;">
    						<?=indo_currency2($sales->final_price)?>
    					</td>
    				</tr>
    				<tr>
    					<td colspan="2"></td>
    					<td style="border-top: 1px dashed; text-align: right; padding-top: 5px;">Cash</td>
    					<td style="border-top: 1px dashed; text-align: right; padding-top: 5px; font-size: 9px;">
    						<?=indo_currency2($sales->cash)?>
    					</td>
    				</tr>
    				<tr>
    					<td colspan="2"></td>
    					<td style="text-align: right">Change</td>
    					<td style="text-align: right; font-size: 9px;"><?=indo_currency2($sales->change)?></td>
    				</tr>
    			</table>
    		</div>
    		<div class="thanks">
    			~~~ Thank You ~~~
    			<br>
    			Kasir.com
    		</div>
    	</div>
    </body>
    </html>