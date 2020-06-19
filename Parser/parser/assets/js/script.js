$("#article-form").submit(function(e){
    e.preventDefault();
    $.ajax({
        url: "articles.php",
        cache: false,
        success: function(result){
           $("#articles_body").html(result);
        }});
});

$(".parse-btn").on('click', function(e){
    $('#load-status').text('Wait the web site is parsing...')
});