<?php include 'partials/navbar.php';?>
<?php
  $data = file_get_contents('https://api.covid19api.com/summary');
  $coronalive = json_decode($data, true);
?>
  <section id="cases" class="mt-5" >
      <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 text-center mt-5 h4">
              <i class="fas fa-lungs-virus fa-5x"></i>
              <h2 class="font-weight-bolder">Total Confirmed </h2>
              <p class="counter" data-target="<?= $coronalive['Global']['TotalConfirmed'] ?>">
                0
              </p> 
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 text-center mt-5 h4">
              <i class="fas fa-head-side-virus fa-5x"></i>
              <h2 class="font-weight-bolder">New Confirmed</h2>
              <p class="counter" data-target="<?= $coronalive['Global']['NewConfirmed'] ?>">
                0
              </p>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 text-center mt-5 h4">
              <i class="fas fa-hands-wash fa-5x"></i>
              <h2 class="font-weight-bolder">Total Recoveries</h2>
              <p class="counter" data-target="<?= $coronalive['Global']['TotalRecovered'] ?>">
                0
              </p>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 text-center mt-5 h4">
              <i class="fas fa-shield-virus fa-5x"></i>
              <h2 class="font-weight-bolder">New Recoveries </h2>
              <p class="counter" data-target="<?= $coronalive['Global']['NewRecovered'] ?>">
                0
              </p>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 text-center mt-5 h4">
              <i class="fas fa-viruses fa-5x"></i>
              <h2 class="font-weight-bolder">Total Deaths</h2>
              <p class="counter" data-target="<?= $coronalive['Global']['TotalDeaths'] ?>">
                0
              </p>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 text-center mt-5 h4">
              <i class="fas fa-virus-slash fa-5x"></i>
              <h2 class="font-weight-bolder">New Deaths</h2>
              <p class="counter" data-target="<?= $coronalive['Global']['NewDeaths'] ?>">
                0
              </p>
            </div>
        </div><!--row end-->
    </div><!--container end-->               
  </section>


    
      <?php
         $data= file_get_contents('https://api.kawalcorona.com/');
         $country = json_decode($data, true);
      ?>
    <section class="mt-5">  
      <div class="container">
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="myInput" onkeyup="search()" placeholder="Search for countries..." aria-label="Search">
          <div class="input-group-append">
            <span class="input-group-text" id="basic-addon2"><i class="fas fa-search"></i></span>
          </div>
        </div>
        <div class="table-responsive">
            
            <table class="table table-striped table-hover " id="myTable">
                <thead class="thead-dark">
                    <tr>
                      <th scope="col">S.No.</th>
                      <th scope="col">Country</th>
                      <th scope="col">Confirmed</th>
                      <th scope="col">Recovered</th>
                      <th scope="col">Active</th>
                      <th scope="col">Deaths</th>
                      
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    <?php foreach ( $country as $row ): ?>
                    <tr>
                      <th scope="row"><?= $i; ?></th>
                        <td><?= $row['attributes']['Country_Region'] ?></td>
                        <td><?= $row['attributes']['Confirmed'] ?></td>
                        <td><?= $row['attributes']['Recovered'] ?></td>
                        <td><?= $row['attributes']['Active'] ?></td>
                        <td><?= $row['attributes']['Deaths'] ?></td>
                    </tr>
                    <?php $i++ ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
      </div>
    </section>

      
<script>
  function search() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }
  //  alert("Incase of any error, just refresh the page!");
</script>

<?php include 'partials/footer.php';?>
