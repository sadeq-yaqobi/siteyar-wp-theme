<?php
// Add action hooks to display and update custom user meta field when showing user profile and editing it
add_action('show_user_profile', 'sy_user_meta_skill_field');
add_action('edit_user_profile', 'sy_user_meta_skill_field');

// Add action hooks to update custom user meta field when editing user profile
add_action('edit_user_profile_update', 'sy_user_meta_skill_field_update');
add_action('personal_options_update', 'sy_user_meta_skill_field_update');

// Function to display the custom user meta field
function sy_user_meta_skill_field($user)
{
    ?>
    <!-- Heading for the custom user meta field -->
    <h3>تخصص و مهارت‌ها</h3>
    <!-- Table structure for better organization of the field -->
    <table class="form-table">
        <tr>
            <th>
                <!-- Label for the skill input field -->
                <label for="skill">عنوان تخصص</label>
            </th>
            <td>
                <!-- Input field for entering the skill -->
                <input type="text"
                       class="regular-text ltr"
                       id="skill"
                       name="skill"
                    <?php
                    // Retrieve and sanitize the user's existing skill data
                    $user_skill = esc_attr(get_user_meta($user->ID, '_sy_user_skill', true))
                    ?>
                       value="<?php echo $user_skill ?: ''; ?>"
                       title="عنوان تخصص خود را وارد کنید"
                >
                <!-- Description to guide the user on what to input -->
                <p class="description">
                    عنوان تخصص خود را وارد کنید.
                </p>
            </td>
        </tr>
    </table>
    <?php
}

// Function to update the custom user meta field
function sy_user_meta_skill_field_update($user_id)
{
    // Update the user meta with the new skill data submitted via POST
    update_user_meta($user_id, '_sy_user_skill', $_POST['skill']);
}
