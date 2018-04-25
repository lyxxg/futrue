<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div id="c1"></div>

</body>
</html>

<script src="https://cdn.dingxiang-inc.com/ctu-group/captcha-ui/index.js"></script>

<script>
    var myCaptcha = _dx.Captcha(document.getElementById('c1'), {
        appId: '9eb369e65c776c2f3bfaef1d944b3e2a',   //appId,开通服务后可在控制台中“服务管理”模块获取
        success: function (e5f3b03d9bdd1ddd06cdbf2025268fcd) {
            // console.log('token:', token)
        }
    })
</script>
