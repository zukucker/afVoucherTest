{extends file="parent:frontend/checkout/items/voucher.tpl"}
{block name="frontend_checkout_cart_item_voucher_details_sku"}
{$smarty.block.parent}
{foreach $afVouchers as $voucher}
	{if $sBasketItem.ordernumber == $voucher.ordercode}
		<p>Beschreibung: {$voucher.description}</p>
	{/if}
{/foreach}
{/block}
