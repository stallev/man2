<footer class="footer">
    <div class="footer__container">
        <div class="footer__main">
            <div class="footer__info">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="footer__logo">
                    <?php 
                    $logo = carbon_get_theme_option('crf_footer_logo');
                    if ($logo) {
                        echo carbon_get_theme_option('crf_header_logo');
                    } else {
                        // Fallback SVG logo if no image is set
                        ?>
                        <svg class="footer__logo-img" version="1.1" viewBox="0 0 2048 1353" width="180" height="119" xmlns="http://www.w3.org/2000/svg">
                            <path transform="translate(803,3)" d="m0 0h23l15 4 16 7 10 7 11 11 9 14 7 17 3 15 2 16 3 8 9 10 7 1 15-16 12-11 16-16 7-5 6-2h7l10 5 6 7 2 9-3 10v5l16 16 7 8 44 44 5 3 3-4 4-9 4-5 4 1 9 7 7 8 16 17 13 12 34 34v2h2l31 31 7 8 11 11 4 7v104l1 21 3 5 24 24 4 7 1 82 6 4 11 3 1 1v358l1 25 2 8 3 2h13l2-4 1-156v-166l1-50 6-12 5-4 5-2 7-1 57-1h251l9 3 6 10 12 29 13 34 22 56 14 36 12 27 5 6 8 4 47 10 35 11 21 8 30 13 33 16 22 12 21 12 22 14 12 8 10 8 7 7 7 11 4 13 1 7v93l1 16 3 9 6 5 7 2 23 3 5 2 4 15v99l-4 10-4 4-9 2h-220l-5-5-5-11-5-12-10-18-8-10-9-10-8-8-14-10-14-8-14-6-25-6-8-1h-34l-17 3-20 6-16 8-11 7-13 10-15 15-8 10-9 15-10 21-4 8-6 2h-690l-6-4-5-10-5-13-10-18-11-14-7-8-8-7-13-10-14-8-17-7-22-5-8-1h-34l-17 3-20 6-21 10-14 10-10 9-11 11-9 12-8 13-10 21-4 8-4 3-9-1h-47l-5-5-9-22-10-17-10-13-9-10-11-10-18-12-19-9-20-5-15-2h-33l-25 5-19 7-17 9-12 9-12 11-10 11-12 18-9 17-5 14-3 3-3 1-138-1-13-3-11-6-9-8-7-11-3-9-1-7-1-27 1-105 2-9 9-14 8-7 13-9-31-2-8-4-6-7-1-2v-196l-2-1v-2l4-4 5-10 2-2 9-1 123-1h938l30-1-1-173 8-2 12-2 2-1 1-36-4-8-8-10-11-12-19-19-7-8-7-7-7-8-19-19-7-8-13-13-7-8-10-10-7-8-7-7-10-5-39-11-54-13-44-11-5-3 3-13v-6l-7-3-44-11-42-10-43-11-21-5-13-3-6 11-4 4-9 3-20 5-11-1-5-3-5-8-4-9-6-30v-2l-14 4-19 8-43 18-38 17-58 25-63 27-41 18-39 17-34 15-11 5-6 2-1-1v-72l2-6 13-6 30-13 38-17 41-19 39-18 20-9 29-13 35-16 33-15 38-17 36-16 39-18 36-16 33-16 23-10 5-3 8-20 7-11 12-12 15-10 11-5 9-3z" fill="#FDFDFD"/>
                            <path transform="translate(1393,584)" d="m0 0h159l32 1 7 4 6 10 6 15 12 36 15 43 16 46 9 25-1 5-7 8-19 19-7 8-16 16-7 8-7 7-4 5-8 5h-238l-2-4v-237l3-10 4-5 9-4z" fill="#232023"/>
                            <path transform="translate(1655,1066)" d="m0 0h18l19 2 15 4 19 8 14 9 10 8 8 7 10 13 8 14 6 12 5 17 2 13v30l-3 19-4 12-7 16-8 12-7 9-12 13-15 11-17 9-17 6-11 3-8 1h-27l-14-2-20-6-16-8-11-7-11-9-11-11-12-17-8-15-5-14-4-18-1-11v-13l2-18 5-19 7-16 9-14 12-14 7-7 17-12 17-9 16-5 11-2z" fill="#FDFDFD"/>
                            <path transform="translate(332,1066)" d="m0 0h18l20 2 19 5 16 8 14 9 13 11 11 12 10 15 7 15 5 17 2 16v25l-3 19-5 16-6 14-10 15-9 10-6 7-13 10-15 9-20 8-16 4-8 1h-27l-18-3-19-7-15-8-14-10-16-16-12-17-8-15-6-21-2-10-1-10v-12l2-19 4-17 8-19 11-17 11-12 5-5 8-7 11-7 21-10 21-5z" fill="#FDFDFD"/>
                            <path transform="translate(674,1066)" d="m0 0h18l20 2 15 4 17 7 14 8 13 10 7 7 10 13 8 14 6 13 5 17 2 13v30l-3 18-5 15-8 16-8 12-12 14-9 8-13 9-17 9-21 7-12 2h-29l-14-2-16-5-14-6-13-8-9-7-10-9-11-13-9-14-8-16-5-17-2-12v-28l3-19 6-18 9-17 7-10 12-14 9-8 10-7 19-10 16-5 10-2z" fill="#FDFDFD"/>
                            <path transform="translate(104,275)" d="m0 0h14l12 6 8 9 4 4h35l2 2 1 6v51l-1 11-1 1h-8l-6 2-1 3v12l1 7v26l-1 57 1 15v20l-2 20-4 10-9 10-8 7-10-2h-9l-6 2-3-1-7-8-4-5-7-10-1-3-1-48 1-7v-96l-1-29-3-9-10-10-5-12-1-9 4-13 6-8 7-6 9-4z" fill="#FDFDFD"/>
                            <path transform="translate(331,1120)" d="m0 0h25l12 3 14 7 11 9 7 8 7 11 5 15 1 6v23l-3 12-6 12-7 10-9 9-9 6-12 6-12 3h-25l-16-4-12-7-12-11-7-10-7-14-4-15v-21l3-12 8-15 7-9 9-9 14-8 12-4z" fill="#232023"/>
                            <path transform="translate(672,1120)" d="m0 0h25l16 4 11 6 9 7 8 8 9 14 5 15 1 8v13l-2 14-5 12-7 12-9 10-13 9-13 6-10 2h-23l-16-4-10-5-9-7-9-9-7-11-5-12-3-12v-23l4-14 8-14 9-11 9-7 10-6z" fill="#232023"/>
                            <path transform="translate(1654,1120)" d="m0 0h21l14 3 12 5 11 8 8 8 8 12 5 13 2 9v23l-3 12-8 16-7 10-11 9-14 8-9 3-6 1h-23l-17-4-11-6-10-8-10-12-7-14-4-14-1-9v-9l3-16 8-17 8-10 7-7 15-9 13-4z" fill="#232023"/>
                            <path transform="translate(755,146)" d="m0 0 6 1 14 9 16 7 17 4 17-2 6 3 10 9 7 8 12 13 14 15 12 13 12 11 1 5-16-2-10-4h-8l-3 16-3 3-25-5-64-16-42-10-27-6-19-4-7-6-4-11-1-4v-9l6-4 31-14 25-11 19-8z" fill="#232023"/>
                            <path transform="translate(969,122)" d="m0 0 5 1 10 9 5 5 10 9 8 8 8 7 3 3v2l4 2 8 9 6 5 10 13v5l-8 7h-2l1 7 13 14 5 4 50 50 6 5 4 5 8 7 17 16 9 9 6 8 4 10v12l-6-2-8-7-68-68-8-7-25-25-7-8-37-37-8-7-44-44-1-4 9-10 5-4 7-8z" fill="#232023"/>
                            <path transform="translate(114,736)" d="m0 0h43l2 3 1 5v7l-1 1-9 1h-80v120l1 14 86 1 2 1v15l-3 3h-22l-71-1-9-1-2-1-1-3v-163l1-1z" fill="#232023"/>
                            <path transform="translate(995,736)" d="m0 0h64l4 1 1 4v143l-1 20-3 2h-103v-17l1-1 86-1v-63l1-71h-87l-2-4v-8l2-4z" fill="#232023"/>
                            <path transform="translate(126,455)" d="m0 0 14 1 10 4 6 5 4 7 2 4 1 16v29l-3 12-6 9-11 11-5 1-7-2h-9l-6 2-3-1-7-8-4-5-7-10-1-3-1-48h2l1-10 4-3h2v-2l15-7z" fill="#FDFDFD"/>
                            <path transform="translate(156,378)" d="m0 0 4 1v10l-1 14 2 3v19l-2 3v39l-5-3-8-5-6-2-14-1-12 3-13 6-1-1-1-28v-33l1-18 2-4 9 3 12 5 8 1 23-11z" fill="#232023"/>
                            <path transform="translate(125,552)" d="m0 0 12 6 2 9 7 9 10 10 6 8 6 12 1 4v15l-6 12-10 11-11 6-9 3-14 1-11-3-6-4-7-7-5-11-3-13v-15l2-3 5 1 4 4 8 16 6 5 4 2h9l10-4 2-4v-14l-3-10-4-6-11-14-4-5-1-8v-7l8-5z" fill="#FDFDFD"/>
                            <path transform="translate(1659,1154)" d="m0 0h10l12 3 10 7 7 10 3 11-1 12-4 11-9 10-8 5-6 2-8 1-13-2-10-6-7-8-6-12-1-5 1-13 5-10 9-10 8-4z" fill="#FDFDFD"/>
                            <path transform="translate(679,1154)" d="m0 0h10l12 3 9 6 6 7 4 9 1 5v8l-3 12-3 6-6 7-8 5-8 3h-15l-11-4-8-6-7-11-3-9v-11l3-10 8-11 8-6z" fill="#FDFDFD"/>
                            <path transform="translate(339,1154)" d="m0 0 13 1 11 4 8 7 5 10 2 10-1 13-4 11-4 5-9 6-11 4h-15l-10-4-8-7-7-12-2-8v-11l3-9 7-11 5-4 10-4z" fill="#FDFDFD"/>
                            <path transform="translate(732,67)" d="m0 0h2v2h-2l-1 3-10 5h-3v2l-5 2h-1v2l-5 2-3 5-5 3-10 3-7 5-8 4-13 6-10 4-8 2-16 9-7 1v2l-12 5-15 6-36 18-5 1v2l-16 8-7 4-7 2-6 3-3 1v2l-11 7-10 3v2l-3 2-14 3-14 5-7 3-15 5-12 6-6 1-11 1-2-5 20-9 29-13 35-16 33-15 38-17 36-16 39-18 36-16 33-16 23-10z" fill="#302E32"/>
                            <path transform="translate(814,53)" d="m0 0 8 1 12 6 7 7 5 10 1 4-1 13-7 12-6 5-13 6-5 1-10-2-8-4-9-9-5-11-1-5v-8l4-9 7-8 8-6z" fill="#232023"/>
                            <path transform="translate(221,888)" d="m0 0h93l2 1 1 3v14l-1 1h-134l-3-3-1-8 3-6 1-1z" fill="#232023"/>
                            <path transform="translate(366,888)" d="m0 0h106l1 2v9l-1 7-68 1h-68l-3-4v-8l3-5 2-1z" fill="#232023"/>
                            <path transform="translate(692,888)" d="m0 0h86l3 2v16l-1 1h-133l-3-4-1-6 3-7 1-1z" fill="#232023"/>
                            <path transform="translate(1544,624)" d="m0 0h5l1 5-5 8-9 10-12 13-85 85h-2v2l-8 7-10 10-4 2-7 1-1-5 5-10 103-103 3-1 1-3 8-7 7-7 8-6z" fill="#242124"/>
                            <path transform="translate(817,888)" d="m0 0h103l16 1 1 1v15l-4 2h-129l-4-2-1-3v-9l2-4z" fill="#232023"/>
                            <path transform="translate(493,888)" d="m0 0h126l7 2v16l-1 1h-131l-4-1-1-5v-9l1-3z" fill="#232023"/>
                            <path transform="translate(774,87)" d="m0 0h4l2 6 2 1v-7h1l3 10 5 8 9 8 7 3 10 1 12-5 8-5 7-11 2-2 1 1v7l-3 6-6 9-3 3-1 6 1 3-2 5-7-2h-5l-1 6 4 1 2 4 1 7 4 2 2 7-2 1 1 4 4 1v3l2 1-3 3-7-5-7-1-13 2-17-4-5-2 2-2-4-2-4-8 7-1h12l3-4 3 1 4-2-1-2-5-2-6-11-6-5-3-5-5-4v-2h-2l-4-8-2-10-2-5z" fill="#302E32"/>
                            <path transform="translate(538,736)" d="m0 0h85l3 6 1 9-1 1-15 1h-118l-4-5v-9l2-2z" fill="#232023"/>
                            <path transform="translate(838,736)" d="m0 0h96l1 2v14l-45 1h-84l-6-1-2-5 1-8 1-1 7-1z" fill="#232023"/>
                            <path transform="translate(191,736)" d="m0 0h108l16 1 2 6v7l-5 2-37 1h-92l-3-3-1-3v-7l1-3z" fill="#232023"/>
                            <path transform="translate(675,736)" d="m0 0h85l20 1 2 10-5 5-45 1h-83l-4-4v-9l2-3z" fill="#232023"/>
                            <path transform="translate(223,276)" d="m0 0h13l2 5 1 63v23l-2 12-1 2h-14l-3-1-2-5v-89l3-9z" fill="#FDFDFD"/>
                            <path transform="translate(381,736)" d="m0 0h59l29 1 1 1v14l-46 1h-77l-11-1-2-2v-8l2-4 7-1z" fill="#232023"/>
                            <path transform="translate(1550,658)" d="m0 0 3 1-1 9-8 11-3 3h-2l-2 4-52 52-8 7-18 18-4 2-5-1-2-2 1-4 8-11 17-17 8-7 57-57 9-7z" fill="#242125"/>
                            <path transform="translate(205,284)" d="m0 0 3 1v81l-1 7h-12l-6-2-1-11 1-63 1-11 2-1z" fill="#FDFDFD"/>
                            <path transform="translate(1508,624)" d="m0 0 4 2-1 5-9 11-22 22-7 8-33 33-8 7-10 10-9 6-5 1 1-10 4-6 12-11 75-75z" fill="#242124"/>
                            <path transform="translate(671,197)" d="m0 0 6 12 5 4 29 6 46 11 73 18 27 6h4l3-16 3-3h6l2 2-6-1 1 2 4 2-7 1-1 3h-2l2 5 1 1-1 7-5 5h-7l-16-5-10-4-17-3-9-2-15-3-7-2-20-4-16-4-25-6-23-6-9-3-7-2-9-11z" fill="#312F33"/>
                            <path transform="translate(891,58)" d="m0 0 2 2 4 18 2 16 3 8 9 10 7 1 15-16 12-11 11-11 1 4-5 4-1 4h-2l-1 6-2 4-6 5-9 9-1 2h-2l-1 4-8 5h-5l-3-4-6-2-10-6v-2l-3-1-4-12v-9l1-3h2l-1-8 1-6v-4l-1-6z" fill="#302E32"/>
                            <path transform="translate(644,212)" d="m0 0 9 2 7 4 2 4v14l-4 5-8 4-10-2-4-5-2-7v-8l4-7z" fill="#232023"/>
                            <path transform="translate(1267,541)" d="m0 0h1v66l-1 286h-1l-1-88v-141l1-96-1-12 1-1z" fill="#312F33"/>
                            <path transform="translate(94,359)" d="m0 0h1l1 16 4 3v3l2 1-1 3-1 18v33l1 28 1 2-5 3-2 10h-1z" fill="#312F33"/>
                            <path transform="translate(948,140)" d="m0 0 3 1-3 4 2 5 40 40-2 3v3l-16-14-4-4-2-1v-2l-5-1v-2l-3-1-4-2-4-5-6-11-1-3h3l-2-7 4-1z" fill="#302E32"/>
                            <path transform="translate(161,371)" d="m0 0h1l2 18v26l-1 57 1 15v20h-1l-2-31-5-10h2v-40l2-2v-18l-2-4 2-23h-6v-3h3l1-3h3z" fill="#312F33"/>
                            <path transform="translate(803,3)" d="m0 0h23l15 4 16 7 10 7v3l-6-2-5-2-6-6-14-4-13-2h-9l-5-1h-9l-9 3-5 1 1 1 2 1-1 5-9 5-3-1 3-2 2-8-2-1 12-5z" fill="#302E32"/>
                            <path transform="translate(1068,269)" d="m0 0 7 6 8 7 68 68 8 4v-12h1l1 6v9l-5-1-9-5-5-5-1-3-4-2-2-2h-3v-2h-2l-1-6-4-2-9-10-5-5-10-9-6-7-3-2v-2h-2l-7-8-5-6-2-1v-2l-4-2-4-4z" fill="#302E32"/>
                            <path transform="translate(813,47)" d="m0 0h6v2l9 2h2v2l2 1v2h2v2l-3 1-12-5-10 1-10 3-10 9-4 6-2 6-1 7-1-3h-2l1-6 3-8 2-6h3v-3l5-2 1-3h4v-2h2l2-2 6 1-1-4z" fill="#2F2D31"/>
                            <path transform="translate(178,296)" d="m0 0h1l1 6v51l-1 11h-1v-8l-3 1-2-2v-11l1-4 1-24h2l-1-10z" fill="#302E32"/>
                            <path transform="translate(470,738distinctive 738)" d="m0 0h1l2 12-3 5-2-1h-125l-7-1v-1h134z" fill="#312F33"/>
                            <path transform="translate(732,67)" d="m0 0h2v2h-2l-1 3-10 5h-3v2l-5 2h-1v2l-5 2-3 5h-3v-2h-3l-1-3 4-4 20-9z" fill="#302E32"/>
                            <path transform="translate(1712,1075)" d="m0 0 5 1 16 8 16 12 9 8 1 3h-2l-5-5-4-3-7-3-12-8-4-5-8-4-3-1v-2z" fill="#302E32"/>
                            <path transform="translate(727,1073)" d="m0 0 6 1 16 8 12 7 11 9 7 8h-3v-2l-4-2-10-8-10-5-4-4-6-4v2h-2l-2-4-2 1v-2l-5-2z" fill="#312F33"/>
                            <path transform="translate(777,12)" d="m0 0 3 1-1 2h-3l-1 5-5 3 3 2h-5l-10 6-6 5-3 6h-3l2-5 7-8 7-7z" fill="#2F2D31"/>
                            <path transform="translate(801,51)" d="m0 0 3 1v2h5v1l-10 3-10 9-4 6-2 6-1 7-1-3h-2l1-6 3-8 2-6h3v-3l5-2 1-3h4v-2h2z" fill="#302E32"/>
                            <path transform="translate(385,1073)" d="m0 0 6 1 16 8 12 8 13 11 6 6v2h-2v-2l-4-2-5-5v-2l-4-1-4-3-6-2-2-4-8-5v-2h-5l-10-6z" fill="#312F33"/>
                            <path transform="translate(454,1132)" d="m0 0 3 4 6 16 3 15 1 9v25l-1 7h-1v-28l-2-19-5-11-4-14-1-3z" fill="#312F33"/>
                            <path transform="translate(1657,1117)" d="m0 0h8l20 4-4 1-6-1h-21l-16 4-4-1 1-2h2v-2z" fill="#312F33"/>
                            <path transform="translate(1550,658)" d="m0 0 3 1-1 9-7 10-2-4-1-5 4-4v-5z" fill="#302E32"/>
                            <path transform="translate(205,284)" d="m0 0 3 1v81l-2-1v-73l-1-2h-2v-5z" fill="#312F33"/>
                            <path transform="translate(1594,1177)" d="m0 0h1v16l2 13 4 12-1 3v-2l-4-2-4-16 1-20z" fill="#312F33"/>
                            <path transform="translate(761,144)" d="m0 0 8 1 10 5v2l-7 1-3-2h-3l-7-4-4-2z" fill="#312F33"/>
                            <path transform="translate(1780,1141)" d="m0 0 2 2 5 17 2 13v30h-1l-1-21-1-3-1-17-4-15z" fill="#312F33"/>
                            <path transform="translate(619,1083)" d="m0 0 2 2h-2l-1 5h-2v2l-6 2-5 3-2 2-2-1-1 3-5 2 6-7 16-12z" fill="#302E32"/>
                            <path transform="translate(1135,490)" d="m0 0 2 4 1 7-1 5 1 14-2 5-2 1v-27z" fill="#312F33"/>
                            <path transform="translate(642,1129)" d="m0 0 5 1-5 4-8 7-5 7h-1v-7l3-1 2-4 4-5 4-1z" fill="#302E32"/>
                            <path transform="translate(245,293)" d="m0 0h1l1 67 1 2 4 2-6 2-1-1z" fill="#312F33"/>
                            <path transform="translate(109,547)" d="m0 0 7 2h12l14 1 2 2-3 2-10-2h-9l-6 2-3-1z" fill="#312F33"/>
                            <path transform="translate(707,78)" d="m0 0h2l3 3v2l-5 2-3 5h-3v-2h-3l-1-3 4-4z" fill="#2C2A2E"/>
                            <path transform="translate(1046,196)" d="m0 0h1v5l-8 8 1 3 5 4 1 5-3 1-8-10 1-5 8-6z" fill="#2F2D31"/>
                            <path transform="translate(768,150)" d="m0 0 4 2 9-1 4 6 4 4-7-1-14-7z" fill="#252226"/>
                            <path transform="translate(614,1177)" d="m0 0h1l1 23 4 15-1 3-5-10-1-15v-12z" fill="#312F33"/>
                            <path transform="translate(89,602)" d="m0 0 5 1 3 3-3 4 2 1v6l-4 1-3-11v-4z" fill="#312F33"/>
                            <path transform="translate(1682,1217)" d="m0 0 3 1-4 4-8 3-8 1-13-2v-1l13-1 7 1 6-3z" fill="#312F33"/>
                            <path transform="translate(325,1118)" d="m0 0h24l7 1v1l-25 1-9 1-1-2z" fill="#312F33"/>
                            <path transform="translate(299,1129)" d="m0 0 3 3-10 9-5 6-2-1 2-5 2-3h2v-3l3-1 2-3h3z" fill="#302E32"/>
                            <path transform="translate(1720,743)" d="m0 0 12 2 10 2-2 1v2l-16-2-5-3z" fill="#302E32"/>
                            <path transform="translate(634,736)" d="m0 0 5 1v5h-2l2 6-1 4h-2l-4-10z" fill="#312F33"/>
                            <path transform="translate(271,1178)" d="m0 0h1l1 21 4 15 1 5-2-4h-2l-3-9z" fill="#312F33"/>
                            <path transform="translate(670,1118)" d="m0 0h19l14 2v1h-31l-8 1-1-2z" fill="#312F33"/>
                            <path transform="translate(223,276)" d="m0 0h10l-2 3h-3l-1 4-5 2-1-3-2 1 1-6z" fill="#2E2C30"/>
                            <path transform="translate(898,237)" d="m0 0 7 6-3 3-8-1v-2l-7-1-4-2h7l9 2z" fill="#312F33"/>
                            <path transform="translate(782,12)" d="m0 0h6l1 4-4 4-6 3-3-1 3-2z" fill="#312F33"/>
                            <path transform="translate(271,1086)" d="m0 0 3 1-1 3h-2l-2 4h-3l-10 8-2-1 5-5 8-7z" fill="#302E32"/>
                            <path transform="translate(973,117)" d="m0 0 6 2 2 7-3 1-9-6 2-1-1-2z" fill="#302E32"/>
                            <path transform="translate(739,54)" d="m0 0h5l-1 7-3 5-3 1-2-2z" fill="#312F33"/>
                            <path transform="translate(635,890)" d="m0 0 3 2 1 9-1 1h-5l-1-6z" fill="#312F33"/>
                            <path transform="translate(329,736)" d="m0 0h5l2 3-2 11h-1l-1-7-6-2v-4z" fill="#302E32"/>
                            <path transform="translate(1644,1258)" d="m0 0 10 1 23 1v1l-15 1-7 1-3-2-8-2z" fill="#312F33"/>
                            <path transform="translate(1610,1235)" d="m0 0 5 5 2 3-5 2-2-4-3-1h2v-2h-3v-2z" fill="#2F2D31"/>
                            <path transform="translate(760,25)" d="m0 0 2 4-7 4-4 5-3 5-2-1 2-5z" fill="#312F33"/>
                            <path transform="translate(834,276)" d="m0 0h10l8 3-1 3-17-5z" fill="#312F33"/>
                            <path transform="translate(367,1212)" d="m0 0h3l-1 3-9 6-4 1-1-2 5-3 2 1 1-3h2v-2z" fill="#312F33"/>
                            <path transform="translate(224,376)" d="m0 0h13v3h-13l-2-2z" fill="#312F33"/>
                            <path transform="translate(644,211)" d="m0 0 13 1 3 3-1 3-9-4-6-2z" fill="#312F33"/>
                            <path transform="translate(935,738)" d="m0 0 3 3-1 5v4l-2 2z" fill="#312F33"/>
                            <path transform="translate(205,284)" d="m0 0 3 1v8l-3-3h-2v-5z" fill="#302E32"/>
                            <path transform="translate(607,1091)" d="m0 0m-1 1m-1 1m-2 1 2 1-2 4-2-1-1 3-5 2 6-7z" fill="#312F33"/>
                            <path transform="translate(1742,748)" d="m0 0 9 1 5 1-2 2-9-1-4-2z" fill="#312F33"/>
                            <path transform="translate(169,736)" d="m0 0 3 1-1 5-4 1v-6z" fill="#312F33"/>
                            <path transform="translate(965,121)" d="m0 0 4 1-6 7-1-3 1-4z" fill="#302E32"/>
                            <path transform="translate(1704,1123)" d="m0 0h2l1 7h-3l-4-5h3z" fill="#312F33"/>
                            <path transform="translate(230,378)" d="m0 0h5l1 3h-14v-1l7-1z" fill="#29262A"/>
                        </svg>
                        <?php
                    }
                    ?>
                </a>
                <p class="footer__description">
                    <?php echo esc_html(carbon_get_theme_option('crf_footer_description')); ?>
                </p>
                <div class="footer__social">
                    <?php 
                    $social_links = array(
                        'instagram' => array(
                            'url' => carbon_get_theme_option('crf_social_instagram'),
                            'label' => 'Instagram'
                        ),
                        'telegram' => array(
                            'url' => carbon_get_theme_option('crf_social_telegram'),
                            'label' => 'Telegram'
                        ),
                        'viber' => array(
                            'url' => carbon_get_theme_option('crf_social_viber'),
                            'label' => 'Viber'
                        ),
                        'whatsapp' => array(
                            'url' => carbon_get_theme_option('crf_social_whatsapp'),
                            'label' => 'WhatsApp'
                        )
                    );

                    foreach ($social_links as $platform => $data):
                        if ($data['url']):
                    ?>
                    <a href="<?php echo esc_url($data['url']); ?>" 
                       class="footer__social-link footer__social-link--<?php echo esc_attr($platform); ?>" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       aria-label="<?php echo esc_attr($data['label']); ?>">
                       <?php echo $platform === 'whatsapp' ? carbon_get_theme_option('crf_social_whatsapp_icon') : carbon_get_theme_option('crf_social_' . $platform . '_icon'); ?>
                    </a>
                    <?php 
                        endif;
                    endforeach; 
                    ?>
                </div>
            </div>

            <div class="footer__nav">
                <div class="footer__nav-column">
                    <h3 class="footer__nav-title"><?php echo esc_html__('Навигация', 'customtheme'); ?></h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer_nav',
                        'container' => false,
                        'menu_class' => 'footer__nav-list',
                        'fallback_cb' => false,
                        'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                    ));
                    ?>
                </div>

                <div class="footer__nav-column">
                    <h3 class="footer__nav-title"><?php echo esc_html__('Услуги', 'customtheme'); ?></h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer_services',
                        'container' => false,
                        'menu_class' => 'footer__nav-list',
                        'fallback_cb' => false,
                        'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                    ));
                    ?>
                </div>

                <div class="footer__nav-column">
                    <h3 class="footer__nav-title"><?php echo esc_html__('Контакты', 'customtheme'); ?></h3>
                    <ul class="footer__nav-list">
                        <?php 
                        $phone = carbon_get_theme_option('crf_contact_phone');
                        $phone_label = carbon_get_theme_option('crf_contact_phone_label');
                        if ($phone && $phone_label): 
                        ?>
                        <li>
                            <a href="tel:<?php echo esc_attr($phone); ?>" class="footer__nav-link footer__nav-link--contact">
                                <svg class="footer__nav-icon" width="20" height="20" viewBox="0 0 24 24">
                                    <path d="M20 15.5c-1.2 0-2.4-.2-3.6-.6-.3-.1-.7 0-1 .2l-2.2 2.2c-2.8-1.4-5.1-3.8-6.6-6.6l2.2-2.2c.3-.3.4-.7.2-1-.3-1.1-.5-2.3-.5-3.5 0-.6-.4-1-1-1H4c-.6 0-1 .4-1 1 0 9.4 7.6 17 17 17 .6 0 1-.4 1-1v-3.5c0-.6-.4-1-1-1zM19 12h2c0-4.9-4-8.9-9-8.9v2c3.9 0 7 3.1 7 6.9zm-4 0h2c0-2.8-2.2-5-5-5v2c1.7 0 3 1.3 3 3z" />
                                </svg>
                                <?php echo esc_html($phone_label); ?>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php 
                        $email = carbon_get_theme_option('crf_contact_email');
                        if ($email): 
                        ?>
                        <li>
                            <a href="mailto:<?php echo esc_attr($email); ?>" class="footer__nav-link footer__nav-link--contact">
                                <svg class="footer__nav-icon" width="20" height="20" viewBox="0 0 24 24">
                                    <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                                </svg>
                                <?php echo esc_html($email); ?>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php 
                        $address = carbon_get_theme_option('crf_contact_address');
                        $address_url = carbon_get_theme_option('crf_contact_address_url');
                        if ($address && $address_url): 
                        ?>
                        <li>
                            <a href="<?php echo esc_url($address_url); ?>" target="_blank" rel="noopener noreferrer" class="footer__nav-link footer__nav-link--contact">
                                <svg class="footer__nav-icon" width="20" height="20" viewBox="0 0 24 24">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                                </svg>
                                <?php echo esc_html($address); ?>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer__bottom">
            <div class="footer__copyright">
                <?php 
                $copyright = carbon_get_theme_option('crf_footer_copyright');
                if ($copyright) {
                    echo wp_kses_post($copyright);
                } else {
                    printf(
                        esc_html__('© %d %s. Все права защищены.', 'customtheme'),
                        date('Y'),
                        get_bloginfo('name')
                    );
                }
                ?>
                <div class="footer__company-info">ИП Леоненко Н.С.  УНП <?php echo esc_html(carbon_get_theme_option('crf_owner_unp')); ?></div>
            </div>
            <div class="footer__policy">
                <?php if ($privacy_policy = carbon_get_theme_option('crf_privacy_policy_link')): ?>
                <a href="<?php echo esc_url($privacy_policy); ?>" class="footer__policy-link">
                    <?php echo esc_html(carbon_get_theme_option('crf_privacy_policy_text')); ?>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>

