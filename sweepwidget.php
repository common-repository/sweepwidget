<?php

/**
 * Plugin Name: SweepWidget
 * Plugin URI: https://sweepwidget.com
 * Description: The best WordPress contest plugin to run viral giveaways, sweepstakes, leaderboard competitions, & instant coupons campaigns, and promotions for over 30+ social platforms. Get more followers, shares, likes, email signups, sales leads, and grow your online presence.
 * Version: 2.0.6
 * Requires at least: 3.0.1
 * Requires PHP: 7.0
 * Author: SweepWidget
 * Author URI: https://www.linkedin.com/company/sweepwidgetapp/
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.html
 */

function sweepwidget_add_menu()
{
    add_menu_page(
        'SweepWidget Contests',
        'SweepWidget Contests',
        'manage_options',
        'sweepwidget',
        'sweepwidget_admin_menu_main',
        'dashicons-awards',
        21
    );
}

add_action('admin_menu', 'sweepwidget_add_menu');

// Hook into the admin initialization process
add_action('admin_init', 'sweepwidget_redirect_to_admin');

function sweepwidget_redirect_to_admin()
{
    // Check if our option is set
    if (get_option('sweepwidget_plugin_activated', false)) {
        // Delete the option to prevent the redirect on every admin page load
        delete_option('sweepwidget_plugin_activated');

        // Perform the redirect
        wp_redirect(admin_url('admin.php?page=sweepwidget'));
        exit;
    }
}

// Hook into the activation process
register_activation_hook(__FILE__, 'sweepwidget_activate');

function sweepwidget_activate()
{
    // Set an option to trigger the redirect
    add_option('sweepwidget_plugin_activated', true);

    // Trigger the redirect immediately after activation
    if (is_admin() && !defined('DOING_AJAX') && isset($_GET['activate'])) {
        wp_redirect(admin_url('admin.php?page=sweepwidget'));
        exit;
    }
}

