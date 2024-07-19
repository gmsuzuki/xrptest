<section id="user_registration">
  <div class="demo demo3">
    <h2 class=" heading"><span>新規ユーザー登録</span></h2>
    <p style="color: red; font-size:1.3rem; float:right">※は必須項目</p>
  </div>


  <div id="girl_input">
    <dl class="user_registration_input">
      <dt>
        <strong class="step_a">名前</strong>
        <em style="color: red;">※</em>
        <span class="mini_alert" style="color: red;">記号は使えません</span>
      </dt>
      <dd><input type="text" id="guest_name" name="customer_name" maxlength="20" placeholder="20文字以内（例）武田優" required
          onblur="CheckGuestInfo(this)" pattern="^(?=.*\S.*$)[^\x21-\x2C\x2E\x2F\x3A-\x40\x5B-\x60\x7B-\x7E]{1,20}">
      </dd>
    </dl>
    <dl class="user_registration_input">
      <dt>
        <strong class="step_a">電話番号</strong>
        <em style="color: red;">※</em>
        <span class="mini_alert" style="color: red;">数字以外は使えません</span>
      </dt>
      <dd>
        <input type="tel" id="guest_phone" name="customer_phone" placeholder="ハイフンなし（例）09012345678" required
          onblur="CheckGuestInfo(this)" pattern="^0[0-9]{9,10}$">
      </dd>
    </dl>
    <dl class="user_registration_input">
      <dt>
        <strong class="step_a">メールアドレス</strong>
        <span class="mini_alert" style="color: red;">ご登録できない形式です</span>
      </dt>
      <dd><input type="text" name="customer_mail" placeholder="メールアドレス" id="mail1" onblur="CheckGuestEmail(this)"
          pattern="^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$">
      </dd>
    </dl>

    <dl class="user_registration_input">
      <dt><strong class="step_a">確認用メールアドレス</strong>
        <span class="mini_alert" style="color: red;">メールアドレスが異なります</span>
      </dt>
      <dd>
        <input type="text" disabled name="customer_mail_check" placeholder="メールアドレス(確認)" id="mail2"
          onblur="SameCheck(this)">
      </dd>
    </dl>


    <!-- 新規なら2 会員なら１ -->
    <input type="hidden" value='2' name="member_new">

  </div>

</section>