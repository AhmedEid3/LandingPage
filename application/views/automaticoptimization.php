 <main id="main">
    <div class="dashboard-header">
      <ol class="breadcrumb">
        <li><a href="#">Automatic Rules</a></li>
        <?php if (isset($adaccountsCount) && $adaccountsCount > 1) { ?>

        <?php }else{?>
          <li class="active"><?php echo $accountName; ?></li>
        <?php } ?>
      </ol>
    </div>
    <div id="preloaderMain" style="display: none;">
            <div id="statusMain"><i class="fa fa-spinner fa-spin"></i></div>
        </div>
    <?php if (isset($adaccountsCount) && $adaccountsCount > 1) { ?>
        <div class="container-fluid">
          <div class="detail-status-holder">
            <div class="table-holder responsive">
              <form action="#">
                <table class="table account-data-table">
                  <colgroup>
                    <col class="col5">
                    <col class="col6">
                    <col class="col7">
                    <col class="col8">
                    <col class="col9">
                    <col class="col10">
                    <col class="col11">
                    <col class="col12">
                    <col class="col13">
                    <col class="col14">
                  </colgroup>
                  <thead>
                    <tr>
                      <th><span class="sort-tag"><span>Ad Account Name</span></span></th>
                      <th><span class="sort-tag"><span>ACTIONS</span></span></th>
                      <th><span class="sort-tag"><span>Ad Account ID</span></span></th>
                      <th><span class="sort-tag"><span>Status</span></span></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        foreach ($adaccounts as $adaccount) {
                        ?>
                            <tr> 
                                <td><?php echo $adaccount->add_title; ?></td>
                                <td><a href="<?php echo site_url('automaticoptimization/' . $adaccount->ad_account_id); ?>">Add Automatic Optimization Rule</a></td>
                                <td><?php echo $adaccount->ad_account_id; ?></td>
                                <td><?php
                                    if ($adaccount->status == 1) {
                                        echo "active";
                                    } else {
                                        echo "Not active";
                                    }
                                    ?></td>
                                
                            </tr>
                    <?php
                        }
                    ?>
                  </tbody>
                </table>
              </form>
            </div>
          </div>
        </div>
    <?php }else{ ?>
    <div class="container">
      <div class="automatic_activity_holder">
        <div class="automatic_activity_box">
          <div class="activity-header">
            <h2 class="title">New Automated Rule For <?php echo $accountName; ?></h2>
          </div>
          <strong class="title-text">CHOOSE THE CAMPAIGN YOU WANT THE RULE APPLIED TO</strong>
          <form action="<?php echo base_url().'automaticoptimization/create_automaticoptimization'; ?>" method="post" name="create_creaautomopt_frm" id="create_creaautomopt_frm">
            <div class="content-holder">
              <div class="select-wrap">

                <select id="campaignsid" name="autoopti[campaignsid]" required="">
                  <option>click to choose your campaign</option>
                  <?php  if (isset($adaccounts['campaigns'])){ 

                  foreach ($adaccounts['campaigns'] as $campaign){  ?>
                    <option value="<?php echo $campaign['campaign_id']; ?>"><?php echo $campaign['campaign_name']; ?></option>  
                  <?php  } } ?> 
                </select>
                <input type="hidden" id="addAccountId" name="autoopti[addAccountId]" value="<?php echo $addAccountId; ?>">
              </div>
            </div>
            <strong class="title-text">ENTER THE AUTOMATED RULE YOU WANT TO APPLY TO ALL ADS INSIDE THE SPECIFIED CAMPAIGN</strong>
            <div class="content-holder">
                <div class="automated-rule-row">
                  <span class="title-info">IF</span>
                  <div class="inline-element">
                    <select id="acparam1" name="autoopti[param1]">
                      <option value="1">Impression</option>
                      <option value="2">Spent</option>
                    </select>
                  </div>
                  <span class="title-info">is</span>
                  <div class="inline-element">
                    <select id="acparam2" name="autoopti[param2]">
                      <option value="1">Greater</option>
                      <option value="2">Less</option>
                    </select>
                  </div>
                  <span class="title-info">than</span>
                  <div class="inline-element">
                    <input type="text" class="form-control" placeholder="1,000" value="1000" id="acparam3" name="autoopti[param3]">
                  </div>
                  <span class="title-info">&amp;</span>
                  <div class="inline-element">
                    <select id="acparam4" name="autoopti[param4]" class="autoopvariable">
                      <option value="1">CPC </option>
                      <option value="2">CTR </option>
                      <option value="3">Cost Per Engagement </option>
                      <option value="4">Cost Per Conversion </option>
                      <option value="5">Cost Per Page Like </option>
                    </select>
                  </div>
                  <span class="title-info">is</span>
                  <div class="inline-element">
                    <select id="acparam5" name="autoopti[param5]">
                      <option value="1">Greater</option>
                      <option value="2">Less</option>
                    </select>
                  </div>
                  <span class="title-info">than</span>
                  <div class="inline-element">
                    <input type="text" class="form-control" placeholder="1,000" value="1000" id="acparam6" name="autoopti[param6]">
                  </div>
                  <span class="title-info">then <a href="#">PAUSE</a> ad.</span>
                </div>
                <div class="btn-wrap text-center">
                <input type="hidden" id="theidautocamp" name="theidautocamp" value="0" />
                  <button type="submit" class="btn btn-success btn-save">Save &amp; Activate Rule</button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php } ?>
    <?php if (isset($automaticoptimizationdata) && $adaccountsCount < 2) { ?>
    <div class="container-fluid">
      <div class="detail-status-holder">
        <div class="table-holder responsive">
          <form action="#">
            <table class="table account-data-table">
              <colgroup>
                <col class="col5">
                <col class="col6">
                <col class="col7">
                <col class="col8">
                <col class="col9">
                <col class="col10">
                <col class="col11">
                <col class="col12">
                <col class="col13">
                <col class="col14">
              </colgroup>
              <thead>
                <tr>
                  <th><span class="sort-tag"><span>Campaign</span></span></th>
                  <th><span class="sort-tag"><span>Parameter 1</span></span></th>
                  <th><span class="sort-tag"><span>Parameter 2</span></span></th>
                  <th><span class="sort-tag"><span>Parameter 3</span></span></th>
                  <th><span class="sort-tag"><span>Parameter 4</span></span></th>
                  <th><span class="sort-tag"><span>Parameter 5</span></span></th>
                  <th><span class="sort-tag"><span>Parameter 6</span></span></th>
                  <th><span class="sort-tag"><span>Action</span></span></th>
                </tr>
              </thead>
              <tbody>
                    <?php
                        foreach ($automaticoptimizationdata as $autoopti) {
                            ?>
                            <tr> 
                                <td>
                                <input type="hidden" value="<?php echo $autoopti['id']; ?>" id="autocampid<?php echo $autoopti['id'] ; ?>" />
                                <input type="hidden" value="<?php echo $autoopti['campaignsid']; ?>" id="autocampcampid<?php echo $autoopti['id'] ; ?>" />
                                <input type="hidden" value="<?php echo $autoopti['param1']; ?>" id="param1<?php echo $autoopti['id'] ; ?>" />
                                <input type="hidden" value="<?php echo $autoopti['param2']; ?>" id="param2<?php echo $autoopti['id'] ; ?>" />
                                <input type="hidden" value="<?php echo $autoopti['param3']; ?>" id="param3<?php echo $autoopti['id'] ; ?>" />
                                <input type="hidden" value="<?php echo $autoopti['param4']; ?>" id="param4<?php echo $autoopti['id'] ; ?>" />
                                <input type="hidden" value="<?php echo $autoopti['param5']; ?>" id="param5<?php echo $autoopti['id'] ; ?>" />
                                <input type="hidden" value="<?php echo $autoopti['param6']; ?>" id="param6<?php echo $autoopti['id'] ; ?>" />
                                <?php 

                                    foreach ($adaccounts['campaigns'] as $campaign){
                                        if($autoopti['campaignsid'] == $campaign['campaign_id']){
                                            echo $campaign['campaign_name'];
                                        }
                                    } 
                                  ?>
                                
                                </td>
                                <td>
                                  <?php 
                                    if($autoopti['param1'] == "1") echo "Impression "; 
                                    else echo "Spent "; 
                                  ?>
                                </td>
                                <td>
                                  <?php 
                                    if($autoopti['param2'] == "1") echo "Greater Than Equal To"; 
                                    else echo "Less Than "; 
                                  ?>
                                </td>
                                <td><?php echo $autoopti['param3'] ; ?></td>
                                <td>
                                <?php 
                                  if($autoopti['param4'] == "1") echo "CPC "; 
                                  elseif($autoopti['param4'] == "2") echo "CTR "; 
                                  elseif($autoopti['param4'] == "3") echo "Cost Per Engagement "; 
                                  elseif($autoopti['param4'] == "4") echo "Cost Per Conversion "; 
                                  elseif($autoopti['param4'] == "5") echo "Cost Per Page Like "; 
                                  ?>
                                </td>
                                <td>
                                  <?php 
                                    if($autoopti['param5'] == "1") echo "Greater Than Equal To"; 
                                    else echo "Less Than "; 
                                  ?>
                                </td>
                                <td><?php echo $autoopti['param6'] ; ?></td>
                                <td>
                                  <a href="javascript:void(0)" onclick='return edititcamp(<?php echo $autoopti['id']; ?>)'>Edit</a>
                                  <a href="javascript:void(0)" onclick="DeleteAutomaticoptimization(<?php echo $autoopti['id']; ?>)">Delete</a>
                                </td>
                            </tr>
                                    <?php
                                    
                                }
                                ?>
              </tbody>
            </table>
          </form>
        </div>
      </div>
    </div>
    <style>
	.jcf-select-autoopvariable{
		width:auto !important;
	}
	</style>
    <script type="text/javascript">
        function edititcamp(id){
             document.getElementById("theidautocamp").value = document.getElementById("autocampid"+id).value;
             document.getElementById("campaignsid").value = document.getElementById("autocampcampid"+id).value;
             document.getElementById("acparam1").value = document.getElementById("param1"+id).value;
             var s = document.getElementById("param2"+id).value;
             //$('#acparam2 option[value='+s+']').attr('selected','selected');
             document.getElementById("acparam2").value = document.getElementById("param2"+id).value;
             document.getElementById("acparam3").value = document.getElementById("param3"+id).value;
             document.getElementById("acparam4").value = document.getElementById("param4"+id).value;
             document.getElementById("acparam5").value = document.getElementById("param5"+id).value;
             document.getElementById("acparam6").value = document.getElementById("param6"+id).value;
             initCustomForms();
            return false;
        }
    </script>
    <?php } ?>  
  </main>