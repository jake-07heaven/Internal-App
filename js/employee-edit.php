<script>
$('.employee-button').click(function() { 
    var id = $(this).attr('id');
    var url = <?php echo json_encode(base_url()); ?>;
	window.location.href = url + "index.php/employee/" + id;
});
</script>