// script pour la gestion des pages
<script>
        $('#competences').click(function(e){
    e.preventDefault();
    console.log($(this).attr('index'));
    $('.str').each(function(){
        $(this).trigger('click');
    });
});
</script>