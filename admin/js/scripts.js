// view_all_posts page, select all table rows
$(document).ready(function() {
  $('#selectAllBoxes').click(function(e) {
    if(this.checked) {
      $('.checkBox').each(function() {
        this.checked = true;
      });
    } else {
      $('.checkBox').each(function() {
        this.checked = false;
      });
    }
  })
})