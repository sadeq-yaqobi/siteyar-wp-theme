<?php
 add_action('show_user_profile', 'sy_user_meta_resume_field'); add_action('edit_user_profile', 'sy_user_meta_resume_field'); add_action('edit_user_profile_update', 'sy_user_meta_resume_field_update'); add_action('personal_options_update', 'sy_user_meta_resume_field_update'); function sy_user_meta_resume_field($user) { ?>
    <!-- Heading for the custom user meta field -->
    <h3>سابقه تحصیل و کار</h3>
    <table class="form-table">
        <tr>
            <th>
                <label for="skill">عنوان تخصص</label>
            </th>
            <td>
                <!-- Input field for entering the skill -->
                <?php $user_expertise = esc_attr(get_user_meta($user->ID, '_sy_user_expertise', true)) ?>
                <input type="text" class="rtl regular-text" id="expertise" name="expertise"
                       value="<?php echo $user_expertise ?: ''; ?>" title="عنوان تخصص خود را وارد کنید">
                <p class="description">عنوان تخصص خود را وارد کنید.</p>
            </td>
        </tr>
        <tr>
            <th>
                <!-- Label for the skill input field -->
                <label for="career_title">سابقه تحصیل / کار / تدریس</label>
            </th>
            <td>

                <div style="display: flex">
                    <?php $user_resume = esc_attr(get_user_meta($user->ID, '_sy_user_resume', true)); ?>
                    <textarea class="rtl"  style="margin-left: 8px" id="user_resume" name="user_resume" cols="30" rows="10"
                              title="رزومه خود را به شکل روبرو وارد کنید"><?php echo $user_resume ?: ''; ?></textarea>
                    <textarea class="rtl" readonly >سوابق خود را به شکل زیر وارد نمایید.
عنوانِ سابقه | سال | محل | توضیحات**

مثال:
توسعه دهنده وردپرس | 1394-1403| شرکت سایت یار | توسعه و پیاده سازی قالب‌های شرکتی**
فارغ التحصیل کارشناسی رشته کامپیوتر|1389-1393|دانشگاه تهران |تدریس ریاضی به دانش آموزانی قصد ورود به دانشگاه را داشتند

نکته: بین هر بخش کاراکتر | قرار دهید و برای جدا کردن هر سابقه از دو کاراکتر **استفاده کنید.آخرین بخش نیاز به هیچ کاراکتری نداری | **
                    </textarea>
                </div>

            </td>
        </tr>
    </table>
    <?php
} function sy_user_meta_resume_field_update($user_id) { update_user_meta($user_id, '_sy_user_expertise', $_POST['expertise']); update_user_meta($user_id, '_sy_user_resume', $_POST['user_resume']); } 