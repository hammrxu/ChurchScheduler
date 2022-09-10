<!-- db connection close-->
<?php
$conn->close();
?>
</body>

<script src="../js/main.js"></script>
<?php if (file_exists('../js/' . $fileName . '.js')) {
    echo '<script src="../js/' . $fileName . '.js"></script>';
}
?>
<!-- put at end -->
<script>
    $("button").toggleClass("button-8");
    $("button").attr("role", "button");
</script>

</html>