// Convert language abbr to full text
function language_code_to_text($language_code)
{
    $language_code = strtolower($language_code);
    switch ($language_code) {
        case "af":
            $language_text = "Afrikaans";
            break;
        case "sq":
            $language_text = "Albanian";
            break;
        case "am":
            $language_text = "Amharic";
            break;
        case "ar":
            $language_text = "Arabic";
            break;
        case "hy":
            $language_text = "Armenian";
            break;
        case "az":
            $language_text = "Azerbaijani";
            break;
        case "eu":
            $language_text = "Basque";
            break;
        case "be":
            $language_text = "Belarusian";
            break;
        case "bn":
            $language_text = "Bengali";
            break;
        case "bs":
            $language_text = "Bosnian";
            break;
        case "bg":
            $language_text = "Bulgarian";
            break;
        case "ca":
            $language_text = "Catalan";
            break;
        case "ceb":
            $language_text = "Cebuano";
            break;
        case "zh-TW":
            $language_text = "Chinese";
            break;
        case "co":
            $language_text = "Corsican";
            break;
        case "hr":
            $language_text = "Croatian";
            break;
        case "cs":
            $language_text = "Czech";
            break;
        case "da":
            $language_text = "Danish";
            break;
        case "nl":
            $language_text = "Dutch";
            break;
        case "en":
            $language_text = "English";
            break;
        case "eo":
            $language_text = "Esperanto";
            break;
        case "et":
            $language_text = "Estonian";
            break;
        case "fi":
            $language_text = "Finnish";
            break;
        case "fr":
            $language_text = "French";
            break;
        case "fy":
            $language_text = "Frisian";
            break;
        case "gl":
            $language_text = "Galician";
            break;
        case "ka":
            $language_text = "Georgian";
            break;
        case "de":
            $language_text = "German";
            break;
        case "el":
            $language_text = "Greek";
            break;
        case "gu":
            $language_text = "Gujarati";
            break;
        case "ht":
            $language_text = "Haitian";
            break;
        case "ha":
            $language_text = "Hausa";
            break;
        case "haw":
            $language_text = "Hawaiian";
            break;
        case "iw":
            $language_text = "Hebrew";
            break;
        case "hi":
            $language_text = "Hindi";
            break;
        case "hmn":
            $language_text = "Hmong";
            break;
        case "hu":
            $language_text = "Hungarian";
            break;
        case "is":
            $language_text = "Icelandic";
            break;
        case "ig":
            $language_text = "Igbo";
            break;
        case "id":
            $language_text = "Indonesian";
            break;
        case "ga":
            $language_text = "Irish";
            break;
        case "it":
            $language_text = "Italian";
            break;
        case "ja":
            $language_text = "Japanese";
            break;
        case "jw":
            $language_text = "Javanese";
            break;
        case "kn":
            $language_text = "Kannada";
            break;
        case "kk":
            $language_text = "Kazakh";
            break;
        case "km":
            $language_text = "Khmer";
            break;
        case "ko":
            $language_text = "Korean";
            break;
        case "ku":
            $language_text = "Kurdish";
            break;
        case "ky":
            $language_text = "Kyrgyz";
            break;
        case "lo":
            $language_text = "Lao";
            break;
        case "la":
            $language_text = "Latin";
            break;
        case "lv":
            $language_text = "Latvian";
            break;
        case "lt":
            $language_text = "Lithuanian";
            break;
        case "lb":
            $language_text = "Luxembourgish";
            break;
        case "mk":
            $language_text = "Macedonian";
            break;
        case "mg":
            $language_text = "Malagasy";
            break;
        case "ms":
            $language_text = "Malay";
            break;
        case "ml":
            $language_text = "Malayalam";
            break;
        case "mt":
            $language_text = "Maltese";
            break;
        case "mi":
            $language_text = "Maori";
            break;
        case "mr":
            $language_text = "Marathi";
            break;
        case "mn":
            $language_text = "Mongolian";
            break;
        case "my":
            $language_text = "Myanmar";
            break;
        case "ne":
            $language_text = "Nepali";
            break;
        case "no":
            $language_text = "Norwegian";
            break;
        case "ny":
            $language_text = "Nyanja";
            break;
        case "ps":
            $language_text = "Pashto";
            break;
        case "fa":
            $language_text = "Persian";
            break;
        case "pl":
            $language_text = "Polish";
            break;
        case "pt":
            $language_text = "Portuguese";
            break;
        case "pa":
            $language_text = "Punjabi";
            break;
        case "ro":
            $language_text = "Romanian";
            break;
        case "ru":
            $language_text = "Russian";
            break;
        case "sm":
            $language_text = "Samoan";
            break;
        case "gd":
            $language_text = "Scots";
            break;
        case "sr":
            $language_text = "Serbian";
            break;
        case "st":
            $language_text = "Sesotho";
            break;
        case "sn":
            $language_text = "Shona";
            break;
        case "sd":
            $language_text = "Sindhi";
            break;
        case "si":
            $language_text = "Sinhala";
            break;
        case "sk":
            $language_text = "Slovak";
            break;
        case "sl":
            $language_text = "Slovenian";
            break;
        case "so":
            $language_text = "Somali";
            break;
        case "es":
            $language_text = "Spanish";
            break;
        case "su":
            $language_text = "Sundanese";
            break;
        case "sw":
            $language_text = "Swahili";
            break;
        case "sv":
            $language_text = "Swedish";
            break;
        case "tl":
            $language_text = "Tagalog";
            break;
        case "tg":
            $language_text = "Tajik";
            break;
        case "ta":
            $language_text = "Tamil";
            break;
        case "te":
            $language_text = "Telugu";
            break;
        case "th":
            $language_text = "Thai";
            break;
        case "tr":
            $language_text = "Turkish";
            break;
        case "uk":
            $language_text = "Ukrainian";
            break;
        case "ur":
            $language_text = "Urdu";
            break;
        case "uz":
            $language_text = "Uzbek";
            break;
        case "vi":
            $language_text = "Vietnamese";
            break;
        case "cy":
            $language_text = "Welsh";
            break;
        case "xh":
            $language_text = "Xhosa";
            break;
        case "yi":
            $language_text = "Yiddish";
            break;
        case "yo":
            $language_text = "Yoruba";
            break;
        case "zu":
            $language_text = "Zulu";
            break;
    }
    return $language_text;
}

