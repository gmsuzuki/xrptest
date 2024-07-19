<?php $user_type = $found_person['no'];
      $user_faceicon = $people_basics[$found_person['no']]["icon"];
      $user_name = $found_person['name'];
      $user_phone = $found_person['phone'];
      $user_mail = $found_person['email'];
?>

<section class="user_info_wrap">

  <figure class="request_img">
    <img src='../<?php echo $user_faceicon?>' alt="" class="">
  </figure>

  <figcaption class="request_img_caption">
    <!-- 名前 -->
    <?php echo $user_name?>
  </figcaption>
  <!-- メール電話 -->
  <p>
    <?php echo $user_phone ?>
  </p>
  <p>
    <?php echo $user_mail ?>
  </p>
</section>