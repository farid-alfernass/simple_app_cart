@extends('layouts.app')
@section('page-style')
    <style media="screen">
    .online{
        color: #32CD32;
    }
    .ffside {
        height: 100%;
        position: fixed;
        z-index: 1;
        top: 0;
        right: 0;
        width: 18em;
        overflow-x: hidden;
        padding-top: 50px;
    }
    .chat_box{
        width:260px;
        padding: 5px;
        position: fixed;
        bottom: 0px;
    }
    </style>
@stop
@section('content')
    <!-- <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" id="chatApp">
                <div class="panel panel-default ffside">
                    <div class="panel-heading">Users</div>
                    <div class="panel-body" style="padding:0px;">
                        <ul class="list-group">
                            <li class="list-group-item" v-for="chatList in chatLists" style="cursor: pointer;" @click="chat(chatList)">@{{ chatList.name }}  <i class="fa fa-circle pull-right" v-bind:class="{'online': (chatList.online=='Y')}"></i>  <span class="badge" v-if="chatList.msgCount !=0">@{{ chatList.msgCount }}</span></li>
                            <li class="list-group-item" v-if="socketConnected.status == false">@{{ socketConnected.msg }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="container-fluid">
                    <div id="chart1" class="col-md-4"></div>
                    <div id="chart2" class="col-md-4"></div>
                    <div id="chart3" class="col-md-4"></div>
                </div>
                <div class="container-fluid">
                    <div id="chart4" class="col-md-12"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <!-- <script src="{{ asset('js/chat.js') }}" charset="utf-8"></script> -->
    <script type="text/javascript" src="{{ asset('js/fusionchart/fusioncharts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/fusionchart/fusioncharts.charts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/fusionchart/themes/fusioncharts.theme.fint.js?cacheBust=56') }}"></script>

    <script type="text/javascript">
        FusionCharts.ready(function() {
            var chart = new FusionCharts({
                type: 'bar3d',//Type : column2d,column3d,bar2d,bar3d,pie2d,pie3d,doughnut2d,doughnut3d,line,area2d
                renderAt:'chart4',
                dataFormat: 'json',
                dataSource:{
                    "chart":{
                        "theme"     : "fint",
                        "paletteColors": "#0075c2",
                        "bgColor": "#ffffff",
                        "showBorder": "0",
                        "showCanvasBorder": "0",
                        "plotBorderAlpha": "10",
                        "usePlotGradientColor": "0",
                        "plotFillAlpha": "50",
                        "showXAxisLine": "1",
                        "axisLineAlpha": "25",
                        "divLineAlpha": "10",
                        "showValues": "1",
                        "showAlternateHGridColor": "0",
                        "captionFontSize": "14",
                        "subcaptionFontSize": "14",
                        "subcaptionFontBold": "0",
                        "toolTipColor": "#ffffff",
                        "toolTipBorderThickness": "0",
                        "toolTipBgColor": "#000000",
                        "toolTipBgAlpha": "80",
                        "toolTipBorderRadius": "2",
                        "toolTipPadding": "5",
                        "caption": "Jumlah Mahasiswa Per Prodi",
                    },
                    "data" :[
                                <?php
                                $i=0;
                                $colors = explode(',', '#008ee4,#9b59b6,#6baa01,#e44a00,#9ce6ae,#009e78,#001f8f,#ff7852,#ebff26,#0073e6,#f05eff,#00decc');
                                foreach ($chartmhs as $row):
                                    if($i++)
                                        echo ",";
                            ?>
                            {"label": "<?php echo $row->jenis_kelamin; ?>","value":"<?php echo $row->jumlah; ?>","color":"<?php echo $colors[$i] ?>"},
                            <?php
                                endforeach;
                            ?>
                            ]
                }
            });

            chart.render('chart4');
        });
    </script>

    <script type="text/javascript">
        FusionCharts.ready(function() {
            var chart = new FusionCharts({
                type: 'column2d',//Type : column2d,column3d,bar2d,bar3d,pie2d,pie3d,doughnut2d,doughnut3d,line,area2d
                renderAt:'chart1',
                dataFormat: 'json',
                dataSource:{
                    "chart":{
                        "theme"     : "fint",
                        "paletteColors": "#0075c2",
                        "bgColor": "#ffffff",
                        "showBorder": "0",
                        "showCanvasBorder": "0",
                        "plotBorderAlpha": "10",
                        "usePlotGradientColor": "0",
                        "plotFillAlpha": "50",
                        "showXAxisLine": "1",
                        "axisLineAlpha": "25",
                        "divLineAlpha": "10",
                        "showValues": "1",
                        "showAlternateHGridColor": "0",
                        "captionFontSize": "14",
                        "subcaptionFontSize": "14",
                        "subcaptionFontBold": "0",
                        "toolTipColor": "#ffffff",
                        "toolTipBorderThickness": "0",
                        "toolTipBgColor": "#000000",
                        "toolTipBgAlpha": "80",
                        "toolTipBorderRadius": "2",
                        "toolTipPadding": "5",
                        "caption": "Jumlah Mahasiswa Per Prodi",
                    },
                    "data" :[
                                <?php
                                $i=0;
                                $colors = explode(',', '#008ee4,#9b59b6,#6baa01,#e44a00,#9ce6ae,#009e78,#001f8f,#ff7852,#ebff26,#0073e6,#f05eff,#00decc');
                                foreach ($chartprodi as $row):
                                    if($i++)
                                        echo ",";
                            ?>
                            {"label": "<?php echo $row->nama_prodi; ?>","value":"<?php echo $row->jumlah; ?>","color":"<?php echo $colors[$i] ?>"},
                            <?php
                                endforeach;
                            ?>
                            ]
                }
            });

            chart.render('chart1');
        });
    </script>

    <script type="text/javascript">
        FusionCharts.ready(function() {
            var chart = new FusionCharts({
                type: 'pie2d',//Type : column2d,column3d,bar2d,bar3d,pie2d,pie3d,doughnut2d,doughnut3d,line,area2d
                renderAt:'chart2',
                dataFormat: 'json',
                dataSource:{
                    "chart":{
                        "theme"     : "fint",
                        "paletteColors": "#0075c2",
                        "bgColor": "#ffffff",
                        "showBorder": "0",
                        "showCanvasBorder": "0",
                        "plotBorderAlpha": "10",
                        "usePlotGradientColor": "0",
                        "plotFillAlpha": "50",
                        "showXAxisLine": "1",
                        "axisLineAlpha": "25",
                        "divLineAlpha": "10",
                        "showValues": "1",
                        "showAlternateHGridColor": "0",
                        "captionFontSize": "14",
                        "subcaptionFontSize": "14",
                        "subcaptionFontBold": "0",
                        "toolTipColor": "#ffffff",
                        "toolTipBorderThickness": "0",
                        "toolTipBgColor": "#000000",
                        "toolTipBgAlpha": "80",
                        "toolTipBorderRadius": "2",
                        "toolTipPadding": "5",
                        "caption": "Jumlah Mahasiswa Laki-laki",
                        "subCaption": "Berdasarkan Prodi"
                    },
                    "data" :[
                                <?php
                                $i=0;
                                $colors = explode(',', '#008ee4,#9b59b6,#6baa01,#e44a00,#9ce6ae,#009e78,#001f8f,#ff7852,#ebff26,#0073e6,#f05eff,#00decc');
                                foreach ($chartL as $row):
                                    if($i++)
                                        echo ",";
                            ?>
                            {"label": "<?php echo $row->nama_prodi; ?>","value":"<?php echo $row->jumlah; ?>","color":"<?php echo $colors[$i] ?>"},
                            <?php
                                endforeach;
                            ?>
                            ]
                }
            });

            chart.render('chart2');
        });
    </script>

    <script type="text/javascript">
        FusionCharts.ready(function() {
            var chart = new FusionCharts({
                type: 'pie2d',//Type : column2d,column3d,bar2d,bar3d,pie2d,pie3d,doughnut2d,doughnut3d,line,area2d
                renderAt:'chart3',
                dataFormat: 'json',
                dataSource:{
                    "chart":{
                        "theme"     : "fint",
                        "paletteColors": "#0075c2",
                        "bgColor": "#ffffff",
                        "showBorder": "0",
                        "showCanvasBorder": "0",
                        "plotBorderAlpha": "10",
                        "usePlotGradientColor": "0",
                        "plotFillAlpha": "50",
                        "showXAxisLine": "1",
                        "axisLineAlpha": "25",
                        "divLineAlpha": "10",
                        "showValues": "1",
                        "showAlternateHGridColor": "0",
                        "captionFontSize": "14",
                        "subcaptionFontSize": "14",
                        "subcaptionFontBold": "0",
                        "toolTipColor": "#ffffff",
                        "toolTipBorderThickness": "0",
                        "toolTipBgColor": "#000000",
                        "toolTipBgAlpha": "80",
                        "toolTipBorderRadius": "2",
                        "toolTipPadding": "5",
                        "caption": "Jumlah Mahasiswa Perempuan",
                        "subCaption": "Berdasarkan Prodi"
                    },
                    "data" :[
                                <?php
                                $i=0;
                                $colors = explode(',', '#008ee4,#9b59b6,#6baa01,#e44a00,#9ce6ae,#009e78,#001f8f,#ff7852,#ebff26,#0073e6,#f05eff,#00decc');
                                foreach ($chartP as $row):
                                    if($i++)
                                        echo ",";
                            ?>
                            {"label": "<?php echo $row->nama_prodi; ?>","value":"<?php echo $row->jumlah; ?>","color":"<?php echo $colors[$i] ?>"},
                            <?php
                                endforeach;
                            ?>
                            ]
                }
            });

            chart.render('chart3');
        });
    </script>
@stop
