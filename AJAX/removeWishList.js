$(document).ready(function () {
  $(document).on("click", ".delete", function() {
    var bookId = $(this).data('book-id');
    $.ajax({
      type: 'POST',
      url: '../Dashboard/removeWishListProcess.php', 
      data: { bookId: bookId },
      success: function(response) {
        console.log(response);
        $('.wish').html(response);
      }
    });
  });
})
