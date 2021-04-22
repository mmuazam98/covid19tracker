<?php include 'partials/navbar.php';?>
<?php 
      $data = file_get_contents('https://api.covid19india.org/data.json');
      $corona = json_decode($data, true);
?>
<section id="cases" class="mt-5" >
   <div class="container">
      <div class="row">
         <div class="col-lg-4 col-md-6 mt-5 text-center">
            <img src="media/coronavirus.svg" alt="img" class="img" data-aos="fade-left" data-aos-delay="200">
         </div>
         <div class="col-lg-8 col-md-6">
            <div class="row">
              <?php 
                  $i=0;
                  while($i < 38){
                    if($corona["statewise"][$i]["state"]=="Jammu and Kashmir"){
                        break;
                    }
                    $i++;
                  }
              ?>
               <div class="col-lg-6 col-sm-6 text-center mt-5 h4">
                  <i class="fas fa-viruses fa-5x"></i>
                  <h2 class="font-weight-bolder">Total Cases</h2>
                  <!--<p> 26,468 <b>(+185)</b></p>-->
                  
                  <p id="totalcases" class="counter" data-target="<?= $corona["statewise"][$i]["confirmed"]?>">
                     0
                  </p>
               </div>
               <div class="col-lg-6 col-sm-6 text-center mt-5 h4">
                  <i class="fas fa-lungs-virus fa-5x"></i>
                  <h2 class="font-weight-bolder">Total Deaths</h2>
                  <p class="counter" data-target="<?= $corona["statewise"][$i]["deaths"]?>">
                     0
                  </p>
                  
               </div>
               <div class="col-lg-6 col-sm-6 text-center mt-5 h4">
                  <i class="fas fa-head-side-virus fa-5x"></i>
                  <h2 class="font-weight-bolder">Total Active Cases</h2>
                  <p class="counter" data-target="<?= $corona["statewise"][$i]["active"]?>">
                     0
                  </p>
               </div>
               <div class="col-lg-6 col-sm-6 text-center mt-5 h4">
                  <i class="fas fa-virus-slash fa-5x"></i>
                  <h2 class="font-weight-bolder">Total Recoveries</h2>
                  <p class="counter"data-target="<?= $corona["statewise"][$i]["recovered"]?>">
                     0
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<div class="container line " id="line1"></div>
<div class="container my-5 text-center">
   <i class="fas fa-virus fa-5x rotate"></i>
   <h3 class="font-weight-bold">District level: <u> Cases</u></h3>
</div>
<section class="mt-1">
   <div class="container" style="margin: auto">
      <div class="table-responsive">
         <table class="table table-striped table-hover mt-1 text-center" id="dtBasicExample" cellspacing="0" width="100%">
            <thead class="thead-dark table_cases">
               <tr>
                  <th scope="col">District</th>
                  <th scope="col">Cases</th>
                  <th scope="col">Deaths</th>
                  <th scope="col">Recovered</th>
                  <th scope="col">Zone</th>
               </tr>
            </thead>
            <tbody class="district_cases">
               <?php
                  $dataState = file_get_contents('https://api.covid19india.org/v2/state_district_wise.json');
                  $coronadata = json_decode($dataState,true);
                  $dataZone = file_get_contents('https://api.covid19india.org/zones.json');
                  $zones = json_decode($dataZone,true);
                  $count = count($coronadata);
                  $j=0;
                  for($j=0;$j<$count;$j++){
                     if($coronadata[$j]["state"] =="Jammu and Kashmir")
                        break;
                  }
                  $totalDistricts = count($coronadata[$j]["districtData"]);
                  $i=0;
                  $k=247;
                  while($i < $totalDistricts&&$k<269){
                  ?>
               <tr>
                  <td id="district"> <?= $coronadata[$j]["districtData"][$i]["district"];?></td>
                  <td id="distCases"><span class="value"> <?= $coronadata[$j]["districtData"][$i]["confirmed"];?></span> <strong class="data">(+<?= $coronadata[$j]["districtData"][$i]["delta"]["confirmed"];?>)</strong></td>
                  <td id="distCases"><span class="value"> <?= $coronadata[$j]["districtData"][$i]["deceased"];?></span> <strong class="data">(+<?= $coronadata[$j]["districtData"][$i]["delta"]["deceased"];?>)</strong></td>
                  <td id="distCases"><span class="value"> <?= $coronadata[$j]["districtData"][$i]["recovered"];?></span> <strong class="data">(+<?= $coronadata[$j]["districtData"][$i]["delta"]["recovered"];?>)</strong></td>
                  <td>
                     <?php 
                        if($zones['zones'][$k]['zone'])
                          echo $zones['zones'][$k]['zone'];
                        else
                          echo "n/a"  
                     ?>
                  </td>
               </tr>
               <?php
                  $i++;
                  $k++;
                }
               ?>
            </tbody>
         </table>
      </div>
   </div>
</section>
<div class="container line " id="line1"></div>

<?php include 'partials/footer.php';?>


