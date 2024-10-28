<script>
    $(document).ready(function() {
        $('.interest-link').on('click', function(e) {
            e.preventDefault();
            let interestId = $(this).data('id');

            $.ajax({
                url: `/interests/${interestId}`,
                method: 'GET',
                success: function(response) {
                    $('#post-container').html(response);
                }
            });
        });
    });
</script>

