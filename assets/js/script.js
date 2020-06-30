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




$("#admin-articles").on('click', (e)=>{
    e.preventDefault();
    let link = $('#admin-articles').attr('href');
    $.ajax({
        url: link,
        cache: false,
        data:{
            url: link
        },
        success: function(result){
            $("#articles_body").html(result);
        }});

});


$("#articles_body").on('click','.pagination-item', (e)=>{
    e.preventDefault();
    let link = e.target.getAttribute('href');
    $.ajax({
        url: link,
        cache: false,
        data:{
            url: link
        },
        success: function(result){
            $("#articles_body").html(result);
        }});

});



$(".content-admin").on('click','.article-link', (e)=>{
    e.preventDefault();
    let link = e.target.getAttribute('href');

    $.ajax({
        url: link,
        cache: false,
        data:{
            url: link
        },
        success: function(result){
            $("#articles_body").html(result);
        }});

});


$(".content-admin").on('click','.article-edit', (e)=>{
    e.preventDefault();
    let link = e.target.getAttribute('href');

    $.ajax({
        url: link,
        cache: false,
        data:{
            url: link
        },
        success: function(result){
            $("#articles_body").html(result);
        }});

});

$(".content-admin").on('click','.go-back-article', (e)=>{
    e.preventDefault();
    let link = e.target.getAttribute('href');

    $.ajax({
        url: link,
        cache: false,
        data:{
            url: link
        },
        success: function(result){
            $("#articles_body").html(result);
        }});

});
$("#submit-search").on('click', (e)=>{
    e.preventDefault();
    let query = $("#search-text").val();
    console.log(query);
    $.ajax({
        url: "/parser/search.php?search_text=" + query,
        cache: false,
        success: function(result){
            $("#articles_body").html(result);
            console.log(result);
        }});

});











