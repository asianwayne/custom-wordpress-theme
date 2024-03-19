
          <?php 
          $verification_code = generate_verification_code();

    // Generate the verification code image
          $verification_image_url = generate_verification_image($verification_code);
          ?>

          <!-- mc_ctf -->
          <form action="#" method="post" id="mc-contact-form">
            <div class="col">
              <div class="item">
                <label>姓名：<i>*</i></label>
                <div class="input">
                  <input type="text" name="fullname" id="fullname" class="inp" placeholder="Your name" required>
                </div>
              </div>
              <div class="item">
                <label>电话：<i>*</i></label>
                <div class="input">
                  <input type="text" name="cf_phone" id="phone" class="inp" placeholder="Your phone" required>
                </div>
              </div>
            </div>
            <div class="item">
              <label>邮箱：</label>
              <div class="input">
                <input type="email" name="cf_email" id="cf_email" class="inp" placeholder="Your Email" required>
              </div>
            </div>

            <div class="item">
              <label>内容：</label>
              <div class="input">
                <textarea type="text" name="cf_message" id="cf_message" class="inp" placeholder="Message"></textarea>
              </div>
            </div>
            <div class="item verify">
              <label>验证码：<i>*</i></label>
              <div class="input">
                <input type="text" id="user_verification_code" name="user_verification_code" class="inp" value="" placeholder="请输入右边的验证码">
                <img id="vcode" src="<?php echo $verification_image_url; ?>" alt="验证码"> </div>
                <input type="hidden" name="actual_verification_code" value="<?php echo $verification_code; ?>">
            </div>

            <div class="btn">
              <button style="border: none;" type="submit" name="submit" class="submit">SUBMIT</button>
            </div>
          </form>

