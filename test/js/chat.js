var chat = {};

chat.fetchmsgs = function () {
    $.ajax({
       url: 'ajax/chat.php',
       type: 'post',
       data: { method: 'fetch', f1: f1, f2: f2} ,
       success: function(data) {
           $('.chat .messages').html(data);
       }
    });
}

chat.throwmsg = function(message) {
    if ($.trim(message).length != 0) {
        console.log(message);
       $.ajax({
           url: 'ajax/chat.php',
           type: 'post',
           data: { method: 'throw', message: message, f1: f1, f2: f2} ,
           success: function(data) {
               chat.fetchmsgs();
               $('textarea#entry').val('');
           }
    }); 
    }
}

$(document).ready(function(){
    $(".entry").keypress(function(event) {
        if (event.which === 13 && event.shiftKey === false) 
    {
        chat.throwmsg($('textarea#entry').val());
        event.preventDefault();
    }
    });
});
chat.fetchmsgs();
chat.interval = setInterval (chat.fetchmsgs, 2000);
