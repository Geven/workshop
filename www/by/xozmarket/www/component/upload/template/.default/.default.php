<div>
    <script type="text/javascript">
        require.paths.upload = "/component/upload/template/<?=$this->m->data["TEMPLATE"]?>/widget";
    </script>

    <link class="upload">

    <div>
        <form action="/component/upload/template/pipe.php" method="post" enctype="multipart/form-data" target="output">
            <input type="file" name="file">
            <br>
            <input type="submit">
        </form>

        <iframe name="output">
        </iframe>
    </div>
</div>