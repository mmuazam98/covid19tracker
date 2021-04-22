<?php include 'partials/navbar.php';?>
<?php
  $data = file_get_contents('https://api.covid19api.com/summary');
  $coronadata = json_decode($data,true);
?>
   <section id="cases" class="mt-5" >
        <div class="container">
            <div class="row">
               <div class="col-lg-4 col-md-6 col-sm-6 text-center mt-5 h4">
                    <i class="fas fa-viruses fa-5x"></i>
                    <h2 class="font-weight-bolder">Total Confirmed </h2>
                    <p class="counter" data-target="<?= $coronadata['Countries'][76]['TotalConfirmed'] ?>">
                      0
                    </p> 
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 text-center mt-5 h4">
                    <i class="fas fa-head-side-virus fa-5x"></i>
                    <h2 class="font-weight-bolder">New Confirmed</h2>
                    <p class="counter" data-target="<?= $coronadata['Countries'][76]['NewConfirmed'] ?>">
                      0
                    </p> 
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 text-center mt-5 h4">
                    <i class="fas fa-hands-wash fa-5x"></i>
                    <h2 class="font-weight-bolder">Total Recoveries</h2>
                    <p class="counter" data-target="<?= $coronadata['Countries'][76]['TotalRecovered'] ?>">
                      0
                    </p> 
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-6 text-center mt-5 h4">
                      <i class="fas fa-shield-virus fa-5x"></i>
                      <h2 class="font-weight-bolder">New Recoveries </h2>
                      <p class="counter" data-target="<?= $coronadata['Countries'][76]['NewRecovered'] ?>">
                        0
                      </p> 
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-6 text-center mt-5 h4">
                      <i class="fas fa-lungs-virus fa-5x"></i>
                      <h2 class="font-weight-bolder">Total Deaths</h2>
                      <p class="counter" data-target="<?= $coronadata['Countries'][76]['TotalDeaths'] ?>">
                        0
                      </p> 
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-6 text-center mt-5 h4">
                      <i class="fas fa-virus-slash fa-5x"></i>
                      <h2 class="font-weight-bolder">New Deaths</h2>
                      <p class="counter" data-target="<?= $coronadata['Countries'][76]['NewDeaths'] ?>">
                        0
                      </p> 
                  </div>
            </div><!-- row end-->
          </div><!-- container end-->
  </section>
      
   <div class="container line " id="line1"></div>
    
    <div class="container my-5 text-center">
         <i class="fas fa-virus fa-5x rotate"></i>
         <h3 class="font-weight-bold">State level: <u> Cases</u></h3>
    </div>
      
    <section class="mt-1">
    <div class="container ">
	 <div class="table-responsive"> 
	  <table class="table table-striped mt-1" id="dtBasicExample" cellspacing="0" width="100%">
        <thead class="thead-dark">
            <tr>
              
              <th scope="col">State</th>
              <th scope="col">Confirmed</th>
              <th scope="col">Active</th>
              <th scope="col">Recovered</th>
              <th scope="col">Deaths</th>
              
            </tr>
        </thead>
	<tbody>		
        <?php 
          $data = file_get_contents('https://api.covid19india.org/data.json');
          $coronalive = json_decode($data, true);
          $statescount = count($coronalive['statewise']); 
          $i=1;
          while($i < $statescount){

			  ?>

            <tr>
              <td class="dat"> <?= $coronalive['statewise'][$i]['state'] ?> </td>
              <td class="dat"> <span class="value"><?= $coronalive['statewise'][$i]['confirmed'] ?> </span></td>
              <td class="dat"> <span class="value"><?= $coronalive['statewise'][$i]['active'] ?></span> <div class="data">(+<?= $coronalive['statewise'][$i]['deltaconfirmed'] ?>)</div> </td>
              <td class="dat"> <span class="value"><?= $coronalive['statewise'][$i]['recovered'] ?> </span><div class="data">(+<?= $coronalive['statewise'][$i]['deltarecovered'] ?>)</div> </td>
              <td class="dat"> <span class="value"><?= $coronalive['statewise'][$i]['deaths'] ?> </span><div class="data">(+<?= $coronalive['statewise'][$i]['deltadeaths'] ?>)</div> </td>
            </tr>
        <?php
              $i++; 
          }
        ?>
	</tbody>
     </table>
	</div>
    </div>
    </section>

    <div class="container line " id="line1"></div>
    
    <div class="container my-5 text-center">
         <i class="fas fa-virus fa-5x rotate"></i>
         <h3 class="font-weight-bold">State Notes</h3>
    </div>


    <section class="mt-1">
      <div class="container ">
          <div class="table-responsive"> 
            <table class="table table-striped mt-1" id="dtBasicExample" cellspacing="0" width="100%">
              <thead class="thead-dark">
                  <tr>
                    
                    <th scope="col">State</th>
                    <th scope="col">Notes</th>
                  </tr>
              </thead>
              <tbody>		
              <?php 
                  $data = file_get_contents('https://api.covid19india.org/data.json');
                  $corona= json_decode($data, true);
                  $statescount = count($coronalive['statewise']); 
                  $i=1;
                  while($i < $statescount){
                      if($corona["statewise"][$i]["statenotes"]){
                    ?>
                    <tr>
                      <td class="dat"> 
                        <?php 
                              echo "<b>";
                              echo $corona["statewise"][$i]["state"];
                              echo "</b>";
                              echo ": ";
                           ?> 
                      </td>
                      <td class="dat"> 
                        <?php 
                              echo $corona["statewise"][$i]["statenotes"];
                              echo "<br><br>";
                          ?> 
                      </td>
                    </tr> 
                    <?php
                      }
                    $i++; 
                  }
                ?>
              </tbody>
            </table>
          </div>
       </div>
    </section>
    
<script>
  //  alert("Incase of any error, just refresh the page!");
</script>
<?php include 'partials/footer.php';?>
  