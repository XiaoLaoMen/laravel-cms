<!doctype html>
<hmlt>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
        <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            body {
                background: #f8f8f8;
                font-family: Microsoft YaHei,Helvetica Neue,Helvetica,Arial,sans-serif;
            }
            li, ol, ul {
                list-style: none;
            }
            ul{
                padding: 0px;
            }
            a {text-decoration: none}
            a:hover{text-decoration: none}
            /*导航*/
            /*导航颜色*/
            .navbar-default {
                background-color: #333333;
                border-color: #111111;
            }
            .navbar-default .navbar-brand {
                color: #ffffff;
            }
            .navbar-default .navbar-brand:hover,
            .navbar-default .navbar-brand:focus {
                color: #fbfbfb;
            }
            .navbar-default .navbar-text {
                color: #ffffff;
            }
            .navbar-default .navbar-nav > li > a {
                color: #ffffff;
            }
            .navbar-default .navbar-nav > li > a:hover,
            .navbar-default .navbar-nav > li > a:focus {
                color: #fbfbfb;
            }
            .navbar-default .navbar-nav > li > .dropdown-menu {
                background-color: #333333;
            }
            .navbar-default .navbar-nav > li > .dropdown-menu > li > a {
                color: #ffffff;
            }
            .navbar-default .navbar-nav > li > .dropdown-menu > li > a:hover,
            .navbar-default .navbar-nav > li > .dropdown-menu > li > a:focus {
                color: #fbfbfb;
                background-color: #111111;
            }
            .navbar-default .navbar-nav > li > .dropdown-menu > li.divider {
                background-color: #111111;
            }
            .navbar-default .navbar-nav .open .dropdown-menu > .active > a,
            .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover,
            .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
                color: #fbfbfb;
                background-color: #111111;
            }
            .navbar-default .navbar-nav > .active > a,
            .navbar-default .navbar-nav > .active > a:hover,
            .navbar-default .navbar-nav > .active > a:focus {
                color: #fbfbfb;
                background-color: #111111;
            }
            .navbar-default .navbar-nav > .open > a,
            .navbar-default .navbar-nav > .open > a:hover,
            .navbar-default .navbar-nav > .open > a:focus {
                color: #fbfbfb;
                background-color: #111111;
            }
            .navbar-default .navbar-toggle {
                border-color: #111111;
            }
            .navbar-default .navbar-toggle:hover,
            .navbar-default .navbar-toggle:focus {
                background-color: #111111;
            }
            .navbar-default .navbar-toggle .icon-bar {
                background-color: #ffffff;
            }
            .navbar-default .navbar-collapse,
            .navbar-default .navbar-form {
                border-color: #ffffff;
            }
            .navbar-default .navbar-link {
                color: #ffffff;
            }
            .navbar-default .navbar-link:hover {
                color: #fbfbfb;
            }

            @media (max-width: 767px) {
                .navbar-default .navbar-nav .open .dropdown-menu > li > a {
                    color: #ffffff;
                }
                .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
                .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
                    color: #fbfbfb;
                }
                .navbar-default .navbar-nav .open .dropdown-menu > .active > a,
                .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover,
                .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
                    color: #fbfbfb;
                    background-color: #111111;
                }
            }
            /*左侧logo处*/
            .b-logo-word,.b-logo-code,.b-logo-end{
                height: 40px;
                float: left;
            }

            .b-lc-start {
                height: 15px;
                color: #fff;
                font-size: 14px;
                line-height: 10px;
            }
            .b-lc-echo {
                height: 15px;
                color: #66d9ef;
                font-size: 14px;
                text-indent: 15px;
            }
            .b-logo-word {
                line-height: 40px;
                color: #fdd257;
            }
            .b-logo-end {
                color: #fff;
                font-size: 20px;
                line-height: 35px;
            }
            /*导航float方式*/
            ul.nav.navbar-nav {
                float: left;
            }
            /*页面不一样的地方开始*/
            /*左侧内容*/
            .b-article {
                background: #fff;
                font-size: 16px;
                -webkit-box-shadow: 0 1px 2px 0 #e2e2e2;
                box-shadow: 0 1px 2px 0 #e2e2e2;
                position: relative;
            }
            .b-title {
                padding-top: 20px;
                padding-bottom: 20px;
                text-align: center;
                overflow: hidden;
            }
            .b-metadata {
                margin-bottom: 10px;
                border-bottom: 1px dotted #999;
                font-size: 14px;
                padding: 0px 15px 5px 30px;
            }
            .b-content-word {
                line-height: 28px;
                padding: 0px 30px;
            }
            b-h-20 {
                width: 100%;
                height: 20px;
            }
            .b-copyright {
                width: 100%;
                line-height: 30px;
                color: #ee542a;
            }
            /*页面不一样的地方结束*/

            /*右侧内容*/
            /*右侧*/
            .b-search {
                padding: 20px;
                overflow: hidden;
                background: #fff;
            }
            .b-search .b-search-text {
                margin-right: 0;
                padding: 0 5px;
                width: 78%;
                height: 35px;
                line-height: 35px;
                border: 1px solid #ccc;
                float: left;
            }
            .b-search .b-search-submit {
                margin-left: 0;
                width: 22%;
                height: 35px;
                background: #008cba;
                color: #fff;
                border: none;
                float: left;
            }
            /*标签*/
            .b-tags,.b-recommend,.b-link{
                margin-bottom: 20px;
                padding: 10px 20px;
                background: #fff;
                -webkit-box-shadow: 0 1px 2px 0 #e2e2e2;
                box-shadow: 0 1px 2px 0 #e2e2e2;
                overflow: hidden;
                margin-top: 20px;
            }
            .b-tags .b-title {
                height: 30px;
            }
            .b-all-tname {
                overflow: hidden;
            }
            .b-tags .b-all-tname .b-tname {
                margin-top: 5px;
                margin-right: 5px;
                float: left;
            }
            .b-tags .b-all-tname .b-tname a {
                display: block;
                padding: 0 10px;
                height: 20px;
                line-height: 20px;
                border-radius: 10px;
                color: #fff;
            }
            .b-tags .b-all-tname .b-tname .tstyle-1 {
                background: #43ac6a;
            }
            .b-tags .b-all-tname .b-tname .tstyle-2 {
                background: #f3a557;
            }
            .b-tags .b-all-tname .b-tname .tstyle-3 {
                background: #f25e45;
            }
            .b-tags .b-all-tname .b-tname .tstyle-4 {
                background: #34afd8;
            }
            .b-tags .b-all-tname .b-tname .tstyle-5 {
                background: #d88ed8;
            }
            .b-tags .b-all-tname .b-tname .tstyle-6 {
                background: #9f8fd8;
            }

            .b-tags .b-all-tname .b-tname .tstyle-1:hover {
                text-decoration: none;
                background: #028231;
            }
            .b-tags .b-all-tname .b-tname .tstyle-2:hover {
                text-decoration: none;
                background: #e97705;
            }
            .b-tags .b-all-tname .b-tname .tstyle-3:hover {
                text-decoration: none;
                background: #d82508;
            }
            .b-tags .b-all-tname .b-tname .tstyle-4:hover {
                text-decoration: none;
                background: #0583ac;
            }
            .b-tags .b-all-tname .b-tname .tstyle-5:hover {
                text-decoration: none;
                background: #d064d8;
            }
            .b-tags .b-all-tname .b-tname .tstyle-6:hover {
                text-decoration: none;
                background: #8d69d8;
            }
            /*推荐*/
            .b-recommend .b-recommend-p .b-recommend-a {
                margin: 5px 0;
                padding-left: 18px;
                display: block;
                position: relative;
            }
            /*友情链接*/
            .b-link-a {
                margin-right: 10px;
                display: block;
            }

            /*底部*/
            .footer{
                background-color: #333333;
                color: #FFFFFF;
                padding: 15px;
            }
        </style>
    </head>
    <body>
    <nav class="navbar navbar-default navbar-static-top"  role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="javascript:void(0)">
                    <ul class="b-logo-code">
                        <li class="b-lc-start">&lt;?php</li>
                        <li class="b-lc-echo">echo</li>
                    </ul>
                    <p class="b-logo-word">'写着玩博客'</p>
                    <p class="b-logo-end">;</p>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">网站首页</a></li>
                    <li><a href="#">个人博客日记</a></li>
                    <li><a href="#">网站制作</a></li>
                    <li><a href="#">设计心得</a></li>
                    <li><a href="#">关于我</a></li>
                    <li><a href="#">时间轴</a></li>
                    <li><a href="#">博客导航</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a>
                            </li>
                            <li><a href="#">Another action</a>
                            </li>
                            <li><a href="#">Something else here</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#">One more separated link</a>
                            </li>
                        </ul>
                    </li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="b-nav-cname b-nav-login">
                        <div class="hidden-xs b-login-mobile"></div>
                        <a class="js-login-btn" href="javascript:;">登录</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <div class="row b-article">
                    <h1 class="col-xs-12 b-title">这里是标题</h1>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="row b-metadata">
                            <li class="col-xs-5 col-md-2 col-lg-2">
                                <i class="glyphicon glyphicon-user"></i>
                                你猜呢
                            </li>
                            <li class="col-xs-7 col-md-4 col-lg-4">
                                <i class="glyphicon glyphicon-time"></i> 2019-05-05 23:53:58
                            </li>
                            <li class="col-xs-5 col-md-3 col-lg-2">
                                <i class="glyphicon glyphicon-list"></i>
                                <a href="" target="_blank">乱七八糟</a>
                            </li>
                            <li class="col-xs-7 col-md-3 col-lg-4 ">
                                <i class="glyphicon glyphicon-tag"></i>
                                <a class="b-tag-name" href="" target="_blank">oauth</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 b-content-word">
                        <div class="js-content">
                            这里是内容
                        </div>
                        <p class="b-h-20"></p>
                        <p class="b-copyright">
                            自己写的博客，没什么限制。
                        </p>
                        <ul class="b-prev-next">
                            <li class="b-prev">
                                上一篇：
                                <a href="https://baijunyao.com/article/206">OAuth 系列(六)对比总结</a>

                            </li>
                            <li class="b-next">
                                下一篇：
                                <span>没有了</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-sm-4 col-md-4 col-lg-4 visible-sm-block visible-md-block visible-lg-block">
                <!--搜索-->
                <div class="b-search">
                    <form class="form-inline" role="form" action="https://baijunyao.com/search" method="post">
                        <input type="hidden" name="_token" value="ygE30iig964pnOPgGtW6uOGB2Pk8cuTYhHKpK2d2">
                        <input class="b-search-text" type="text" name="wd">
                        <input class="b-search-submit" type="submit" value="全站搜索">
                    </form>
                </div>
                <!--博客概况-->
                <div class="b-recommend">
                    <h4 class="b-title">博客概况</h4>
                    <div class="row">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td style="text-align: center;" width="50%">
                                    <i class="fa fa-file-o"></i> 文章总数：
                                </td>
                                <td style="text-align: center;" width="50%">127 篇</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;" width="50%">
                                    <i class="fa fa-tags"></i> 标签总数：</td>
                                <td style="text-align: center;" width="50%">48 个</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;" width="50%">
                                    <i class="fa fa-commenting-o"></i> 留言数量：
                                </td>
                                <td style="text-align: center;" width="50%">134 条</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;" width="50%">
                                    <i class="fa fa-clock-o"></i> 安全运行：</td>
                                <td style="text-align: center;" width="50%">2年零16天</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;" width="50%">
                                    <i class="fa fa-eye"></i> 浏览总数：</td>
                                <td style="text-align: center;" width="50%">153432 次</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;" width="50%">
                                    <i class="fa fa-pencil-square-o"></i> 最后更新：</td>
                                <td style="text-align: center;" width="50%">2个月前 (04-02)</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--标签-->
                <div class="b-tags">
                    <h4 class="b-title">热门标签</h4>
                    <ul class="b-all-tname">
                        <li class="b-tname">
                            <a class="tstyle-1" href="https://baijunyao.com/tag/20">Linux (7)</a>
                        </li>
                        <li class="b-tname">
                            <a class="tstyle-2" href="https://baijunyao.com/tag/62">直播 (1)</a>
                        </li>
                        <li class="b-tname">
                            <a class="tstyle-3" href="https://baijunyao.com/tag/62">直播 (1)</a>
                        </li>
                        <li class="b-tname">
                            <a class="tstyle-4" href="https://baijunyao.com/tag/62">直播 (1)</a>
                        </li>
                        <li class="b-tname">
                            <a class="tstyle-5" href="https://baijunyao.com/tag/62">直播 (1)</a>
                        </li>
                        <li class="b-tname">
                            <a class="tstyle-6" href="https://baijunyao.com/tag/62">直播 (1)</a>
                        </li>
                    </ul>
                </div>
                <!--推荐-->
                <div class="b-recommend">
                    <h4 class="b-title">置顶推荐</h4>
                    <p class="b-recommend-p">
                        <a class="b-recommend-a" href="https://baijunyao.com/article/131" target="_blank"><span class="fa fa-th-list b-black"></span> 最适合入门的laravel初级教程(一)序言</a>
                        <a class="b-recommend-a" href="https://baijunyao.com/article/124" target="_blank"><span class="fa fa-th-list b-black"></span> 创建QQ群及捐赠渠道</a>
                        <a class="b-recommend-a" href="https://baijunyao.com/article/60" target="_blank"><span class="fa fa-th-list b-black"></span> thinkphp的目录结构设计经验总结</a>
                        <a class="b-recommend-a" href="https://baijunyao.com/article/58" target="_blank"><span class="fa fa-th-list b-black"></span> javascript中的那些让人摸不着头脑的不=</a>
                        <a class="b-recommend-a" href="https://baijunyao.com/article/55" target="_blank"><span class="fa fa-th-list b-black"></span> 深入解析array_merge函数的用法 php</a>
                        <a class="b-recommend-a" href="https://baijunyao.com/article/52" target="_blank"><span class="fa fa-th-list b-black"></span> javascript的函数作用域及声明提前</a>
                        <a class="b-recommend-a" href="https://baijunyao.com/article/42" target="_blank"><span class="fa fa-th-list b-black"></span> php多维数组自定义排序 uasort()</a>
                        <a class="b-recommend-a" href="https://baijunyao.com/article/29" target="_blank"><span class="fa fa-th-list b-black"></span> apache 开启Gzip网页压缩</a>
                        <a class="b-recommend-a" href="https://baijunyao.com/article/27" target="_blank"><span class="fa fa-th-list b-black"></span> 查询文章的上下篇Sql语句</a>
                        <a class="b-recommend-a" href="https://baijunyao.com/article/20" target="_blank"><span class="fa fa-th-list b-black"></span> 以符合人类阅读的方式打印php数组</a>
                        <a class="b-recommend-a" href="https://baijunyao.com/article/18" target="_blank"><span class="fa fa-th-list b-black"></span> PHP按符号截取字符串的指定部分</a>
                        <a class="b-recommend-a" href="https://baijunyao.com/article/16" target="_blank"><span class="fa fa-th-list b-black"></span> 一行jQuery代码搞定checkbox 全选和全不选</a>
                        <a class="b-recommend-a" href="https://baijunyao.com/article/12" target="_blank"><span class="fa fa-th-list b-black"></span> 总结php删除html标签和标签内的内容的方法</a>
                    </p>
                </div>
                <!--友情链接-->
                <div class="b-link">
                    <h4 class="b-title">友情链接</h4>
                    <p>
                        <a class="b-link-a" href="http://laravelacademy.org" target="_blank"><span class="fa fa-link b-black"></span> Laravel学院</a>
                        <a class="b-link-a" href="http://www.awaimai.com" target="_blank"><span class="fa fa-link b-black"></span> 歪麦博客</a>
                        <a class="b-link-a" href="http://wujunze.com" target="_blank"><span class="fa fa-link b-black"></span> 吴钧泽博客</a>
                        <a class="b-link-a" href="http://zqiqi.cn" target="_blank"><span class="fa fa-link b-black"></span> 七七</a>
                        <a class="b-link-a" href="http://www.payhearts.com" target="_blank"><span class="fa fa-link b-black"></span> 麦剑雄的个人博客</a>
                        <a class="b-link-a" href="http://www.koukousky.com" target="_blank"><span class="fa fa-link b-black"></span> koukou的博客</a>
                        <a class="b-link-a" href="http://dongguagua.com" target="_blank"><span class="fa fa-link b-black"></span> 咚呱呱</a>
                        <a class="b-link-a" href="http://www.phpernote.com" target="_blank"><span class="fa fa-link b-black"></span> php程序员的笔记</a>
                        <a class="b-link-a" href="http://www.mafutian.net" target="_blank"><span class="fa fa-link b-black"></span> 马富天博客</a>
                        <a class="b-link-a" href="http://baagee.vip" target="_blank"><span class="fa fa-link b-black"></span> BaAGee博客</a>
                        <a class="b-link-a" href="https://www.phpsong.com" target="_blank"><span class="fa fa-link b-black"></span> 小松博客</a>
                        <a class="b-link-a" href="http://www.blogxuan.com" target="_blank"><span class="fa fa-link b-black"></span> 玄玄博客</a>
                        <a class="b-link-a" href="http://www.023xs.cn" target="_blank"><span class="fa fa-link b-black"></span> 小张个人博客_不忘初心</a>
                        <a class="b-link-a" href="http://zixuephp.net" target="_blank"><span class="fa fa-link b-black"></span> php自学网</a>
                        <a class="b-link-a" href="https://lulublog.cn" target="_blank"><span class="fa fa-link b-black"></span> lulublog</a>
                        <a class="b-link-a" href="http://www.php20.cn" target="_blank"><span class="fa fa-link b-black"></span> 仙士可博客</a>
                        <a class="b-link-a" href="http://www.hotxf.com" target="_blank"><span class="fa fa-link b-black"></span> 小风博客</a>
                        <a class="b-link-a" href="https://www.708034.cn" target="_blank"><span class="fa fa-link b-black"></span> 二宝博客</a>
                        <a class="b-link-a" href="http://www.hxinq.com" target="_blank"><span class="fa fa-link b-black"></span> 黄信强个人博客</a>
                        <a class="b-link-a" href="http://laysonx.com" target="_blank"><span class="fa fa-link b-black"></span> 李鑫博客</a>
                        <a class="b-link-a" href="http://www.chinacion.cn" target="_blank"><span class="fa fa-link b-black"></span> 赵华伟自媒体博客</a>
                        <a class="b-link-a" href="https://fengkui.net" target="_blank"><span class="fa fa-link b-black"></span> 冯奎博客</a>
                        <a class="b-link-a" href="http://chenxuhou.com" target="_blank"><span class="fa fa-link b-black"></span> 程序猴博客</a>
                        <a class="b-link-a" href="http://www.yangqq.com" target="_blank"><span class="fa fa-link b-black"></span> 杨青个人博客</a>
                        <a class="b-link-a" href="https://www.phpbloger.com" target="_blank"><span class="fa fa-link b-black"></span> 唐轶俊博客</a>
                        <a class="b-link-a" href="https://baijunyao.com/site"><span class="fa fa-link b-black"></span> 更多 </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h4 class="b-title">关于本站</h4>
                    <p>不是媒体，没有目的。只是，做自己的博客，写自己的故事。面对现实，忠于理想。梦想着改变世界的90后。性别男，爱好女。</p>
                    <p>
                        ©2014 www.lanecn.com , All rights reserved. Power By Li Xuan.  京ICP备14005030号 站长统计
                    </p>
                </div>
            </div>
        </div>
    </footer>
    </body>
</hmlt>
