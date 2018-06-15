<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-warning text-center">
                                    <i class="ti-server"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Payments</p>
                                    <?php
                                        $paymentsDAO = new paymentsDAO();
                                        echo $paymentsDAO->count();
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr/>
                            <div class="stats">
                                <i class="ti-info"></i> Total sum
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-success text-center">
                                    <i class="ti-wallet"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Payments</p>
                                    R$<?php
                                        $paymentsDAO = new paymentsDAO();
                                        echo $paymentsDAO->getLastMonth();
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr/>
                            <div class="stats">
                                <i class="ti-calendar"></i> Last Month
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-danger text-center">
                                    <i class="ti-pulse"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Average</p>
                                    R$<?php
                                        $paymentsDAO = new paymentsDAO();
                                        echo $paymentsDAO->avarageLastMonth();
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr/>
                            <div class="stats">
                                <i class="ti-timer"></i> In the last month
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-info text-center">
                                    <i class="ti-user"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Beneficiaries</p>
                                    <?php
                                        $beneficiariesDAO = new beneficiariesDAO();
                                        echo $beneficiariesDAO->count();
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr/>
                            <div class="stats">
                                <i class="ti-info"></i> Total
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Monthly beneficiaries</h4>
                        <p class="category">Every year</p>
                    </div>
                    <div class="content">
                        <div id="chartHours" class="ct-chart"></div>
                        <script type="text/javascript">

                        <?php
                            $paymentsDAO = new paymentsDAO();
                            $dados = $paymentsDAO->getTotalPerYear();
                            
                            echo "labelsA = [";
                            for($i = 0; $i<sizeof($dados[0]); $i++){
                                echo "'".processMonth($dados[0][$i])."'";
                                if($i < sizeof($dados[0])-1)
                                    echo ",";
                            }    
                            echo "];";

                            echo "dataA = [";
                            for($i = 0; $i<sizeof($dados[1]); $i++){
                                echo $dados[1][$i];
                                if($i < sizeof($dados[1])-1)
                                    echo ",";
                            }    
                            echo "];";
                        ?>

                        
                            $(document).ready(function(){

                                var data = {
                                  labels: labelsA,
                                  series: [
                                    dataA
                                  ]
                                };

                                new Chartist.Bar('#chartHours', data, null);
                            })
                        </script>

                        <div class="footer">
                            <div class="chart-legend">
                                <i class="fa fa-circle text-info"></i> Value
                                <i class="fa fa-circle text-danger"></i> Value
                                <i class="fa fa-circle text-warning"></i> Value
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="ti-info-alt"></i> Historic Serie | <i class="ti-export"></i><a> Export PDF</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Beneficiaries by state</h4>
                        <p class="category">Monthly update</p>
                    </div>
                    <div class="content">
                        <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>
       
                        <script type="text/javascript">

       <?php
                            $beneficiariesDAO = new beneficiariesDAO();
                            $dados = $beneficiariesDAO->totalPerMonth();
                            
                            echo "labelsB = [";
                            for($i = 0; $i<sizeof($dados[0]); $i++){
                                echo "'".($dados[0][$i])."'";
                                if($i < sizeof($dados[0])-1)
                                    echo ",";
                            }    
                            echo "];";

                            echo "dataB = [";
                            for($i = 0; $i<sizeof($dados[1]); $i++){
                                echo $dados[1][$i];
                                if($i < sizeof($dados[1])-1)
                                    echo ",";
                            }    
                            echo "];";
                        ?>
                     


                            $(document).ready(function(){

                                var data = {
                                  labels: labelsB,
                                  series: [
                                    dataB
                                   ]
                                };

                                new Chartist.Bar('#chartPreferences', data, null);
                            })
                        </script>

                        <div class="footer">
                            <div class="chart-legend">
                                <i class="fa fa-circle text-info"></i> Value
                                <i class="fa fa-circle text-danger"></i> Value
                                <i class="fa fa-circle text-warning"></i> Value
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="ti-timer"></i> Total | <i class="ti-export"></i><a> Export PDF</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card ">
                    <div class="header">
                        <h4 class="title">Values per state</h4>
                        <p class="category">Monthly update</p>
                    </div>
                    <div class="content">
                        <div id="chartActivity" class="ct-chart"></div>
 <script type="text/javascript">

       <?php
                            $paymentsDAO = new paymentsDAO();
                            $dados = $paymentsDAO->getValuesPerState();
                            
                            echo "labelsC = [";
                            for($i = 0; $i<sizeof($dados[0]); $i++){
                                echo "'".($dados[0][$i])."'";
                                if($i < sizeof($dados[0])-1)
                                    echo ",";
                            }    
                            echo "];";

                            echo "dataC = [";
                            for($i = 0; $i<sizeof($dados[1]); $i++){
                                echo $dados[1][$i];
                                if($i < sizeof($dados[1])-1)
                                    echo ",";
                            }    
                            echo "];";
                        ?>
                     


                            $(document).ready(function(){

                                var data = {
                                  labels: labelsC,
                                  series: [
                                    dataC
                                   ]
                                };

                                new Chartist.Bar('#chartActivity', data, null);
                            })
                        </script>



                        <div class="footer">
                            <div class="chart-legend">
                                <i class="fa fa-circle text-info"></i> Value
                                <i class="fa fa-circle text-warning"></i> Value
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="ti-check"></i> Last Month | <i class="ti-export"></i><a> Export PDF</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>