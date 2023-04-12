// Lắng nghe sự kiện submit form
document.getElementById('comment-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Ngăn chặn tải lại trang web
  
    // Lấy dữ liệu từ form
    var name = document.getElementsByName('name')[0].value;
    var email = document.getElementsByName('email')[0].value;
    var comment = document.getElementsByName('comment')[0].value;
    var post_id = document.getElementsByName('post_id')[0].value;
  
    // Gửi dữ liệu comment lên server bằng AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../../Back-End/Front-End/comment.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (xhr.status === 200) {
        // Hiển thị comment mới
        var newComment = JSON.parse(xhr.responseText);
        var commentSection = document.getElementById('comment-section');
        var commentHTML = '<div class="userComment" >';
        commentHTML += '<strong>' + newComment.name + ' (' + newComment.email + ')</strong><br>';
        commentHTML += newComment.comment + '</div>';
        commentSection.insertAdjacentHTML('beforeend', commentHTML);
      } else {
        alert('Lỗi khi lưu comment.');
      }
    };
    xhr.send('name=' + encodeURIComponent(name) + '&email=' + encodeURIComponent(email) + '&comment=' + encodeURIComponent(comment) + '&post_id=' + encodeURIComponent(post_id));
  });
  

  