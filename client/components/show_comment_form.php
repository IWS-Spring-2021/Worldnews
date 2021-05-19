<?php
$id = $_GET['id'];
if (isset($_GET['login_user'])) {
  $login_user = $_GET['login_user'];
};
$url = "http://localhost/worldnews/webservices/api/get_a_news.php?id=$id";

$news = curl_init($url);
curl_setopt($news, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($news);

$result = json_decode($response, true);

?>
<div id="comment" class="comment-form-wrap pt-5">
  <h3 class="mb-2" style="color:#7e866c;">Leave a comment</h3>
  <form action="components/create_comment.php" class="p-2 bg-light" method="POST">
    <div class="form-group">
      <input type="hidden" name="name" value="<?php echo $_SESSION['username'] ?>" />
    </div>
    <div class="form-group login-required">
      <textarea name="comment" id="message" cols="30" rows="5" class="form-control" placeholder="Your comment"></textarea>
    </div>
    <div class="form-group">
      <input type="hidden" name="news_id" value="<?php echo $id ?>" />
    </div>
    <div class="form-group">
      <input type="hidden" name="posted_at" value="<?php echo date('Y-m-d') ?>" />
    </div>
    <div class="form-group">
      <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary" style="background-color: #69d5ff;">
    </div>
  </form>
</div>

</div>
<script defer>
  const div_comment = document.querySelector('.login-required');
  let login_user = document.querySelector('input[name="name"]').value;
  // let modal = document.querySelector('#ask-login');
  // console.log(login_user);
  const id = document.querySelector('input[name="news_id"]').value;
  // console.log(id);

  div_comment.addEventListener('click', () => {
    if (!login_user) {
      alert('Login to give a comment!');
      // modal.style.display = 'block';
      window.location.href = '/worldnews/client/login.php?news_id=' + id;
    }
  });
</script>