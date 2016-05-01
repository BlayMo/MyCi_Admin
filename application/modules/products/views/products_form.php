<div id="page-content-wrapper">
        <div class="container-fluid">
        <h2 style="margin-top:0px">Products <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">ProductName <?php echo form_error('productName') ?></label>
            <input type="text" class="form-control" name="productName" id="productName" placeholder="ProductName" value="<?php echo $productName; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">ProductLine <?php echo form_error('productLine') ?></label>
            <input type="text" class="form-control" name="productLine" id="productLine" placeholder="ProductLine" value="<?php echo $productLine; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">ProductScale <?php echo form_error('productScale') ?></label>
            <input type="text" class="form-control" name="productScale" id="productScale" placeholder="ProductScale" value="<?php echo $productScale; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">ProductVendor <?php echo form_error('productVendor') ?></label>
            <input type="text" class="form-control" name="productVendor" id="productVendor" placeholder="ProductVendor" value="<?php echo $productVendor; ?>" />
        </div>
	    <div class="form-group">
            <label for="productDescription">ProductDescription <?php echo form_error('productDescription') ?></label>
            <textarea class="form-control" rows="3" name="productDescription" id="productDescription" placeholder="ProductDescription"><?php echo $productDescription; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="smallint">QuantityInStock <?php echo form_error('quantityInStock') ?></label>
            <input type="text" class="form-control" name="quantityInStock" id="quantityInStock" placeholder="QuantityInStock" value="<?php echo $quantityInStock; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">BuyPrice <?php echo form_error('buyPrice') ?></label>
            <input type="text" class="form-control" name="buyPrice" id="buyPrice" placeholder="BuyPrice" value="<?php echo $buyPrice; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">MSRP <?php echo form_error('MSRP') ?></label>
            <input type="text" class="form-control" name="MSRP" id="MSRP" placeholder="MSRP" value="<?php echo $MSRP; ?>" />
        </div>
	    <input type="hidden" name="productCode" value="<?php echo $productCode; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('products') ?>" class="btn btn-default">Cancel</a>
	</form>
        </div>
</div>