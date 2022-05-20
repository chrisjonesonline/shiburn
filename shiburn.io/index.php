<?php error_reporting(E_ERROR|E_PARSE); //todo: add exception handler for null inputs, etc. ?>
<html>
    <head>
        <title>shiburn.io</title>
        <link rel="stylesheet" href="assets/css/main.css">
    </head>
    <body>
<?php require_once ('assets/php/etherscanApi.php'); ?>
<?php require_once ('assets/php/jsonArray.php'); ?>
<?php require_once ('assets/php/variables.php'); ?>
        
        <?php include_once ('assets/php/header.php'); ?>
        <div class="wrapper">
        
        <?php
        #############################
        #START LIST ALL TRANSACTIONS#
        #############################
        foreach (array_reverse($jsonArray->result) as $result) {
            
            #################
            #START VARIABLES#
            #################
            
            $date = date('l, m/d/Y, H:i:s ',$result->timeStamp);
            $from = $result->from;
            $burned = number_format($result->value / 1000000000000000000);
            $usdValue = number_format(($result->value / 1000000000000000000) * 0.000032);
            $txHash = $result->hash;
            
            ###############
            #END VARIABLES#
            ###############
            
            ##########################
            #START PRINT TRANSACTIONS#
            ##########################
            
			
            echo "<div class='searchable' data-index='$from'>";
            
                echo "<b>Date: </b>"; echo $date;
                echo "<br />";
                echo "<b>From: </b>"; echo "<a href='https://etherscan.io/tx/"; echo $txHash; echo "' target='_blank'>"; echo $from; echo "</a>";
                echo "<br />";
                echo "<b>Amount: </b>"; echo $burned;
                echo "<br />";
                echo "<b>USD Value: </b>≈ $"; echo $usdValue;
                echo "<br />";
            
            echo "</div>";
            
            ########################
            #END PRINT TRANSACTIONS#
            ########################
        }
        ###########################
        #END LIST ALL TRANSACTIONS#
        ###########################
        ?>
        
        
        <?php
        #################
        #START DEBUGGING#
        #################
        ?>
        
        <?php
        #PRINT jsonArray
            #echo "<pre>";
            #echo ("<b>Debugging:</b> Print jsonArray ");
            #print_r($jsonArray);
            #echo "</pre>";
        ?>
        
        <?php
        #PRINT jsonArray1
            #echo "<pre>";
            #echo ("<b>Debugging:</b> Print jsonArray ");
            #print_r($jsonArray1);
            #echo "</pre>";
        ?>
        
        <?php
        #PRINT $url API Request
            #echo ("<b>Debugging:</b> url API Request ");
            #echo file_get_contents($url);
        ?>
        
        <?php
        #PRINT $burnedSupply API Request
            #echo ("<b>Debugging:</b> burnedSupply API Request ");
            #echo file_get_contents($burnedSupply);
        ?>
        
        <?php
        ###############
        #END DEBUGGING#
        ###############
        ?>
        
        
        <?php include_once ('assets/php/footer.php'); ?>
        </div>
    </body>
	<script src="assets/js/search.js"></script>
    <script src="assets/js/etherscanApi.js"></script>
</html>