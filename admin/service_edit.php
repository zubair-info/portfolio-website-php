<?php
session_start();
require_once('inc/admin_header.php');
require_once('inc/navbar.php');
// require_once('inc/sidebar.php');
require_once('../config.php');
if (!isset($_SESSION['user_status'])) {

    header('location: ../login.php');
}

// $id = $_GET['service_id'];
if (isset($_GET['service_id'])) {
    $_SESSION['id'] = $_GET['service_id'];
}
$id = $_SESSION['id'];

$get_query = "SELECT * FROM services WHERE id=$id";
$db_from = mysqli_query($db_conect, $get_query);
$after_assoc = mysqli_fetch_assoc($db_from);

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>service </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">service</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">service Edit</h3>
                        </div>
                        <div class="card-body">

                            <form action="service_edit_post.php" method="post">
                                <input type="hidden" name="id" class="form-control" value="<?= $after_assoc['id'] ?>">

                                <div class="mb-3">
                                    <div class="form-group">
                                        <label>Social Icon Search</label>
                                        <?php
                                        $iconsFAs = array(
                                            'fab fa-buromobelexperte', 'fas fa-burn', 'fas fa-bullseye', 'fas fa-bullhorn', 'fas fa-building', 'far fa-building', 'fas fa-bug', 'fab fa-btc', 'fas fa-briefcase-medical', 'fas fa-briefcase', 'fas fa-braille', 'fas fa-boxes', 'fas fa-box-open', 'fas fa-box', 'fas fa-bowling-ball', 'fas fa-bookmark', 'far fa-bookmark', 'fas fa-book', 'fas fa-bomb', 'fas fa-bolt', 'fas fa-bold', 'fab fa-bluetooth-b', 'fab fa-bluetooth', 'fab fa-blogger-b', 'fab fa-blogger', 'fas fa-blind', 'fab fa-blackberry', 'fab fa-black-tie', 'fab fa-bity', 'fab fa-bitcoin', 'fab fa-bitbucket', 'fas fa-birthday-cake', 'fas fa-binoculars', 'fab fa-bimobject', 'fas fa-bicycle', 'fas fa-bell-slash', 'far fa-bell-slash', 'fas fa-bell', 'far fa-bell', 'fab fa-behance-square', 'fab fa-behance', 'fas fa-beer', 'fas fa-bed', 'fas fa-battery-three-quarters', 'fas fa-battery-quarter', 'fas fa-battery-half', 'fas fa-battery-full', 'fas fa-battery-empty', 'fas fa-bath', 'fas fa-basketball-ball', 'fas fa-baseball-ball', 'fas fa-bars', 'fas fa-barcode', 'fab fa-bandcamp', 'fas fa-band-aid', 'fas fa-ban', 'fas fa-balance-scale', 'fas fa-backward', 'fab fa-aws', 'fab fa-aviato', 'fab fa-avianex', 'fab fa-autoprefixer', 'fas fa-audio-description', 'fab fa-audible', 'fas fa-at', 'fab fa-asymmetrik', 'fas fa-asterisk', 'fas fa-assistive-listening-systems', 'fas fa-arrows-alt-v', 'fas fa-arrows-alt-h', 'fas fa-arrows-alt', 'fas fa-arrow-up', 'fas fa-arrow-right', 'fas fa-arrow-left', 'fas fa-arrow-down', 'fas fa-arrow-circle-up', 'fas fa-arrow-circle-right', 'fas fa-arrow-circle-left', 'fas fa-arrow-circle-down', 'fas fa-arrow-alt-circle-up', 'far fa-arrow-alt-circle-up', 'fas fa-arrow-alt-circle-right', 'far fa-arrow-alt-circle-right', 'fas fa-arrow-alt-circle-left', 'far fa-arrow-alt-circle-left', 'fas fa-arrow-alt-circle-down', 'far fa-arrow-alt-circle-down', 'fas fa-archive', 'fab fa-apple-pay', 'fab fa-apple', 'fab fa-apper', 'fab fa-app-store-ios', 'fab fa-app-store', 'fab fa-angular', 'fab fa-angrycreative', 'fas fa-angle-up', 'fas fa-angle-right', 'fas fa-angle-left', 'fas fa-angle-down', 'fas fa-angle-double-up', 'fas fa-angle-double-right', 'fas fa-angle-double-left', 'fas fa-angle-double-down', 'fab fa-angellist', 'fab fa-android', 'fas fa-anchor', 'fab fa-amilia', 'fas fa-american-sign-language-interpreting', 'fas fa-ambulance', 'fab fa-amazon-pay', 'fab fa-amazon', 'fas fa-allergies', 'fas fa-align-right', 'fas fa-align-left', 'fas fa-align-justify', 'fas fa-align-center', 'fab fa-algolia', 'fab fa-affiliatetheme', 'fab fa-adversal', 'fab fa-adn', 'fas fa-adjust', 'fas fa-address-card', 'far fa-address-card', 'fas fa-address-book', 'far fa-address-book', 'fab fa-accusoft', 'fab fa-accessible-icon', 'fab fa-500px', 'fab fa-youtube-square', 'fab fa-youtube', 'fab fa-yoast', 'fas fa-yen-sign', 'fab fa-yelp', 'fab fa-yandex-international', 'fab fa-yandex', 'fab fa-yahoo', 'fab fa-y-combinator', 'fab fa-xing-square', 'fab fa-xing', 'fab fa-xbox', 'fas fa-x-ray', 'fas fa-wrench', 'fab fa-wpforms', 'fab fa-wpexplorer', 'fab fa-wpbeginner', 'fab fa-wordpress-simple', 'fab fa-wordpress', 'fas fa-won-sign', 'fab fa-wolf-pack-battalion', 'fas fa-wine-glass', 'fab fa-windows', 'fas fa-window-restore', 'far fa-window-restore', 'fas fa-window-minimize', 'far fa-window-minimize', 'fas fa-window-maximize', 'far fa-window-maximize', 'fas fa-window-close', 'far fa-window-close', 'fab fa-wikipedia-w', 'fas fa-wifi', 'fab fa-whmcs', 'fas fa-wheelchair', 'fab fa-whatsapp-square', 'fab fa-whatsapp', 'fab fa-weixin', 'fas fa-weight', 'fab fa-weibo', 'fas fa-warehouse', 'fab fa-vuejs', 'fas fa-volume-up', 'fas fa-volume-off', 'fas fa-volume-down', 'fas fa-volleyball-ball', 'fab fa-vnv', 'fab fa-vk', 'fab fa-vine', 'fab fa-vimeo-v', 'fab fa-vimeo-square', 'fab fa-vimeo', 'fas fa-video-slash', 'fas fa-video', 'fab fa-viber', 'fas fa-vials', 'fas fa-vial', 'fab fa-viadeo-square', 'fab fa-viadeo', 'fab fa-viacoin', 'fas fa-venus-mars', 'fas fa-venus-double', 'fas fa-venus', 'fab fa-vaadin', 'fas fa-utensils', 'fas fa-utensil-spoon', 'fab fa-ussunnah', 'fas fa-users-cog', 'fas fa-users', 'fas fa-user-times', 'fas fa-user-tie', 'fas fa-user-tag', 'fas fa-user-slash', 'fas fa-user-shield', 'fas fa-user-secret', 'fas fa-user-plus', 'fas fa-user-ninja', 'fas fa-user-minus', 'fas fa-user-md', 'fas fa-user-lock', 'fas fa-user-graduate', 'fas fa-user-friends', 'fas fa-user-edit', 'fas fa-user-cog', 'fas fa-user-clock', 'fas fa-user-circle', 'far fa-user-circle', 'fas fa-user-check', 'fas fa-user-astronaut', 'fas fa-user-alt-slash', 'fas fa-user-alt', 'fas fa-user', 'far fa-user', 'fab fa-usb', 'fas fa-upload', 'fab fa-untappd', 'fas fa-unlock-alt', 'fas fa-unlock', 'fas fa-unlink', 'fas fa-university', 'fas fa-universal-access', 'fab fa-uniregistry', 'fas fa-undo-alt', 'fas fa-undo', 'fas fa-underline', 'fas fa-umbrella', 'fab fa-uikit', 'fab fa-uber', 'fab fa-typo3', 'fab fa-twitter-square', 'fab fa-twitter', 'fab fa-twitch', 'fas fa-tv', 'fab fa-tumblr-square', 'fab fa-tumblr', 'fas fa-tty', 'fas fa-truck-moving', 'fas fa-truck-loading', 'fas fa-truck', 'fas fa-trophy', 'fab fa-tripadvisor', 'fab fa-trello', 'fas fa-tree', 'fas fa-trash-alt', 'far fa-trash-alt', 'fas fa-trash', 'fas fa-transgender-alt', 'fas fa-transgender', 'fas fa-train', 'fas fa-trademark', 'fab fa-trade-federation', 'fas fa-toggle-on', 'fas fa-toggle-off', 'fas fa-tint', 'fas fa-times-circle', 'far fa-times-circle', 'fas fa-times', 'fas fa-ticket-alt', 'fas fa-thumbtack', 'fas fa-thumbs-up', 'far fa-thumbs-up', 'fas fa-thumbs-down', 'far fa-thumbs-down', 'fas fa-thermometer-three-quarters', 'fas fa-thermometer-quarter', 'fas fa-thermometer-half', 'fas fa-thermometer-full', 'fas fa-thermometer-empty', 'fas fa-thermometer', 'fab fa-themeisle', 'fas fa-th-list', 'fas fa-th-large', 'fas fa-th', 'fas fa-text-width', 'fas fa-text-height', 'fas fa-terminal', 'fab fa-tencent-weibo', 'fab fa-telegram-plane', 'fab fa-telegram', 'fab fa-teamspeak', 'fas fa-taxi', 'fas fa-tasks', 'fas fa-tape', 'fas fa-tags', 'fas fa-tag', 'fas fa-tachometer-alt', 'fas fa-tablets', 'fas fa-tablet-alt', 'fas fa-tablet', 'fas fa-table-tennis', 'fas fa-table', 'fas fa-syringe', 'fas fa-sync-alt', 'fas fa-sync', 'fab fa-supple', 'fas fa-superscript', 'fab fa-superpowers', 'fas fa-sun', 'far fa-sun', 'fas fa-suitcase', 'fas fa-subway', 'fas fa-subscript', 'fab fa-stumbleupon-circle', 'fab fa-stumbleupon', 'fab fa-studiovinari', 'fab fa-stripe-s', 'fab fa-stripe', 'fas fa-strikethrough', 'fas fa-street-view', 'fab fa-strava', 'fas fa-stopwatch', 'fas fa-stop-circle', 'far fa-stop-circle', 'fas fa-stop', 'fas fa-sticky-note', 'far fa-sticky-note', 'fab fa-sticker-mule', 'fas fa-stethoscope', 'fas fa-step-forward', 'fas fa-step-backward', 'fab fa-steam-symbol', 'fab fa-steam-square', 'fab fa-steam', 'fab fa-staylinked', 'fas fa-star-half', 'far fa-star-half', 'fas fa-star', 'far fa-star', 'fab fa-stack-overflow', 'fab fa-stack-exchange', 'fas fa-square-full', 'fas fa-square', 'far fa-square', 'fab fa-spotify', 'fas fa-spinner', 'fab fa-speakap', 'fas fa-space-shuttle', 'fab fa-soundcloud', 'fas fa-sort-up', 'fas fa-sort-numeric-up', 'fas fa-sort-numeric-down', 'fas fa-sort-down', 'fas fa-sort-amount-up', 'fas fa-sort-amount-down', 'fas fa-sort-alpha-up', 'fas fa-sort-alpha-down', 'fas fa-sort', 'fas fa-snowflake', 'far fa-snowflake', 'fab fa-snapchat-square', 'fab fa-snapchat-ghost', 'fab fa-snapchat', 'fas fa-smoking', 'fas fa-smile', 'far fa-smile', 'fab fa-slideshare', 'fas fa-sliders-h', 'fab fa-slack-hash', 'fab fa-slack', 'fab fa-skype', 'fab fa-skyatlas', 'fab fa-sith', 'fas fa-sitemap', 'fab fa-sistrix', 'fab fa-simplybuilt', 'fas fa-signal', 'fas fa-sign-out-alt', 'fas fa-sign-language', 'fas fa-sign-in-alt', 'fas fa-sign', 'fas fa-shower', 'fas fa-shopping-cart', 'fas fa-shopping-basket', 'fas fa-shopping-bag', 'fab fa-shirtsinbulk', 'fas fa-shipping-fast', 'fas fa-ship', 'fas fa-shield-alt', 'fas fa-shekel-sign', 'fas fa-share-square', 'far fa-share-square', 'fas fa-share-alt-square', 'fas fa-share-alt', 'fas fa-share', 'fab fa-servicestack', 'fas fa-server', 'fab fa-sellsy', 'fab fa-sellcast', 'fas fa-seedling', 'fab fa-searchengin', 'fas fa-search-plus', 'fas fa-search-minus', 'fas fa-search', 'fab fa-scribd', 'fab fa-schlix', 'fas fa-save', 'far fa-save', 'fab fa-sass', 'fab fa-safari', 'fas fa-rupee-sign', 'fas fa-ruble-sign', 'fas fa-rss-square', 'fas fa-rss', 'fab fa-rockrms', 'fab fa-rocketchat', 'fas fa-rocket', 'fas fa-road', 'fas fa-ribbon', 'fas fa-retweet', 'fab fa-resolving', 'fab fa-researchgate', 'fab fa-replyd', 'fas fa-reply-all', 'fas fa-reply', 'fab fa-renren', 'fab fa-rendact', 'fas fa-registered', 'far fa-registered', 'fas fa-redo-alt', 'fas fa-redo', 'fab fa-reddit-square', 'fab fa-reddit-alien', 'fab fa-reddit', 'fab fa-red-river', 'fas fa-recycle', 'fab fa-rebel', 'fab fa-readme', 'fab fa-react', 'fab fa-ravelry', 'fas fa-random', 'fab fa-r-project', 'fas fa-quote-right', 'fas fa-quote-left', 'fab fa-quora', 'fab fa-quinscape', 'fas fa-quidditch', 'fas fa-question-circle', 'far fa-question-circle', 'fas fa-question', 'fas fa-qrcode', 'fab fa-qq', 'fab fa-python', 'fas fa-puzzle-piece', 'fab fa-pushed', 'fab fa-product-hunt', 'fas fa-procedures', 'fas fa-print', 'fas fa-prescription-bottle-alt', 'fas fa-prescription-bottle', 'fas fa-power-off', 'fas fa-pound-sign', 'fas fa-portrait', 'fas fa-poo', 'fas fa-podcast', 'fas fa-plus-square', 'far fa-plus-square', 'fas fa-plus-circle', 'fas fa-plus', 'fas fa-plug', 'fab fa-playstation', 'fas fa-play-circle', 'far fa-play-circle', 'fas fa-play', 'fas fa-plane', 'fab fa-pinterest-square', 'fab fa-pinterest-p', 'fab fa-pinterest', 'fas fa-pills', 'fas fa-piggy-bank', 'fab fa-pied-piper-pp', 'fab fa-pied-piper-hat', 'fab fa-pied-piper-alt', 'fab fa-pied-piper', 'fab fa-php', 'fas fa-phone-volume', 'fas fa-phone-square', 'fas fa-phone-slash', 'fas fa-phone', 'fab fa-phoenix-squadron', 'fab fa-phoenix-framework', 'fab fa-phabricator', 'fab fa-periscope', 'fas fa-percent', 'fas fa-people-carry', 'fas fa-pencil-alt', 'fas fa-pen-square', 'fab fa-paypal', 'fas fa-paw', 'fas fa-pause-circle', 'far fa-pause-circle', 'fas fa-pause', 'fab fa-patreon', 'fas fa-paste', 'fas fa-paragraph', 'fas fa-parachute-box', 'fas fa-paperclip', 'fas fa-paper-plane', 'far fa-paper-plane', 'fas fa-pallet', 'fab fa-palfed', 'fas fa-paint-brush', 'fab fa-pagelines', 'fab fa-page4', 'fas fa-outdent', 'fab fa-osi', 'fab fa-optin-monster', 'fab fa-opera', 'fab fa-openid', 'fab fa-opencart', 'fab fa-old-republic', 'fab fa-odnoklassniki-square', 'fab fa-odnoklassniki', 'fas fa-object-ungroup', 'far fa-object-ungroup', 'fas fa-object-group', 'far fa-object-group', 'fab fa-nutritionix', 'fab fa-ns8', 'fab fa-npm', 'fas fa-notes-medical', 'fab fa-node-js', 'fab fa-node', 'fab fa-nintendo-switch', 'fas fa-newspaper', 'far fa-newspaper', 'fas fa-neuter', 'fab fa-napster', 'fas fa-music', 'fas fa-mouse-pointer', 'fas fa-motorcycle', 'fas fa-moon', 'far fa-moon', 'fas fa-money-bill-alt', 'far fa-money-bill-alt', 'fab fa-monero', 'fab fa-modx', 'fas fa-mobile-alt', 'fas fa-mobile', 'fab fa-mizuni', 'fab fa-mixcloud', 'fab fa-mix', 'fas fa-minus-square', 'far fa-minus-square', 'fas fa-minus-circle', 'fas fa-minus', 'fab fa-microsoft', 'fas fa-microphone-slash', 'fas fa-microphone', 'fas fa-microchip', 'fas fa-mercury', 'fas fa-meh', 'far fa-meh', 'fab fa-meetup', 'fab fa-medrt', 'fas fa-medkit', 'fab fa-medium-m', 'fab fa-medium', 'fab fa-medapps', 'fab fa-maxcdn', 'fab fa-mastodon', 'fas fa-mars-stroke-v', 'fas fa-mars-stroke-h', 'fas fa-mars-stroke', 'fas fa-mars-double', 'fas fa-mars', 'fas fa-map-signs', 'fas fa-map-pin', 'fas fa-map-marker-alt', 'fas fa-map-marker', 'fas fa-map', 'far fa-map', 'fab fa-mandalorian', 'fas fa-male', 'fas fa-magnet', 'fas fa-magic', 'fab fa-magento', 'fab fa-lyft', 'fas fa-low-vision', 'fas fa-long-arrow-alt-up', 'fas fa-long-arrow-alt-right', 'fas fa-long-arrow-alt-left', 'fas fa-long-arrow-alt-down', 'fas fa-lock-open', 'fas fa-lock', 'fas fa-location-arrow', 'fas fa-list-ul', 'fas fa-list-ol', 'fas fa-list-alt', 'far fa-list-alt', 'fas fa-list', 'fas fa-lira-sign', 'fab fa-linux', 'fab fa-linode', 'fab fa-linkedin-in', 'fab fa-linkedin', 'fas fa-link', 'fab fa-line', 'fas fa-lightbulb', 'far fa-lightbulb', 'fas fa-life-ring', 'far fa-life-ring', 'fas fa-level-up-alt', 'fas fa-level-down-alt', 'fab fa-less', 'fas fa-lemon', 'far fa-lemon', 'fab fa-leanpub', 'fas fa-leaf', 'fab fa-lastfm-square', 'fab fa-lastfm', 'fab fa-laravel', 'fas fa-laptop', 'fas fa-language', 'fab fa-korvue', 'fab fa-kickstarter-k', 'fab fa-kickstarter', 'fab fa-keycdn', 'fas fa-keyboard', 'far fa-keyboard', 'fab fa-keybase', 'fas fa-key', 'fab fa-jsfiddle', 'fab fa-js-square', 'fab fa-js', 'fab fa-joomla', 'fab fa-joget', 'fab fa-jenkins', 'fab fa-jedi-order', 'fab fa-java', 'fab fa-itunes-note', 'fab fa-itunes', 'fas fa-italic', 'fab fa-ioxhost', 'fab fa-internet-explorer', 'fab fa-instagram', 'fas fa-info-circle', 'fas fa-info', 'fas fa-industry', 'fas fa-indent', 'fas fa-inbox', 'fab fa-imdb', 'fas fa-images', 'far fa-images', 'fas fa-image', 'far fa-image', 'fas fa-id-card-alt', 'fas fa-id-card', 'far fa-id-card', 'fas fa-id-badge', 'far fa-id-badge', 'fas fa-i-cursor', 'fab fa-hubspot', 'fab fa-html5', 'fab fa-houzz', 'fas fa-hourglass-start', 'fas fa-hourglass-half', 'fas fa-hourglass-end', 'fas fa-hourglass', 'far fa-hourglass', 'fab fa-hotjar', 'fas fa-hospital-symbol', 'fas fa-hospital-alt', 'fas fa-hospital', 'far fa-hospital', 'fab fa-hooli', 'fas fa-home', 'fas fa-hockey-puck', 'fas fa-history', 'fab fa-hire-a-helper', 'fab fa-hips', 'fas fa-heartbeat', 'fas fa-heart', 'far fa-heart', 'fas fa-headphones', 'fas fa-heading', 'fas fa-hdd', 'far fa-hdd', 'fas fa-hashtag', 'fas fa-handshake', 'far fa-handshake', 'fas fa-hands-helping', 'fas fa-hands', 'fas fa-hand-spock', 'far fa-hand-spock', 'fas fa-hand-scissors', 'far fa-hand-scissors', 'fas fa-hand-rock', 'far fa-hand-rock', 'fas fa-hand-pointer', 'far fa-hand-pointer', 'fas fa-hand-point-up', 'far fa-hand-point-up', 'fas fa-hand-point-right', 'far fa-hand-point-right', 'fas fa-hand-point-left', 'far fa-hand-point-left', 'fas fa-hand-point-down', 'far fa-hand-point-down', 'fas fa-hand-peace', 'far fa-hand-peace', 'fas fa-hand-paper', 'far fa-hand-paper', 'fas fa-hand-lizard', 'far fa-hand-lizard', 'fas fa-hand-holding-usd', 'fas fa-hand-holding-heart', 'fas fa-hand-holding', 'fab fa-hacker-news-square', 'fab fa-hacker-news', 'fas fa-h-square', 'fab fa-gulp', 'fab fa-grunt', 'fab fa-gripfire', 'fab fa-grav', 'fab fa-gratipay', 'fas fa-graduation-cap', 'fab fa-google-wallet', 'fab fa-google-plus-square', 'fab fa-google-plus-g', 'fab fa-google-plus', 'fab fa-google-play', 'fab fa-google-drive', 'fab fa-google', 'fab fa-goodreads-g', 'fab fa-goodreads', 'fas fa-golf-ball', 'fab fa-gofore', 'fas fa-globe', 'fab fa-glide-g', 'fab fa-glide', 'fas fa-glass-martini', 'fab fa-gitter', 'fab fa-gitlab', 'fab fa-gitkraken', 'fab fa-github-square', 'fab fa-github-alt', 'fab fa-github', 'fab fa-git-square', 'fab fa-git', 'fas fa-gift', 'fab fa-gg-circle', 'fab fa-gg', 'fab fa-get-pocket', 'fas fa-genderless', 'fas fa-gem', 'far fa-gem', 'fas fa-gavel', 'fas fa-gamepad', 'fab fa-galactic-senate', 'fab fa-galactic-republic', 'fas fa-futbol', 'far fa-futbol', 'fab fa-fulcrum', 'fas fa-frown', 'far fa-frown', 'fab fa-freebsd', 'fab fa-free-code-camp', 'fab fa-foursquare', 'fas fa-forward', 'fab fa-forumbee', 'fab fa-fort-awesome-alt', 'fab fa-fort-awesome', 'fas fa-football-ball', 'fab fa-fonticons-fi', 'fab fa-fonticons', 'far fa-font-awesome-logo-full', 'fas fa-font-awesome-logo-full', 'fab fa-font-awesome-logo-full', 'fab fa-font-awesome-flag', 'fab fa-font-awesome-alt', 'fab fa-font-awesome', 'fas fa-font', 'fas fa-folder-open', 'far fa-folder-open', 'fas fa-folder', 'far fa-folder', 'fab fa-fly', 'fab fa-flipboard', 'fab fa-flickr', 'fas fa-flask', 'fas fa-flag-checkered', 'fas fa-flag', 'far fa-flag', 'fab fa-firstdraft', 'fab fa-first-order-alt', 'fab fa-first-order', 'fas fa-first-aid', 'fab fa-firefox', 'fas fa-fire-extinguisher', 'fas fa-fire', 'fas fa-filter', 'fas fa-film', 'fas fa-file-word', 'far fa-file-word', 'fas fa-file-video', 'far fa-file-video', 'fas fa-file-powerpoint', 'far fa-file-powerpoint', 'fas fa-file-pdf', 'far fa-file-pdf', 'fas fa-file-medical-alt', 'fas fa-file-medical', 'fas fa-file-image', 'far fa-file-image', 'fas fa-file-excel', 'far fa-file-excel', 'fas fa-file-code', 'far fa-file-code', 'fas fa-file-audio', 'far fa-file-audio', 'fas fa-file-archive', 'far fa-file-archive', 'fas fa-file-alt', 'far fa-file-alt', 'fas fa-file', 'far fa-file', 'fas fa-fighter-jet', 'fas fa-female', 'fas fa-fax', 'fas fa-fast-forward', 'fas fa-fast-backward', 'fab fa-facebook-square', 'fab fa-facebook-messenger', 'fab fa-facebook-f', 'fab fa-facebook', 'fas fa-eye-slash', 'far fa-eye-slash', 'fas fa-eye-dropper', 'fas fa-eye', 'far fa-eye', 'fas fa-external-link-square-alt', 'fas fa-external-link-alt', 'fab fa-expeditedssl', 'fas fa-expand-arrows-alt', 'fas fa-expand', 'fas fa-exclamation-triangle', 'fas fa-exclamation-circle', 'fas fa-exclamation', 'fas fa-exchange-alt', 'fas fa-euro-sign', 'fab fa-etsy', 'fab fa-ethereum', 'fab fa-erlang', 'fas fa-eraser', 'fab fa-envira', 'fas fa-envelope-square', 'fas fa-envelope-open', 'far fa-envelope-open', 'fas fa-envelope', 'far fa-envelope', 'fab fa-empire', 'fab fa-ember', 'fas fa-ellipsis-v', 'fas fa-ellipsis-h', 'fab fa-elementor', 'fas fa-eject', 'fas fa-edit', 'far fa-edit', 'fab fa-edge', 'fab fa-ebay', 'fab fa-earlybirds', 'fab fa-dyalog', 'fab fa-drupal', 'fab fa-dropbox', 'fab fa-dribbble-square', 'fab fa-dribbble', 'fab fa-draft2digital', 'fas fa-download', 'fas fa-dove', 'fas fa-dot-circle', 'far fa-dot-circle', 'fas fa-donate', 'fas fa-dolly-flatbed', 'fas fa-dolly', 'fas fa-dollar-sign', 'fab fa-docker', 'fab fa-dochub', 'fas fa-dna', 'fab fa-discourse', 'fab fa-discord', 'fab fa-digital-ocean', 'fab fa-digg', 'fas fa-diagnoses', 'fab fa-deviantart', 'fas fa-desktop', 'fab fa-deskpro', 'fab fa-deploydog', 'fab fa-delicious', 'fas fa-deaf', 'fas fa-database', 'fab fa-dashcube', 'fab fa-d-and-d', 'fab fa-cuttlefish', 'fas fa-cut', 'fas fa-cubes', 'fas fa-cube', 'fab fa-css3-alt', 'fab fa-css3', 'fas fa-crosshairs', 'fas fa-crop', 'fas fa-credit-card', 'far fa-credit-card', 'fab fa-creative-commons-share', 'fab fa-creative-commons-sampling-plus', 'fab fa-creative-commons-sampling', 'fab fa-creative-commons-sa', 'fab fa-creative-commons-remix', 'fab fa-creative-commons-pd-alt', 'fab fa-creative-commons-pd', 'fab fa-creative-commons-nd', 'fab fa-creative-commons-nc-jp', 'fab fa-creative-commons-nc-eu', 'fab fa-creative-commons-nc', 'fab fa-creative-commons-by', 'fab fa-creative-commons', 'fab fa-cpanel', 'fas fa-couch', 'fas fa-copyright', 'far fa-copyright', 'fas fa-copy', 'far fa-copy', 'fab fa-contao', 'fab fa-connectdevelop', 'fas fa-compress', 'fas fa-compass', 'far fa-compass', 'fas fa-comments', 'far fa-comments', 'fas fa-comment-slash', 'fas fa-comment-dots', 'far fa-comment-dots', 'fas fa-comment-alt', 'far fa-comment-alt', 'fas fa-comment', 'far fa-comment', 'fas fa-columns', 'fas fa-cogs', 'fas fa-cog', 'fas fa-coffee', 'fab fa-codiepie', 'fab fa-codepen', 'fas fa-code-branch', 'fas fa-code', 'fab fa-cloudversify', 'fab fa-cloudsmith', 'fab fa-cloudscale', 'fas fa-cloud-upload-alt', 'fas fa-cloud-download-alt', 'fas fa-cloud', 'fas fa-closed-captioning', 'far fa-closed-captioning', 'fas fa-clone', 'far fa-clone', 'fas fa-clock', 'far fa-clock', 'fas fa-clipboard-list', 'fas fa-clipboard-check', 'fas fa-clipboard', 'far fa-clipboard', 'fas fa-circle-notch', 'fas fa-circle', 'far fa-circle', 'fab fa-chrome', 'fas fa-child', 'fas fa-chevron-up', 'fas fa-chevron-right', 'fas fa-chevron-left', 'fas fa-chevron-down', 'fas fa-chevron-circle-up', 'fas fa-chevron-circle-right', 'fas fa-chevron-circle-left', 'fas fa-chevron-circle-down', 'fas fa-chess-rook', 'fas fa-chess-queen', 'fas fa-chess-pawn', 'fas fa-chess-knight', 'fas fa-chess-king', 'fas fa-chess-board', 'fas fa-chess-bishop', 'fas fa-chess', 'fas fa-check-square', 'far fa-check-square', 'fas fa-check-circle', 'far fa-check-circle', 'fas fa-check', 'fas fa-chart-pie', 'fas fa-chart-line', 'fas fa-chart-bar', 'far fa-chart-bar', 'fas fa-chart-area', 'fas fa-certificate', 'fab fa-centercode', 'fab fa-cc-visa', 'fab fa-cc-stripe', 'fab fa-cc-paypal', 'fab fa-cc-mastercard', 'fab fa-cc-jcb', 'fab fa-cc-discover', 'fab fa-cc-diners-club', 'fab fa-cc-apple-pay', 'fab fa-cc-amex', 'fab fa-cc-amazon-pay', 'fas fa-cart-plus', 'fas fa-cart-arrow-down', 'fas fa-caret-up', 'fas fa-caret-square-up', 'far fa-caret-square-up', 'fas fa-caret-square-right', 'far fa-caret-square-right', 'fas fa-caret-square-left', 'far fa-caret-square-left', 'fas fa-caret-square-down', 'far fa-caret-square-down', 'fas fa-caret-right', 'fas fa-caret-left', 'fas fa-caret-down', 'fas fa-car', 'fas fa-capsules', 'fas fa-camera-retro', 'fas fa-camera', 'fas fa-calendar-times', 'far fa-calendar-times', 'fas fa-calendar-plus', 'far fa-calendar-plus', 'fas fa-calendar-minus', 'far fa-calendar-minus', 'fas fa-calendar-check', 'far fa-calendar-check', 'fas fa-calendar-alt', 'far fa-calendar-alt', 'fas fa-calendar', 'far fa-calendar', 'fas fa-calculator', 'fab fa-buysellads', 'fas fa-bus',

                                        );

                                        ?>

                                        <select class="form-control select2" name="social_icon_search" style="width: 100%;">
                                            <option selected="selected">Select Icon</option>
                                            <?php

                                            foreach ($iconsFAs as $icons) :

                                            ?>

                                                <option value="<?php echo $icons ?>"><?= $icons ?></option>

                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                </div>

                                <!-- <div class="mb-3">
                                    <label for="" class="text-capitalize">Icon</label>
                                    <input type="text" name="social_icon_search" value="<?= $after_assoc['social_icon_search'] ?> " class="form-control">
                                    
                                </div> -->
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Heading</label>
                                    <input type="text" name="heading" value="<?= $after_assoc['heading'] ?> " class=" form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_heading'])) {
                                            echo $_SESSION['error_msg_heading'];
                                            unset($_SESSION['error_msg_heading']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Sub Heading</label>
                                    <input type="text" name="sub_heading" value="<?= $after_assoc['sub_heading'] ?>" class=" form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_sub_heading'])) {
                                            echo $_SESSION['error_msg_sub_heading'];
                                            unset($_SESSION['error_msg_sub_heading']);
                                        }
                                        ?>
                                    </span>
                                </div>


                                <button class="btn btn-success" type="submit">Update service</button>
                            </form>

                        </div>

                    </div>


                </div>

            </div>
            <!-- /.card -->
        </div>
    </section>
    <!-- /.col -->
</div>





<?php
require_once('inc/admin_footer.php');

?>