<?php
include_once 'connect.php';
include_once 'header.php';
?>

    <form class="demo-example">
        <label for="people">Select people:</label>
        <select id="people" name="people" multiple>
            <option value="alice">Alice</option>
            <option value="bob">Bob</option>
            <option value="carol">Carol</option>
            <option value="carol">Carol</option>
        </select>
        <label for="three">three:</label>
        <select id="three" name="mine" multiple>
            <option value="alice">Alice</option>
            <option value="bob">Bob</option>
            <option value="carol">Carol</option>
            <option value="carol">Carol</option>
        </select>


        <div class="demo-example">
            <label for="line-wrap-example">Line wrap example</label>
            <select id="line-wrap-example" name="hehe" multiple>
                <option>john…</option>
                <option>Should wrap onto…</option>
                <option>Multiple lines, to avoid expanding outside the grey wrapper</option>
            </select>
        </div>


                <div class="demo-example">
                    <label for="one">one</label>
                    <select id="one" multiple>
                        <option>michael…</option>
                        <option>Should wrap onto…</option>
                        <option>Multiple lines, to avoid expanding outside the grey wrapper</option>
                    </select>
                </div>
                <div class="demo-example">
                    <label for="two">two</label>
                    <select id="two" multiple>
                        <option>ken…</option>
                        <option>Should wrap onto…</option>
                        <option>Multiple lines, to avoid expanding outside the grey wrapper</option>
                    </select>
                </div>

    </form>




    <script type="text/javascript" src="multiSelect/test/lib/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="multiSelect/src/jquery.multi-select.js"></script>
    <script type="text/javascript">
    $(function(){
        $('#people').multiSelect();
        $('#line-wrap-example').multiSelect({
            positionMenuWithin: $('.position-menu-within')
        });
          $('#one').multiSelect();
          $('#two').multiSelect();
            $('#three').multiSelect();
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