<div class="modal" id="orderModal">
    <div class="modal__overlay"></div>
    <div class="modal__container">
        <button class="modal__close" aria-label="Закрыть">
            <svg width="24" height="24" viewBox="0 0 24 24">
                <path
                    d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
            </svg>
        </button>
        <h2 class="modal__title">Заказать манипулятор</h2>
        <form class="modal__form" id="orderForm" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>" method="POST">
            <input type="hidden" name="service" id="serviceName" value="" />
            <div class="modal__form-group">
                <label class="modal__label" for="name">Ваше имя</label>
                <input type="text" class="modal__input" id="name" name="name" required
                    placeholder="Введите ваше имя" />
            </div>
            <div class="modal__form-group">
                <label class="modal__label" for="phone">Телефон</label>
                <input type="tel" class="modal__input form-phone" name="phone" required
                    placeholder="+375 (__) ___-__-__" />
            </div>
            <div class="modal__form-group">
                <label class="modal__label" for="message">Комментарий</label>
                <textarea class="modal__textarea" id="message" name="message"
                    placeholder="Опишите ваш вопрос или задачу"></textarea>
            </div>
            <div class="modal__form-group modal__form-group--checkbox">
                <input type="checkbox" class="modal__checkbox" id="privacy" name="privacy" required />
                <label class="modal__label modal__label--checkbox" for="privacy">
                    Я согласен на обработку персональных данных
                </label>
            </div>
            <button type="submit" class="modal__submit" data-modal-open="submit-order-modal-button">Отправить заявку</button>
        </form>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>