function display_giveaways($website_url, $response, $display_type, $sweepwidget_wp_params_uri)
{
    foreach ($response as $type) {
        foreach ($type as $res) {
            foreach ($res as $r) {
                $competition_id = $r->competition_id;
                $competition_url = $r->competition_url;
                $type = $r->type;
                $title = $r->title;
                $description = $r->description;
                $rules = $r->rules;
                $start_time = $r->start_time;
                $end_time = $r->end_time;
                $time_zone = $r->time_zone;
                $language = $r->language;
                $number_of_winners = $r->number_of_winners;
                $image_loc = $r->image_loc;
                $image_ext = pathinfo($image_loc, PATHINFO_EXTENSION);
                $giveaway_embed_code = $r->giveaway_embed_code;
                $last_active_website = $r->last_active_website;

                if ($type !== $display_type) {
                    continue;
                }

                $deleted = 0;

?>

                <div class="user_competitions_each_holder">

                    <div class="user_competitions_each_holder_inner">

                        <?php if ($image_loc !== 'NULL') { // Has image 
                        ?>

                            <div class="user_competitions_each_holder_l">
                                <img style="max-width:100%; height:auto;" src="<?php echo $website_url . '/' . $image_loc; ?>.thumb_200_width.<?php echo $image_ext; ?>" alt="Preview" />
                            </div>

                        <?php } ?>

                        <div class="user_competitions_each_holder_r">

                            <div class="user_competitions_each_header" style="margin-bottom:5px;">
                                <?php echo $title; ?>
                            </div>

                            <div class="user_competitions_each_links" style="margin-bottom:5px;">

                                <!-- Edit -->
                                <a style="background:#ff6363;" target="_blank" rel="nofollow" href="<?php echo $website_url; ?>?<?php echo $sweepwidget_wp_params_uri; ?>&wp_redirect_url=<?php echo $website_url; ?>/user/update-widget/<?php echo $last_active_website; ?>/<?php echo $competition_id . '-' . $competition_url; ?>">Edit</a>

                                <!-- View hosted page -->
                                <a style="background:#4e72d9;" target="_blank" rel="nofollow" href="<?php echo $website_url; ?>/c/<?php echo $competition_id . '-' . $competition_url; ?>">Hosted Page</a>

                                <!-- Entries -->
                                <a style="background:#4db4fa;" target="_blank" rel="nofollow" href="<?php echo $website_url; ?>?<?php echo $sweepwidget_wp_params_uri; ?>&wp_redirect_url=<?php echo $website_url; ?>/user/reporting/<?php echo $last_active_website; ?>/<?php echo $competition_id . '-' . $competition_url; ?>/1">Entries</a>

                                <!-- Stats -->
                                <a style="background:#ffa345;" target="_blank" rel="nofollow" href="<?php echo $website_url; ?>?<?php echo $sweepwidget_wp_params_uri; ?>&wp_redirect_url=<?php echo $website_url; ?>/user/analytics/<?php echo $last_active_website; ?>/<?php echo $competition_id . '-' . $competition_url; ?>">Stats</a>

                            </div>

                            <div style="width:100%; margin-bottom:0px; float:left;">
                                <div id="get_embed_code_<?php echo $competition_id; ?>" class="get_embed_code" data-competition-id="<?php echo $competition_id; ?>" data-embed-type="embed_code">
                                    <div style="width:100%; max-width:300px; float:left;">
                                        Embed into your WordPress site
                                    </div>
                                </div>
                            </div>

                            <?php $wp_shortcode = '[sweepwidget id="' . $competition_id . '" url="' . $competition_url . '"]'; ?>

                            <div id="user_competitions_embed_code_each_textarea_message_<?php echo $competition_id; ?>" class="user_competitions_each_textarea_message" style="margin:20px 0 0 0; color:#999; line-height:24px;">
                                Copy &amp; paste this shortcode into the text of any post or page in your WordPress site.<br />
                                <a style="color:#33adff; font-weight:bold; text-decoration:underline;" href="https://sweepwidget.com/docs/how-to-embed-a-sweepwidget-giveaway-into-your-wordpress-site" target="_blank" rel="nofollow">
                                    View Instructions
                                </a>
                                <br />
                            </div>

                            <input id="user_competitions_embed_code_each_textarea_<?php echo $competition_id; ?>" class="user_competitions_each_textarea" value='<?php echo $wp_shortcode; ?>' style=" width:96%;
                                            max-width:350px;
                                            height: inherit;
                                            margin: 15px 0 20px 0;
                                            padding: 7px 2%;
                                            color: #999;
                                            font-size: 14px;
                                            line-height: 18px;
                                            border: 2px solid #eee;" />

                            <!-- Edit langage - not english -->
                            <?php if ($language !== 'en') { ?>

                                <div style="width:100%; float:left;">

                                    <a target="_blank" rel="nofollow" class="get_embed_code" style="color:#33adff; text-decoration:none;" href="<?php echo $website_url; ?>?<?php echo $sweepwidget_wp_params_uri; ?>&wp_redirect_url=<?php echo $website_url; ?>/user/edit-translation/<?php echo $last_active_website . '/' . $language; ?>">

                                        Edit <?php echo language_code_to_text($language); ?> Translations

                                    </a>

                                </div>

                            <?php } ?>

                            <div style="width:100%; margin-bottom:-5px; float:left;">
                                <div style="width:100%; margin-top:0px; float:left;">
                                    <a style="color:#33adff; text-decoration:none;" class="get_embed_code" style="font-weight:bold;" target="_blank" rel="nofollow" href="<?php echo $website_url; ?>?<?php echo $sweepwidget_wp_params_uri; ?>&wp_redirect_url=<?php echo $website_url; ?>/user/reporting/<?php echo $last_active_website; ?>/<?php echo $competition_id . '-' . $competition_url; ?>/1#whitelist-users">
                                        Allow / disallow entrant emails or IP's
                                    </a>
                                </div>
                            </div>

                            <div style="width:100%; margin-bottom:-5px; float:left;">
                                <div style="width:100%; margin-top:5px; float:left;">
                                    <a style="color:#33adff; text-decoration:none;" class="get_embed_code" style="font-weight:bold;" target="_blank" rel="nofollow" href="<?php echo $website_url; ?>?<?php echo $sweepwidget_wp_params_uri; ?>&wp_redirect_url=<?php echo $website_url; ?>/user/embed-widget/<?php echo $last_active_website; ?>/<?php echo $competition_id . '-' . $competition_url; ?>#custom-url">
                                        Create a unique URL for your hosted landing page
                                    </a>
                                </div>
                            </div>

                            <!-- Restore link for deleted sweep -->
                            <?php if ($deleted == 1) { ?>

                                <div style="width:100%; margin-top:15px; float:left;">
                                    <a style="color:#0f9921; text-decoration:none;" class="get_embed_code" target="_blank" rel="nofollow" href="<?php echo $website_url; ?>?<?php echo $sweepwidget_wp_params_uri; ?>&wp_redirect_url=<?php echo $website_url; ?>/user/restore-widget/<?php echo $last_active_website; ?>/<?php echo $competition_id . '-' . $competition_url; ?>">Restore Widget</a>
                                </div>

                                <div style="width:100%; margin-top:15px; float:left;">
                                    <a style="color:#999; text-decoration:none;" class="get_embed_code" target="_blank" rel="nofollow" href="<?php echo $website_url; ?>?<?php echo $sweepwidget_wp_params_uri; ?>&wp_redirect_url=<?php echo $website_url; ?>/user/delete-widget/<?php echo $last_active_website; ?>/<?php echo $competition_id . '-' . $competition_url; ?>">Permanently Delete Giveaway</a>
                                </div>

                                <!-- Delete link-->
                            <?php } else { ?>

                                <div style="width:100%; margin-top:15px; float:left;">
                                    <a style="color:#999; text-decoration:none;" class="get_embed_code" target="_blank" rel="nofollow" href="<?php echo $website_url; ?>?<?php echo $sweepwidget_wp_params_uri; ?>&wp_redirect_url=<?php echo $website_url; ?>/user/mute-widget/<?php echo $last_active_website; ?>/<?php echo $competition_id . '-' . $competition_url; ?>">Pause Giveaway</a>
                                </div>

                            <?php } ?>

                        </div>

                    </div>

                </div>

    <?php

            }
        }
    }
}

