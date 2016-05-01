 <div id="page-content-wrapper">
        <div class="container-fluid">
        <h2 style="margin-top:0px">Products List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('products/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('products/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('products'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>ProductName</th>
		<th>ProductLine</th>
		<th>ProductScale</th>
		<th>ProductVendor</th>
		<th>ProductDescription</th>
		<th>QuantityInStock</th>
		<th>BuyPrice</th>
		<th>MSRP</th>
		<th>Action</th>
            </tr><?php
            foreach ($products_data as $products)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $products->productName ?></td>
			<td><?php echo $products->productLine ?></td>
			<td><?php echo $products->productScale ?></td>
			<td><?php echo $products->productVendor ?></td>
			<td><?php echo $products->productDescription ?></td>
			<td><?php echo $products->quantityInStock ?></td>
			<td><?php echo $products->buyPrice ?></td>
			<td><?php echo $products->MSRP ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('products/read/'.$products->productCode),'Read'); 
				echo ' | '; 
				echo anchor(site_url('products/update/'.$products->productCode),'Update'); 
				echo ' | '; 
				echo anchor(site_url('products/delete/'.$products->productCode),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
         </div>
        </div>
   