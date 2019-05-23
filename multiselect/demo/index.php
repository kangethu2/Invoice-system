<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>jquery-multi-select</title>
    <link rel="stylesheet" type="text/css" href="../src/example-styles.css">
    <link rel="stylesheet" type="text/css" href="demo-styles.css">
</head>
<body>

    <form class="demo-example">
        <label for="people">Select people:</label>
        <select id="people" name="people" multiple>
            <option value="alice">Alice</option>
            <option value="bob">Bob</option>
            <option value="carol">Carol</option>
            <option value="carol">Carol</option>
        </select>
    </form>



    <div class="demo-example position-menu-within">
        <label for="line-wrap-example">Line wrap example</label>
        <select id="line-wrap-example" multiple>
            <option>The final option…</option>
            <option>Should wrap onto…</option>
            <option>Multiple lines, to avoid expanding outside the grey wrapper</option>
        </select>
    </div>

    <script type="text/javascript" src="../test/lib/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="../src/jquery.multi-select.js"></script>
    <script type="text/javascript">
    $(function(){
        $('#people').multiSelect();
        $('#line-wrap-example').multiSelect({
            positionMenuWithin: $('.position-menu-within')
        });
        $('#categories').multiSelect({
            noneText: 'All categories',
            presets: [
                {
                    name: 'All categories',
                    options: []
                },
                {
                    name: 'My categories',
                    options: ['a', 'c']
                }
            ]
        })
    });
    </script>

</body>
</html>
