<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>内容管理=>文章管理</title>
    <link href="__PUBLIC__/Admin/Css/Style.css" rel="stylesheet" />
    <link href="__PUBLIC__/Admin/lhgdialog/skins/default.css" rel="stylesheet" />
    <script src="__PUBLIC__/Admin/Js/jquery-1.7.2.min.js"></script>
    <script src="__PUBLIC__/Admin/Js/jquery.treeview.js"></script>
    <script src="__PUBLIC__/Admin/lhgdialog/lhgdialog.min.js"></script>
    <script src="__PUBLIC__/Admin/Js/jQueryPlugin.js"></script>
    <script src="__PUBLIC__/Admin/Js/JavaScript.js"></script>
	<script src="__PUBLIC__/Admin/kindeditor/kindeditor.js"></script>
	<script src="__PUBLIC__/Admin/Js/My97DatePicker/WdatePicker.js"></script>
    <!--[if lte IE 6]>    <script src="__PUBLIC__/Admin/Js/DD_belatedPNG_0.0.8a.js" type="text/javascript"></script><script type="text/javascript">DD_belatedPNG.fix('*');</script><![endif]-->
</head>
<body>
<script type="text/javascript">
$(function(){
	autoHeight(jQuery('.autoHeight'));
	jQuery(".column_Box").each(function () {
		var t = jQuery(this);
		if (t.length < 1) return;
		Tab_click(t.find('.tab ul li'), t.find(".wrapBox .body"));
	});
});

KindEditor.ready(function(K) {
	K.create('#content', {
		allowFileManager : false,
		pasteType : 2,
		newlineTag : 'p',
		urlType : 'absolute'
	});
});
</script>

<div class="column_Box mainAutoHeight">
	<div class="tab">
		<ul>
			<li class="current"><a href="javascript:">文章属性</a></li>
		</ul>
	</div>
	<div class="column_Box mainAutoHeight wrapBox">
        <div class="body">
			<form method="post" action="<?php echo U('Article/insert');?>" id="submitForm" name="submitForm" enctype="multipart/form-data">
				<table border="0" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<td style="text-align:right;">文章名称：</td>
							<td style="text-align:left;"><input type="text" class="txt" name="title" value="" size='60' /><em>*</em></td>
						</tr>
						<!--<tr>
							<td style="text-align:right;">英文名称：</td>
							<td style="text-align:left;"><input type="text" class="txt" name="en_title" value="" size='60' /></td>
						</tr>-->
						<tr>
							<td style="text-align:right;">文章分类：</td>
							<td style="text-align:left;">
								<select name="cat_id" onchange="checkcat(this);">
									<option value="0">请选择...</option>
									<?php echo ($cat_select); ?>
								</select>
							<em>*</em>
							</td>
						</tr>

						<tr>
							<td style="text-align:right;">排序：</td>
							<td style="text-align:left;"><input type="text" class="txt" value="50" name="sort_order"  /><em>*</em> </td>
						</tr>
						
						<!-- <tr>
							<td style="text-align:right;">是否显示：</td>
							<td style="text-align:left;">
						      <input type="radio" name="is_open" value="1" checked="checked"/>是&nbsp;&nbsp;
						      <input type="radio" name="is_open" value="0"/>否
							</td>
						</tr>-->

						<?php if(($cat_id) == "13"): ?><tr>
								<td style="text-align:right;">金话筒：</td>
								<td style="text-align:left;"><textarea style="width:530px;height:100px;font-size:12px;" name="short" ></textarea></td>
							</tr>
							<tr>
								<td style="text-align:right;">普通机构：</td>
								<td style="text-align:left;"><textarea style="width:530px;height:100px;" name="content"></textarea></td>
							</tr>
						<?php else: ?>
							<tr>
								<td style="text-align:right;">首页推荐：</td>
								<td style="text-align:left;">
							      <input type="radio" name="is_recommend" value="1" />是&nbsp;&nbsp;
							      <input type="radio" name="is_recommend" value="0" checked/>否
								</td>
							</tr>
							<tr>
								<td style="text-align:right;">添加时间：</td>
								<td style="text-align:left;">
									<input type="text" name='add_time' onclick="WdatePicker();">&nbsp;<font color='red'>留空为当前时间</font>
								</td>
							</tr>
							<tr>
								<td style="text-align:right;">文章图片：</td>
								<td style="text-align:left;">
									<input type="file" name="article_img" size="35" /><br/>
									<font color="#ff0000">
										关于金话筒：80px * 80px;<br/>
									</font>
								</td>
							</tr>
							<tr>
								<td style="text-align:right;">文章简述：</td>
								<td style="text-align:left;"><textarea style="width:530px;height:100px;font-size:12px;" name="short" ></textarea></td>
							</tr>
							<tr>
								<td style="text-align:right;">文章内容：</td>
								<td style="text-align:left;"><textarea style="width:880px;height:400px;" name="content" id="content" ></textarea></td>
							</tr>
							<tr>
								<td style="text-align:right;">关键字：</td>
								<td style="text-align:left;"><input type="text" class="txt" value="" name="keywords"  /> 	关键字为选填项，其目的在于方便外部搜索引擎搜索</td>
							</tr>
							<tr>
								<td style="text-align:right;">描述：</td>
								<td style="text-align:left;"><textarea style="width:400px;height:100px;" name="description" ></textarea></td>
							</tr>

							<!-- <tr>
								<td style="text-align:right;">附件：</td>
								<td style="text-align:left;"><input name='file_url' type='file'/></td>
							</tr> --><?php endif; ?>

						<tr>
							<td>&nbsp;</td>
							<td style="text-align:left;">
								<input type="submit" value="提交"/>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
        </div>
    </div>
</div>
</body>
</html>