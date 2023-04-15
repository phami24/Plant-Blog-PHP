// Lắng nghe sự kiện submit form
document.getElementById('comment-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Ngăn chặn tải lại trang web
  
    // Lấy dữ liệu từ form
    var name = document.getElementsByName('name')[0].value;
    var email = document.getElementsByName('email')[0].value;
    var comment = document.getElementsByName('comment')[0].value;
    var post_id = document.getElementsByName('post_id')[0].value;
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate()+' '+today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
  
    // Gửi dữ liệu comment lên server bằng AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../../Back-End/Front-End/comment.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (xhr.status === 200) {
        // Hiển thị comment mới
        var newComment = JSON.parse(xhr.responseText);
        var commentSection = document.getElementById('comment-section');
        var commentHTML = '<div class="comment" >';
        commentHTML += '<ion-icon name="logo-wechat" style="color:green;font-size: 30px;"></ion-icon>';
        commentHTML += '<div class="userComment">';
        commentHTML += '<strong>' + newComment.name + ' (' +  newComment.email + ') ' + '</strong>' + '<i style="float:right; font-size:13px;">' + date +'</i>' + '<br>';
        commentHTML += '<p class="mx-5">' + newComment.comment + '</p>';
        commentHTML += '</div>';
        commentHTML += '</div>';
        commentSection.insertAdjacentHTML('beforeend', commentHTML);
      } else {
        alert('Lỗi khi lưu comment.');
      }
    };
    xhr.send('name=' + encodeURIComponent(name) + '&email=' + encodeURIComponent(email) + '&comment=' + encodeURIComponent(comment) + '&post_id=' + encodeURIComponent(post_id));
  });
  

  