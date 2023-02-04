<ul class="nav nav-tabs d-flex justify-content-start align-items-center" id="tableTab" role="tablist">
  <li class="nav-item" role="presentation">
      <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">All Trx</button>
  </li>
  <li class="nav-item" role="presentation">
      <button class="nav-link" id="success-tab" data-bs-toggle="tab" data-bs-target="#success" type="button" role="tab" aria-controls="success" aria-selected="false">Success</button>
  </li>
  <li class="nav-item" role="presentation">
      <button class="nav-link" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="false">Pending</button>
  </li>
  <li class="nav-item" role="presentation">
      <button class="nav-link" id="failed-tab" data-bs-toggle="tab" data-bs-target="#failed" type="button" role="tab" aria-controls="failed" aria-selected="false">Packaging</button>
  </li>
</ul>
<div class="tab-content" id="tableTabContent">
  <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
      <div class="table-responsive">
          <table class="table table-borderless transaction-table w-100 active" id="table-all">
              <thead>
                  <tr>
                      <th>Gambar</th>
                      <th>Nama Produk</th>
                      <th>Total</th>
                      <th class="status-header">Status</th>
                      <th class="action-header">Action</th>
                  </tr>
              </thead>

              <tbody>
                Semua
              </tbody>

          </table>
      </div>
  </div>

  <div class="tab-pane fade" id="success" role="tabpanel" aria-labelledby="success-tab">
      <div class="table-responsive">
          <table class="table table-borderless transaction-table w-100" id="table-success">
              <thead>
                  <tr>
                      <th>Game</th>
                      <th>Item</th>
                      <th>Price</th>
                      <th class="status-header">Status</th>
                      <th class="action-header">Action</th>
                  </tr>
              </thead>

              <tbody>
                Success
              </tbody>

          </table>
      </div>

  </div>

  <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
      <div class="table-responsive">
              

          <table class="table table-borderless transaction-table w-100" id="table-pending">
              <thead>
                  <tr>
                      <th>Game</th>
                      <th>Item</th>
                      <th>Price</th>
                      <th class="status-header">Status</th>
                      <th class="action-header">Action</th>
                  </tr>
              </thead>

              <tbody>
                Pending
              </tbody>

          </table>



      </div>

  </div>

  <div class="tab-pane fade" id="failed" role="tabpanel" aria-labelledby="failed-tab">
      <div class="table-responsive">
         

          <table class="table table-borderless transaction-table w-100" id="table-failed">
              <thead>
                  <tr>
                      <th>Game</th>
                      <th>Item</th>
                      <th>Price</th>
                      <th class="status-header">Status</th>
                      <th class="action-header">Action</th>
                  </tr>
              </thead>

              <tbody>
                Failed
              </tbody>

          </table>


      </div>

  </div>

</div>