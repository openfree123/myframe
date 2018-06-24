<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim 和 Respond.js 是为了让 IE8 支持 HTML5 元素和媒体查询（media queries）功能 -->
    <!-- 警告：通过 file:// 协议（就是直接将 html 页面拖拽到浏览器中）访问页面时 Respond.js 不起作用 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="row">
        <br>
        <form class="form-inline" action="/todo/create" method="post">
            <div class="form-group">
                <label for="exampleInputEmail2">标题：</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <button type="submit" class="btn btn-default">新建</button>
        </form>
        <br>

        <table class="table table-condensed" n:if="$todos">
            <tr>
                <td>ID</td>
                <td>标题</td>
                <td>状态</td>
                <td>操作</td>
            </tr>
            <tr>
                {foreach $list as $item}
                <td class="active">{$item->id}</td>
                <td class="success">{$item->title}</td>
                <td class="warning">{if $item->status}有效{else}无效{/if}</td>
                <td class="danger">
                    <div class="form-inline">
                        <form class="form-inline" action="/todo/edit" method="post" style="display: inline">
                            <input type="hidden" class="form-control" id="id" name="id" value="{$item->id}">
                            {if $item->status}
                                <button type="submit" class="btn btn-default">无效</button>
                                <input type="hidden" class="form-control" id="status" name="status" value="0">
                            {else}
                                <button type="submit" class="btn btn-default">有效</button>
                                <input type="hidden" class="form-control" id="status" name="status" value="1">
                            {/if}
                        </form>
                        <form class="form-inline" action="/todo/remove" method="post" style="display: inline">
                            <input type="hidden" class="form-control" id="id" name="id" value="{$item->id}">
                            <button type="submit" class="btn btn-default">删除</button>
                        </form>
                    </div>
                </td>
            </tr>
            {/foreach}
        </table>
    </div>
</div>

<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>