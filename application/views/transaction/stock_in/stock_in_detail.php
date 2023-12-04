        <section class="section">
         <div class="section-header">
          <h1 class="text-black">Detail Stock Masuk</h1>
        </div>
        <?php $this->load->view("_partials/breadcrumb.php") ?>
      </section>
      <?php foreach($row as $d) : ?>
        <div class="card">
          <div class="card-body">
            
            <div class="col-md-7">
              <table class="table">
                <tr>
                  <td>Barcode</td>
                  <td><?php echo $d->barcode ?></td>
                </tr>

                <tr>
                  <td>Item</td>
                  <td><?php echo $d->item_name ?></td>
                </tr>

                <tr>
                  <td>Qty</td>
                  <td><?php echo $d->qty ?></td>
                </tr>

                <tr>
                  <td>Price</td>
                  <td><?php echo $d->price ?></td>
                </tr>

                <tr>
                  <td>Detail</td>
                  <td><?php echo $d->detail ?></td>
                </tr>

                <tr>
                  <td>Supplier</td>
                  <td><?php echo $d->supplier_name ?></td>
                </tr>

                <tr>
                  <td>Date</td>
                  <td><?php echo indo_date($d->date) ?></td>
                </tr>
                


              </table>
              <a class="btn btn btn-danger ml-4" href="<?php echo base_url('stock/in/') ?>">Back</a>
            </div> 
          </div>
          
        </div>
        
      <?php endforeach; ?>
      

