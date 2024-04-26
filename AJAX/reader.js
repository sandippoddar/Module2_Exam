$(document).ready(function() {
  let countLoad = 0;
  $(document).on("click", ".load", function() {
    countLoad = countLoad + 2;
    $.ajax({
      type: 'POST',
      url: '../Dashboard/loadBook.php',
      data: { count: countLoad },
      success: function(data) {
        $('.res').append(data);
      }
    })
  });

  $(document).on("click", ".wish", function(){
    var bookId = $(this).data('book-id');
      $.ajax({
        type: 'POST',
        url: '../Dashboard/wishListProcess.php', 
        data: { bookId: bookId },
        success: function(response) {
          console.log(response);
        }
      });
  });
});
