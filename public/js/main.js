function(){
  $('#markasRead'),on('click',function(){
    alert('here');
  });
}
function markNotificationAsRead() {
  $.get('/markAsRead');
}
