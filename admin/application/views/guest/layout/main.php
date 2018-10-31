<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Authorization</title>
    <link rel="stylesheet" href="<?=baseurl('pub/css/bootstrap.css')?>">
</head>
<body>
<div style='margin-top:12%; margin-left:35%; margin-right:35%;'>
    <img src="http://biznesite.ru/wp-content/uploads/2018/06/logo-arrow.svg" alt="Бизнес Сайт" class="logo-img" data-no-retina="data-no-retina" height="120">
    <form method='post' action='home/login'>
        <table class='table table-striped table-bordered' style='max-width:400px;'>
            <tr>
                <th style='text-align:left'>Login:&nbsp;</th>
                <td><input name='login' value='' type='text' class='form-control'></td>
            </tr>
            <tr>
                <th style='text-align:left'>Password:&nbsp;</th>
                <td><input name='pass' value='' type='password' class='form-control'></td>
            </tr>
            <tr><td colspan=2 style='text-align:right'><button class='btn btn-primary'>Enter</button></td></tr>
        </table>
    </form>
</div>
</body>
</html>