// Display SweepWidget menu in admin console
function sweepwidget_admin_menu_main()
{

    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443 || $_SERVER['HTTP_X_FORWARDED_PORT'] == 443) ? "https://" : "http://";
    $sweepwidget_current_wp_user_id = get_current_user_id();
    $sweepwidget_current_domain = get_site_url();
    $sweepwidget_current_wp_user_info = wp_get_current_user();
    $sweepwidget_current_wp_user_email = $sweepwidget_current_wp_user_info->user_email;
    $sweepwidget_current_wp_user_name = $sweepwidget_current_wp_user_info->display_name;

    // Get SweepWidget access token
    $sweepwidget_access_token = get_option('sweepwidget_access_token', false);

    // If SweepWidget access token doesn't exist, create it
    if (empty($sweepwidget_access_token)) {

        $sweepwidget_access_token = wp_generate_password(64, false, false);
        add_option('sweepwidget_access_token', $sweepwidget_access_token, '', 'yes');
    }

    $sweepwidget_logo = plugins_url('public/img/sweepwidget_logo.png', __FILE__);

    $sweepwidget_wp_params_uri = 'wp_is_true=1&wp_domain=' . $sweepwidget_current_domain . '&wp_user_id=' . $sweepwidget_current_wp_user_id . '&wp_user_email=' . $sweepwidget_current_wp_user_email . '&wp_user_name=' . $sweepwidget_current_wp_user_name . '&wp_access_token=' . $sweepwidget_access_token . '&wp_new_version=1';

    $sweepwidget_link = 'https://sweepwidget.com?' . $sweepwidget_wp_params_uri;

    ?>

    <div id="sweepwidget_wrapper">

        <div id="sweepwidget_wrapper_inner">

            <div class="wrap" style="margin:0; padding:0;">

                <h2 id="sweepwidget_header">

                    <a target="_blank" href="<?php echo $sweepwidget_link; ?>&wp_redirect_page=sweepwidget&wp_redirect_url=">
                        <img style="border:none; outline:none;" src="<?php echo $sweepwidget_logo; ?>" />
                    </a>

                </h2>

                <div class="sweepwidget_content_wrapper" style="font-size:15px; line-height:25px;">

                    Welcome to your SweepWidget giveaway dashboard! Create a new giveaway by clicking the "+ New Giveaway" button below. Once it's finished, you can add it to any WordPress post or page with a simple 1-line embed code.

                </div>

            </div>

            <!-- Return all of this in JSON response. Do the same as SweepWidget e.g. live, scheduled, finished. -->

            <?php

            $website_url = 'https://sweepwidget.com';

            $curl = curl_init();

            $url_get_lists = "https://sweepwidget.com/sw_api/wp_giveaways?api_key=$sweepwidget_access_token&type=live&page_start=1";

            curl_setopt_array($curl, array(
                CURLOPT_URL => $url_get_lists,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json" // You must set the content-type to application/json
                ),
            ));

            $response = json_decode(curl_exec($curl));
            curl_close($curl);

            $scheduled_count = 0;
            $expired_count = 0;
            $live_count = 0;

            // Live count
            foreach ($response->live as $type) {
                foreach ($type as $res) {
                    $live_count++;
                }
            }

            // Expired count
            foreach ($response->expired as $type) {
                foreach ($type as $res) {
                    $expired_count++;
                }
            }

            // Scheduled count
            foreach ($response->scheduled as $type) {
                foreach ($type as $res) {
                    $scheduled_count++;
                }
            }

            ?>

            <!-- New Giveaway link -->
            <div id="sweepwidget_nav_holder">

                <a target="_blank" href="<?php echo $sweepwidget_link; ?>&wp_redirect_page=build-widget&wp_redirect_url=" style="padding:20px 38px; font-size:20px; border-radius:50px;">+ New Giveaway</a>

            </div>

            <!-- Additional links -->
            <div id="sweepwidget_nav_holder_2" style="margin-top:10px; margin-bottom:10px;">

                <a target="_blank" href="<?php echo $sweepwidget_link; ?>&wp_redirect_page=sweepwidget&wp_redirect_url=" style="background:#33adff; border:1px solid #33adff; font-size:15px; padding:7px 14px;">Manage Giveaways</a>

                <a target="_blank" href="<?php echo $sweepwidget_link; ?>&wp_redirect_page=update-profile&wp_redirect_url=" style="background:#33adff; border:1px solid #33adff; font-size:15px; padding:7px 14px">Account Settings</a>

                <a target="_blank" href="<?php echo $sweepwidget_link; ?>&wp_redirect_page=integrations&wp_redirect_url=" style="background:#33adff; border:1px solid #33adff; font-size:15px; padding:7px 14px">Integrations</a>

                <a target="_blank" href="https://sweepwidget.com/docs" style="background:#33adff; border:1px solid #33adff; font-size:15px; padding:7px 14px">Docs</a>

                <a target="_blank" href="<?php echo $sweepwidget_link; ?>&wp_redirect_page=affiliates&wp_redirect_url=" style="background:#33adff; border:1px solid #33adff; font-size:15px; padding:7px 14px">Affiliate Program</a>

            </div>

            <div id="margin_top_minimizer"></div>

            <!-- Live giveaways display -->
            <h2 id="user_sub_header_live_giveaways" class="user_sub_header" style="width:100%; margin-top:20px; margin-bottom:5px; font-size:22px; text-align:center; float:left;">
                <span id="live_giveaways_header_num" style="color:#3652a3;"></span>
                <span id="live_giveaways_header_text"></span>
            </h2>

            <?php display_giveaways($website_url, $response, 'Live', $sweepwidget_wp_params_uri); ?>

            <script>
                var live_count = '<?php echo $live_count; ?>';

                if (live_count == 0) {
                    $('#live_giveaways_header_num').hide();
                }
                if (live_count > 0) {
                    document.getElementById("live_giveaways_header_num").innerHTML = live_count;
                }
                if (live_count == 1) {
                    document.getElementById("live_giveaways_header_text").innerHTML = "Live Giveaway";
                } else if (live_count >= 2) {
                    document.getElementById("live_giveaways_header_text").innerHTML = "Live Giveaways";
                }
            </script>

            <!-- Scheduled giveaways display -->
            <h2 id="user_sub_header_scheduled_giveaways" class="user_sub_header" style="width:100%; margin-top:20px; margin-bottom:5px; font-size:22px; text-align:center; float:left;">
                <span id="scheduled_giveaways_header_num" style="color:#3652a3;"></span>
                <span id="scheduled_giveaways_header_text"></span>
            </h2>

            <?php display_giveaways($website_url, $response, 'Scheduled', $sweepwidget_wp_params_uri); ?>

            <script>
                var scheduled_count = '<?php echo $scheduled_count; ?>';
                if (scheduled_count == 0) {
                    $('#user_sub_header_scheduled_giveaways').hide();
                }
                if (scheduled_count > 0) {
                    document.getElementById("scheduled_giveaways_header_num").innerHTML = scheduled_count;
                }
                if (scheduled_count == 1) {
                    document.getElementById("scheduled_giveaways_header_text").innerHTML = "Scheduled Giveaway";
                } else if (scheduled_count >= 2) {
                    document.getElementById("scheduled_giveaways_header_text").innerHTML = "Scheduled Giveaways";
                }
            </script>

            <!-- Expired giveaways display -->
            <h2 id="user_sub_header_expired_giveaways" class="user_sub_header" style="width:100%; margin-top:20px; margin-bottom:5px; font-size:22px; text-align:center; float:left;">
                <span id="expired_giveaways_header_num" style="color:#3652a3;"></span>
                <span id="expired_giveaways_header_text"></span>
            </h2>

            <?php display_giveaways($website_url, $response, 'Expired', $sweepwidget_wp_params_uri); ?>

            <script>
                var expired_count = '<?php echo $expired_count; ?>';

                if (expired_count == 0) {
                    $('#user_sub_header_expired_giveaways').hide();
                }
                if (expired_count > 0) {
                    document.getElementById("expired_giveaways_header_num").innerHTML = expired_count;
                }
                if (expired_count == 1) {
                    document.getElementById("expired_giveaways_header_text").innerHTML = "Expired Giveaway";
                } else if (expired_count >= 2) {
                    document.getElementById("expired_giveaways_header_text").innerHTML = "Expired Giveaways";
                }
            </script>

            <div class="user_account_getting_started_links_wrapper">

                <div class="user_account_getting_started_link">
                    <a target="_blank" rel="nofollow" href="https://sweepwidget.com/blog/how-to-create-a-successful-online-giveaway-in-8-easy-steps-2020" style="color:#33adff;">
                        Tips: Run A Successful Giveaway
                    </a>
                </div>

                <div class="user_account_getting_started_link">
                    <a target="_blank" rel="nofollow" href="https://sweepwidget.com/docs/how-to-create-a-giveaway-with-sweepwidget" style="color:#33adff;">
                        Learn The SweepWidget Basics
                    </a>
                </div>

                <div class="user_account_getting_started_link">
                    <a target="_blank" rel="nofollow" href="https://sweepwidget.com/docs/" style="color:#33adff;">
                        Full SweepWidget Documentation
                    </a>
                </div>

            </div>

            <div id="user_examples_wrapper" class="entry_methods_box_holder_3" style="width:84%; margin:20px 8% 25px 8%; padding:5px 30px 20px 30px;">

                <div style="width:100%; margin:25px 0 27px 0; font-size:22px; font-weight:bold; text-align:center; float:left;">
                    Giveaway Launchpad
                </div>

                <div class="user_examples_link_holder">
                    <a target="_blank" rel="nofollow" href="<?php echo $sweepwidget_link; ?>&wp_redirect_page=build-widget&wp_redirect_url=" style="color:#fff; background:#3652a3;">
                        Start From Scratch
                    </a>
                </div>

                <div class="user_examples_link_holder">
                    <a target="_blank" rel="nofollow" href="<?php echo $sweepwidget_link; ?>&wp_redirect_page=build-widget&wp_redirect_url=&launchpad_hash=leaderboard" style="color:#fff; background:#ff8157;">
                        Leaderboard
                    </a>
                </div>

                <div class="user_examples_link_holder">
                    <a target="_blank" rel="nofollow" href="<?php echo $sweepwidget_link; ?>&wp_redirect_page=build-widget&wp_redirect_url=&launchpad_hash=unlock_prizes" style="color:#fff; background:#31e0d7">
                        Unlock Prizes
                    </a>
                </div>

                <div class="user_examples_link_holder">
                    <a target="_blank" rel="nofollow" href="<?php echo $sweepwidget_link; ?>&wp_redirect_page=build-widget&wp_redirect_url=&launchpad_hash=instant_coupons" style="color:#fff; background:#31e06c;">
                        Instant Coupons
                    </a>
                </div>

                <?php

                $giveaways_array = array(
                    'app_download_add|#1c2d37',
                    'blog_comment_add|#ff0066',
                    'bloglovin_follow_add|#222',
                    'bonus_add|#FFD700',
                    'custom_add|#fcba03',
                    'crypto_wallet_add|#F7931A',
                    'form_field_add|#bbb',
                    'discord_join_server_add|#7289da',
                    'ebay_follow_add|#86b817',
                    'etsy_add|#eb6d20',
                    'eventbrite_add|#ff8000',
                    'facebook_add|#3b5998',
                    'feedpress_add|#cc2900',
                    'instagram_add|#3f729b',
                    'linkedin_add|#0077b5',
                    'medium_add|#00ab6c',
                    'patreon_page_visit_add|#E85B46',
                    'pinterest_add|#bd081c',
                    'reddit_subscribe_add|#5f99cf',
                    'refer_friends_add|#cc0099',
                    'rss_add|#f26522',
                    'secret_code_add|#bbb',
                    'snapchat_follow_add|#fffc00',
                    'soundcloud_add|#ff3a00',
                    'spotify_add|#1db954',
                    'steam_join_group_add|#16211A',
                    'email_subscribe_add|#00cccc',
                    'telegram_add|#0088cc',
                    'tiktok_follow_add|#010101',
                    'tumblr_add|#35465c',
                    'twitch_add|#6441a5',
                    'twitter_add|#55acee',
                    'upload_a_file_add|#f4cb58',
                    'visit_a_page_add|#0079bf',
                    'youtube_add|#cd201f'
                );

                foreach ($giveaways_array as $g_full) {

                    $g_exp = explode('|', $g_full);
                    $g = $g_exp[0];
                    $background_color = $g_exp[1];

                    $g_remove_add = str_ireplace('_add', '', $g);
                    $g_remove_add = str_ireplace('facebook', 'facebook_page_like', $g_remove_add);
                    $g_remove_add = str_ireplace('youtube', 'youtube_channel_subscribe', $g_remove_add);
                    $g_remove_add = str_ireplace('twitter', 'twitter_follow', $g_remove_add);
                    $g_remove_add = str_ireplace('pinterest', 'pinterest_follow_user', $g_remove_add);
                    $g_remove_add = str_ireplace('instagram', 'instagram_follow', $g_remove_add);
                    $g_remove_add = str_ireplace('twitch', 'twitch_follow', $g_remove_add);
                    $g_remove_add = str_ireplace('tumblr', 'tumblr_follow', $g_remove_add);
                    $g_remove_add = str_ireplace('linkedin', 'linkedin_follow', $g_remove_add);
                    $g_remove_add = str_ireplace('soundcloud', 'soundcloud_like_song', $g_remove_add);
                    $g_remove_add = str_ireplace('eventbrite', 'attend_eventbrite_event', $g_remove_add);
                    $g_remove_add = str_ireplace('crypto_wallet', 'btc_crypto_wallet', $g_remove_add);
                    $g_remove_add = str_ireplace('telegram', 'telegram_join_channel', $g_remove_add);
                    $g_remove_add = str_ireplace('spotify', 'spotify_follow', $g_remove_add);
                    $g_remove_add = str_ireplace('medium', 'medium_clap', $g_remove_add);

                    $g_display = str_ireplace('_add', '', $g);
                    $g_display = str_ireplace('_follow', '', $g_display);
                    $g_display = str_ireplace('_join_group', '', $g_display);
                    $g_display = str_ireplace('_join_server', '', $g_display);
                    $g_display = str_ireplace('_page_visit', '', $g_display);
                    $g_display = str_ireplace('email_subscribe', 'newsletter', $g_display);
                    $g_display = str_ireplace('custom_add', 'create_your_own_entry_method', $g_display);
                    $g_display = str_ireplace('refer_friends_add', 'refer_a_friend', $g_display);
                    $g_display = str_ireplace('_subscribe', '', $g_display);
                    $g_display = str_ireplace('_', ' ', $g_display);
                    $g_display = ucwords($g_display);

                    $g = str_ireplace('tiktok_follow_add', 'tiktok_add', $g);

                    if ($g_display === 'Snapchat') {
                        $color = '#000';
                    } else {
                        $color = '#fff';
                    }

                ?>

                    <div class="user_examples_link_holder">
                        <a target="_blank" rel="nofollow" href="<?php echo $sweepwidget_link; ?>&wp_redirect_page=build-widget&wp_redirect_url=&launchpad_hash=<?php echo $g; ?>" style="color:<?php echo $color; ?>; background:<?php echo $background_color; ?>">
                            <?php echo $g_display; ?>
                        </a>
                    </div>

                <?php

                }

                ?>

            </div>

        </div>

    </div>

    <script>
        $(document.body).on('click', '.get_embed_code', function() {

            var id = $(this).attr('id');
            var comptition_id = $(this).attr('data-competition-id');
            var embed_type = $(this).attr('data-embed-type');

            $('#user_competitions_' + embed_type + '_each_textarea_' + comptition_id).slideToggle(300, function() {
                $(this).click(function() {
                    $(this).select();
                });
            });

            $('#user_competitions_' + embed_type + '_each_textarea_message_' + comptition_id).toggle();

        });
    </script>

<?php

}

// Admin head scripts
function sweepwidget_scripts()
{

    // CSS
    wp_register_style('sweepwidget_css', plugins_url('public/css/sw.css?v=2.1', __FILE__));
    wp_enqueue_style('sweepwidget_css');

    // JS
    wp_enqueue_script('sw_jquery_script', plugins_url('public/js/jquery-3.7.1.js', __FILE__), array(), false, false);
}
add_action('admin_init', 'sweepwidget_scripts');

// Shortcode with multiple attributes
function sweepwidget_embed_widget($attr)
{

    $args = shortcode_atts(array(
        'id' => '',
        'url' => ''
    ), $attr);

    // JS
    wp_enqueue_script('w_init', 'https://sweepwidget.com/w/j/w_init.js', array(), '1.0', true);

    $output = '<div id="' . $args['id'] . '-' . $args['url'] . '" class="sw_container full"></div>';
    return $output;
}
add_shortcode('sweepwidget', 'sweepwidget_embed_widget');

?>