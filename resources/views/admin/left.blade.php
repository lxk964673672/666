
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">

    <title> hAdmin- 主页</title>

    <meta name="keywords" content="">
    <meta name="description" content="">

    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

    <link rel="shortcut icon" href="favicon.ico"> <link href="/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/admin/css/animate.css" rel="stylesheet">
    <link href="/admin/css/style.css?v=4.1.0" rel="stylesheet">
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
<div id="wrapper">
    <!--左侧导航开始-->
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="nav-close"><i class="fa fa-times-circle"></i>
        </div>
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                                    <span class="block m-t-xs" style="font-size:20px;">
                                        <i class="fa fa-area-chart"></i>
                                        <strong class="font-bold">hAdmin</strong>
                                    </span>
                                </span>
                        </a>
                    </div>
                    <div class="logo-element">hAdmin
                    </div>
                </li>
                <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                    <span class="ng-scope">分类</span>
                </li>
                <li>
                    <a class="J_menuItem" href="index_v1.html">
                        <i class="fa fa-home"></i>
                        <span class="nav-label">主页</span>
                    </a>
                </li>
                @foreach($powerData as $k=>$v)
                <li>
                    <a href="#">
                        <i class="fa fa fa-bar-chart-o"></i>
                        <span class="nav-label">{{$v['p_name']}}</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        @foreach($v['son'] as $kk=>$vv)
                        <li>
                            <a class="J_menuItem" href={{$vv['p_web']}}>{{$vv['p_name']}}</a>
                        </li>
                        @endforeach
                    </ul>

                </li>
                @endforeach
                <li class="line dk"></li>
            </ul>
        </div>
    </nav>
    <!--左侧导航结束-->

