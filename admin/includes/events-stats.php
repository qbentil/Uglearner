<?php

    $events = new Event("../");
    $timeFormat = 'Y-m-d H:i:s';
    $today = new DateTime();
    $now = $today->format($timeFormat);
    // echo $date;
    
    ?>
    
    <div class="row">
        <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
            <div class="widget-card widget-bg1">					 
                <div class="wc-item">
                    <h4 class="wc-title text-uppercase font-weight-bold">
                        All
                    </h4>
                    <span class="wc-des">
                        events
                    </span>
                    <span class="wc-stats counter">
                        <?php 
                            echo $total = $events->count();
                        ?>
                    <!-- 16 -->
                </span>	
                <div class="progress wc-progress">
                    <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <span class="wc-progress-bx">
                    <span class="wc-change">
                        Change
                    </span>
                    <span class="wc-number ml-auto">
                        100%
                    </span>
                </span>
            </div>				      
        </div>
    </div>
    <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
        <div class="widget-card widget-bg2">					 
            <div class="wc-item">
                <h4 class="wc-title text-uppercase font-weight-bold">
                    Happening
                </h4>
                <span class="wc-des">
                    events
                </span>
                <span class="wc-stats counter">
                <?php
                        $rule = "WHERE `start` = '$now'";
                        echo $hap =  $events->count($rule);
                    ?>
                </span>	
                <div class="progress wc-progress">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo ($hap/$total)*100 ?>%;" aria-valuenow="<?php echo $hap ?>" aria-valuemin="0" aria-valuemax="<?php echo $total ?>"></div>
                </div>	
                <span class="wc-progress-bx">
                    <span class="wc-change">
                        Change
                    </span>
                    <span class="wc-number ml-auto">
                        <!-- 88% -->
                        <?php echo ($hap/$total)*100 ?>%
                    </span>
                </span>
            </div>				      
        </div>
    </div>
    <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
        <div class="widget-card widget-bg3">					 
            <div class="wc-item">
                <h4 class="wc-title text-uppercase font-weight-bold">
                    Upcoming 
                </h4>
                <span class="wc-des">
                    Events
                </span>

                <span class="wc-stats counter">
                <?php
                        $rule = "WHERE `start` > '$now'";
                        echo $up =  $events->count($rule);
                    ?>
                </span>	
                <div class="progress wc-progress">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo ($up/$total)*100 ?>%;" ></div>
                </div>	
                <span class="wc-progress-bx">
                    <span class="wc-change">
                        Change
                    </span>
                    <span class="wc-number ml-auto">
                        <!-- 65% -->
                        <?php echo ($up/$total)*100 ?>%
                    </span>
                </span>
            </div>				      
        </div>
    </div>
    <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
        <div class="widget-card widget-bg4">					 
            <div class="wc-item">
                <h4 class="wc-title text-uppercase font-weight-bold">
                    Expired
                </h4>
                <span class="wc-des">
                    events
                </span>
                <span class="wc-stats counter">
                    <?php
                        $rule = "WHERE `start` < '$now'";
                        echo $ex = $events->count($rule);

                    ?>
                </span>	
                <div class="progress wc-progress">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo  ($ex/$total)*100 ?>%;" aria-valuenow="<?php echo  $ex ?>" aria-valuemin="0" aria-valuemax="<?php echo $total ?>"></div>
                </div>	
                <span class="wc-progress-bx">
                    <span class="wc-change">
                        Change
                    </span>
                    <span class="wc-number ml-auto">
                        <!-- 90% -->
                        <?php echo ($ex/$total)*100 ?>%
                    </span>
                </span>
            </div>				      
        </div>
    </div>
</div>