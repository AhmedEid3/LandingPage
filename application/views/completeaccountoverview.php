<!-- Main Content Starts -->
      <main id="main">

        <div class="dashboard-header">
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url().'reports'; ?>">Dashboard</a></li>
                <li class="active"><?php echo substr($adaccounts['campaign_header']['accountName'], 0, 19); ?></li>
            </ol>
            <?php if (isset($adaccountsCount) && $adaccountsCount == 1) { ?>
                <a class="btn btn-date" id="reportrange">
                  <strong class="ico-holder"><i class="icon-calendar"></i></strong>
                  <span class="text range-data">
                    <select class="form-control tcmreportdd" name="changeDateRange" onchange="getCampaign('<?php echo $addAccountId; ?>', this.value)">
                      
                      <option value="today" <?php if($limit == 'today') echo 'selected'; ?>>Today</option>
                      <option value="yesterday" <?php if($limit == 'yesterday') echo 'selected'; ?>>Yesterday</option>
                      <option value="last_3d" <?php if($limit == 'last_3d') echo 'selected'; ?>>Last 3 Days</option>
                      <option value="last_7d" <?php if($limit == 'last_7d') echo 'selected'; ?>>Last 7 Days</option>
                      <option value="last_14d" <?php if($limit == 'last_14d') echo 'selected'; ?>>Last 14 Days</option>
                      <option value="last_28d" <?php if($limit == 'last_28d') echo 'selected'; ?>>Last 28 Days</option>
                      <option value="last_30d" <?php if($limit == 'last_30d') echo 'selected'; ?>>Last 30 Days</option>
                      <option value="last_90d" <?php if($limit == 'last_90d') echo 'selected'; ?>>Last 90 Days</option>
                      <option value="this_month" <?php if($limit == 'this_month') echo 'selected'; ?>>This Month</option> 
                      <option value="last_month" <?php if($limit == 'last_month') echo 'selected'; ?>>Last Month</option>
                      <option value="this_quarter" <?php if($limit == 'this_quarter') echo 'selected'; ?>>This Quarter</option>                      
                      <option value="this_year" <?php if($limit == 'this_month') echo 'selected'; ?>>This Year</option> 
                      <option value="last_year" <?php if($limit == 'last_month') echo 'selected'; ?>>Last Year</option>
                      <option value="lifetime" <?php if($limit == 'lifetime') echo 'selected'; ?>>Lifetime</option>
                    </select>
                  </span>
                </a>
                <style>
				.jcf-select-tcmreportdd{
					width:auto !important;
				}
                </style>
            <?php } ?>
        </div>
        <?php if (isset($adaccountsCount) && $adaccountsCount > 1) { ?>
            <div class="container-fluid">
                <div class="ad-account-holder">
                    <div class="table-responsive">
                        <table class="table account-data-table">
                            <colgroup>
                              <col class="col1">
                              <col class="col2">
                              <col class="col3">
                              <col class="col4">
                            </colgroup>
                            <thead>
                              <tr>
                                
                                <th><span class="sort-tag"><span>AD ACCOUNT NAME</span> <i class="icon-sort"></i></span></th>
<th>ACTIONS</th>
                                <th><span class="sort-tag"><span>AD ACCOUNT ID</span> <i class="icon-sort"></i></span></th>
                                <th><span class="sort-tag"><span>STATUS</span> <i class="icon-sort"></i></span></th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($adaccounts as $adaccount) {
                                ?>
                                    <tr>

<td class="title"><?php echo $adaccount->add_title; ?></td>
<td>
                                            <a href="<?php echo site_url('reports/' . $adaccount->ad_account_id); ?>" class="btn btn-info btn-x-small">
                                                View Reports
                                            </a>
                                        </td>
                                        
                                        
                                        <td class="account-id"><?php echo $adaccount->ad_account_id; ?></td>
                                        <td class="status">
                                            <?php
                                            if ($adaccount->status == 1) {
                                                echo "active";
                                            } else {
                                                echo "Not active";
                                            }
                                            ?>
                                        </td> 
                                    </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php } else if (isset($adaccountsCount) && $adaccountsCount == 1) { ?>
          <div class="page-content campaigns">
            <div class="data-row">
              <div class="dashboard-holder js-masonry" data-masonry-options='{"columnWidth": 1, "itemSelector": ".data-col", "percentPosition": true }'>
                <div class="data-col">
                  <div class="data-show-box">
                    <div class="data-header">
                      <?php if($this->session->userdata['user_subs']['packgid'] != '8'){ ?>
                       <a href="<?php echo site_url('spendreports/index/'.base64_encode('clicks').'/' . $addAccountId); ?>" class="btn-show-more">Show More</a>
                      <?php } else { ?>
                      <a href="#" class="btn-show-more" onclick="showupgradepopup()">Show More</a>
                      <?php } ?>
                      <strong class="title">CLICKS</strong>
                    </div>
                    <div class="data-content graph-data click-div">
                      <div class="text-holder">
                        <strong class="title"><?php echo number_format($adaccounts['campaign_header']['inline_link_clicks']); ?></strong>
                        <span class="sub-text">
                            <?php
                            if ($adaccounts['campaign_header']['spent'] > 0)
                            {
                                $cost_per_click = $adaccounts['campaign_header']['spent'] / $adaccounts['campaign_header']['inline_link_clicks'];
                                if ($cost_per_click > 0)
                                {
                                    echo $this->session->userdata('cur_currency') . round(number_format($cost_per_click, 3, '.', ','),2);
                                }
                                else
                                {
                                    echo $this->session->userdata('cur_currency') . round(number_format($cost_per_click),2);
                                }
                            }
                            else
                            {
                                echo $this->session->userdata('cur_currency') . $adaccounts['campaign_header']['inline_link_clicks'];
                            }
							/*if ($adaccounts['campaign_header']['cost_per_inline_link_click2'] > 0)
                            {
                                $cost_per_click = $adaccounts['campaign_header']['cost_per_inline_link_click2'];
                                if ($cost_per_click > 0)
                                {
                                    echo $this->session->userdata('cur_currency') . round(number_format($cost_per_click, 3, '.', ','),2);
                                }
                                else
                                {
                                    echo $this->session->userdata('cur_currency') . round(number_format($cost_per_click),2);
                                }
                            }
                            else
                            {
                                echo $this->session->userdata('cur_currency') . $adaccounts['campaign_header']['cost_per_inline_link_click2'];
                            }*/
                            ?> per click
                            <?php //echo $adaccounts['campaign_header']['cost_per_inline_link_click2']; ?>
                        </span>
                      </div>
                      <div class="data-holder">
                        <div id="click-data-chart" class=""></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="data-col w1">
                  <div class="data-show-box">
                    <div class="data-header">
                      <?php if($this->session->userdata['user_subs']['packgid'] != '8'){ ?>
                      <a href="<?php echo site_url('spendreports/index/'.base64_encode('spend').'/' . $addAccountId); ?>" class="btn-show-more">Show More</a>
                      <?php } else { ?>
                      <a href="#" class="btn-show-more" onclick="showupgradepopup()">Show More</a>
                      <?php } ?>
                      <strong class="title">TOTAL SPENT</strong>
                      
                    </div>
                    <div class="data-content graph-data">
                      <div class="text-holder">
                        <strong class="title">
                          <?php
                          if ($adaccounts['campaign_header']['spent'] > 0) {
                              echo $this->session->userdata('cur_currency') . number_format($adaccounts['campaign_header']['spent'], 2, '.', ',');
                          } else {
                              echo $this->session->userdata('cur_currency') . number_format($adaccounts['campaign_header']['spent']);
                          }
                          ?>
                        </strong>
                      </div>
                      <div class="data-holder spent-div">
                        <div id="spent-data-chart"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="data-col">
                  <div class="data-show-box">
                    <div class="data-header">
                      <?php if($this->session->userdata['user_subs']['packgid'] != '8'){ ?>
                      <a href="<?php echo site_url('spendreports/index/'.base64_encode('page_engagement').'/' . $addAccountId); ?>" class="btn-show-more">Show More</a>
                      <?php } else { ?>
                      <a href="#" class="btn-show-more" onclick="showupgradepopup()">Show More</a>
                      <?php } ?>

                      <strong class="title">ENGAGEMENT</strong>
                     
                    </div>
                    <div class="data-content graph-data engagement-div">
                      <div class="text-holder">
                        <strong class="title"><?php echo number_format($adaccounts['campaign_header']['inline_post_engagement']); ?></strong>
                        <span class="sub-text">
                            <?php
                                echo $this->session->userdata('cur_currency').round(($adaccounts['campaign_header']['spent']/$adaccounts['campaign_header']['inline_post_engagement']),2);
                            ?> per engagement
                        </span>
                      </div>
                      <div class="data-holder">
                        <div id="engagement-data-chart"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="data-col long-desktop">
                  <div class="data-show-box xx-small-height">
                    <div class="freq-box">
                      <div class="ico-holder">
                        <i class="icon-calendar"></i>
                      </div>
                      <div class="freq-desc">
                        <strong class="title">FREQ</strong>
                        <strong class="count">
                        <?php echo number_format($adaccounts['campaign_header']['newFrequ'], 2); ?> Times</strong>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="data-col long-desktop">
                  <div class="data-show-box long-height">
                    <div class="data-header">
                      <strong class="title">PLACEMENT</strong>
                      
                    </div>
                    <div class="data-content placement-div">
                      <div class="progress-holder">
                        <strong class="title-text"><span class="num" id="desktop">2 324</span> <span class="sub-text">Desktop News Feed</span></strong>
                        <div class="progress-container">
                          <div class="progress progress-1">
                            <div class="progress-bar" id="desktopPer-1" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                              <span class="sr-only">60% Complete</span>
                            </div>
                          </div>
                          <div class="progress-info" id="desktopPer">30%</div>
                        </div>
                      </div>
                      <div class="progress-holder">
                        <strong class="title-text"><span class="num" id="mobile">124</span> <span class="sub-text">Mobile News Feed</span></strong>
                        <div class="progress-container">
                          <div class="progress progress-2">
                            <div class="progress-bar" id="mobilePer-1" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                              <span class="sr-only">60% Complete</span>
                            </div>
                          </div>
                          <div class="progress-info" id="mobilePer">20%</div>
                        </div>
                      </div>
                      <div class="progress-holder">
                        <strong class="title-text"><span class="num" id="right_hand">324</span> <span class="sub-text">Desktop RHS</span></strong>
                        <div class="progress-container">
                          <div class="progress progress-3">
                            <div class="progress-bar" id="right_handPer-1" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
                              <span class="sr-only">60% Complete</span>
                            </div>
                          </div>
                          <div class="progress-info" id="right_handPer">20%</div>
                        </div>
                      </div>
                      <div class="progress-holder">
                        <strong class="title-text"><span class="num" id="mobile_external_only">1 724</span> <span class="sub-text">3rd Party Mobile Sites</span></strong>
                        <div class="progress-container">
                          <div class="progress progress-4">
                            <div class="progress-bar" id="mobile_external_onlyPer-1" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 55%">
                              <span class="sr-only">60% Complete</span>
                            </div>
                          </div>
                          <div class="progress-info" id="mobile_external_onlyPer">20%</div>
                        </div>
                      </div>
                      <div class="progress-holder">
                        <strong class="title-text"><span class="num" id="instant_article">1 724</span> <span class="sub-text">Instagram</span></strong>
                        <div class="progress-container">
                          <div class="progress progress-4">
                            <div class="progress-bar" id="instant_articlePer-1" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 55%">
                              <span class="sr-only">60% Complete</span>
                            </div>
                          </div>
                          <div class="progress-info" id="instant_articlePer">57%</div>
                        </div>
                      </div>
                    </div>
                  </div>                  
                </div>
                <div class="data-col">
                  <div class="data-show-box">
                    <div class="data-header">

<?php if($this->session->userdata['user_subs']['packgid'] != '8'){ ?> 
                      <a href="<?php echo site_url('spendreports/index/'.base64_encode('like').'/' . $addAccountId); ?>" class="btn-show-more">Show More</a>
                      <?php } else { ?>
                      <a href="#" class="btn-show-more" onclick="showupgradepopup()">Show More</a>
                      <?php } ?>

                      <strong class="title">PAGE LIKES</strong>
                     
                    </div>
                    <div class="data-content graph-data pagelike-div">
                      <div class="text-holder">
                        <strong class="title"><?php echo number_format($adaccounts['campaign_header']['page_like']); ?></strong>
                        <span class="sub-text">
                            <?php
                                echo $this->session->userdata('cur_currency').round(($adaccounts['campaign_header']['spent']/$adaccounts['campaign_header']['page_like']), 2);
                                ?> per like
                        </span>
                      </div>
                      <div class="data-holder pagelike-div">
                        <div id="page-link-data-chart" class=""></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="data-col">
                  <div class="data-show-box">
                    <div class="data-header">
 

                     <?php if($this->session->userdata['user_subs']['packgid'] != '8'){ ?> 
                      <a href="<?php echo site_url('spendreports/index/'.base64_encode('impressions').'/' . $addAccountId); ?>" class="btn-show-more">Show More</a>
                      <?php } else { ?>
                      <a href="#" class="btn-show-more" onclick="showupgradepopup()">Show More</a>
                      <?php } ?>


                      <strong class="title">IMPRESSIONS</strong>

                    </div>
                    <div class="data-content graph-data">
                      <div class="text-holder">
                        <strong class="title">
                          <?php
                            echo number_format($adaccounts['campaign_header']['impressions']);
                          ?>
                        </strong>
                        <span class="sub-text">$<?php
                            //echo number_format($adaccounts['campaign_header']['cpm']);
							if($adaccounts['campaign_header']['impressions'] != '0'){
								$subcpc = $adaccounts['campaign_header']['impressions']/1000;
								echo round($adaccounts['campaign_header']['spent']/$subcpc,2);
							}
                          ?> cpm</span>
                      </div>
                      <div class="data-holder ctr-div">
                        <div id="impressions-data-chart"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="data-col">
                  <div class="data-show-box">
                    <div class="data-header">

 <?php if($this->session->userdata['user_subs']['packgid'] != '8'){ ?>
                       <a href="<?php echo site_url('spendreports/index/'.base64_encode('ctr').'/' . $addAccountId); ?>" class="btn-show-more">Show More</a>
                      <?php } else { ?>
                      <a href="#" class="btn-show-more" onclick="showupgradepopup()">Show More</a>
                      <?php } ?>

                      <strong class="title">CTR</strong>
                     
                    </div>
                    <div class="data-content graph-data">
                      <div class="text-holder">
                        <strong class="title">
                          <?php
                                echo number_format((($adaccounts['campaign_header']['inline_link_clicks']/$adaccounts['campaign_header']['impressions'])*100), 2, '.', ',');
								//echo number_format($adaccounts['campaign_header']['inline_link_click_ctr'], 2, '.', ',');
								
                            ?>%
                        </strong>
                      </div>
                      <div class="data-holder impression-div">
                        <div id="click-rate-data-chart"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="data-col">
                  <div class="data-show-box">
                    <div class="data-header">

<?php if($this->session->userdata['user_subs']['packgid'] != '8'){ ?>
                       <a href="<?php echo site_url('spendreports/index/'.base64_encode('offsite_conversion').'/' . $addAccountId); ?>" class="btn-show-more">Show More</a>
                      <?php } else { ?>
                      <a href="#" class="btn-show-more" onclick="showupgradepopup()">Show More</a>
                      <?php } ?>

                      <strong class="title">CONVERSIONS</strong>
                      
                    </div>
                    <div class="data-content graph-data conversion-div">
                      <div class="text-holder">
                        <strong class="title"><?php echo number_format($adaccounts['campaign_header']['actions']); ?></strong>
                        <span class="sub-text">
                            <?php
                                if ($adaccounts['campaign_header']['cost_per_total_action'] > 0)
                                {
                                    echo $this->session->userdata('cur_currency') . number_format($adaccounts['campaign_header']['cost_per_total_action'], 2, '.', ',');
                                }
                                else
                                {
                                    echo $this->session->userdata('cur_currency') . number_format($adaccounts['campaign_header']['cost_per_total_action']);
                                }
                            ?> per conversion
                        </span>
                      </div>
                      <div class="data-holder">
                        <div id="conversions-data-chart" class=""></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="data-col">
                  <div class="data-show-box">
                    <div class="data-header">
                      <strong class="title">GENDER</strong>
                     
                    </div>
                    <div class="data-content graph-data male-female-div cntntBoxs">
                      <div id="data-gender"></div>
                    </div>
                  </div>
                </div>
                <div class="data-col">
                  <div class="data-show-box">
                    <div class="data-header">
                      <strong class="title">LOCATIONS</strong>
                      
                    </div>
                    <div class="data-content graph-data country-div">
                      <div id="data-locations"></div>
                    </div>
                  </div>
                </div>
                <div class="data-col w2">
                  <div class="data-show-box">
                    <div class="data-header">
                      <strong class="title">AGE GROUPS</strong>
                     
                    </div>
                    <div class='data-content graph-data age age-div'>
                      <div id="data-age-groups">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="data-col w3">
                  <div class="data-show-box bar-data">
                    <div class="data-header">
                      <strong class="title">TIME</strong>
                   
                    </div>
                    <div class='data-content graph-data time-div cntntBoxs'>
                      <div id="data-time-bar">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="container-fluid">
              <div class="detail-status-holder">
                <div class="table-holder">
                  <form action="#">
                    <table class="table account-data-table dt-responsive nowrap" id="datatable-responsive">
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
                          <th><span class="sort-tag"><span>STATUS</span> <i class="icon-sort"></i></span></th>
                          <th><span class="sort-tag"><span>CAMPAIGN NAME</span> <i class="icon-sort"></i></span></th>
                          <th><span class="sort-tag"><span>CLICKS</span> <i class="icon-sort"></i></span></th>
                          <th><span class="sort-tag"><span>CONVERSIONS</span> <i class="icon-sort"></i></span></th>
                          <th><span class="sort-tag"><span>PAGE LIKES</span> <i class="icon-sort"></i></span></th>
                          <th><span class="sort-tag"><span>ENGAGEMENT</span> <i class="icon-sort"></i></span></th>
                          <th><span class="sort-tag"><span>CTR</span> <i class="icon-sort"></i></span></th>
                          <th><span class="sort-tag"><span>IMPRESSIONS</span> <i class="icon-sort"></i></span></th>
                          <th><span class="sort-tag"><span>SPENT</span> <i class="icon-sort"></i></span></th>
                          <th><span class="sort-tag"><span>DATE</span> <i class="icon-sort"></i></span></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
						//echo "<pre>";
						//print_r($adaccounts['campaigns']);
						//echo "</pre>";
						
                            if (isset($adaccounts['campaigns'])){ 
                                foreach ($adaccounts['campaigns'] as $campaign){
                                    $uniqueId = 'lcs_check_'.rand();
                                    ?>
                                        <tr>
                                            <?php if($campaign['campaign_effective_status'] == 'Active'){
                                                ?>
                                                  <td class="status">
                                                    <label class="switch-button">
                                                      <input type="checkbox" checked name="check-1" value="<?php echo $campaign['campaign_id']; ?>" id="<?php echo $uniqueId; ?>" onchange="fnChangeCheck('<?php echo $uniqueId; ?>', '<?php echo $campaign['campaign_id']; ?>')">
                                                        <span class="fake-toggle">
                                                          <span class="switch">&nbsp;</span>
                                                        </span>
                                                      </label>
                                                    </td>
                                                <?php
                                            }
                                            else if($campaign['campaign_effective_status'] == 'In Review'){
                                                ?>
                                                    <td align="center" class="pt-n inreview">
                                                        <div class="checker disabled">
                                                            <span>
                                                                <div class="lcs_wrap">
                                                                    <div class="lcs_switch  lcs_off lcs_disabled lcs_checkbox_switch">
                                                                        <div class="lcs_cursor"></div>
                                                                        <div class="lcs_label lcs_label_on"><span class="fa fa-exclamation"></span></div>
                                                                        <div class="lcs_label lcs_label_off"><span class="fa fa-exclamation"></span></div>
                                                                    </div>
                                                                </div>
                                                            </span>
                                                        </div>
                                                    </td>
                                                <?php
                                            }
                                            else if($campaign['campaign_effective_status'] == 'Denied'){
                                                ?>
                                                    <td align="center" class="pt-n decline">
                                                        <div class="checker disabled">
                                                            <span>
                                                                <div class="lcs_wrap">
                                                                    <div class="lcs_switch  lcs_off lcs_disabled lcs_checkbox_switch">
                                                                        <div class="lcs_cursor"></div>
                                                                        <div class="lcs_label lcs_label_on"><span class="fa fa-times"></span></div>
                                                                        <div class="lcs_label lcs_label_off"><span class="fa fa-times"></span></div>
                                                                    </div>
                                                                </div>
                                                            </span>
                                                        </div>
                                                    </td>
                                                <?php
                                            }
                                            else{
                                                ?>
                                                    <td class="status">
                                                        <label class="switch-button">
                                                            <input type="checkbox" name="check-1" class="lcs_check" value="<?php echo $campaign['campaign_id']; ?>" id="<?php echo $uniqueId; ?>" onchange="fnChangeCheck('<?php echo $uniqueId; ?>', '<?php echo $campaign['campaign_id']; ?>')">
                                                            <span class="fake-toggle">
                                                            <span class="switch">&nbsp;</span>
                                                        </span>
                                                        </label>
                                                    </td>
                                                <?php
                                            } ?>
                                            <td class="title">
                                                <a href='<?php echo site_url('addset/' . $addAccountId . '/' . $campaign['campaign_id']); ?>'>
                                                    <?php echo $campaign['campaign_name'] ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?php
                                                    if ($campaign['campaign_inline_link_clicks'] > 0)
                                                    {
                                                        echo number_format($campaign['campaign_inline_link_clicks']);
                                                    }
                                                    else
                                                    {
                                                        echo $campaign['campaign_inline_link_clicks'];
                                                    }
                                                ?> @ 
                                                <?php
                                                    if ($campaign['campaign_cost_per_inline_link_click'] == '--')
                                                    {
                                                        echo '--';
                                                    }
                                                    else
                                                    {
                                                        echo $this->session->userdata('cur_currency') . number_format($campaign['campaign_cost_per_inline_link_click'], 2, '.', ',');
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $campaign['campaign_actions'];
                                                ?>
                                                @ 
                                                <?php echo ($campaign['campaign_cost_per_total_action'] > 0) ? $this->session->userdata('cur_currency') . number_format($campaign['campaign_cost_per_total_action'], 2, '.', ',') : $this->session->userdata('cur_currency') . $campaign['campaign_cost_per_total_action']; ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if ($campaign['page_like'] > 0)
                                                    {
                                                        echo number_format($campaign['page_like']);
                                                    }
                                                    else
                                                    {
                                                        echo $campaign['page_like'];
                                                    }
                                                ?> @ 
                                                <?php
                                                    if ($campaign['cost_per_like1'] == '--')
                                                    {
                                                        echo '--';
                                                    }
                                                    else
                                                    {
                                                        echo $this->session->userdata('cur_currency') . number_format($campaign['cost_per_like1'], 2, '.', ',');
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if ($campaign['inline_post_engagement'] > 0)
                                                    {
                                                        echo number_format($campaign['inline_post_engagement']);
                                                    }
                                                    else
                                                    {
                                                        echo $campaign['inline_post_engagement'];
                                                    }
                                                ?> @ 
                                                <?php
                                                    if ($campaign['cost_per_inline_post_engagement'] == '--')
                                                    {
                                                        echo '--';
                                                    }
                                                    else
                                                    {
                                                        echo $this->session->userdata('cur_currency') . number_format($campaign['cost_per_inline_post_engagement'], 2, '.', ',');
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php echo number_format((($campaign['campaign_inline_link_clicks']/$campaign['campaign_impressions'])*100), 2, '.', ',');
												//echo number_format($campaign['campaign_unique_ctr'], 2, '.', ','); ?>%
                                            </td>
                                            <td>
                                                <?php echo number_format($campaign['campaign_impressions']); ?>
                                            </td>
                                            <td>
                                                <b><?php echo $this->session->userdata('cur_currency') . number_format($campaign['campaign_spent'], 2, '.', ','); ?></b>
                                            </td>
                                            <td>
                                                <?php echo date("d/m/y", strtotime($campaign['campaign_created_time'])); ?>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            }
                        ?>
                      </tbody>
                    </table>
                    
                  </form>
                </div>
              </div>
            </div>
          </div>
            <input type="hidden" id="addAccountId" name="addAccountId" value="<?php echo $addAccountId; ?>">
            <input type="hidden" id="pageName" name="pageName" value="campaignsReport">
            <input type="hidden" id="pageName1" name="pageName1" value="campaignsReport">
            <input type="hidden" id="dayLimit" name="dayLimit" value="<?php echo $this->session->userdata('dateval'); ?>">
        <?php } ?>
      </main>
      <!-- Main Content Ends -->