<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/home/css/index.css">
</head>
<body>
<div id="app">
    <el-button @click="visible = true">Button</el-button>
    <el-dialog :visible.sync="visible" title="Hello world">
        <p>Try Element</p>
    </el-dialog>
</div>
</body>
<script src="/home/js/vue.js"></script>
<script src="/home/js/index.js"></script>
<script>
    new Vue({
        el: '#app',
        data: function() {
            return { visible: false }
        }
    })
</script>
</html>
